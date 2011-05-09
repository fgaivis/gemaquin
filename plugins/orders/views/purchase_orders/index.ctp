<div class="purchaseOrders index">
<header><h3><?php __('Purchase Orders');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('number');?></th>
	<th><?php echo $this->Paginator->sort('organization_id');?></th>
	<th><?php echo $this->Paginator->sort('invoice_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($purchaseOrders as $purchaseOrder):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $purchaseOrder['PurchaseOrder']['id']; ?>
		</td>
		<td>
			<?php echo $purchaseOrder['PurchaseOrder']['number']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrder['Provider']['name'], array('controller' => 'organizations', 'action' => 'view', $purchaseOrder['Provider']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrder['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $purchaseOrder['Invoice']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchaseOrder['PurchaseOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchaseOrder['PurchaseOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchaseOrder['PurchaseOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>



