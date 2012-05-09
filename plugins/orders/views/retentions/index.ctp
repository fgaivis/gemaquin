<div class="retentions index">
<h2><?php __('Retentions');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('organization_id');?></th>
	<th><?php echo $this->Paginator->sort('invoice_id');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('rate');?></th>
	<th><?php echo $this->Paginator->sort('amount');?></th>
	<th><?php echo $this->Paginator->sort('subtrahend');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($retentions as $retention):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $retention['Retention']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($retention['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $retention['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($retention['Invoice']['id'], array('controller' => 'invoices', 'action' => 'view', $retention['Invoice']['id'])); ?>
		</td>
		<td>
			<?php echo $retention['Retention']['type']; ?>
		</td>
		<td>
			<?php echo $retention['Retention']['rate']; ?>
		</td>
		<td>
			<?php echo $retention['Retention']['amount']; ?>
		</td>
		<td>
			<?php echo $retention['Retention']['subtrahend']; ?>
		</td>
		<td>
			<?php echo $retention['Retention']['created']; ?>
		</td>
		<td>
			<?php echo $retention['Retention']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $retention['Retention']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $retention['Retention']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $retention['Retention']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Retention', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice', true), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
	</ul>
</div>
