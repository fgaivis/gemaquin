<div class="purchaseOrders index">
	<header>
		<h3>
		<?php __('Purchase Orders');?></h3>
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
foreach ($purchaseOrders as $purchaseOrder):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<!-- <td>
			<?php //echo $purchaseOrder['PurchaseOrder']['id']; ?>
		</td> -->
		<td>
			<?php echo $purchaseOrder['PurchaseOrder']['number']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrder['Provider']['name'], array('controller' => 'providers', 'action' => 'view', 'plugin' => 'business', $purchaseOrder['Provider']['id'])); ?>
		</td>
		<td>
			<?php echo $purchaseOrder['PurchaseOrder']['status'];  ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrder['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $purchaseOrder['Invoice']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchaseOrder['PurchaseOrder']['id'])); ?>
			<?php if ($purchaseOrder['PurchaseOrder']['status'] == PurchaseOrder::DRAFT) : ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchaseOrder['PurchaseOrder']['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchaseOrder['PurchaseOrder']['id'])); ?>
			 <?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
	
	
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nueva orden de compras', true), array('controller' => 'purchase_orders', 'action' => 'add', 'plugin' => 'orders', 'admin' => false))?></li>
	</ul>
</div>


