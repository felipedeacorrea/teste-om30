<?php
namespace App\Models;
use CodeIgniter\Model;
class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'id_usuario',
        'id_pessoa',
        'id_grupo_permissao',
        'usuario',
        'senha',
        'ultimo_acesso',
        'ultimo_ip',
        'status'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'data_criado';
    protected $updatedField  = 'data_atualizado';
    protected $deletedField  = 'data_deletado';
}
