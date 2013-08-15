<?php
class M4fb2dcf760d44eb0aa9dd17595e10dd9 extends CakeMigration {

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
                'invoices_items' => array(
                    'total_tax' => array('type' => 'float', 'null' => false, 'default' => NULL),
					'total_cost' => array('type' => 'float', 'null' => false, 'default' => NULL),
                ),
            ),
		),
		'down' => array(
			'drop_field' => array(
				'invoices_items' => array('total_tax','total_cost',),
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