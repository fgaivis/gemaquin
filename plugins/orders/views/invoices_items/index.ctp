<div class="invoicesItems index">
<h2><?php __('Invoices Items');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('invoice_id');?></th>
	<th><?php echo $this->Paginator->sort('item_id');?></th>
	<th><?php echo $this->Paginator->sort('quantity');?></th>
	<th><?php echo $this->Paginator->sort('price');?></th>
	<th><?php echo $this->Paginator->sort('tax');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($invoicesItems as $invoicesItem):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $invoicesItem['InvoicesItem']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($invoicesItem['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $invoicesItem['Invoice']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($invoicesItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $invoicesItem['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $invoicesItem['InvoicesItem']['quantity']; ?>
		</td>
		<td>
			<?php echo $invoicesItem['InvoicesItem']['price']; ?>
		</td>
		<td>
			<?php echo $invoicesItem['InvoicesItem']['tax']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $invoicesItem['InvoicesItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $invoicesItem['InvoicesItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $invoicesItem['InvoicesItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Invoices Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice', true), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
