<div class="bankAccounts view">
<header><h3><?php  __('Bank Account');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php //if ($i % 2 == 0) echo $class;?>><?php //__('Id'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $bankAccount['BankAccount']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($bankAccount['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $bankAccount['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bank Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['bank_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Currency'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['currency']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Address 1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['address_1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Address 2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['address_2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['country']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Iban'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['iban']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aba'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['aba']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Swift'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['swift']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bankAccount['BankAccount']['notes']; ?>
			&nbsp;
		</dd>
		<!-- <dt<?php //if ($i % 2 == 0) echo $class;?>><?php //__('Created'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $bankAccount['BankAccount']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php //if ($i % 2 == 0) echo $class;?>><?php //__('Modified'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $bankAccount['BankAccount']['modified']; ?>
			&nbsp;
		</dd> -->
	</dl>
</div>

