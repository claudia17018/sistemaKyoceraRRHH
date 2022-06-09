<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoPostulanteModel extends Model
{
    protected $table      = 'estadocandidato';
    protected $primaryKey = 'IDESTADOPOSTULANTE';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['IDESTADOPOSTULANTE', 'TIPOESTADO'];

}