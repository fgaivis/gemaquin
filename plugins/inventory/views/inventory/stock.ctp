<div class="items index">
<header><h3><?php __('Inventory');?></h3></header>
<div class="index-filters">
<?php

    if (!$isReport) {
        echo $this->Form->create(null, array(
            'url' => array_merge(array('action' => 'stock'), $this->params['pass'])
        ));
        echo $this->Form->input('gt_quantity', array('div' => false, 'label' => __('', true)));
        echo $this->Form->input('lt_quantity', array('div' => false, 'label' => __('', true)));
        echo $this->Form->submit(__('Search', true), array('div' => false));
        echo $this->Form->end();

    }

?>
</div>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('item_id');?></th>
	<th><?php echo $this->Paginator->sort('batch');?></th>
	<th><?php echo $this->Paginator->sort('elaboration_date');?></th>
	<th><?php echo $this->Paginator->sort('expiration_date');?></th>
	<th><?php echo $this->Paginator->sort('retest_date');?></th>
	<th><?php echo $this->Paginator->sort('extension_date');?></th>
	<th><?php echo $this->Paginator->sort('quantity');?></th>
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
		<?php if($userData['User']['role'] != '0'): ?>
			<?php echo $this->Html->link($item['Item']['name'], array(
				'plugin' => 'catalog', 'controller' => 'items', 'action' => 'view', $item['Inventory']['item_id'])); ?>
		<?php else: ?>
			<?php echo $this->Html->link($item['Item']['name'], array(
				'plugin' => 'inventory', 'controller' => 'inventory', 'action' => 'edit', $item['Inventory']['id'])); ?>
		<?php endif; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['batch']; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['elaboration_date']; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['expiration_date']; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['retest_date']; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['extension_date']; ?>
		</td>
		<td>
			<?php echo $item['Inventory']['quantity']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>

<div class="actions">
	<ul>
		<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'stock', true)) : ''); ?></li>
	</ul>
</div>
