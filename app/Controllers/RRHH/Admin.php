<?php

namespace App\Controllers\RRHH;

use App\Controllers\BaseController;
use App\Models\VacantesModel;
use App\Models\RequerimientosVacanteModel;

//use App\Models\CrearCuentaModel;
//use App\Models\UsuarioModel;

class Admin extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('RRHH/index');
    }

    /************** Vacantes  ********************/
    public function vacantes()
    {
        $vacantes =new VacantesModel();
        $datos['vacantes']= $vacantes->orderBy('IDVACANTE','ASC')->findAll();

        return view('RRHH/vacantes',$datos);
    }
    public function vacanteCrear()
    {
    
        return view('RRHH/vacantesCrear');
    }
    public function vacantesGuardar(){
        $vacante =new VacantesModel();
        $requerimientosvacante =new RequerimientosVacanteModel();
        

        $nombre= $this->request->getVar('nombreVC');
        $descripcion= $this->request->getVar('descripcionVC');
        $requerimientos= $this->request->getVar('requerimientosVC');
        $numPlazas= $this->request->getVar('numPlazasVC');
        $nivEstudio= $this->request->getVar('nivEstudioVC');
        $experiencia= $this->request->getVar('experienciaVC');
        $genero= $this->request->getVar('generoVC');
        $salario= $this->request->getVar('salarioVC');
        $tipContatacion= $this->request->getVar('tipContatacionVC');
        $edadMin= $this->request->getVar('edadMinVC');
        $edadMax= $this->request->getVar('edadMaxVC');
        
        $datosVacante=[
            'CREATED_AT'=>date("y-m-d"),
            'NOMBREVACANTE'=>$nombre,
            'DESCRIPCIONVACANTE'=>$descripcion,
            'REQUERIMIENTOSPROPIOSVACANTE'=>$requerimientos,
            'NUMEROVACANTES'=>$numPlazas,
            'tipContratacion'=>$tipContatacion,
            'ESTADOVACANTE'=>"Activo",
            'IDAREA'=>1,
            'IDPERSONALRECURSOSHUMANOS'=>1,
            'UPDATED_AT'=>date("y-m-d")
        ];
        


        $vacante->insert($datosVacante);


        $i=-100;
        $cont=0;
        $vacanteActualizado =new VacantesModel();
        $idVacante=$vacanteActualizado->select('IDVACANTE')->find();
        foreach($idVacante as $vac){
          
            if($i<$idVacante[$cont]['IDVACANTE']){
                $i=$idVacante[$cont]['IDVACANTE'];
            }
            $cont++;
        }

 
        $datosRequerimientosVacante=[
            'IDVACANTE'=>$i,
            'EXPERIENCIALABORAL'=>$experiencia,
            'NIVEL_ESTUDIO'=>$nivEstudio,
            'GENEROCANDIDATO'=>$genero,
            'NUMEROVACANTES'=>$numPlazas,
            'EDADMINIMAREQUERIDA'=>$edadMin,
            'EDADMAXIMAREQUERIDA'=>$edadMax
            
        ];
        $requerimientosvacante->insert($datosRequerimientosVacante);
        return $this->response->redirect(site_url('AdminRH/vacantes'));
      
    }
    public function vacantesBorrar($id=null)
    {
        $vacanteBorrar =new VacantesModel();
        $requerimientosvacanteBorrar =new RequerimientosVacanteModel();
        $vacanteBorrar->where('IDVACANTE',$id)->delete($id);
        $idBorrar=$requerimientosvacanteBorrar->where('IDVACANTE',$id)->select('IDREQVACANTE')->find();
        $requerimientosvacanteBorrar->where('IDVACANTE',$id)->delete($idBorrar[0]['IDREQVACANTE']);

       return $this->response->redirect(site_url('AdminRH/vacantes'));
     
    }
    public function vacantesEditar($id=null)
    {
        $vacanteEditar =new VacantesModel();
        $requerimientosvacanteEditar =new RequerimientosVacanteModel();


       $datosEditarV['vacanteEditar']=$vacanteEditar->where('IDVACANTE',$id)->first();
       
       $datosEditarV['requerimientosvacanteEditar']=$requerimientosvacanteEditar->where('IDVACANTE',$id)->first();

        return view('RRHH/vacantesEditar',$datosEditarV);
     
    }
    public function vacanteVer()
    {
       
    }
}
