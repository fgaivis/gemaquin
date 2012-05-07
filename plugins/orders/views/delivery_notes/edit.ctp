<div class="deliveryNotes form">
<?php echo $this->Form->create('DeliveryNote', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Delivery Note');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sales_order_id');
		echo $this->Form->input('number');
		echo $this->Form->input('InvItemsSalesOrder');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('DeliveryNote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Delivery Notes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sales Orders', true), array('controller' => 'sales_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales Order', true), array('controller' => 'sales_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inv Items So Dlv Notes', true), array('controller' => 'inv_items_so_dlv_notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inv Items So Dlv Note', true), array('controller' => 'inv_items_so_dlv_notes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inv Items Sales Orders', true), array('controller' => 'inv_items_sales_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inv Items Sales Order', true), array('controller' => 'inv_items_sales_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>