
<div class="purchaseOrders form">
<?php echo $this->Form->create('PurchaseOrder', array('id'=>'poadd','url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Purchase Order');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('organization_id',array('id'=>'providers',
    	    'label'=>__('Provider',true),
		    'empty' =>__('Select',true)
        ));

	?>

	<div class="module width_3_quarter" id="items"></div>
	<div class="module width_3_quarter" id="orderTable">
		<header>
		<h3><?php __('Order Content') ?></h3>
		</header>
		<table>
			<?php
				echo $html->tableHeaders(array(
					__('Code', true),
					__('Item', true),
					__('Package', true),
					__('Quantity / Kg', true),
					__('Actions', true)
					));
			?>
		</table>
	</div>
	<div style="clear:both;"></div>
<?php echo $this->Form->end(array('label'=>__('Save', true),'id'=>'save'));?>
</div>
<?php $this->Html->script('/orders/js/views/purchase_orders/add',array('inline'=>false)) ?>

