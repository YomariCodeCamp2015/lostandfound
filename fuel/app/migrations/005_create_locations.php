<?php

namespace Fuel\Migrations;

class Create_locations
{
	public function up()
	{
		\DBUtil::create_table('locations', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'category' => array('constraint' => 11, 'type' => 'int'),
			'parentid' => array('constraint' => 11, 'type' => 'int'),
			'status' => array('constraint' => 2, 'type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('locations');
	}
}