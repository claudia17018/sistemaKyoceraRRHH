<?php

namespace App\Controllers\RRHH;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\EntrevistaModel;
use App\Models\ComentariosEntrevistasModel;
use App\Models\EstadoProcesoModel;

class EntrevistaController extends BaseController{
    
    public function entrevistas(){
        $entrevista = new EntrevistaModel();
        $comentario = new ComentariosEntrevistasModel();
               
        $datosEntrevista['datosEntrevista'] = $entrevista->orderBy('IDENTREVISTA','ASC')->findAll();
        $datos['entrevistas'] = $datosEntrevista;
        $datosComentario['datosComentario'] = $comentario->orderBy('IDCOMENTARIOENTREVISTA','ASC')->findAll();
        $datos['comentarios'] = $datosComentario;
        
        return view('RRHH/entrevistasView',$datos);
    }
    
    public function nuevoComentario($id=null){
        
        print_r($id);
        $entrevista = new EntrevistaModel();
        $datos['entrevista'] = $entrevista->getEntrevistaBy('IDENTREVISTA', $id); 
        return view('RRHH/view_agregarComentario',$datos);
    }
    
    public function guardarComentario($idEntrevista=null){
        
            $comentarioModel = new ComentariosEntrevistasModel();
                                  
            $data = [
                'IDENTREVISTA' => $idEntrevista,
                'COMENTARIOS' => $this->request->getVar('newComent')
            ];
           
            $comentarioModel->insert($data);
            print_r($data);
            return $this->response->redirect(site_url('/AdminRH/entrevistas'));
    }
}
