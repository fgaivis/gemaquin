<div class="organizations form">
<?php echo $this->Form->create('Organization', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Organization');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('country');
		echo $this->Form->input('fiscalid');
		echo $this->Form->input('brand');
		echo $this->Form->input('business');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>
