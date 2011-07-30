<div class="salesOrders index">
<h2><?php __('Sales Orders');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
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
foreach ($salesOrders as $salesOrder):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $salesOrder['SalesOrder']['id']; ?>
		</td>
		<td>
			<?php echo $salesOrder['SalesOrder']['number']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($salesOrder['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $salesOrder['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($salesOrder['Invoice']['id'], array('controller' => 'invoices', 'action' => 'view', $salesOrder['Invoice']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $salesOrder['SalesOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $salesOrder['SalesOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $salesOrder['SalesOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Sales Order', true), array('action' => 'add')); ?></li>
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
