<div class="bankAccounts index">
<header><h3><?php __('Bank Accounts');?></h3></header>
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
	<th><?php echo $this->Paginator->sort('bank_name');?></th>
	<th><?php echo $this->Paginator->sort('currency');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('number');?></th>
	<th><?php echo $this->Paginator->sort('address_1');?></th>
	<th><?php echo $this->Paginator->sort('address_2');?></th>
	<th><?php echo $this->Paginator->sort('country');?></th>
	<th><?php echo $this->Paginator->sort('iban');?></th>
	<th><?php echo $this->Paginator->sort('aba');?></th>
	<th><?php echo $this->Paginator->sort('swift');?></th>
	<th><?php echo $this->Paginator->sort('notes');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($bankAccounts as $bankAccount):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $bankAccount['BankAccount']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($bankAccount['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $bankAccount['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['bank_name']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['currency']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['type']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['number']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['address_1']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['address_2']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['country']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['iban']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['aba']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['swift']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['notes']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['created']; ?>
		</td>
		<td>
			<?php echo $bankAccount['BankAccount']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $bankAccount['BankAccount']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $bankAccount['BankAccount']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $bankAccount['BankAccount']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Bank Account', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
