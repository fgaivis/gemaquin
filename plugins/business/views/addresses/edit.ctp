<div class="addresses form">
<?php echo $this->Form->create('Address', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Address');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('type');
		echo $this->Form->input('phone');
		echo $this->Form->input('address_1');
		echo $this->Form->input('address_2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('country');
		echo $this->Form->input('zip');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
