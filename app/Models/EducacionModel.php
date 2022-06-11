<?php

namespace App\Models;

use CodeIgniter\Model;

class EducacionModel extends Model{
    protected $table = 'educacion';
    protected $primaryKey = 'IDEDUCACION';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDSOLICITANTE','NIVELDEEDUCACION'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getEducacionBy(String $column, $value){
        return $this->where($column,$value)->first();
    }
}
