<div class="items index">
<header><h3><?php __('Inventory Entry'); ?></h3></header>
<?php echo $this->Form->create('InventoryItem', array('type' => 'file', 'url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php __('Item'); ?></th>
	<th><?php __('Batch'); ?></th>
	<th><?php __('Expiration Date'); ?></th>
	<th><?php __('Quantity'); ?></th>
	<th><?php __('Attachment'); ?></th>
</tr>
<?php
$i = 0;
foreach ($inventoryItems as $i => $item):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($item['Item']['name'], array(
				'plugin' => 'catalog', 'controller' => 'items', 'action' => 'view', $item['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $item['InventoryItem']['batch']; ?>
		</td>
		<td>
			<?php echo $item['InventoryItem']['expiration_date']; ?>
		</td>
		<td>
			<?php echo $item['InventoryItem']['quantity']; ?>
		</td>
		<td>
		<?php
			echo $this->Form->input("InventoryItem.$i.id", array('value' => $item['InventoryItem']['id']));
			echo $this->Form->file("InventoryItem.$i.file");
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->Form->end(__('Send Files', true)); ?>
</div>