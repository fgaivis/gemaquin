<div class="retentions form">
<?php echo $this->Form->create('Retention', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Retention');?></legend>
	<?php
		echo $this->Form->input('organization_id');
		echo $this->Form->input('invoice_id');
		echo $this->Form->input('type');
		echo $this->Form->input('rate');
		echo $this->Form->input('amount');
		echo $this->Form->input('subtrahend');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Retentions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice', true), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
	</ul>
</div>