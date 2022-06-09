<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\UserModel;
use App\Models\DatosModel;

class PerfilController extends BaseController{
    
    public function miPerfil($idUsuario=null)
    {
        $UsuarioModel = new UsuarioModel();
   
        $datosCandidato['datosCandidato'] = $UsuarioModel->getUsuarioBy('IDUSUARIO', $idUsuario);
                   
        return view('User/perfilView', $datosCandidato);
    }
    
    public function editarPerfil($idSolicitante=null)
    {
        $date['fecha'] = date('Y-m-d');
        return view('User/view_editarPerfilCandidato',$date);
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
                'UPDATED_AT' => DateTime.date('Y-m-d')
            ];
           
            $candidato->update($idSolicitante,$data);
            print_r($data);
            return $this->response->redirect(site_url('/User/perfilView'));
    }

}

