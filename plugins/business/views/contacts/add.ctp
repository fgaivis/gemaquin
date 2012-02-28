<div class="contacts form">
<?php echo $this->Form->create('Contact', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Contact');?></h3></header>

	<fieldset>
	<?php
		$default = array();
		if (!empty($this->params['pass'])) {
			$default = array('default' => $this->params['pass'][0], 'type' => 'hidden');
		}
		echo $this->Form->input('organization_id', $default);
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('mobile');
		echo $this->Form->input('position');
		echo $this->Form->input('role');
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit'));?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>
