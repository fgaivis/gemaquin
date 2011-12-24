<?php
class M4ef647e6d3c44d46be500fe294e05dd2 extends CakeMigration {

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
				'invoices' => array(
					'total_exempt' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'total_no_exempt' => array('type' => 'float', 'null' => false, 'default' => '0'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'invoices' => array('total_exempt', 'total_no_exempt',),
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