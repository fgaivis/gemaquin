<div class="items index">
<header><h3><?php __('Inventory');?></h3></header>
<div class="index-filters">
<?php

    if (!$isReport) {
        echo $this->Form->create(null, array(
            'url' => array_merge(array('action' => 'stock'), $this->params['pass'])
        ));
        //echo $this->Form->input('gt_quantity', array('div' => false, 'label' => __('', true)));
        //echo $this->Form->input('lt_quantity', array('div' => false, 'label' => __('', true)));
        //echo $this->Form->hidden('z_quantity', array('value' => 1));
        // Buscar por nombre del item, lote y proveedor
        echo $this->Form->input('name', array('div' => false, 'label' => __('Name', true)));
        echo $this->Form->input('batch', array('div' => false, 'label' => __('Batch', true)));
        echo $this->Form->input('organization_id', array('div' => false, 'label' => __('Provider', true), 'empty' =>__('Select',true)));
        echo '<br/>';
        //Buscar por fecha de expiracion o extension
		echo $this->Form->input('from', array('div' => false, 'label' => __('From', true)));
        //echo $this->Form->input('from', array('div' => false, 'label' => __('From', true), 'type'=>'date'));
        echo '&nbsp;';
        echo $this->Form->input('to', array('div' => false, 'label' => __('To', true)));
        //echo $this->Form->input('to', array('div' => false, 'label' => __('To', true), 'type'=>'date'));
        echo $this->Form->submit(__('Search', true), array('div' => false));
        echo $this->Form->end();

    }

?>
</div>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('item_id');?></th>
	<th><?php echo $this->Paginator->sort('batch');?></th>
	<th><?php echo $this->Paginator->sort('package_factor');?></th>
	<!-- <th><?php //echo $this->Paginator->sort('elaboration');?></th> -->
	<th><?php echo $this->Paginator->sort('expiration');?></th>
	<!-- <th><?php //echo $this->Paginator->sort('retest_date');?></th> -->
	<!-- <th><?php //echo $this->Paginator->sort('extension_date');?></th> -->
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
			<?php echo $item['Item']['package_factor']; ?>
		</td>
		<!-- <td>
			<?php //echo $item['Inventory']['elaboration_date']; ?>
		</td> -->
		<td>
			<?php if($item['Inventory']['extension_date'] != '0000-00-00'): ?>
				<?php echo $item['Inventory']['extension_date']; ?>
			<?php else: ?>
				<?php echo $item['Inventory']['expiration_date']; ?>
			<?php endif; ?>
		</td>
		<!-- <td>
			<?php //echo $item['Inventory']['retest_date']; ?>
		</td> -->
		<!-- <td>
			<?php //echo $item['Inventory']['extension_date']; ?>
		</td> -->
		<?php if($item['Item']['sells_by_kg'] == 0): ?>
			<td>
				<?php echo $item['Inventory']['quantity']; ?>
			</td>
			<td>
				<?php echo $item['Inventory']['availability']; ?>
			</td>
		<?php else: ?>
			<td>
				<?php echo $item['Inventory']['kg_quantity']; ?>
			</td>
			<td>
				<?php echo $item['Inventory']['kg_availability']; ?>
			</td>
		<?php endif; ?>
		<?php if($userData['User']['role'] != '3'): ?>
			<?php if($item['Item']['sells_by_kg'] == 0): ?>
			<td>
				<?php echo $item['Inventory']['individual_cost']; ?>
			</td>
			<?php else: ?>
			<td>
				<?php echo $item['Inventory']['cost_by_kg']; ?>
			</td>
			<?php endif; ?>
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
		<?php if(!empty($this->data['Inventory']['name']) && !empty($this->data['Inventory']['organization_id'])): ?>
			<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'stock', true, 'name' => $this->data['Inventory']['name'], 'organization_id' => $this->data['Inventory']['organization_id'])) : ''); ?></li>
		<?php elseif(!empty($this->data['Inventory']['name'])): ?>
			<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'stock', true, 'name' => $this->data['Inventory']['name'])) : ''); ?></li>
		<?php elseif(!empty($this->data['Inventory']['organization_id'])): ?>
			<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'stock', true, 'organization_id' => $this->data['Inventory']['organization_id'])) : ''); ?></li>
		<?php else: ?>
			<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'stock', true)) : ''); ?></li>
		<?php endif; ?>
	  <?php endif; ?>
	</ul>
</div>
