<?php
/* TaxTotalization Fixture generated on: 2013-09-12 11:09:13 : 1378999933 */
class TaxTotalizationFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'TaxTotalization';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'year' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'month' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'purchases' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'sales' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'tax_relation' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'tax_withholdings' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'tax_holded' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'withholdings_relation' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 * @access public
 */
	public $records = array(
		array(
			'id' => '5231de7d-da98-47bf-af55-1aa694e05dd2',
			'type' => 'Lorem ipsum dolor sit amet',
			'year' => 1,
			'month' => 1,
			'purchases' => 1,
			'sales' => 1,
			'tax_relation' => 1,
			'tax_withholdings' => 1,
			'tax_holded' => 1,
			'withholdings_relation' => 1,
			'created' => '2013-09-12 11:02:13'
		),
	);

}
?>