<?php

namespace App\Models;

use CodeIgniter\Model;

class DatosModel extends Model{
    
    protected $table = 'datos';
    protected $primaryKey = 'IDDATOS';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDSOLICITANTE', 'URLCV', 'URLTITULOACADEMICO', 'URLFOTOCANDIDATO', 'URLNIT',
        'URLDUI', 'URLISSS', 'ULAFP', 'URLANTECEDENTES'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getDatosBy(String $column, $value){
        return $this->where($column,$value)->first();
    }
    
}
