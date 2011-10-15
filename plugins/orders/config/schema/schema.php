<?php 
/* orders schema generated on: 2011-07-30 14:16:12 : 1312051572*/
class ordersSchema extends CakeSchema {
	var $name = 'orders';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $invoices = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'subtotal' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'tax' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'total' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'insurance' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'shipping' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'customs_tax' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'customs_adm' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'internal_shipping' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	var $invoices_items = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'invoice_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'price' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'tax' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	var $items_purchase_orders = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'purchase_order_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	var $purchase_orders = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'number' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'unique'),
		'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'invoice_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'DRAFT', 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'number' => array('column' => 'number', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
}
?>