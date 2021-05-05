<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'id_usuario',
        'usuario',
        'senha',
        'status'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'data_criado';
    protected $updatedField  = 'data_atualizado';
    protected $deletedField  = 'data_deletado';

    public function __construct() {
        parent::__construct();
        $this->table = 'usuarios';
    }

    public function getUsuarios($id = false)
    {

//        return $this->db;
        if ($id === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
}
