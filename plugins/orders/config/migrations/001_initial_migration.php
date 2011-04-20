<?php
class M4dac6698b3f442f1bf181ac894e05dd2 extends CakeMigration {

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
			    'purchase_orders' => array(
				    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
                    'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'invoice_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
                    'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
                ),
                'items_purchase_orders' => array(
				    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
                    'item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'purchase_order_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
                ),
			    'invoices' => array(
				    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
				    'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'subtotal' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'tax' => array('type' => 'float', 'null' => false, 'default' => 0.0),
					'total' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
			    ),
			    'invoices_items' => array(
				    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
                    'invoice_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'price' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'tax' => array('type' => 'float', 'null' => false, 'default' => 0.0),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
                ),
            ),
		),
		'down' => array(
		    'drop_table' => array(
				'purchase_orders','invoices_items','items_purchase_orders','invoices'
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

