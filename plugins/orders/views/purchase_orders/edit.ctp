<div class="purchaseOrders form">
<?php echo $this->Form->create('PurchaseOrder', array('id'=>'poadd','url' => array('action' => 'edit')));?>
	<header><h3><?php echo __('Edit Purchase Order',true) . ' ' . $purchaseOrder['PurchaseOrder']['number'];?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('organization_id',array('id'=>'providers',
    	    'label'=>__('Provider',true),
		    'empty' =>__('Select',true)
        ));

	?>

	<div class="module width_quarter" id="items"></div>
	<div class="module width_3_quarter" id="orderTable">
		<header>
		<h3><?php __('Order Content') ?></h3>
		</header>
		<table>
			<?php
				echo $html->tableHeaders(array(
					__('Code', true),
					__('Item', true),
					__('Description', true),
					__('Package', true),
					__('Quantity', true),
					__('Actions', true)
					));
			?>
		</table>
	</div>
	<div style="clear:both;"></div>
<?php echo $this->Form->end(array('label'=>__('Save', true),'id'=>'save'));?>
</div>
<?php $this->Html->script('/orders/js/views/purchase_orders/add',array('inline'=>false)) ?>



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
