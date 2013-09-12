<?php
class M4fb2dcf760d44eb0aa9dd17595e15de4 extends CakeMigration {

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
                'invoices_items' => array(
					'kg_quantity' => array('type' => 'float', 'null' => false, 'default' => NULL),
                ),
                'items_purchase_orders' => array(
					'kg_quantity' => array('type' => 'float', 'null' => false, 'default' => NULL),
                	'kg_quantity_remaining' => array('type' => 'float', 'null' => false, 'default' => NULL),
                ),
            ),
		),
		'down' => array(
			'alter_field' => array(
                'invoices_items' => array(
					'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),					
                ),
                'items_purchase_orders' => array(
					'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                	'kg_quantity_remaining' => array('type' => 'integer', 'null' => false, 'default' => NULL),
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