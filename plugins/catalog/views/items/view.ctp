<div class="items view">
<header><h3><?php  __('Item');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php //if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $item['Item']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Provider Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['provider_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Barcode'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['barcode']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Min Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['min_quantity']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Max Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['max_quantity']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Package Factor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['package_factor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sales Factor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['sales_factor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Weight'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['weight']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sells By Kg'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['sells_by_kg'] == 1 ? __('Yes') : __('No'); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Package Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['package_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['country']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Industry'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['industry']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($item['Category']['name'], array('controller' => 'categories', 'action' => 'view', $item['Category']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Item']['id'])); ?></li>
		</ul>
		<ul class="inner">
			<li><?php echo $this->Html->link(__('Back to list', true), array('action' => 'index')); ?></li>
		</ul>
	</div>



<div class="related index">
<header><h3><?php __('Related Organizations');?></h3></header>
	<?php if (!empty($item['Organization'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!-- <th><?php //__('Id'); ?></th> -->
		<th><?php __('Code'); ?></th>
		<th><?php __('Name'); ?></th>
		<!-- <th><?php //__('Description'); ?></th>
		<th><?php //__('Country'); ?></th> -->
		<th><?php __('Fiscalid'); ?></th>
		<th><?php __('Brand'); ?></th>
		<!-- <th><?php //__('Business'); ?></th>
		<th><?php //__('Type'); ?></th> -->
		<!-- <th><?php //__('Created'); ?></th>
		<th><?php //__('Modified'); ?></th> -->
		<?php if($userData['User']['role'] != '3'): ?>
		<th class="actions"><?php __('Actions');?></th>
		<?php endif;?>
	</tr>
	<?php
		$i = 0;
		foreach ($item['Organization'] as $organization):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php //echo $organization['id'];?></td> -->
			<td><?php echo $organization['code'];?></td>
			<td><?php echo $organization['name'];?></td>
			<!-- <td><?php //echo $organization['description'];?></td>
			<td><?php //echo $organization['country'];?></td> -->
			<td><?php echo $organization['fiscalid'];?></td>
			<td><?php echo $organization['brand'];?></td>
			<!-- <td><?php //echo $organization['business'];?></td>
			<td><?php //echo $organization['type'];?></td> -->
			<!-- <td><?php //echo $organization['created'];?></td>
			<td><?php //echo $organization['modified'];?></td> -->
			<?php if($userData['User']['role'] != '3'): ?>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'providers', 'action' => 'view', 'plugin' => 'business', $organization['id'])); ?> &nbsp;|&nbsp;
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'providers', 'action' => 'edit', 'plugin' => 'business', $organization['id'])); ?>
				<?php //echo $this->Html->link(__('Delete', true), array('controller' => 'organizations', 'action' => 'delete', $organization['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $organization['id'])); ?>
			</td>
			<?php endif;?>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

	

