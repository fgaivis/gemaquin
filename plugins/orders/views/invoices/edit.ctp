<div class="invoices form">
<?php echo $this->Form->create('Invoice', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Invoice');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('number');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('subtotal');
		echo $this->Form->input('tax');
		echo $this->Form->input('total');
		echo $this->Form->input('Item');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
