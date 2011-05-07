<div class="clients index">
<header><h3><?php __('Clients');?></h3></header>
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
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($clients as $client):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $client['Client']['id']; ?>
		</td>
		<td>
			<?php echo $client['Client']['code']; ?>
		</td>
		<td>
			<?php echo $client['Client']['name']; ?>
		</td>
		<td>
			<?php echo $client['Client']['description']; ?>
		</td>
		<td>
			<?php echo $client['Client']['country']; ?>
		</td>
		<td>
			<?php echo $client['Client']['fiscalid']; ?>
		</td>
		<td>
			<?php echo $client['Client']['brand']; ?>
		</td>
		<td>
			<?php echo $client['Client']['business']; ?>
		</td>
		<td>
			<?php echo $client['Client']['created']; ?>
		</td>
		<td>
			<?php echo $client['Client']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $client['Client']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Client', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses', true), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address', true), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Accounts', true), array('controller' => 'bank_accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Account', true), array('controller' => 'bank_accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>

