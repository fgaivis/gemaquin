<?php
class M4ef13a310bb44d0aa5c12f0d96e11de0 extends CakeMigration {

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
            'alter_field' => array(
                'inventory' => array(
					'kg_quantity' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'kg_availability' => array('type' => 'float', 'null' => false, 'default' => NULL),
                ),
                'inventory_items' => array(
					'kg_quantity' => array('type' => 'float', 'null' => false, 'default' => NULL),
                	'kg_quantity_left' => array('type' => 'float', 'null' => false, 'default' => NULL),
                ),
            ),
		),
		'down' => array(
			'alter_field' => array(
                'inventory' => array(
					'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'kg_availability' => array('type' => 'integer', 'null' => false, 'default' => NULL),				
                ),
                'inventory_items' => array(
					'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                	'kg_quantity_left' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                ),
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