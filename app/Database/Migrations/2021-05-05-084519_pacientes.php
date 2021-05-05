<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pacientes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_paciente' => [
                'type' => 'INT',
                'constraint' => 5,
                'unique' => true,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome_paciente' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nome_mae' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'cns' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'foto_perfil' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => NULL
            ],
            'status' => [
                'type' => 'int',
                'constraint' => 2
            ],
            'data_nascimento' => [
                'type' => 'DATE',
                'default' => NULL
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

        $this->forge->addPrimaryKey('id_paciente', true);
        $this->forge->createTable('pacientes');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('pacientes');
    }
}
