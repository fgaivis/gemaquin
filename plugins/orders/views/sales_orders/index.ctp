<div class="salesOrder index">
	<header>
		<h3>
		<?php __('Sales Orders');?></h3>
	</header>

	<div class="index-filters">
    <?php

        if (!$isReport) {
            echo $this->Form->create(null, array(
                'url' => array_merge(array('action' => 'index'), $this->params['pass'])
            ));
            echo $this->Form->input('from_date', array('div' => false, 'label' => __('From', true)));
            echo $this->Form->input('to_date', array('div' => false, 'label' => __('To', true)));
            echo $this->Form->submit(__('Search', true), array('div' => false));
            echo $this->Form->end();
        }

    ?>
    </div>
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
			<?php echo __d('default', $salesOrder['SalesOrder']['status'], true);  ?>
		</td>
		<td>
			<?php echo $this->Html->link($salesOrder['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $salesOrder['Invoice']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $salesOrder['SalesOrder']['id'])); ?>
			<?php if ($salesOrder['SalesOrder']['status'] == SalesOrder::DRAFT) : ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $salesOrder['SalesOrder']['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $salesOrder['SalesOrder']['id'])); ?>
			<?php elseif ($salesOrder['SalesOrder']['status'] == PurchaseOrder::SENT) : ?>
				<?php echo $this->Html->link(__('Void', true), array('action' => 'void', $salesOrder['SalesOrder']['id'])); ?>
			<?php elseif ($salesOrder['SalesOrder']['status'] == PurchaseOrder::INVOICED) : ?>
				<?php echo $this->Html->link(__('Void', true), array('action' => 'void', $salesOrder['SalesOrder']['id'])); ?>
			<?php elseif ($salesOrder['SalesOrder']['status'] == PurchaseOrder::PREINVOICED) : ?>
				<?php echo $this->Html->link(__('Void', true), array('action' => 'void', $salesOrder['SalesOrder']['id'])); ?>
			<?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
	
	
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>

<?php if (!$isReport): ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('View report', true), array('action' => 'index', true));?></li>
	</ul>
</div>
<?php endif; ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Sales Order', true), array('controller' => 'sales_orders', 'action' => 'add', 'plugin' => 'orders', 'admin' => false))?></li>
	</ul>
</div>
