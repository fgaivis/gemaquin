<div class="deliveryNotes view">
<h2><?php  __('Delivery Note');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $deliveryNote['DeliveryNote']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sales Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($deliveryNote['SalesOrder']['id'], array('controller' => 'sales_orders', 'action' => 'view', $deliveryNote['SalesOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $deliveryNote['DeliveryNote']['number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $deliveryNote['DeliveryNote']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $deliveryNote['DeliveryNote']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="module width_3_quarter">
	<h3></h3>
	<?php if (!empty($deliveryNote['InvItemsSoDlvNote'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Inv Items Sales Order Id'); ?></th>
		<th><?php __('Delivery Note Id'); ?></th>
		<th><?php __('Quantity'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($deliveryNote['InvItemsSoDlvNote'] as $invItemsSoDlvNote):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $invItemsSoDlvNote['id'];?></td>
			<td><?php echo $invItemsSoDlvNote['inv_items_sales_order_id'];?></td>
			<td><?php echo $invItemsSoDlvNote['delivery_note_id'];?></td>
			<td><?php echo $invItemsSoDlvNote['quantity'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>
