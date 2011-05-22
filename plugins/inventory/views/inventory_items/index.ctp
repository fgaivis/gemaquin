<div class="items index">
<header><h3><?php __('Inventory');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('item_id');?></th>
	<th><?php echo $this->Paginator->sort('batch');?></th>
	<th><?php echo $this->Paginator->sort('expiration_date');?></th>
	<th><?php echo $this->Paginator->sort('quantity');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($inventoryItems as $inventoryItem):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($inventoryItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $inventoryItem['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem']['batch']; ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem']['expiration_date']; ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem']['quantity']; ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem']['created']; ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $inventoryItem['InventoryItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $inventoryItem['InventoryItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $inventoryItem['InventoryItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>