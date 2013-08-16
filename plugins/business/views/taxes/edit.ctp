<div class="taxes form">
<?php echo $this->Form->create('Tax', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Tax');?></h3></header>
	
	<fieldset>
	
	<?php $tax_types = array(
			Tax::IVA => __(Tax::IVA, true),
			Tax::ISLR => __(Tax::ISLR, true)
			//Tax::MUNICIPAL => __(Tax::MUNICIPAL, true),
			//Tax::ESTADAL => __(Tax::ESTADAL, true)
		);
	?>
 		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('type', array('options' => $tax_types));
		echo $this->Form->input('percent_value');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php //echo $this->Form->end('Submit');?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>
