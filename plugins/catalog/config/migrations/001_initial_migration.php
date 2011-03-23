<?php
class M4d8a7c7c8dc84eadb7c1232c94e05dd2 extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'items' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => true, 'default' => NULL,'length' => 50),
					'description' => array('type' => 'text', 'null' => false, 'default' => NULL),
					'barcode' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'package_factor' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10),
					'sales_factor' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10),
					'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'country' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'industry' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'category_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'items'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
?>

