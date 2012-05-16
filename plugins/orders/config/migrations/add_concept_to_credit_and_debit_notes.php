<?php
class M4fb2dcf760d44eb0aa9dd17594e06dd3 extends CakeMigration {

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
                                'credit_notes' => array(
                                        'concept' => array('type' => 'string', 'length' => 200,  'null' => false, 'default' => NULL),
					
                                ),
                                'debit_notes' => array(
                                        'concept' => array('type' => 'string', 'length' => 200,  'null' => false, 'default' => NULL),
					
                                ),
                        )
                ),
                'down' => array(
                        'drop_field' => array(
                                'credit_notes' => array(
                                        'concept'
                                ),
                                'debit_notes' => array(
                                        'concept'
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