<?php
class M4fa69a108098481bb1f00c4b94e08dd5 extends CakeMigration {

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
                'items_purchase_orders' => array(
                    'quantity_remaining' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                ),
                'inv_items_sales_orders' => array(
                    'quantity_remaining' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                ),
            ),
		),
		'down' => array(
			'drop_field' => array(
				'items_purchase_orders' => array('quantity_remaining',),
				'inv_items_sales_orders' => array('quantity_remaining',),
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