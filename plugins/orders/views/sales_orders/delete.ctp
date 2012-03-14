<h2><?php echo sprintf(__('Delete Sales Order "%s"?', true), $salesOrder['SalesOrder']['title']); ?></h2>
<p class="delete-warn">	
	<?php __('Be aware that your Order and all associated data will be deleted if you confirm!'); ?>
</p>
<div class="delete-form">
<?php
	echo $this->Form->create('SalesOrder', array(
		'url' => array(
			'action' => 'delete',
			$salesOrder['SalesOrder']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>
</div>
