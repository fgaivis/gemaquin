<div class="items index">
<header><h3><?php __('Inventory');?></h3></header>
<div class="index-filters">
<?php

    if (!$isReport) {
        echo $this->Form->create(null, array(
            'url' => array_merge(array('action' => 'stock'), $this->params['pass'])
        ));
        //echo $this->Form->input('gt_quantity', array('div' => false, 'label' => __('', true)));
        echo $this->Form->input('lt_quantity', array('div' => false, 'label' => __('', true)));
        echo $this->Form->input('organization_id', array('div' => false, 'label' => __('Provider', true), 'empty' =>__('Select',true)));
        //echo $this->Form->hidden('z_quantity', array('value' => 1));
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
	<th><?php echo $this->Paginator->sort('availability');?></th>
	<?php if($userData['User']['role'] != '3'): ?>
	<th><?php echo $this->Paginator->sort('individual_cost');?></th>
	<?php endif; ?>
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
		<td>
			<?php echo $item['Inventory']['availability']; ?>
		</td>
		<?php if($userData['User']['role'] != '3'): ?>
		<td>
			<?php echo $item['Inventory']['individual_cost']; ?>
		</td>
		<?php endif; ?>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>

<div class="actions">
	<ul>
	  <?php if(!$isReport): ?>
		<?php if($userData['User']['role'] === '0'): ?>
			<li><?php echo $this->Html->link(__('New Inventory Item', true), array('plugin' => 'inventory','controller' => 'inventory', 'action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if(!empty($this->data['Inventory'])): ?>
			<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'stock', true, 'organization_id' => $this->data['Inventory']['organization_id'])) : ''); ?></li>
		<?php else: ?>
			<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'stock', true)) : ''); ?></li>
		<?php endif; ?>
	  <?php endif; ?>
	</ul>
</div>
