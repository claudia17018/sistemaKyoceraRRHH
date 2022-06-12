<?php

namespace App\Controllers\Solicitante;
use App\Controllers\BaseController;
use App\Models\EstadoPostulanteModel;
use App\Models\UsuarioModel;
use App\Models\DatosModel;
use App\Models\FechPostulaModel;
use App\Models\RefInterModel;
use App\Models\Medioscontacto;
use App\Models\VacantesModel;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class Solicitante extends BaseController
{
    public function index()
    {   
         if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
            return view('Solicitante/index');
            } 
    }    


    public function perfil(){

         if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
             $idUsuario=$_SESSION['id'];
             $userModel = new UsuarioModel();
             $data['user'] = $userModel->getSolicitanteByIdUser('IDUSUARIO',$idUsuario);
            return view('Solicitante/perfil',$data);
            }
        }

        public function miPerfil($idUsuario=null)
    {  
         if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
           
        $UsuarioModel = new UsuarioModel();
   
        $datosCandidato['datosCandidato'] = $UsuarioModel->getSolicitanteBy('IDUSUARIO', $idUsuario);
                   
        return view('Solicitante/perfilView', $datosCandidato);
            } 
    }
    
    public function editarPerfil($idSolicitante=null)
    {
        if(!session()->logged_in){ 
              return view('Auth/login');
        }else{
            return view('Solicitante/view_editarPerfilCandidato');
            } 
    }
    
    public function guardarPerfil($idSolicitante=null)
    {
        $candidato = new UsuarioModel();
            
            $data = [
                'PRIMERNOMBRESOLICITANTE' => $this->request->getVar('priNomSolicitante'),
                'SEGUNDONOMBRESOLICITANTE' => $this->request->getVar('segNomSolicitante'),
                'PRIMERAPELLIDOSOLICITANTE' => $this->request->getVar('priApeSolicitante'),
                'SEGUNDOAPELLIDOSOLICITANTE' => $this->request->getVar('segApeSolicitante'),
                'DUI' => $this->request->getVar('duiSolicitante'),
                'NIT' => $this->request->getVar('nitAspirante'),
                'SOLICITANTEFECHANACIMIENTO' => $this->request->getVar('fechaNacimiento'),
                'GENEROSOLICITANTE' => $this->request->getVar('genero'),
                'UPDATED_AT' => date('Y-m-d')
            ];
           
            $candidato->update($idSolicitante,$data);
            print_r($data);
            return $this->response->redirect(site_url('/Solicitante/perfilView'));
    }

     public function consultar($id = null){

         if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
    
        $model = new UsuarioModel();
        $data['solicitante'] = $model->getSolicitanteBy('IDSOLICITANTE',$id);

        $modelPostulante= new EstadoPostulanteModel();
        $data['estado']= $modelPostulante->findAll();

        $modelPostulacion= new FechPostulaModel();
        $data['postulacion']= $modelPostulacion->getSolicitantePostulacion('IDSOLICITANTE',$id);

        $modelReferencias= new RefInterModel();
        $referencia= $modelReferencias->getSolicitanteRef('IDSOLICITANTE',$id);
        if($referencia){
            $data['referencia']= $referencia;
        }
        
        $modelContacto = new Medioscontacto();
        $data['contacto'] = $modelContacto->getSolicitanteContacto('IDSOLICITANTE',$id);
      
         return view('Solicitante/perfilCandidato', $data);

        }
     } 

     public function vacanteDisponible(){
        if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
             
        $vacantes = new VacantesModel();
        $datos = $vacantes->listarVacantes();

        $data = [
            "datos" => $datos
        ];

         return view('Solicitante/vacanteDisponible', $data);

        } 
     }

    public function mostraVacantes(){

         if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
           
        $vacantes = new VacantesModel();
        $datos = $vacantes->listarVacantes();

        $data = [
            "datos" => $datos
        ];

        return view('vacanteDisponible', $data);
        } 
    }
    public function filtrarVacante(){
        
    }
    public function viewPDF($id){
        $file = 'filename.pdf';
        $filename = 'filename.pdf';

        $modelDatos=new DatosModel();
        // Header content type
        header('Content-type: application/pdf');

        header('Content-Disposition: inline; filename="' . $filename . '"');

        header('Content-Transfer-Encoding: binary');

        header('Accept-Ranges: bytes');

        // Read the file
        @readfile($file);
    }

    public function estadoPostulante(){
       
        $db     =\Config\Database::connect();
        $builder=$db->table('solicitante');

        $estado=$this->request->getVar('opcion');
        $idS=$this->request->getVar('id');

        $builder->getWhere(['IDSOLICITANTE' => $idS]);

         $data = [
            'IDESTADOPOSTULANTE' => $estado,
        ];
        $builder->update($data);
        
       return view('Solicitante/index');
    }
}