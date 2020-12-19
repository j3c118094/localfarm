<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'password'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			],
			'nama'	  => [
                'type'               => 'varchar',
				'constraint'     	 => '255',
			],			
		]);
		$this->forge->addKey('username', TRUE);
		$this->forge->createTable('admin');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
