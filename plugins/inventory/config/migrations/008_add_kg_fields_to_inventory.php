<?php
class M4ef13a310bb44d0aa5c12f0d95e09dd7 extends CakeMigration {

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
			'create_field' => array(
				'inventory' => array(
					'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'kg_availability' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'cost_by_kg' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'total_cost_by_kg' => array('type' => 'float', 'null' => false, 'default' => NULL),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'inventory' => array('kg_quantity','kg_availability', 'cost_by_kg', 'total_cost_by_kg',),
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