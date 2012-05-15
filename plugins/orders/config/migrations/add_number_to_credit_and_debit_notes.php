<?php
class M4fb2dcf760d44eb0aa9dd17594e05dd2 extends CakeMigration {

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
                                        'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					
                                ),
                                'debit_notes' => array(
                                        'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					
                                ),
                        )
                ),
                'down' => array(
                        'drop_field' => array(
                                'credit_notes' => array(
                                        'number'
                                ),
                                'debit_notes' => array(
                                        'number'
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
		if ($direction == 'up') {
			$CreditNote = $this->generateModel('CreditNote');
			$CreditNote->query("ALTER TABLE  `credit_notes` CHANGE  `number`  `number` INT( 11 ) UNSIGNED ZEROFILL NOT NULL;");
			$CreditNote->query("ALTER TABLE  `debit_notes` CHANGE  `number`  `number` INT( 11 ) UNSIGNED ZEROFILL NOT NULL;");
		}
		return true;
	}
}
?>