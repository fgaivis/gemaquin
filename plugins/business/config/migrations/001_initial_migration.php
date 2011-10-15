<?php
class M4d8a7b88c2544244bb7221f494e05dd2 extends CakeMigration {

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
				'addresses' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'phone' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'address_1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200),
					'address_2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
					'city' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'state' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'country' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'zip' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10),
					'notes' => array('type' => 'text', 'null' => true, 'default' => NULL),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
				),
				'bank_accounts' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'bank_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200),
					'currency' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
					'number' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'address_1' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
					'address_2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
					'country' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'iban' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
					'aba' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 50),
					'swift' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 50),
					'notes' => array('type' => 'text', 'null' => true, 'default' => NULL),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
				),
				'contacts' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200),
					'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200),
					'phone' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'mobile' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
					'position' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
					'role' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
				),
				'organizations' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'unique'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200),
					'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
					'country' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'fiscalid' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
					'brand' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
					'business' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
					'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('engine' => 'InnoDb'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'addresses', 'bank_accounts', 'contacts', 'organizations'
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

