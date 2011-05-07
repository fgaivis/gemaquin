<div class="contacts form">
<?php echo $this->Form->create('Contact', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Contact');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('id');
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
