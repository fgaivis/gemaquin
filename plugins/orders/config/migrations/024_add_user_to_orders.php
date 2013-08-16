<?php
class M4fb2dcf760d44eb0aa9dd17595e11de0 extends CakeMigration {

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
                    'printed' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
                	'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
                'debit_notes' => array(
                    'printed' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
                	'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
                'delivery_notes' => array(
                    'printed' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
                	'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
                'invoices' => array(
                    'printed' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
                	'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
                'payments' => array(
                    'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
                'purchase_orders' => array(
                    'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
                'retentions' => array(
                    'printed' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
                	'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
                'sales_orders' => array(
                    'user_creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                ),
            ),
		),
		'down' => array(
			'drop_field' => array(
				'credit_notes' => array('user_creator_id',),
				'debit_notes' => array('user_creator_id',),
				'delivery_notes' => array('user_creator_id',),
				'invoices' => array('user_creator_id',),
				'payments' => array('user_creator_id',),
				'purchase_orders' => array('user_creator_id',),
				'retentions' => array('user_creator_id',),
				'sales_orders' => array('user_creator_id',),
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