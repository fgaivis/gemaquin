<?php
class M4e21d9ebea6046e799071a1e94e05dd2 extends CakeMigration {

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
			'add_field' => array(
				'invoices' => array(
					'insurance' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'shipping' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'customs_tax' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'customs_adm' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'internal_shipping' => array('type' => 'float', 'null' => false, 'default' => '0'),
					'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'invoices' => array(
					'insurance', 'shipping', 'customs_tax', 'customs_adm', 'internal_shipping', 'type'
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
