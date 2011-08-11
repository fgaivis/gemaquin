<div class="inventoryEntries index">
<header><h3><?php __('Inventory Entries');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort(__('Date', true), 'created');?></th>
	<th><?php echo $this->Paginator->sort(__('User', true), 'User.username');?></th>
	<th><?php echo $this->Paginator->sort(__('PurchaseOrder', true), 'PurchaseOrder.number');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($inventoryEntries as $inventoryEntry):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $inventoryEntry['InventoryEntry']['created']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($inventoryEntry['User']['username'], array('controller' => 'users', 'action' => 'view', $inventoryEntry['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inventoryEntry['PurchaseOrder']['number'], array('controller' => 'purchase_orders', 'action' => 'view', $inventoryEntry['PurchaseOrder']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Report', true), array('controller' => 'inventory_items', 'action' => 'report', $inventoryEntry['InventoryEntry']['id'])); ?>
			<?php echo $this->Html->link(__('Labels', true), '#'); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging'); ?>
</div>