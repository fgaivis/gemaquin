<div class="itemsPurchaseOrders index">
<header><h3><?php __('Items Purchase Orders');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('item_id');?></th>
	<th><?php echo $this->Paginator->sort('purchase_order_id');?></th>
	<th><?php echo $this->Paginator->sort('quantity');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($itemsPurchaseOrders as $itemsPurchaseOrder):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $itemsPurchaseOrder['ItemsPurchaseOrder']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($itemsPurchaseOrder['Item']['name'], array('controller' => 'items', 'action' => 'view', $itemsPurchaseOrder['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($itemsPurchaseOrder['PurchaseOrder']['number'], array('controller' => 'purchase_orders', 'action' => 'view', $itemsPurchaseOrder['PurchaseOrder']['id'])); ?>
		</td>
		<td>
			<?php echo $itemsPurchaseOrder['ItemsPurchaseOrder']['quantity']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $itemsPurchaseOrder['ItemsPurchaseOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $itemsPurchaseOrder['ItemsPurchaseOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $itemsPurchaseOrder['ItemsPurchaseOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>


