<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PacientesEndereco extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_paciente_endereco' => [
                'type' => 'INT',
                'constraint' => 5,
                'unique' => true,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_paciente' => [
                'type' => 'int',
                'constraint' => 2
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'logradouro' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'numero' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'complemento' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'bairro' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'uf' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'data_criado' => [
                'type' => 'DATETIME',
                'default' => NULL
            ],
            'data_atualizado' => [
                'type' => 'DATETIME',
                'default' => NULL
            ],
            'data_deletado' => [
                'type' => 'DATETIME',
                'default' => NULL
            ]
        ]);

        $this->forge->addPrimaryKey('id_paciente_endereco', true);
        $this->forge->createTable('paciente_endereco');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('paciente_endereco');
    }
}
