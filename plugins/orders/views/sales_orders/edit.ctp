<div class="salesOrders form">
<?php echo $this->Form->create('SalesOrder', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Sales Order');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('number');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('invoice_id');
		echo $this->Form->input('InventoryItem');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SalesOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sales Orders', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice', true), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inv Items Sales Orders', true), array('controller' => 'inv_items_sales_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inv Items Sales Order', true), array('controller' => 'inv_items_sales_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventory Items', true), array('controller' => 'inventory_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory Item', true), array('controller' => 'inventory_items', 'action' => 'add')); ?> </li>
	</ul>
</div>