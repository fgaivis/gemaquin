<div class="inventory form">
<?php echo $this->Form->create('Inventory', array('url' => array('plugin' => 'inventory','controller' => 'inventory', 'action' => 'edit')));?>
	<header><h3><?php __('Edit Inventory Item');?></h3></header>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('batch');
		echo $this->Form->input('elaboration_date', array('type' => 'text','label' => __d('default', 'Elaboration Date', true)));
		echo $this->Form->input('expiration_date', array('type' => 'text', 'label' => __d('default', 'Expiration Date', true)));
		echo $this->Form->input('retest_date', array('type' => 'text', 'label' => __d('default', 'Retest Date', true)));
		echo $this->Form->input('extension_date', array('type' => 'text', 'label' => __d('default', 'Extension Date', true)));
		echo $this->Form->input('quantity');
		echo $this->Form->input('availability');
		echo $this->Form->input('purchase_cost');
		echo $this->Form->input('individual_cost');
	?>
	</fieldset>
<?php //echo $this->Form->end('Submit');?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>