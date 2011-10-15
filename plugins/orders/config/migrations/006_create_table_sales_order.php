<?php
class M4e3488cb213c4d01984367be94e05dd2 extends CakeMigration {

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
				'sales_orders' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
	                    		'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
			                'invoice_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
                			'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
                		),
                		'inv_items_sales_orders' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
			                'inventory_item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    			'sales_order_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
			                'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
                		),
			),
		),
		'down' => array(
			'drop_table' => array('sales_orders', 'inv_items_sales_orders')
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
