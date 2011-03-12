<div class="addresses index">
<h2><?php __('Addresses');?></h2>
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
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('phone');?></th>
	<th><?php echo $this->Paginator->sort('address_1');?></th>
	<th><?php echo $this->Paginator->sort('address_2');?></th>
	<th><?php echo $this->Paginator->sort('city');?></th>
	<th><?php echo $this->Paginator->sort('state');?></th>
	<th><?php echo $this->Paginator->sort('country');?></th>
	<th><?php echo $this->Paginator->sort('zip');?></th>
	<th><?php echo $this->Paginator->sort('notes');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($addresses as $address):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $address['Address']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($address['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $address['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $address['Address']['type']; ?>
		</td>
		<td>
			<?php echo $address['Address']['phone']; ?>
		</td>
		<td>
			<?php echo $address['Address']['address_1']; ?>
		</td>
		<td>
			<?php echo $address['Address']['address_2']; ?>
		</td>
		<td>
			<?php echo $address['Address']['city']; ?>
		</td>
		<td>
			<?php echo $address['Address']['state']; ?>
		</td>
		<td>
			<?php echo $address['Address']['country']; ?>
		</td>
		<td>
			<?php echo $address['Address']['zip']; ?>
		</td>
		<td>
			<?php echo $address['Address']['notes']; ?>
		</td>
		<td>
			<?php echo $address['Address']['created']; ?>
		</td>
		<td>
			<?php echo $address['Address']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $address['Address']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Address', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
