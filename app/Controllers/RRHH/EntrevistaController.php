<?php

namespace App\Controllers\RRHH;
use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\DatosModel;
use App\Models\EntrevistaModel;
use App\Models\ComentariosEntrevistasModel;
use App\Models\EstadoProcesoModel;

class EntrevistaController extends BaseController{
    
    public function entrevistas($idSolicitante=null){
        $entrevista = new EntrevistaModel();
        $comentario = new ComentariosEntrevistasModel();
        $solicitante = new UsuarioModel();
        $datosCan = new DatosModel();
        $estadoProceso = new EstadoProcesoModel();
          
        $datosEntrevista['datosEntrevista'] = $entrevista->orderBy('IDENTREVISTA','ASC')->getAllEntrevistasBy('IDSOLICITANTE',$idSolicitante);
        $datosComentario['datosComentario'] = $comentario->orderBy('IDCOMENTARIOENTREVISTA','ASC')->findAll();
        $datosSolicitante['datosSolicitante'] = $solicitante->getUsuarioBy('IDSOLICITANTE', $idSolicitante);    
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
        $datos['solicitante'] = $solicitante->getUsuarioBy('IDSOLICITANTE', $idSolicitante);
        return view('RRHH/view_agregarComentario',$datos);
    }
    
    public function guardarComentario($idEntrevista=null,$idSolicitante=null){
        
            $comentarioModel = new ComentariosEntrevistasModel();
                                              
            $data = [
                'IDENTREVISTA' => $idEntrevista,
                'COMENTARIOS' => $this->request->getVar('newComent')
            ];
           
            $comentarioModel->insert($data);
            print_r($data);
            return $this->response->redirect(site_url('/AdminRH/entrevistas/'.$idSolicitante));
    }
}
