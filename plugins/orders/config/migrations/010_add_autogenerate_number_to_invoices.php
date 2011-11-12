<?php
class M4e9f95bc11b045a08b76551694e05dd2 extends CakeMigration {

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
		),
		'down' => array(
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
			$Invoice = $this->generateModel('Invoice');
			$Invoice->query("ALTER TABLE  `invoices` ADD UNIQUE (`number`, `type`)");
			$Invoice->query("ALTER TABLE  `invoices` CHANGE  `number`  `number` INT( 11 ) UNSIGNED ZEROFILL NOT NULL;");
		}
		return true;
	}
}
?>