<div class="purchaseOrders form">
<?php echo $this->Form->create('PurchaseOrder', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Purchase Order');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('number');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('invoice_id');
		echo $this->Form->input('Item');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
