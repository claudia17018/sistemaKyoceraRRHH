<?php 
namespace App\Controllers\postulacionCandidato;
use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\DatosModel;
use Config\Mimes;
use App\Models\FechPostulaModel;
use App\Models\RefInterModel;
use App\Database\query;

class MiPostulacionController extends BaseController{
    
    public function postulacion(){
        if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
             $idUsuario=$_SESSION['id'];
             $userModel = new UsuarioModel();
             $data['user'] = $userModel->getSolicitanteByIdUser('IDUSUARIO',$idUsuario);
            return view('solicitante/postulacion',$data);
            }      
    }

    public function upload(){
        //$validation = service('validation');

        $db     =\Config\Database::connect();
        $builder=$db->table('datos');

        $dui = $this->request->getFile('dui');
        $nit = $this->request->getFile('nit');
        $cv = $this->request->getFile('curriculum');
        $id = $this->request->getVar('id');
       
        $idSol=$id;
        if($dui && $nit && $cv){
            
            if( ($dui->isValid() && !($dui->hasMoved())) &&
                ($nit->isValid() && !($nit->hasMoved())) &&
                ($cv->isValid() && !($cv->hasMoved()))){
                //validaciones 
                
                $validated1 = $this->validate([
                    'userFile' =>[
                       'rules'=>'uploaded[dui]',
                        'mime_in[image, image/png, image/pdf]'
                    ]
                ]);
                $validated2 = $this->validate([
                    'userFile' =>[
                       'rules'=>'uploaded[nit]',
                        'mime_in[image, image/png, image/pdf]'
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
                $newName1 = $dui->getRandomName();
                $newName2 = $nit->getRandomName();
                $newName3 = $cv->getRandomName();

                //echo WRITEPATH;

                $dui->move(WRITEPATH.'uploads/dui',$newName1);
                $nit->move(WRITEPATH.'uploads/nit',$newName2);
                $cv->move(WRITEPATH.'uploads/curriculum',$newName3);    
            }
            
        }
        $userDatos = new DatosModel();
        $datos = $userDatos;
        $builder->getWhere(['IDSOLICITANTE' => $idSol]);
        $data = [
            'URLCV' => $newName3,
            'URLNIT' => $newName2,
            'URLDUI' => $newName1

        ];
        $builder->update($data);
        //$save= $userDatos->update($idSol,$data);
        $this->storePostulacion($idSol);
        $this->insertReferenciaInterna($idSol);
    
        return $this->response->redirect(site_url('postular/'));
    }
    /****************************************************** */
    //Para insertar la pretenseion salarial
    public function storePostulacion($idSol){
        $fechaPost = new FechPostulaModel();
        $idSolicitante=$idSol;
        $data = [
            'IDSOLICITANTE'=>$idSolicitante,
            'PRETENCIONSALARIAL' => $this->request->getVar('pretensionSalarial'),
        ];

        $fechaPost->insert($data);

    }
    //Para insertar referencias internas
    public function insertReferenciaInterna($idSol){
        $referencia = new RefInterModel();    
        $nombre= $this->request->getVar('nombreRecomienda');
        $apellido=$this->request->getVar('apellidoRecomienda');
        $telefono=$this->request->getVar('telRecomienda');
        $badge=$this->request->getVar('badgeRecomienda');
        $idSolicitante=$idSol;

        if(!empty($badge)){
             $data = [
            'IDSOLICITANTE' => $idSolicitante,
            'NOMBREEMPLEADO' => $nombre,
            'APELLIDOEMPLEADO' => $apellido,
            'TELEFONOEMPLEADO' => $telefono,
            'BADGEEMPLEADO' => $badge,
        ];

            $referencia->insert($data);     
        }
          
    }


}