<div class="purchaseOrders form">
<?php echo $this->Form->create('PurchaseOrder', array('url' => array('action' => 'add')));?>
	<?php
		echo $this->Form->input('number');
		echo $this->Form->input('organization_id',array('id'=>'providers','empty' =>__('Select',true)));

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
<?php echo $this->Form->end(__('Send', true));?>
</div>
<?php $this->Html->script('/orders/js/views/purchase_orders/add',array('inline'=>false)) ?>

