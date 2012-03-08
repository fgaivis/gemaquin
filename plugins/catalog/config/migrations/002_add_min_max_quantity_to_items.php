<?php
class M4ec0396f9770479c88a2157b94f05dd3 extends CakeMigration {

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
                                'items' => array(
                                       'min_quantity' => array('type' => 'integer', 'null' => false, 'default' => 0),
									   'max_quantity' => array('type' => 'integer', 'null' => false, 'default' => 0),
					
                                ),
                        )
                ),
                'down' => array(
                        'drop_field' => array(
                                'items' => array(
                                        'min_quantity',
                						'max_quantity',
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