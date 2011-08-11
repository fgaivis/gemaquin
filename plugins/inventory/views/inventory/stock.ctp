<div class="items index">
<header><h3><?php __('Inventory');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('item_id');?></th>
	<th><?php echo $this->Paginator->sort('batch');?></th>
	<th><?php echo $this->Paginator->sort('expiration_date');?></th>
	<th><?php echo $this->Paginator->sort('quantity');?></th>
</tr>
<?php
$i = 0;
foreach ($items as $item):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($item['Item']['name'], array('controller' => 'items', 'action' => 'view', $item['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $item['Inventory']['batch']; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['expiration_date']; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['quantity']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>