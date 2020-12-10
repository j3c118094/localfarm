<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Resep extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE
			],
			'judul'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'thumbnail'   => [
				'type'         	 	 => 'TEXT',
			],
			'konten' 	  => [
					'type'           => 'TEXT',
			],
			'author'	  => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'created_at'	  => [
                'type'               => 'DATE'
            ],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('resep');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
