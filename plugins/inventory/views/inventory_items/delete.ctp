<h2><?php echo sprintf(__('Delete Inventory Item "%s"?', true), $inventoryItem['InventoryItem']['title']); ?></h2>
<p>	
	<?php __('Be aware that your Inventory Item and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('InventoryItem', array(
		'url' => array(
			'action' => 'delete',
			$inventoryItem['InventoryItem']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>