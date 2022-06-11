<?php

namespace App\Controllers\RRHH;

use App\Controllers\BaseController;
use App\Models\VacantesModel;
use App\Models\RequerimientosVacanteModel;
use CodeIgniter\Database\MySQLi\Builder;

use function PHPUnit\Framework\equalTo;

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
        //$db     =\Config\Database::connect();
        //$builder=$db->table('vacante');
        $vacantes = new VacantesModel();

       
        if ($_POST) {
            // $buscar=$this->request->getVar('busqueda');
            $buscar = $this->request->getVar('busqueda');
        } else {
            $buscar = "";
        }
      // $u=$vacantes->buscar($buscar);
      // $datos['list']=$u;
        //$datos = $vacantes->listarVacantes();
        $datos['vacantes'] = $vacantes->orderBy('ESTADOVACANTE', 'ASC')->findAll();

        return view('RRHH/vacantes', $datos);
    }
   




    public function vacanteCrear()
    {

        return view('RRHH/vacantesCrear');
    }
    public function vacantesGuardar()
    {
        $vacante = new VacantesModel();
        $requerimientosvacante = new RequerimientosVacanteModel();


        $nombre = $this->request->getVar('nombreVC');
        $descripcion = $this->request->getVar('descripcionVC');
        $requerimientos = $this->request->getVar('requerimientosVC');
        $numPlazas = $this->request->getVar('numPlazasVC');
        $nivEstudio = $this->request->getVar('nivEstudioVC');
        $experiencia = $this->request->getVar('experienciaVC');
        $genero = $this->request->getVar('generoVC');
        $tipContatacion = $this->request->getVar('tipContatacionVC');
        $edadMin = $this->request->getVar('edadMinVC');
        $edadMax = $this->request->getVar('edadMaxVC');

        $datosVacante = [
            'CREATED_AT' => date("y-m-d"),
            'NOMBREVACANTE' => $nombre,
            'DESCRIPCIONVACANTE' => $descripcion,
            'REQUERIMIENTOSPROPIOSVACANTE' => $requerimientos,
            'NUMEROVACANTES' => $numPlazas,
            //'tipContratacion'=>$tipContatacion,
            'ESTADOVACANTE' => "Activo",
            'IDAREA' => 1,
            'IDPERSONALRECURSOSHUMANOS' => 1,
            'UPDATED_AT' => date("y-m-d")
        ];



        $vacante->insert($datosVacante);


        $i = -100;
        $cont = 0;
        $vacanteActualizado = new VacantesModel();
        $idVacante = $vacanteActualizado->select('IDVACANTE')->find();
        foreach ($idVacante as $vac) {

            if ($i < $idVacante[$cont]['IDVACANTE']) {
                $i = $idVacante[$cont]['IDVACANTE'];
            }
            $cont++;
        }


        $datosRequerimientosVacante = [
            'IDVACANTE' => $i,
            'EXPERIENCIALABORAL' => $experiencia,
            'NIVEL_ESTUDIO' => $nivEstudio,
            'GENEROCANDIDATO' => $genero,
            'NUMEROVACANTES' => $numPlazas,
            'EDADMINIMAREQUERIDA' => $edadMin,
            'EDADMAXIMAREQUERIDA' => $edadMax

        ];
        $requerimientosvacante->insert($datosRequerimientosVacante);
        return $this->response->redirect(site_url('AdminRH/vacantes'));
    }
    public function vacantesBorrar($id = null)
    {
        $vacanteBorrar = new VacantesModel();
        $requerimientosvacanteBorrar = new RequerimientosVacanteModel();
        $vacanteBorrar->where('IDVACANTE', $id)->delete($id);
        $idBorrar = $requerimientosvacanteBorrar->where('IDVACANTE', $id)->select('IDREQVACANTE')->find();
        $requerimientosvacanteBorrar->where('IDVACANTE', $id)->delete($idBorrar[0]['IDREQVACANTE']);

        return $this->response->redirect(site_url('AdminRH/vacantes'));
    }
    public function vacantesEditar($id = null)
    {
        $vacanteEditar = new VacantesModel();
        $requerimientosvacanteEditar = new RequerimientosVacanteModel();


        $datosEditarV['vacanteEditar'] = $vacanteEditar->where('IDVACANTE', $id)->first();

        $datosEditarV['requerimientosvacanteEditar'] = $requerimientosvacanteEditar->where('IDVACANTE', $id)->first();

        return view('RRHH/vacantesEditar', $datosEditarV);
    }
    public function vacanteVer($id = null)
    {
        $vacanteEditar = new VacantesModel();
        $requerimientosvacanteEditar = new RequerimientosVacanteModel();


        $datosEditarV['vacanteEditar'] = $vacanteEditar->where('IDVACANTE', $id)->first();

        $datosEditarV['requerimientosvacanteEditar'] = $requerimientosvacanteEditar->where('IDVACANTE', $id)->first();

        return view('RRHH/vacantesVer', $datosEditarV);
    }

    public function vacantesActualizar()
    {
        $vacante = new VacantesModel();
        $requerimientosvacante = new RequerimientosVacanteModel();


        $nombre = $this->request->getVar('nombreVC');
        $descripcion = $this->request->getVar('descripcionVC');
        $requerimientos = $this->request->getVar('requerimientosVC');
        $numPlazas = $this->request->getVar('numPlazasVC');
        $nivEstudio = $this->request->getVar('nivEstudioVC');
        $experiencia = $this->request->getVar('experienciaVC');
        $genero = $this->request->getVar('generoVC');
        $tipContatacion = $this->request->getVar('tipContatacionVC');
        $edadMin = $this->request->getVar('edadMinVC');
        $edadMax = $this->request->getVar('edadMaxVC');

        $datosVacante = [
            'NOMBREVACANTE' => $nombre,
            'DESCRIPCIONVACANTE' => $descripcion,
            'REQUERIMIENTOSPROPIOSVACANTE' => $requerimientos,
            'NUMEROVACANTES' => $numPlazas,
            //'tipContratacion'=>$tipContatacion,
            //'ESTADOVACANTE'=>"Activo",
            // 'IDAREA'=>1,
            //'IDPERSONALRECURSOSHUMANOS'=>1,
            'UPDATED_AT' => date("y-m-d")
        ];


        $id = $this->request->getVar('id2');
        $vacante->update($id, $datosVacante);

        $idVac = $requerimientosvacante->where('IDVACANTE', $id)->select('IDREQVACANTE')->find();


        $datosRequerimientosVacante = [

            'EXPERIENCIALABORAL' => $experiencia,
            'NIVEL_ESTUDIO' => $nivEstudio,
            'GENEROCANDIDATO' => $genero,
            'NUMEROVACANTES' => $numPlazas,
            'EDADMINIMAREQUERIDA' => $edadMin,
            'EDADMAXIMAREQUERIDA' => $edadMax

        ];
        $requerimientosvacante->update($idVac[0]['IDREQVACANTE'], $datosRequerimientosVacante);


        return $this->response->redirect(site_url('AdminRH/vacantes'));
    }
    public function vacantesPostulantes($id = null)
    {


        return view('RRHH/vacantesPostulantes');
    }
    
    public function vacantesEstado($id = null)
    {
        $vacante = new VacantesModel();
        $j=$vacante->where('IDVACANTE', $id)->select('ESTADOVACANTE')->find();;
        
        if($j[0]['ESTADOVACANTE']=="Inactivo"){
            $datosVacante = [
           
                'ESTADOVACANTE'=>"Activo",
               
            ];
        }else{
            $datosVacante = [
           
                'ESTADOVACANTE'=>"Inactivo",
               
            ];
        }
       


       
        $vacante->update($id, $datosVacante);

       
        return $this->response->redirect(site_url('AdminRH/vacantes'));
    }









    public function prueba()
    {
        $vacante = new VacantesModel();
        $idVacante = $vacante->select()->find();
        // $id=$this->request->getVar('id2');
        if ($_POST) {
            $buscar = $this->request->getVar('busqueda');
            $i=0;
            $yolo='';
            foreach ($idVacante as  $lol) {
              if($lol['NOMBREVACANTE']==$buscar||$lol['NUMEROVACANTES']==$buscar||$lol['CREATED_AT']==$buscar){
                $yolo=$idVacante[$i];
              }
              $i++;
            }
        } else {
            $buscar = "";
            $yolo=$idVacante;
        }
       


        print_r($yolo);
    }
}
