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
			'konten' 	  => [
					'type'           => 'TEXT',
					'null'           => TRUE,
			],
			'author'	  => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'PUBLISHED_AT'	  => [
                'type'               => 'DATE'
            ],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('resep');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
