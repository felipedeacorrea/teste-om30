<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 5,
                'unique' => true,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'usuario' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'senha' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'ultimo_acesso' => [
                'type' => 'DATETIME',
                'default' => NULL
            ],
            'ultimo_ip' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'status' => [
                'type' => 'int',
                'constraint' => 2
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

        $this->forge->addPrimaryKey('id_usuario', true);
        $this->forge->createTable('usuarios');
	}

	public function down()
	{
        $this->forge->dropTable('usuarios');
	}
}
