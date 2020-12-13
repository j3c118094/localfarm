<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Response extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'responseid'          => [
					'type'           => 'INT',
			],
			'responses'       => [
					'type'           => 'TEXT',
			],
			'submitted_at'	  => [
                'type'               => 'TEXT'
			],			
			'visitor_ip'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
		]);
		$this->forge->addKey('responseid', TRUE);
		$this->forge->addForeignKey('visitor_ip', 'visitor', 'visitor_ip', 'CASCADE', 'CASCADE');
		$this->forge->createTable('response');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
