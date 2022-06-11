<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoContactoModel extends Model{
    protected $table = 'tipocontacto';
    protected $primaryKey = 'IDTIPOCONTACTO';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['TIPOCONTACTOASPIRANTE'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getTipoContactoBy(String $column, $value){
        return $this->where($column,$value)->first();
    }
}