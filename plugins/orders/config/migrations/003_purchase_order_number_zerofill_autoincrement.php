<?php
class M4dd0113daefc4e1b8b7e544e94e05dd2 extends CakeMigration {

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
				'invoices' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'subtotal' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'tax' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'total' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB'),
				),
				'invoices_items' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'invoice_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'price' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'tax' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB'),
				),
				'items_purchase_orders' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'purchase_order_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB'),
				),
				'purchase_orders' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'number' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'unique'),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'invoice_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'status' => array('type' => 'string', 'null' => false, 'default' => 'DRAFT', 'length' => 20, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'number' => array('column' => 'number', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'invoices', 'invoices_items', 'items_purchase_orders', 'purchase_orders'
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