<div class="inventoryItems form">
<?php echo $this->Form->create('InventoryItem', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Inventory Item');?></h3></header>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('batch');
		echo $this->Form->input('elaboration_date');
		echo $this->Form->input('expiration_date');
		echo $this->Form->input('retest_date');
		echo $this->Form->input('extension_date');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>