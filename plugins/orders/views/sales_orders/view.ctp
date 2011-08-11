<div class="salesOrders view">
<h2><?php  __('Sales Order');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salesOrder['SalesOrder']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salesOrder['SalesOrder']['number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($salesOrder['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $salesOrder['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Invoice'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($salesOrder['Invoice']['id'], array('controller' => 'invoices', 'action' => 'view', $salesOrder['Invoice']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sales Order', true), array('action' => 'edit', $salesOrder['SalesOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Sales Order', true), array('action' => 'delete', $salesOrder['SalesOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales Orders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales Order', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice', true), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inv Items Sales Orders', true), array('controller' => 'inv_items_sales_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inv Items Sales Order', true), array('controller' => 'inv_items_sales_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventory Items', true), array('controller' => 'inventory_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory Item', true), array('controller' => 'inventory_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Inv Items Sales Orders');?></h3>
	<?php if (!empty($salesOrder['InvItemsSalesOrder'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Inventory Item  Id'); ?></th>
		<th><?php __('Sales Order Id'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($salesOrder['InvItemsSalesOrder'] as $invItemsSalesOrder):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $invItemsSalesOrder['id'];?></td>
			<td><?php echo $invItemsSalesOrder['inventory_item__id'];?></td>
			<td><?php echo $invItemsSalesOrder['sales_order_id'];?></td>
			<td><?php echo $invItemsSalesOrder['quantity'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'inv_items_sales_orders', 'action' => 'view', $invItemsSalesOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'inv_items_sales_orders', 'action' => 'edit', $invItemsSalesOrder['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'inv_items_sales_orders', 'action' => 'delete', $invItemsSalesOrder['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $invItemsSalesOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Inv Items Sales Order', true), array('controller' => 'inv_items_sales_orders', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Inventory Items');?></h3>
	<?php if (!empty($salesOrder['InventoryItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Inventory Entry Id'); ?></th>
		<th><?php __('Transaction'); ?></th>
		<th><?php __('Purchase Order Id'); ?></th>
		<th><?php __('Item Id'); ?></th>
		<th><?php __('Batch'); ?></th>
		<th><?php __('Expiration Date'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($salesOrder['InventoryItem'] as $inventoryItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $inventoryItem['id'];?></td>
			<td><?php echo $inventoryItem['inventory_entry_id'];?></td>
			<td><?php echo $inventoryItem['transaction'];?></td>
			<td><?php echo $inventoryItem['purchase_order_id'];?></td>
			<td><?php echo $inventoryItem['item_id'];?></td>
			<td><?php echo $inventoryItem['batch'];?></td>
			<td><?php echo $inventoryItem['expiration_date'];?></td>
			<td><?php echo $inventoryItem['quantity'];?></td>
			<td><?php echo $inventoryItem['created'];?></td>
			<td><?php echo $inventoryItem['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'inventory_items', 'action' => 'view', $inventoryItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'inventory_items', 'action' => 'edit', $inventoryItem['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'inventory_items', 'action' => 'delete', $inventoryItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $inventoryItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Inventory Item', true), array('controller' => 'inventory_items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
