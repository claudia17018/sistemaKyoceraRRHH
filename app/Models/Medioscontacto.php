<?php

namespace App\Models;

use CodeIgniter\Model;

class Medioscontacto extends Model{

    protected $table = 'medioscontacto';
    protected $primaryKey = 'IDMEDIOSCONTACTO';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDTIPOCONTACTO','CONTACTOSOLICITANTE','IDSOLICITANTE'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

}