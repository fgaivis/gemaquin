<h2><?php echo sprintf(__('Delete Inventory Entry "%s"?', true), $inventoryEntry['InventoryEntry']['title']); ?></h2>
<p>	
	<?php __('Be aware that your Inventory Entry and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('InventoryEntry', array(
		'url' => array(
			'action' => 'delete',
			$inventoryEntry['InventoryEntry']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>