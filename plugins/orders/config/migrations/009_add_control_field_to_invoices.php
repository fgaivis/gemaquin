<?php
class M4e9f4f4038744fd2848d3ca794e05dd2 extends CakeMigration {

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
                                        'control' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					
                                ),
                        )
                ),
                'down' => array(
                        'drop_field' => array(
                                'invoices' => array(
                                        'control'
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