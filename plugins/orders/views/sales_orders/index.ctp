<div class="salesOrder index">
	<header>
		<h3>
		<?php __('Sales Orders');?></h3>
	</header>

	<table cellpadding="0" cellspacing="0">
		<tr>
			<!-- <th><?php //echo $this->Paginator->sort('id');?>
			</th> -->
			<th><?php echo $this->Paginator->sort('number');?>
			</th>
			<th><?php echo $this->Paginator->sort('organization_id');?>
			</th>
			<th><?php echo $this->Paginator->sort('status');?>
			</th>
			<th><?php echo $this->Paginator->sort('invoice_id');?>
			</th>
			<th class="actions"><?php __('Actions');?>
			</th>
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
		<!-- <td>
			<?php //echo $salesOrder['SalesOrder']['id']; ?>
		</td> -->
		<td>
			<?php echo $salesOrder['SalesOrder']['number']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($salesOrder['Client']['name'], array('controller' => 'clients', 'action' => 'view', 'plugin' => 'business', $salesOrder['Client']['id'])); ?>
		</td>
		<td>
			<?php echo $salesOrder['SalesOrder']['status'];  ?>
		</td>
		<td>
			<?php echo $this->Html->link($salesOrder['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $salesOrder['Invoice']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $salesOrder['SalesOrder']['id'])); ?>
			<?php if ($salesOrder['SalesOrder']['status'] == SalesOrder::DRAFT) : ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $salesOrder['SalesOrder']['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $salesOrder['SalesOrder']['id'])); ?>
			 <?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
	
	
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Sales Order', true), array('controller' => 'sales_orders', 'action' => 'add', 'plugin' => 'orders', 'admin' => false))?></li>
	</ul>
</div>


