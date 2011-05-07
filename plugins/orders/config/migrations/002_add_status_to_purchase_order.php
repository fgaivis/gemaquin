<?php
class M4dc59b3eb87845ba94346ff794e05dd2 extends CakeMigration {

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
                                'purchase_orders' => array(
                                        'status' => array('type' => 'string', 'length' => 20,  'null' => false, 'default' => 'DRAFT'),
                                ),
                        )
                ),
                'down' => array(
                        'drop_field' => array(
                                'purchase_orders' => array(
                                        'status'
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
