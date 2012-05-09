<?php
/* Retention Fixture generated on: 2012-05-09 11:05:01 : 1336579381 */
class RetentionFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'Retention';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'invoice_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'rate' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'amount' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'subtrahend' => array('type' => 'float', 'null' => false, 'default' => NULL),
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
			'id' => '4faa9535-50ec-4bfc-ac4b-0c9194e05dd2',
			'organization_id' => 'Lorem ipsum dolor sit amet',
			'invoice_id' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'rate' => 1,
			'amount' => 1,
			'subtrahend' => 1,
			'created' => '2012-05-09 11:33:01',
			'modified' => '2012-05-09 11:33:01'
		),
	);

}
?>