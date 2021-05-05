<?php

namespace App\Models;

use App\Libraries\Cimsg;
use CodeIgniter\Model;

class PacientesEnderecoModel extends Model
{
    protected $table = 'paciente_endereco';
    protected $primaryKey = 'id_paciente_endereco';
    protected $allowedFields = [
        'id_paciente_endereco',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'id_paciente'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'data_criado';
    protected $updatedField = 'data_atualizado';
    protected $deletedField = 'data_deletado';

    /** @var Cimsg $message */
    protected $message;

    public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null) {
        parent::__construct($db, $validation);
        /** @var Cimsg message */
        $this->message = new Cimsg();
    }

    public function salvar(array $listPost=[]) {

        /* Verifica se Existe ID */
        if (empty($listPost[$this->primaryKey])) {
            /* Cadastra Item */
            if($item = $this->insert($listPost)){
                $item = $this->getInsertID();
                $this->message->success('Registro inserido com sucesso');
            } else {
                $this->message->error('Falha ao inserir registro');
            }

        } else {
            /* Atualiza Item */
            if($this->update($listPost[$this->primaryKey],$listPost)){
                $item = $listPost[$this->primaryKey];
                $this->message->success('Registro atualizado com sucesso');
            } else {
                $this->message->error('Falha ao atualizar registro');
            }

        }

        return ($item??false);
    }
}
