<div class="configurations form">
<?php echo $this->Form->create('Configuration', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Configuration');?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Configurations', true), array('action' => 'index'));?></li>
	</ul>
</div>