<div class="clients view">
<header><h3><?php  __('Client');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php //if ($i % 2 == 0) echo $class;?>><?php //__('Id'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $client['Client']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['country']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fiscalid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['fiscalid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Brand'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['brand']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Business'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['business']; ?>
			&nbsp;
		</dd>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['phone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['fax']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Website'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['website']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Max Debt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['max_debt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Actual Debt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['actual_debt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Payment Conditions'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['payment_conditions']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['observations']; ?>
			&nbsp;
		</dd>
		<!-- <dt<?php //if ($i % 2 == 0) echo $class;?>><?php //__('Created'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $client['Client']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php //if ($i % 2 == 0) echo $class;?>><?php //__('Modified'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $client['Client']['modified']; ?>
			&nbsp;
		</dd> -->
	</dl>
</div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $client['Client']['id'])); ?></li>
		</ul>
	</div>

<div class="related index">
	<header><h3><?php __('Related Addresses');?></h3></header>
	<?php if (!empty($client['Address'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!-- <th><?php //__('Id'); ?></th>
		<th><?php //__('Organization Id'); ?></th>  -->
		<th><?php __('Type'); ?></th>
		<th><?php __('Phone'); ?></th>
		<!-- <th><?php //__('Address 1'); ?></th>
		<th><?php //__('Address 2'); ?></th> -->
		<th><?php __('City'); ?></th>
		<th><?php __('State'); ?></th>
		<th><?php __('Country'); ?></th>
		<!-- <th><?php //__('Zip'); ?></th>
		<th><?php //__('Notes'); ?></th>
		<th><?php //__('Created'); ?></th>
		<th><?php //__('Modified'); ?></th>  -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Address'] as $address):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php //echo $address['id'];?></td>
			<td><?php //echo $address['organization_id'];?></td>  -->
			<td><?php echo $address['type'];?></td>
			<td><?php echo $address['phone'];?></td>
			<!-- <td><?php //echo $address['address_1'];?></td>
			<td><?php //echo $address['address_2'];?></td> -->
			<td><?php echo $address['city'];?></td>
			<td><?php echo $address['state'];?></td>
			<td><?php echo $address['country'];?></td>
			<!-- <td><?php //echo $address['zip'];?></td>
			<td><?php //echo $address['notes'];?></td>
			<td><?php //echo $address['created'];?></td>
			<td><?php //echo $address['modified'];?></td>  -->
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?> &nbsp;|&nbsp;
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?> &nbsp;|&nbsp;
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'addresses', 'action' => 'delete', $address['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $address['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva dirección', true), array('controller' => 'addresses', 'action' => 'add', 'plugin' => 'business', 'admin' => false, $client['Client']['id']))?></li>
		</ul>
	</div>

<?php if($userData['User']['role'] != '2'): ?>	
<div class="related index">
	<header><h3><?php __('Related Bank Accounts');?></h3></header>
	<?php if (!empty($client['BankAccount'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!-- <th><?php //__('Id'); ?></th>
		<th><?php //__('Organization Id'); ?></th>  -->
		<th><?php __('Bank Name'); ?></th>
		<th><?php __('Currency'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Number'); ?></th>
		<!-- <th><?php //__('Address 1'); ?></th>
		<th><?php //__('Address 2'); ?></th> -->
		<th><?php __('Country'); ?></th>
		<!-- <th><?php //__('Iban'); ?></th>
		<th><?php //__('Aba'); ?></th>
		<th><?php //__('Swift'); ?></th>
		<th><?php //__('Notes'); ?></th>
		<th><?php //__('Created'); ?></th>
		<th><?php //__('Modified'); ?></th>  -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['BankAccount'] as $bankAccount):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php //echo $bankAccount['id'];?></td>
			<td><?php //echo $bankAccount['organization_id'];?></td> -->
			<td><?php echo $bankAccount['bank_name'];?></td>
			<td><?php echo $bankAccount['currency'];?></td>
			<td><?php echo $bankAccount['type'];?></td>
			<td><?php echo $bankAccount['number'];?></td>
			<!-- <td><?php //echo $bankAccount['address_1'];?></td>
			<td><?php //echo $bankAccount['address_2'];?></td> -->
			<td><?php echo $bankAccount['country'];?></td>
			<!-- <td><?php //echo $bankAccount['iban'];?></td>
			<td><?php //echo $bankAccount['aba'];?></td>
			<td><?php //echo $bankAccount['swift'];?></td>
			<td><?php //echo $bankAccount['notes'];?></td>
			<td><?php //echo $bankAccount['created'];?></td>
			<td><?php //echo $bankAccount['modified'];?></td>  -->
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'bank_accounts', 'action' => 'view', $bankAccount['id'])); ?> &nbsp;|&nbsp;
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'bank_accounts', 'action' => 'edit', $bankAccount['id'])); ?> &nbsp;|&nbsp;
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'bank_accounts', 'action' => 'delete', $bankAccount['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bankAccount['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva cuenta bancaria', true), array('controller' => 'bank_accounts', 'action' => 'add', 'plugin' => 'business', 'admin' => false, $client['Client']['id']))?></li>
		</ul>
	</div>
<?php endif;?>
	
<div class="related index">
	<header><h3><?php __('Related Contacts');?></h3></header>
	<?php if (!empty($client['Contact'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!-- <th><?php //__('Id'); ?></th>
		<th><?php //__('Organization Id'); ?></th>  -->
		<th><?php __('Name'); ?></th>
		<!-- <th><?php //__('Email'); ?></th> -->
		<th><?php __('Phone'); ?></th>
		<th><?php __('Mobile'); ?></th>
		<th><?php __('Position'); ?></th>
		<!-- <th><?php //__('Role'); ?></th>
		<th><?php //__('Created'); ?></th>
		<th><?php //__('Modified'); ?></th>  -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Contact'] as $contact):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php //echo $contact['id'];?></td>
			<td><?php //echo $contact['organization_id'];?></td>  -->
			<td><?php echo $contact['name'];?></td>
			<!-- <td><?php //echo $contact['email'];?></td> -->
			<td><?php echo $contact['phone'];?></td>
			<td><?php echo $contact['mobile'];?></td>
			<td><?php echo $contact['position'];?></td>
			<!-- <td><?php //echo $contact['role'];?></td>
			<td><?php //echo $contact['created'];?></td>
			<td><?php //echo $contact['modified'];?></td>  -->
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?> &nbsp;|&nbsp;
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'contacts', 'action' => 'edit', $contact['id'])); ?> &nbsp;|&nbsp;
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'contacts', 'action' => 'delete', $contact['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contact['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo contacto', true), array('controller' => 'contacts', 'action' => 'add', 'plugin' => 'business', 'admin' => false, $client['Client']['id'], $client['Client']['phone'], $client['Client']['email']))?></li>
		</ul>
	</div>	

