<?php
class M4ef1304133644785b7b92a7694e06dd7 extends CakeMigration {

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
				'organizations' => array(
					'max_debt' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'actual_debt' => array('type' => 'float', 'null' => false, 'default' => NULL),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'organizations' => array('max_debt','actual_debt',),
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