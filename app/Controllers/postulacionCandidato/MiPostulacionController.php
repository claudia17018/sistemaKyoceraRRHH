<?php 
namespace App\Controllers\postulacionCandidato;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\DatosModel;
use Config\Mimes;

class MiPostulacionController extends BaseController{

   
    /*
    public function upload(){
        if($imageFile = $this->request->getFile('dui')){
            echo "uno";
            if($imageFile->isValid() && !($imageFile->hasMoved())){
                //validaciones 
                echo "dos";
                
                $validated = $this->validate([
                    'userFile' =>[
                       'rules'=>'uploaded[dui]',
                        'mime_in[image, image/png, image/jpg]'
                    ]
                ]);

                if($validated){
                    echo "ok";

                }else{

                    var_dump($this->validator->listErrors());        

                    return false;
                }
                $newName = $imageFile->getRandomName();

                echo WRITEPATH;

                $imageFile->move(WRITEPATH.'uploads/dui',$newName);

                

            }
            
        }
        return true;
    }*/
    public function upload(){

        $imageFile1 = $this->request->getFile('dui');
        $imageFile2 = $this->request->getFile('nit');
        $imageFile3 = $this->request->getFile('curriculum');

        if($imageFile1 && $imageFile2 && $imageFile3){
            
            if( ($imageFile1->isValid() && !($imageFile1->hasMoved())) &&
                ($imageFile2->isValid() && !($imageFile2->hasMoved())) &&
                ($imageFile3->isValid() && !($imageFile3->hasMoved()))){
                //validaciones 
                
                $validated1 = $this->validate([
                    'userFile' =>[
                       'rules'=>'uploaded[dui]',
                        'mime_in[image, image/png, image/jpg]'
                    ]
                ]);
                $validated2 = $this->validate([
                    'userFile' =>[
                       'rules'=>'uploaded[nit]',
                        'mime_in[image, image/png, image/jpg]'
                    ]
                ]);
                $validated3 = $this->validate([
                    'userFile' =>[
                       'rules'=>'uploaded[curriculum]',
                        'mime_in[image, image/pdf]'
                    ]
                ]);

                if($validated1 && $validated2 && $validated3){
                    echo "ok";

                }else{

                    var_dump($this->validator->listErrors());        

                    return false;
                }
                $newName1 = $imageFile1->getRandomName();
                $newName2 = $imageFile2->getRandomName();
                $newName3 = $imageFile3->getRandomName();

                //echo WRITEPATH;

                $imageFile1->move(WRITEPATH.'uploads/dui',$newName1);
                $imageFile2->move(WRITEPATH.'uploads/nit',$newName2);
                $imageFile3->move(WRITEPATH.'uploads/curriculum',$newName3);    
            }
            
        }
        $userDatos = new DatosModel();
        $datos = $userDatos;

        $data = [
            'URLCV' => $newName3,
            'URLNIT' => $newName2,
            'URLDUI' => $newName1

        ];
        $id = $userDatos->insert($data);
        echo $id;
        return $this->response->redirect(site_url('postular/p'));
    }

    public function p(){
        return view('solicitante/postulacion');
    }

}