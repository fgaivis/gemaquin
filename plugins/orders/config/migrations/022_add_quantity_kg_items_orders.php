<?php
class M4fb2dcf760d44eb0aa9dd17595e09dd8 extends CakeMigration {

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
                    'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                	'kg_quantity_remaining' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                ),
                'invoices_items' => array(
                    'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                ),
                'inv_items_sales_orders' => array(
                    'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                	'kg_quantity_remaining' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                ),
                'inv_items_so_dlv_notes' => array(
                    'kg_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                ),
            ),
		),
		'down' => array(
			'drop_field' => array(
				'items_purchase_orders' => array('kg_quantity','kg_quantity_remaining',),
				'invoices_items' => array('kg_quantity',),
				'inv_items_sales_orders' => array('kg_quantity','kg_quantity_remaining',),
				'inv_items_so_dlv_notes' => array('kg_quantity',),
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