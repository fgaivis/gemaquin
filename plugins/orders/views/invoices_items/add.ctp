<div class="invoicesItems form">
<?php echo $this->Form->create('InvoicesItem', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Invoices Item');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('invoice_id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('price');
		echo $this->Form->input('tax');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
