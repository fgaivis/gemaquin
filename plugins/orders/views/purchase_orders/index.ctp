<div class="purchaseOrders index">
	<header>
		<h3>
		<?php __('Purchase Orders');?></h3>
	</header>
	
	<div class="index-filters">
	<?php $statuses = array(
			PurchaseOrder::DRAFT => __(PurchaseOrder::DRAFT, true),
			PurchaseOrder::SENT => __(PurchaseOrder::SENT, true),
			PurchaseOrder::APPROVED => __(PurchaseOrder::APPROVED, true),
			PurchaseOrder::PREINVOICED => __(PurchaseOrder::PREINVOICED, true),
			PurchaseOrder::INVOICED => __(PurchaseOrder::INVOICED, true),
			PurchaseOrder::DISPATCHED => __(PurchaseOrder::DISPATCHED, true),
			PurchaseOrder::RECEIVED => __(PurchaseOrder::RECEIVED, true),
			PurchaseOrder::COMPLETED => __(PurchaseOrder::COMPLETED, true),
			PurchaseOrder::VOID => __(PurchaseOrder::VOID, true)
		);
	?>
	
    <?php

    if (!$isReport) {
        echo $this->Form->create(null, array(
            'url' => array_merge(array('action' => 'index'), $this->params['pass'])
        ));
		echo $this->Form->input('number', array('div' => false, 'label' => __('Number', true)));
		echo $this->Form->input('invoice', array('div' => false, 'label' => __('Invoice', true)));
        echo $this->Form->input('organization_id', array('div' => false, 'label' => __('Provider', true), 'empty' =>__('Select',true)));
        echo '<br/>';
        echo $this->Form->input('status', array('div' => false, 'label' => __('Status', true), 'options' => $statuses, 'empty' =>__('Select',true)));
        echo '&nbsp;&nbsp;';
        echo $this->Form->input('from_date', array('div' => false, 'label' => __('From', true)));
        echo $this->Form->input('to_date', array('div' => false, 'label' => __('To', true)));
        echo $this->Form->submit(__('Search', true), array('div' => false));
        echo $this->Form->end();
    }

    ?>
    </div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('created');?>
			</th>
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
		<td>
			<?php echo $purchaseOrder['PurchaseOrder']['created']; ?>
		</td>
		<td>
			<?php echo $purchaseOrder['PurchaseOrder']['number']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrder['Provider']['name'], array('controller' => 'providers', 'action' => 'view', 'plugin' => 'business', $purchaseOrder['Provider']['id'])); ?>
		</td>
		<td>
			<?php echo __d('default', $purchaseOrder['PurchaseOrder']['status'], true);  ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrder['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $purchaseOrder['Invoice']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchaseOrder['PurchaseOrder']['id'])); ?>
			<?php if($userData['User']['role'] != '3'): ?>
				<?php if ($purchaseOrder['PurchaseOrder']['status'] == PurchaseOrder::DRAFT) : ?>
					&nbsp;|&nbsp;
					<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchaseOrder['PurchaseOrder']['id'])); ?>
					&nbsp;|&nbsp; <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchaseOrder['PurchaseOrder']['id'])); ?>
				<?php elseif ($purchaseOrder['PurchaseOrder']['status'] == PurchaseOrder::SENT) : ?>
					&nbsp;|&nbsp;
					<?php echo $this->Html->link(__('Void', true), array('action' => 'void', $purchaseOrder['PurchaseOrder']['id'])); ?>
				<?php elseif ($purchaseOrder['PurchaseOrder']['status'] == PurchaseOrder::INVOICED) : ?>
					&nbsp;|&nbsp;
					<?php echo $this->Html->link(__('Void', true), array('action' => 'void', $purchaseOrder['PurchaseOrder']['id'])); ?>
				<?php elseif ($purchaseOrder['PurchaseOrder']['status'] == PurchaseOrder::PREINVOICED) : ?>
					&nbsp;|&nbsp;
					<?php echo $this->Html->link(__('Void', true), array('action' => 'void', $purchaseOrder['PurchaseOrder']['id'])); ?>
				<?php endif; ?>
			<?php endif;?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
	
	
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>

<?php if($userData['User']['role'] != '3'): ?>
<?php if (!$isReport): ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('View report', true), array('action' => 'index', true));?></li>
	</ul>
</div>
<?php endif; ?>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('Nueva orden de compras', true), array('controller' => 'purchase_orders', 'action' => 'add', 'plugin' => 'orders', 'admin' => false))?></li>
    </ul>
</div>
<?php endif;?>
