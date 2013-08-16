<div class="taxes form">
<?php echo $this->Form->create('Tax', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Tax');?></legend>
	<?php
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
		<li><?php echo $this->Html->link(__('List Taxes', true), array('action' => 'index'));?></li>
	</ul>
</div>