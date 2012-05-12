<?php
class M4fa69a108098481bb1f00c4b94e07dd4 extends CakeMigration {

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
            'create_table' => array(
                'retentions' => array(
                    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                    'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'invoice_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                    'rate' => array('type' => 'float', 'null' => false, 'default' => NULL),
                    'amount' => array('type' => 'float', 'null' => false, 'default' => NULL),
                    'subtrahend' => array('type' => 'float', 'null' => false, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'after' => 'canceled'),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'after' => 'created'),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                ),
            ),
		),
		'down' => array(
			'drop_table' => array('retentions')
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