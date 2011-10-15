<?php
/* Invoice Fixture generated on: 2011-07-16 13:07:40 : 1310839000 */
class InvoiceFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'Invoice';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
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

/**
 * Records
 *
 * @var array
 * @access public
 */
	public $records = array(
		array(
			'id' => '4e21d0d8-4308-4aa0-b57b-16f294e05dd2',
			'number' => 1,
			'organization_id' => 'Lorem ipsum dolor sit amet',
			'subtotal' => 1,
			'tax' => 1,
			'total' => 1,
			'insurance' => 1,
			'shipping' => 1,
			'customs_tax' => 1,
			'customs_adm' => 1,
			'internal_shipping' => 1,
			'type' => 'Lorem ipsum dolor sit amet'
		),
	);

}
?>