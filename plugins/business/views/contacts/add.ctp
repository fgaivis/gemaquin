<div class="contacts form">
<?php echo $this->Form->create('Contact', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Contact');?></h3></header>

	<fieldset>
	<?php
		$default = array();
		$d_phone = array();
		$d_email = array();
		if (!empty($this->params['pass'])) {
			$default = array('default' => $this->params['pass'][0], 'type' => 'hidden');
			if (!empty($this->params['pass'][1])) {
				$d_phone = array('default' => $this->params['pass'][1], 'type' => 'text');
			}
			if (!empty($this->params['pass'][2])) {
				$d_email = array('default' => $this->params['pass'][2], 'type' => 'text');
			}
		}
		echo $this->Form->input('organization_id', $default);
		echo $this->Form->input('name');
		echo $this->Form->input('email', $d_email);
		echo $this->Form->input('phone', $d_phone);
		echo $this->Form->input('mobile');
		echo $this->Form->input('position');
		echo $this->Form->input('role');
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit'));?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>
