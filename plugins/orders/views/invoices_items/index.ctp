<div class="invoicesItems index">
<header><h3><?php __('Invoices Items');?></h3></header>

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


