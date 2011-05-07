<div class="contacts form">
<?php echo $this->Form->create('Contact', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Contact');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('organization_id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('mobile');
		echo $this->Form->input('position');
		echo $this->Form->input('role');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
