<div class="invoices form">
<?php echo $this->Form->create('Invoice', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Invoice');?></legend>
	<?php
		echo $this->Form->input('number');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('subtotal');
		echo $this->Form->input('tax');
		echo $this->Form->input('total');
		echo $this->Form->input('Item');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Orders', true), array('controller' => 'purchase_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order', true), array('controller' => 'purchase_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>