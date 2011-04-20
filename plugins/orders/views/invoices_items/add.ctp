<div class="invoicesItems form">
<?php echo $this->Form->create('InvoicesItem', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Invoices Item');?></legend>
	<?php
		echo $this->Form->input('invoice_id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('price');
		echo $this->Form->input('tax');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Invoices Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice', true), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>