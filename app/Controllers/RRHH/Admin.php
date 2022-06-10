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
      // $vacantes =new VacantesModel();
       // $datos['vacantes']= $vacantes->orderBy('IDVACANTE','ASC')->findAll();

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


     // $ide=mysql_insert_id($default);
    if($numPlazas>1){

    }
        $datosRequerimientosVacante=[
            'IDVACANTE'=>1,
            'EXPERIENCIALABORAL'=>$experiencia,
            'NIVEL_ESTUDIO'=>$nivEstudio,
            'GENEROCANDIDATO'=>$genero,
            'NUMEROVACANTES'=>$numPlazas,
            'EDADMINIMAREQUERIDA'=>$tipContatacion,
            'EDADMAXIMAREQUERIDA'=>"Activo",
            
        ];
        $requerimientosvacante->insert($datosRequerimientosVacante);
        return $this->response->redirect(site_url('AdminRH/vacantes'));
        //return view('RRHH/vacantesCrear');
       // echo "Ingresado a la Base de datos";
      //  print_r($nombre);
    }
    public function vacantesBorrar($id=null)
    {
        $vacanteBorrar =new VacantesModel();
        $requerimientosvacanteBorrar =new RequerimientosVacanteModel();
       // $datosVacante=$vacanteBorrar->where('id',$id)->first(); Recupera el primer elemento

        $vacanteBorrar->where('IDVACANTE',$id)->delete($id);

       //$datosBorrar['borrarVacante']=$requerimientosvacanteBorrar->where('IDVACANTE',$id);
       //$requerimientosvacanteBorrar->where('IDREQVACANTE',$datosVacante1)->delete($datosVacante1);
       //echo $datosVacante1;
       return $this->response->redirect(site_url('AdminRH/vacantes'));
     
    }
    public function vacantesEditar($id=null)
    {
        $vacanteEditar =new VacantesModel();
        $requerimientosvacanteEditar =new RequerimientosVacanteModel();
       $datos['vacanteEditar']=$vacanteEditar->where('IDVACANTE',$id);
       $datos['requerimientosvacanteEditar']=$requerimientosvacanteEditar->where('IDVACANTE',$id);

        return view('RRHH/vacantesEditar');
     
    }
}
