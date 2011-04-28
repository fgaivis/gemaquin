<div class="purchaseOrders form">
<?php echo $this->Form->create('PurchaseOrder', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Purchase Order');?></legend>
	<?php
		echo $this->Form->input('number');
		echo $this->Form->input('organization_id',array('id'=>'providers','empty' =>__('Select',true)));

	?>

	<div id="items"></div>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<?php $this->Html->script('/orders/js/views/purchase_orders/add',array('inline'=>false)) ?>

