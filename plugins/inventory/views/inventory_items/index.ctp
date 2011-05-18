<div class="inventoryItems index">
<h2><?php __('Inventory Items');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('code');?></th>
	<th><?php echo $this->Paginator->sort('item_id');?></th>
	<th><?php echo $this->Paginator->sort('batch');?></th>
	<th><?php echo $this->Paginator->sort(' expitarion_date');?></th>
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
			<?php echo $inventoryItem['InventoryItem']['id']; ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem']['code']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($inventoryItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $inventoryItem['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem']['batch']; ?>
		</td>
		<td>
			<?php echo $inventoryItem['InventoryItem'][' expitarion_date']; ?>
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

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Inventory Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
