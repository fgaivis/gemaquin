<div class="bankAccounts form">
<?php echo $this->Form->create('BankAccount', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Bank Account');?></h3></header>

	<fieldset>

	<?php
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
