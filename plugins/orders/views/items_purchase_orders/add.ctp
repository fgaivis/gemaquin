<div class="itemsPurchaseOrders form">
<?php echo $this->Form->create('ItemsPurchaseOrder', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Items Purchase Order');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('purchase_order_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
