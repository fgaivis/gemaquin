<div class="bankAccounts form">
<?php echo $this->Form->create('BankAccount', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Bank Account');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('bank_name');
		echo $this->Form->input('currency');
		echo $this->Form->input('type');
		echo $this->Form->input('number');
		echo $this->Form->input('address_1');
		echo $this->Form->input('address_2');
		echo $this->Form->input('country');
		echo $this->Form->input('iban');
		echo $this->Form->input('aba');
		echo $this->Form->input('swift');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('BankAccount.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bank Accounts', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>