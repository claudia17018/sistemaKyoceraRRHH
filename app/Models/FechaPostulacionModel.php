<?php

namespace App\Models;

use CodeIgniter\Model;

class FechaPostulacionModel extends Model{

    protected $table        = 'fechapostulacionavacante'; 
     // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $primaryKey = 'IDFECHAPOSTULACION';
    protected $allowedFields = ['FECHAPOSTULACION','IDSOLICITANTE','IDVACANTE'];
}