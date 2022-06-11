<?php

namespace App\Models;

use CodeIgniter\Model;

class RefInterModel extends Model{
    protected $table = 'recomendaciones_internas';
    protected $primaryKey = 'ID_RECOMENDACIONES';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDSOLICITANTE','NOMBREEMPLEADO','APELLIDOEMPLEADO','TELEFONOEMPLEADO','BADGEEMPLEADO'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getSolicitanteRef(String $column, $value){
        $data = $this->where($column,$value)->first();
        return $data;
    }


}