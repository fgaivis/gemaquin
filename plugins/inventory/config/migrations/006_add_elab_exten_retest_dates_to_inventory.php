<?php
class M4ef13a310bb44d0aa5c12f0d94e08dd5 extends CakeMigration {

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
			'create_field' => array(
				'inventory' => array(
					'elaboration_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
					'retest_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
					'extension_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'inventory' => array('elaboration_date','retest_date','extension_date',),
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