<div class="salesOrders form">
<?php echo $this->Form->create('SalesOrder', array('url' => array('id'=>'soadd','action' => 'edit')));?>
	<header><h3><?php echo __('Edit Sales Order',true) . ' ' . $salesOrder['SalesOrder']['number'];?></h3></header>
	
	<fieldset>
	
	<?php
		/*echo $this->Form->input('id');
		echo $this->Form->input('number');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('invoice_id');
		echo $this->Form->input('InventoryItem');*/
	?>
	
	<?php
		echo $this->Form->input('organization_id',array('id'=>'clients',
    	    'label'=>__('Client',true),
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
					__('Quantity', true),
					__('Actions', true)
					));
			?>
			<?php foreach ($salesOrder['InventoryItem'] as $key => $item) : ?>
				<tr class="item" id="<?php echo 'row' . $item['Item']['id']?>">
				    <td><?php echo $item['Item']['barcode']; ?></td>
				    <td><?php echo $item['Item']['name']; ?></td>
				    <!-- <td><?php //echo $item['description']; ?></td> -->
				    <td><?php echo $item['Item']['package_factor']; ?></td>
				    <td><?php echo $this->Form->input('InvItemsSalesOrder.' . $key . '.quantity', array('label' => false, 'div' => false)); ?></td>
				    <td>
				    	<?php echo $this->Html->link(__('Delete', true), '#', array('item' => $item['id'], 'class' => 'delete')); ?>
						<?php echo $this->Form->input('InvItemsSalesOrder.' . $key . '.item_id', array('type' => 'hidden', 'value' => $item['Item']['id'])); ?>
						<?php echo $this->Form->input('InvItemsSalesOrder.' . $key . '.id', array('type' => 'hidden', 'value' => $item['InvItemsSalesOrder']['id'])); ?>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
	<div style="clear:both;"></div>
<?php echo $this->Form->end(array('label'=>__('Save', true),'id'=>'save'));?>
</div>
<?php $this->Html->script('/orders/js/views/sales_orders/add',array('inline'=>false)) ?>
