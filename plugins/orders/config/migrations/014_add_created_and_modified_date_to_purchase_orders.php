<?php
class M4f13430221304c5bac2c09e094e05dd2 extends CakeMigration {

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
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
                ),
            ),
        ),
        'down' => array(
            'drop_field' => array(
                'purchase_orders' => array('created', 'modified',),
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