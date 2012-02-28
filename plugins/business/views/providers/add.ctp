<div class="providers form">
<?php echo $this->Form->create('Provider', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Provider');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('country');
		echo $this->Form->input('fiscalid');
		echo $this->Form->input('brand');
		echo $this->Form->input('business');
		echo $this->Form->input('phone');
		echo $this->Form->input('fax');
		echo $this->Form->input('email');
		echo $this->Form->input('website');
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit'));?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>


