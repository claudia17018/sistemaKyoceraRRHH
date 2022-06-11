<?php

namespace App\Controllers\Solicitante;
use App\Controllers\BaseController;
use App\Models\EstadoPostulanteModel;
use App\Models\UsuarioModel;


class Solicitante extends BaseController
{
    public function index()
    {   
        return view('Solicitante/index');
    }    


    public function perfil(){

         if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
             $userModel = new UsuarioModel();
             $idUsuario=$_SESSION['id'];
             $data['user'] = $userModel->getSolicitanteByIdUser('IDUSUARIO',$idUsuario);
            return view('Solicitante/perfil',$data);
            }
        }

        public function miPerfil($idUsuario=null)
    {
        $UsuarioModel = new UsuarioModel();
   
        $datosCandidato['datosCandidato'] = $UsuarioModel->getSolicitanteBy('IDUSUARIO', $idUsuario);
                   
        return view('Solicitante/perfilView', $datosCandidato);
    }
    
    public function editarPerfil($idSolicitante=null)
    {
        return view('Solicitante/view_editarPerfilCandidato');
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
        $model = new UsuarioModel();
        $data['solicitante'] = $model->getSolicitanteBy('IDSOLICITANTE',$id);
        $modelPostulante= new EstadoPostulanteModel();
        $data['estado']= $modelPostulante->findAll();
         return view('Solicitante/perfilCandidato', $data);
     } 
}