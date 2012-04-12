<?php
class M4ef13a310bb44d0aa5c12f0d94e09dd6 extends CakeMigration {

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
					'availability' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'individual_cost' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'purchase_cost' => array('type' => 'float', 'null' => false, 'default' => NULL),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'inventory' => array('availability','individual_cost','purchase_cost',),
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