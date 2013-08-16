<?php
class M4d8a7b88c2544244bb7221f494e11dd8 extends CakeMigration {

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
			'alter_field' => array(
				'taxes' => array(
					'percent_value' => array('type' => 'float', 'null' => false, 'default' => 0),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'taxes' => array(
					'percent_value' => array('type' => 'integer', 'null' => false, 'default' => 0),
				),
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

