<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\EducacionModel;
use App\Models\DatosModel;
use App\Models\TipoContactoModel;
use App\Models\MediosContactoModel;

class PerfilController extends BaseController{
    
    public function miPerfil()
    {
         if(!session()->logged_in){ 
             return view('Auth/login');
        }else{
             $usuarioModel = new UsuarioModel();
             $datosModel = new DatosModel();
             $educacionModel = new EducacionModel();
             $tipoContactoModel = new TipoContactoModel();
             $mediosContactoModel = new MediosContactoModel();
             
             $idUsuario=$_SESSION['id'];
             $data['datosCandidato'] = $usuarioModel->getSolicitanteBy('IDUSUARIO',$idUsuario);
             
             $idSolicitante = $usuarioModel->getIdValue($data['datosCandidato']);
             $data['datos'] = $datosModel->getDatosBy('IDSOLICITANTE', $idSolicitante);
            
             $data['datosEducacion'] = $educacionModel->getEducacionBy('IDSOLICITANTE', $idSolicitante);
             
             $idTipoContacto = $tipoContactoModel->getIdValue($tipoContactoModel->getTipoContactoBy('TIPOCONTACTOASPIRANTE', 'correo'));
             $data['correo'] = $mediosContactoModel->getMediosByIdTipoIdSolicitante($idTipoContacto, $idSolicitante);                       
             
             return view('User/perfilView',$data);
            }
    }
    
    public function editarPerfil($idSolicitante = null)
    {
        $candidato = new UsuarioModel();
        $educacion = new EducacionModel();
        $tipoContacto = new TipoContactoModel();
        $mediosContacto = new MediosContactoModel();
        
        $idTipoContacto = $tipoContacto->getIdValue($tipoContacto->getTipoContactoBy('TIPOCONTACTOASPIRANTE', 'correo'));
        
        $data['solicitante'] = $candidato->getSolicitanteBy('IDSOLICITANTE',$idSolicitante);
        $data['educacion'] = $educacion->getEducacionBy('IDSOLICITANTE', $idSolicitante);
        $data['correo'] = $mediosContacto->getMediosByIdTipoIdSolicitante($idTipoContacto, $idSolicitante);
        
        return view('User/view_editarPerfilCandidato', $data);
    }
    
    public function guardarPerfil($idSolicitante=null)
    {
        if(!$this->validate([
            'priNomSolicitante' => 'required',
            'segNomSolicitante' => 'required',
            'priApeSolicitante' => 'required',
            'segApeSolicitante' => 'required',
            'fechaNacimiento' => 'required',
            'genero' => 'required',
        ])){
            return redirect()->back()
            ->with('errors',$this->validator->getErrors())
            ->withInput();
        }
        
        $candidato = new UsuarioModel();
        $educacion = new EducacionModel();
        $tipoContactoModel = new TipoContactoModel();
        $mediosContactoModel = new MediosContactoModel();
                   
        $dataCandidato = [
            'PRIMERNOMBRESOLICITANTE' => $this->request->getVar('priNomSolicitante'),
            'SEGUNDONOMBRESOLICITANTE' => $this->request->getVar('segNomSolicitante'),
            'PRIMERAPELLIDOSOLICITANTE' => $this->request->getVar('priApeSolicitante'),
            'SEGUNDOAPELLIDOSOLICITANTE' => $this->request->getVar('segApeSolicitante'),
            'SOLICITANTEFECHANACIMIENTO' => date('Y-m-d', strtotime($this->request->getVar('fechaNacimiento'))),
            'GENEROSOLICITANTE' => $this->request->getVar('genero'),
            'UPDATED_AT' => date('Y-m-d')
            ];       
        $idEducacion = $educacion->getIdValue($educacion->getEducacionBy('IDSOLICITANTE', $idSolicitante));
        $dataEducacion = [
            'NIVELDEEDUCACION' => $this->request->getVar('nivelAcademico')
            ];
        $idTipoContacto = $tipoContactoModel->getIdValue($tipoContactoModel->getTipoContactoBy('TIPOCONTACTOASPIRANTE', 'correo'));
        $idMediosContacto = $mediosContactoModel->getIdValue($mediosContactoModel->getMediosByIdTipoIdSolicitante($idTipoContacto, $idSolicitante));
        $dataMediosContacto = [
            'CONTACTOSOLICITANTE' => $this->request->getVar('correoAspirante')
            ];
        
        
        $candidato->update($idSolicitante,$dataCandidato);
        $educacion->update($idEducacion, $dataEducacion);
        $mediosContactoModel->update($idMediosContacto, $dataMediosContacto);
                
        return $this->response->redirect(site_url('/User/miPerfil'));
    }

}

