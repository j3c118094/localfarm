<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Visitor extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'visitor_ip'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
			],
			'kota'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'visited_at'	  => [
                'type'               => 'TEXT'
			],			
		]);
		$this->forge->addKey('visitor_ip', TRUE);
		$this->forge->createTable('visitor');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
