<?php
class InvoicesNote extends OrdersAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'InvoicesNote';

/**
 * belongsTo association
 *
 * @var array $belongsTo 
 * @access public
 */
	public $belongsTo = array(
		'Invoice' => array(
			'className' => 'Orders.Invoice',
			'foreignKey' => 'invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DebitNote' => array(
			'className' => 'Orders.DebitNote',
			'foreignKey' => 'note_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CreditNote' => array(
			'className' => 'Orders.CreditNote',
			'foreignKey' => 'note_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}