<?php
class M4fa69a108098481bb1f00c4b94e05dd2 extends CakeMigration {

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
                'delivery_notes' => array(
                    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                    'sales_order_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'number' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'after' => 'canceled'),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'after' => 'created'),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                ),
                'inv_items_so_dlv_notes' => array(
                    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
                    'inv_items_sales_order_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'delivery_note_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
                    'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('engine' => 'InnoDb'),
                ),
            ),
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
            $PurchaseOrder = $this->generateModel('PurchaseOrder');
            $PurchaseOrder->query("ALTER TABLE  `delivery_notes` ADD UNIQUE (`number`)");
            $PurchaseOrder->query("ALTER TABLE  `delivery_notes` CHANGE  `number`  `number` INT( 11 ) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;");
        }
        return true;
	}
}
?>