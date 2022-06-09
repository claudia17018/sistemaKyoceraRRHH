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

    public function consultar($id = null){
        $model = new UsuarioModel();
        $data['solicitante'] = $model->getSolicitanteBy('IDSOLICITANTE',$id);
        $modelPostulante= new EstadoPostulanteModel();
        $data['estado']= $modelPostulante->findAll();
         return view('Solicitante/index', $data);
     }

    public function estadoPostulante($id=null){
        
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
        
}