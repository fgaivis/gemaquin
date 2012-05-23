<?php
class M4fb2dcf760d44eb0aa9dd17594e07dd5 extends CakeMigration {

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
                'retentions' => array(
                    'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'comp_number' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
            ),
		),
		'down' => array(
			'drop_field' => array(
				'retentions' => array('number','comp_number',),
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
			$CreditNote = $this->generateModel('Retention');
			$CreditNote->query("ALTER TABLE  `retentions` CHANGE  `number`  `number` INT( 11 ) UNSIGNED ZEROFILL NOT NULL;");
		}
        return true;
	}
}
?>