<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'level' => [
				'type' => 'ENUM("admin","karyawan","owner")',
				'default' => 'karyawan',
			],
			'jabatan' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'photo_profile' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);

		$this->forge->addPrimaryKey('username');
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
