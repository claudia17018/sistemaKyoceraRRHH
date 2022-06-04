<?php

namespace App\Models;

use CodeIgniter\Model;

class ComentariosEntrevistasModel extends Model{
    
    protected $table = 'comentariosentrevistas';
    protected $primaryKey = 'IDCOMENTARIOENTREVISTA';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDCOMENTARIOENTREVISTA','IDENTREVISTA', 'COMENTARIOS'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getComentarioEntrevistaBy(String $column, $value){
        return $this->where($column,$value)->first();
    }
}
