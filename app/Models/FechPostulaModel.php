<?php

namespace App\Models;

use CodeIgniter\Model;

class FechPostulaModel extends Model{

    protected $table = 'fechapostulacionavacante';
    protected $primaryKey = 'IDFECHAPOSTULACION';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDSOLICITANTE','PRETENCIONSALARIAL'];
    protected $createdField  = 'FECHAPOSTULACION';
    protected $updatedField  = '';
    protected $useTimestamps = true;
    protected $skipValidation = false;
  
}