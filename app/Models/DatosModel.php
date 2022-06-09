<?php

namespace App\Models;
use CodeIgniter\Model;

class DatosModel extends Model{

    protected $table = 'datos';
    protected $primaryKey = 'IDDATOS';
    protected $useAutoIncrement = true;

    protected $allowedFields =["IDDATOS","IDSOLICITANTE","URLCV","URLTITULOACADEMICO","URLFOTOCANDIDATO","URLNIT","URLDUI","URLISSS","URLAFP","URLANTECEDENTES"];

}