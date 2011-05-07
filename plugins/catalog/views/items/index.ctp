<div class="items index">
<header><h3><?php __('Items');?></h3></header>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('barcode');?></th>
	<th><?php echo $this->Paginator->sort('package_factor');?></th>
	<th><?php echo $this->Paginator->sort('sales_factor');?></th>
	<th><?php echo $this->Paginator->sort('weight');?></th>
	<th><?php echo $this->Paginator->sort('country');?></th>
	<th><?php echo $this->Paginator->sort('industry');?></th>
	<th><?php echo $this->Paginator->sort('category_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($items as $item):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $item['Item']['id']; ?>
		</td>
		<td>
			<?php echo $item['Item']['name']; ?>
		</td>
		<td>
			<?php echo $item['Item']['description']; ?>
		</td>
		<td>
			<?php echo $item['Item']['barcode']; ?>
		</td>
		<td>
			<?php echo $item['Item']['package_factor']; ?>
		</td>
		<td>
			<?php echo $item['Item']['sales_factor']; ?>
		</td>
		<td>
			<?php echo $item['Item']['weight']; ?>
		</td>
		<td>
			<?php echo $item['Item']['country']; ?>
		</td>
		<td>
			<?php echo $item['Item']['industry']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($item['Category']['name'], array('controller' => 'categories', 'action' => 'view', $item['Category']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Item']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
