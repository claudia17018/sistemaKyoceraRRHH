<?php

namespace App\Models;

use CodeIgniter\Model;

class MediosContactoModel extends Model{
    protected $table = 'medioscontacto';
    protected $primaryKey = 'IDMEDIOSCONTACTO';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['IDTIPOCONTACTO','IDSOLICITANTE', 'CONTACTOSOLICITANTE'];

    protected $useTimestamps = false;
    protected $skipValidation = false;

    public function getMediosByIdTipoIdSolicitante($idTipo, $idSolicitante){
        
        $datos['idTipo'] = $this->where('IDTIPOCONTACTO', $idTipo)->findAll();
        $datos['idSolicitante'] = $this->where('IDSOLICITANTE', $idSolicitante)->findAll();
        
        foreach ($datos['idTipo'] as $ByTipo){
            foreach ($datos['idSolicitante'] as $BySolicitante){
                if($BySolicitante['IDMEDIOSCONTACTO'] == $ByTipo['IDMEDIOSCONTACTO']){
                    return $BySolicitante;
                }
            }
        }
        
        
    }
}