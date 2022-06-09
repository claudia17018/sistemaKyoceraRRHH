<?php

namespace App\Models;

use CodeIgniter\Model;

class EntrevistaModel extends Model{
    
    protected $table = 'entrevista';
    protected $primaryKey = 'IDENTREVISTA';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDPERSONALRECURSOSHUMANOS', 'IDSOLICITANTE', 'FECHAENTREVISTA', 'HORAINICIO',
        'HORAFINALIZACION', 'MODALIDADENTREVISTA', 'TITULOENTREVISTA', 'ENLACEENTREVISTA', 'DESCRIPCIONENTREVISTA'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getEntrevistaBy(String $column, $value){
        return $this->where($column,$value)->first();
    }
    
    public function getAllEntrevistasBy(String $column, $value){
        return $this->where($column,$value)->findAll();
    }
}
