<div class="itemsPurchaseOrders form">
<?php echo $this->Form->create('ItemsPurchaseOrder', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Items Purchase Order');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('purchase_order_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ItemsPurchaseOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items Purchase Orders', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Orders', true), array('controller' => 'purchase_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order', true), array('controller' => 'purchase_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>