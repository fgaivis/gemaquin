<div class="configurations form">
<?php echo $this->Form->create('Configuration', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Configuration');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Configuration.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Configurations', true), array('action' => 'index'));?></li>
	</ul>
</div>