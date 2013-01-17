<?php
class M4ef13a310bb44d0aa5c12f0d96e09dd8 extends CakeMigration {

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
				'inventory_items' => array(
					'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'kg_quantity_left' => array('type' => 'integer', 'null' => false, 'default' => NULL),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'inventory_items' => array('kg_quantity','kg_quantity_left',),
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