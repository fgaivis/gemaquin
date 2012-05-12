<div class="deliveryNotes view">
<header><h3><?php  __('Delivery Note');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php //if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $deliveryNote['DeliveryNote']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sales Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($deliveryNote['SalesOrder']['number'], array('controller' => 'sales_orders', 'action' => 'view', $deliveryNote['SalesOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $deliveryNote['DeliveryNote']['number']; ?>
			&nbsp;
		</dd>
		<!-- <dt<?php// if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $deliveryNote['DeliveryNote']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php //if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $deliveryNote['DeliveryNote']['modified']; ?>
			&nbsp;
		</dd> -->
	</dl>
</div>
<div class="module width_3_quarter">
	<h3></h3>
	<?php if (!empty($deliveryNote['InvItemsSalesOrder'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!-- <th><?php //__('Id'); ?></th> -->
		<th><?php __('Item'); ?></th>
		<th><?php __('Batch'); ?></th>
		<th><?php __('Barcode'); ?></th>
		<th><?php __('Package Factor'); ?></th>
		<th><?php __('Sales Factor'); ?></th>
		<th><?php __('Quantity'); ?></th>
	</tr>
	<?php
		$i = 0;
        foreach ($deliveryNote['InvItemsSalesOrder'] as $invItemsSalesOrder):
            if (!empty($invItemsSalesOrder['InvItemsSoDlvNote']) && $invItemsSalesOrder['InvItemsSoDlvNote']['quantity'] > 0):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php //echo $invItemsSoDlvNote['id'];?></td> -->
			<td><?php echo $invItemsSalesOrder['InventoryItem']['Item']['name'];?></td>
			<td><?php echo $invItemsSalesOrder['InventoryItem']['batch'];?></td>
			<td><?php echo $invItemsSalesOrder['InventoryItem']['Item']['barcode'];?></td>
			<td><?php echo $invItemsSalesOrder['InventoryItem']['Item']['package_factor'];?></td>
			<td><?php echo $invItemsSalesOrder['InventoryItem']['Item']['sales_factor'];?></td>
			<td><?php echo $invItemsSalesOrder['InvItemsSoDlvNote']['quantity'];?></td>
		</tr>
	<?php   endif;
            endforeach; ?>
	</table>
<?php endif; ?>


</div>
