<div class="configurations form">
<?php echo $this->Form->create('Configuration', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Tax');?></h3></header>
	
	<fieldset>
 		
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php //echo $this->Form->end('Submit');?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>
