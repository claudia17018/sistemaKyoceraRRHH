<?php

namespace App\Controllers\RRHH;
use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\DatosModel;
use App\Models\EntrevistaModel;
use App\Models\ComentariosEntrevistasModel;
use App\Models\EstadoProcesoModel;
use App\Models\PersonalRecursosHumanosModel;

class EntrevistaController extends BaseController{
    
    public function entrevistas($idSolicitante=null){
        $entrevista = new EntrevistaModel();
        $comentario = new ComentariosEntrevistasModel();
        $solicitante = new UsuarioModel();
        $datosCan = new DatosModel();
        $estadoProceso = new EstadoProcesoModel();
          
        $datosEntrevista['datosEntrevista'] = $entrevista->orderBy('IDENTREVISTA','ASC')->getAllEntrevistasBy('IDSOLICITANTE',$idSolicitante);
        $datosComentario['datosComentario'] = $comentario->orderBy('IDCOMENTARIOENTREVISTA','ASC')->findAll();
        $datosSolicitante['datosSolicitante'] = $solicitante->getSolicitanteBy('IDSOLICITANTE', $idSolicitante);    
        $datosCandidato['datosCandidato'] = $datosCan->getDatosBy('IDSOLICITANTE', $idSolicitante);
        $datosEstadoProceso['datosEstadoProceso'] = $estadoProceso->getEstadoProcesoBy('IDSOLICITANTE', $idSolicitante);
        
        $data['entrevistas'] = $datosEntrevista;
        $data['comentarios'] = $datosComentario;
        $data['solicitante'] = $datosSolicitante;
        $data['datosCand'] = $datosCandidato;
        $data['estadoProceso'] = $datosEstadoProceso;
            
        return view('RRHH/entrevistasView',$data);
    }
    
    public function nuevoComentario($idEntrevista=null,$idSolicitante=null){
        
        $entrevista = new EntrevistaModel();
        $solicitante = new UsuarioModel();
        $datos['entrevista'] = $entrevista->getEntrevistaBy('IDENTREVISTA', $idEntrevista); 
        $datos['solicitante'] = $solicitante->getSolicitanteBy('IDSOLICITANTE', $idSolicitante);
        return view('RRHH/view_agregarComentario',$datos);
    }
    
    public function guardarComentario($idEntrevista=null,$idSolicitante=null){
        
        if(!$this->validate([
            'newComent' => 'required',
        ])){
            return redirect()->back()
            ->with('errors',$this->validator->getErrors())
            ->withInput();
        }
            
        $comentarioModel = new ComentariosEntrevistasModel();
                                              
        $data = [
            'IDENTREVISTA' => $idEntrevista,
            'COMENTARIOS' => $this->request->getVar('newComent')
        ];
           
        $comentarioModel->insert($data);
        return $this->response->redirect(site_url('/RRHH/entrevistas/'.$idSolicitante));
    }
    
    public function nuevaEntrevista($idSolicitante=null){
        
        if(!session()->logged_in){ 
             return view('Auth/login');
        }else{          
             $solicitante = new UsuarioModel();
             $personalRHModel = new PersonalRecursosHumanosModel();
             
             $idUsuario=$_SESSION['id'];
             $data['datosPersonalRRHH'] = $personalRHModel->getPersonalRecursosHumanosBy('IDUSUARIO',$idUsuario);
             $data['datosSolicitante'] = $solicitante->getSolicitanteBy('IDSOLICITANTE', $idSolicitante);
             
             return view('RRHH/view_nuevaEntrevista',$data);
        }
    }
    
    public function crearEntrevista($idPersonalRRHH=null,$idSolicitante=null){
        
        if(!$this->validate([
            'fechaEntrevista' => 'required',
            'horaInicio' => 'required',
            'horaFinalizacion' => 'required',
            'modalidadEntrevista' => 'required',
            'tituloEntrevista' => 'required',
            'descripcionEntrevista' => 'required',
        ])){
            return redirect()->back()
            ->with('errors',$this->validator->getErrors())
            ->withInput();
        }
        
        $entrevistaModel = new EntrevistaModel();
                                              
        $data = [
            'IDPERSONALRECURSOSHUMANOS' => $idPersonalRRHH,
            'IDSOLICITANTE' => $idSolicitante,
            'FECHAENTREVISTA' => date('Y-m-d', strtotime($this->request->getVar('fechaEntrevista'))),
            'HORAINICIO' => $this->request->getVar('horaInicio'),
            'HORAFINALIZACION' => $this->request->getVar('horaFinalizacion'),
            'MODALIDADENTREVISTA' => $this->request->getVar('modalidadEntrevista'),
            'TITULOENTREVISTA' => $this->request->getVar('tituloEntrevista'),
            'DESCRIPCIONENTREVISTA' => $this->request->getVar('descripcionEntrevista')
        ];
          
        $entrevistaModel->insert($data);
        return $this->response->redirect(site_url('/RRHH/entrevistas/'.$idSolicitante));
    }
    
    public function editarEntrevista($idEntrevista=null,$idSolicitante=null){
        
        if(!session()->logged_in){ 
             return view('Auth/login');
        }else{          
             $entrevistaModel = new EntrevistaModel();
             $usuarioModel = new UsuarioModel();
             $personalRHModel = new PersonalRecursosHumanosModel();
                          
             $idUsuario=$_SESSION['id'];
             $data['datosPersonalRRHH'] = $personalRHModel->getPersonalRecursosHumanosBy('IDUSUARIO',$idUsuario);
             $data['datosSolicitante'] = $usuarioModel->getSolicitanteBy('IDSOLICITANTE', $idSolicitante);
             $data['datosEntrevista'] = $entrevistaModel->getEntrevistaBy('IDENTREVISTA', $idEntrevista);
                                      
             return view('RRHH/view_editarEntrevista', $data);
            }
    }
    
    public function guardarEntrevista($idEntrevista=null, $idPersonalRRHH=null, $idSolicitante=null){
        
        if(!$this->validate([
            'fechaEntrevista' => 'required',
            'horaInicio' => 'required',
            'horaFinalizacion' => 'required',
            'modalidadEntrevista' => 'required',
            'tituloEntrevista' => 'required',
            'descripcionEntrevista' => 'required',
        ])){
            return redirect()->back()
            ->with('errors',$this->validator->getErrors())
            ->withInput();
        }
        
        $entrevistaModel = new EntrevistaModel();
                                              
        $data = [
            'IDPERSONALRECURSOSHUMANOS' => $idPersonalRRHH,
            'IDSOLICITANTE' => $idSolicitante,
            'FECHAENTREVISTA' => date('Y-m-d', strtotime($this->request->getVar('fechaEntrevista'))),
            'HORAINICIO' => $this->request->getVar('horaInicio'),
            'HORAFINALIZACION' => $this->request->getVar('horaFinalizacion'),
            'MODALIDADENTREVISTA' => $this->request->getVar('modalidadEntrevista'),
            'TITULOENTREVISTA' => $this->request->getVar('tituloEntrevista'),
            'DESCRIPCIONENTREVISTA' => $this->request->getVar('descripcionEntrevista')
        ];
           
        $entrevistaModel->update($idEntrevista,$data);
        return $this->response->redirect(site_url('/RRHH/entrevistas/'.$idSolicitante));
    }
    
    public function eliminarEntrevista($idEntrevista=null, $idSolicitante = null){
        
        $entrevistaModel = new EntrevistaModel();
        $comentarioModel = new ComentariosEntrevistasModel();
        
        $comentarioModel->where('IDENTREVISTA', $idEntrevista)->delete();
        $entrevistaModel->delete($idEntrevista);
        return $this->response->redirect(site_url('/RRHH/entrevistas/'.$idSolicitante));
    }
}
