<div class="invoices index">
<h2><?php __('Invoices');?></h2>
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
	<th><?php echo $this->Paginator->sort('subtotal');?></th>
	<th><?php echo $this->Paginator->sort('tax');?></th>
	<th><?php echo $this->Paginator->sort('total');?></th>
	<th><?php echo $this->Paginator->sort('insurance');?></th>
	<th><?php echo $this->Paginator->sort('shipping');?></th>
	<th><?php echo $this->Paginator->sort('customs_tax');?></th>
	<th><?php echo $this->Paginator->sort('customs_adm');?></th>
	<th><?php echo $this->Paginator->sort('internal_shipping');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($invoices as $invoice):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $invoice['Invoice']['id']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['number']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($invoice['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $invoice['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['subtotal']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['tax']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['total']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['insurance']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['shipping']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['customs_tax']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['customs_adm']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['internal_shipping']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['type']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $invoice['Invoice']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Invoice', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Orders', true), array('controller' => 'purchase_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order', true), array('controller' => 'purchase_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
