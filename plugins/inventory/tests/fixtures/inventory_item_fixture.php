<?php
/* InventoryItem Fixture generated on: 2011-05-18 20:05:55 : 1305749335 */
class InventoryItemFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'InventoryItem';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'batch' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		' expitarion_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
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
			'id' => '4dd42757-d3cc-49e2-bebf-4bc294e05dd2',
			'code' => 'Lorem ipsum dolor sit amet',
			'item_id' => 'Lorem ipsum dolor sit amet',
			'batch' => 'Lorem ipsum dolor sit amet',
			' expitarion_date' => '2011-05-18',
			'quantity' => 1,
			'created' => '2011-05-18 20:08:55',
			'modified' => '2011-05-18 20:08:55'
		),
	);

}
?>