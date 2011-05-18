<div class="inventoryItems form">
<?php echo $this->Form->create('InventoryItem', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Inventory Item');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('item_id');
		echo $this->Form->input('batch');
		echo $this->Form->input(' expitarion_date');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('InventoryItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Inventory Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>