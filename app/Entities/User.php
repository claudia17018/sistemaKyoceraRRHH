<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity{

    protected function userStore(){
        return $this->attributes['IDUSUARIO'];
    }

}