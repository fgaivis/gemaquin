<div class="taxes form">
<?php echo $this->Form->create('Tax', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Tax');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('type');
		echo $this->Form->input('percent_value');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Tax.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Taxes', true), array('action' => 'index'));?></li>
	</ul>
</div>