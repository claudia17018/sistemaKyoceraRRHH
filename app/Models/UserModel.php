<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'IDUSUARIO';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['IDUSUARIO','NOMBREUSUARIO', 'CONTRASENA','IDROL'];

    protected $useTimestamps = false;

    protected $skipValidation     = false;

    public function getUserBy(String $column, $value){

    return $this->where($column,$value)->first();
}

 

}