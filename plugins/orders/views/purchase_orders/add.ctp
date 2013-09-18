
<div class="purchaseOrders form">
<?php echo $this->Form->create('PurchaseOrder', array('id'=>'poadd','url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Purchase Order');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('organization_id',array('id'=>'providers',
    	    'label'=>__('Provider',true),
		    'empty' =>__('Select',true)
        ));
		echo $this->Form->hidden('user_creator_id',array('value' => $userData['User']['id']));
	?>
	
	<input id="search_input" placeholder="Escriba...">

	<div class="module width_3_quarter" id="items"></div>
	<div class="module width_3_quarter" id="orderTable">
		<header>
		<h3><?php __('Order Content') ?></h3>
		</header>
		<table>
			<?php
				echo $html->tableHeaders(array(
					__('Provider Code', true),
					__('Barcode', true),
					__('Item', true),
					__('Package', true),
					__('Sells By Kg', true),
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
<?php $this->Html->script('/orders/js/views/purchase_orders/live_filter',array('inline'=>false)) ?>
