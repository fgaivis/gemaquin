<?php
class M4d8a7b88c2544244bb7221f494e12dd9 extends CakeMigration {

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
				'tax_totalizations' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200),
					'year' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'month' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'purchases' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'sales' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'tax_relation' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'tax_withholdings' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'tax_holded' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'withholdings_relation' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'tax_totalizations'
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

