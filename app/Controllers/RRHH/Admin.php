<?php

namespace App\Controllers\RRHH;

use App\Controllers\BaseController;
use App\Models\VacantesModel;
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
}
