<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalRecursosHumanosModel extends Model{
    protected $table = 'personalrecursoshumanos';
    protected $primaryKey = 'IDPERSONALRECURSOSHUMANOS';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDUSUARIO', 'NOMBREEMPLEADORRHH'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getPersonalRecursosHumanosBy(String $column, $value){
        return $this->where($column,$value)->first();
    }
}

