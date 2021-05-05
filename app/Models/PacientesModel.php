<?php

namespace App\Models;

use App\Libraries\Cimsg;
use CodeIgniter\Model;

class PacientesModel extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    protected $allowedFields = [
        'id_usuario',
        'nome_paciente',
        'nome_mae',
        'cpf',
        'cns',
        'foto_perfil',
        'data_nascimento',
        'status',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'data_criado';
    protected $updatedField = 'data_atualizado';
    protected $deletedField = 'data_deletado';

    /** @var Cimsg $message */
    protected $message;

    public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
        /** @var Cimsg message */
        $this->message = new Cimsg();
    }

    public function salvar(array $listPost = [])
    {

        /* Verifica se Existe ID */
        if (empty($listPost[$this->primaryKey])) {
            /* Cadastra Item */
            if ($item = $this->insert($listPost)) {
                $item = $this->getInsertID();
                $this->message->success('Registro inserido com sucesso');
            } else {
                $this->message->error('Falha ao inserir registro');
            }

        } else {
            /* Atualiza Item */
            if ($this->update($listPost[$this->primaryKey], $listPost)) {
                $item = $listPost[$this->primaryKey];
                $this->message->success('Registro atualizado com sucesso');
            } else {
                $this->message->error('Falha ao atualizar registro');
            }

        }

        return ($item ?? false);
    }

    public function getPacientes($id = null)
    {

        if (empty($id)) {
            $pacientes = $this->findAll();

            foreach ($pacientes as $key => $value):
                $endereco = $this->db->table('paciente_endereco')->where('id_paciente', $value['id_paciente']);
                if (!empty($endereco)) {
                    $endereco = $endereco->get()->getResultArray();
                    $pacientes[$key]['endereco'] = $endereco[0];
                }
            endforeach;

        } else {
            $pacientes = $this->find($id);
            $endereco = $this->db->table('paciente_endereco')->where('id_paciente', $pacientes['id_paciente']);
            if (!empty($endereco)) {
                $endereco = $endereco->get()->getResultArray();
                $pacientes['endereco'] = $endereco[0];
            }

        }

        return $pacientes;
    }
}
