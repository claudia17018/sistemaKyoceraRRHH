<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoProcesoModel extends Model{
    protected $table = 'estadodentrodelproceso';
    protected $primaryKey = 'IDESTADOPROCESO';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDSOLICITANTE', 'ESTADOPROCESO', 'FECHAACTUALIZACIONDELPROCESO'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getEstadoProcesoBy(String $column, $value){
        return $this->where($column,$value)->first();
    }
}
