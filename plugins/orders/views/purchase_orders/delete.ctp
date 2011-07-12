<header><h3><?php echo sprintf(__('Delete Purchase Order "%s"?', true), $purchaseOrder['PurchaseOrder']['number']); ?></h3></header>
<p>
	<?php __('Be aware that your Client and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('PurchaseOrder', array(
		'url' => array(
			'action' => 'delete',
			$purchaseOrder['PurchaseOrder']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>

