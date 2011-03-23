<div class="providers index">
<h2><?php __('Providers');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('code');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('country');?></th>
	<th><?php echo $this->Paginator->sort('fiscalid');?></th>
	<th><?php echo $this->Paginator->sort('brand');?></th>
	<th><?php echo $this->Paginator->sort('business');?></th>
	<th><?php echo $this->Paginator->sort('is_myself');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($providers as $provider):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $provider['Provider']['id']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['code']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['name']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['description']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['country']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['fiscalid']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['brand']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['business']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['is_myself']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['type']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['created']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $provider['Provider']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $provider['Provider']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $provider['Provider']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Provider', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses', true), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address', true), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Accounts', true), array('controller' => 'bank_accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Account', true), array('controller' => 'bank_accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>
