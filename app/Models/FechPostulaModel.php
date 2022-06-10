<?php

namespace App\Models;

use CodeIgniter\Model;

class FechPostulaModel extends Model{

    protected $table = 'fechapostulacionavacante';
    protected $primaryKey = 'IDFECHAPOSTULACION';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['PRETENCIONSALARIAL','FECHAPOSTULACION'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    

}