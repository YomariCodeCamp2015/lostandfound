<?php

namespace Fuel\Migrations;

class Create_properties
{
	public function up()
	{
		\DBUtil::create_table('properties', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'price' => array('type' => 'double'),
			'description' => array('type' => 'text'),
			'beds' => array('constraint' => 11, 'type' => 'int'),
			'baths' => array('constraint' => 11, 'type' => 'int'),
			'type' => array('constraint' => 11, 'type' => 'int'),
			'location' => array('constraint' => 11, 'type' => 'int'),
			'maplat' => array('constraint' => 255, 'type' => 'varchar'),
			'matlon' => array('constraint' => 255, 'type' => 'varchar'),
			'propertyno' => array('constraint' => 20, 'type' => 'varchar'),
			'purpose' => array('constraint' => 11, 'type' => 'int'),
			'view' => array('constraint' => 11, 'type' => 'int'),
			'status' => array('constraint' => 11, 'type' => 'int'),
			'package' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('properties');
	}
}