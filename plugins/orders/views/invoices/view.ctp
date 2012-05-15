<div class="invoices view">
<header><h3><?php  __('Invoice');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Control'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['control']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($invoice['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $invoice['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['subtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['tax']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['total']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Insurance'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['insurance']; ?>
			&nbsp;
		</dd>
		<?php if($invoice['Invoice']['type'] != Invoice::SALES) : ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shipping'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['shipping']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Customs Tax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['customs_tax']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Customs Adm'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['customs_adm']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Internal Shipping'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['internal_shipping']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['type'] === Invoice::DRAFT ? __d('default', 'DRAFTINV', true) : __d('default', $invoice['Invoice']['type'], true); ?>
			&nbsp;
		</dd>
		<?php if($invoice['Invoice']['type'] != Invoice::SALES) : ?>
		<?php if (empty($invoice['Invoice']['hard_copy'])): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Files'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php 
					echo $this->Form->create('Invoice',  array('type' => 'file', 'url' => $this->passedArgs));
					echo $this->Form->input("Invoice.id", array('value' => $invoice['Invoice']['id']));
					echo $this->Form->file("Invoice.file");
					echo $this->Form->end(__('Send Hard Copy', true));
				?>
			</dd>
		<?php else: ?>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Files'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link(__('Hard Copy', true), '/files/invoices/' . $invoice['Invoice']['hard_copy']) ?>
			</dd>
		<?php endif;?>
		<?php endif;?>
	</dl>
	<div class="actions">
		<ul>
	<?php if($invoice['Invoice']['type'] === Invoice::SALES) : ?>
			<li>
				<?php echo $this->Html->link(__('Generate Credit Note', true), array('controller' => 'credit_notes', 'action' => 'add', $invoice['Invoice']['id'])); ?>
			</li>
			<li>
				<?php echo $this->Html->link(__('Generate Debit Note', true), array('controller' => 'debit_notes', 'action' => 'add', $invoice['Invoice']['id'])); ?>
			</li>
			<li><?php echo $this->Html->link(__('Print invoice', true), array('action' => 'print_invoice', $invoice['Invoice']['id'])); ?></li>
	<?php endif; ?>
		</ul>
		<br/>
		<br/>
	</div>
</div>
<?php if($invoice['Invoice']['type'] != Invoice::SERVICE) : ?>
<div class="view related">
	<?php if (isset($invoice['PurchaseOrder']['id']) || isset($invoice['PrePurchaseOrder']['id']) || isset($invoice['SalesOrder']['id'])):?>
		<?php 
			if (isset($invoice['PurchaseOrder']['id'])) {
				$order = $invoice['PurchaseOrder'];
			}
			else if (isset($invoice['PrePurchaseOrder']['id'])) {
				$order = $invoice['PrePurchaseOrder'];
			}
			else if (isset($invoice['SalesOrder']['id'])) {
				$order = $invoice['SalesOrder'];
			}
		?>
	<h3><?php __('Related Orders');?></h3>
	<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php __('Number'); ?></th>
			<th><?php __('Organization Name'); ?></th>
			<th><?php __('Status'); ?></th>
		</tr>		
		<tr>
			<td><?php echo $order['number'];?></td>
			<?php if(isset($invoice['SalesOrder']['id'])): ?>
				<td><?php echo $order['Client']['name'];?></td>
			<?php elseif (isset($invoice['PrePurchaseOrder']['id'])) : ?>
				<td><?php echo $invoice['Organization']['name'];?></td>
			<?php else:?>
				<td><?php echo $order['Provider']['name'];?></td>
			<?php endif; ?>
			<td><?php echo __d('default', $order['status'], true);  ?></td>
		</tr>
	</table>
	<?php endif;?>
</div>
<div class="view related">
	<h3><?php __('Related Items');?></h3>
	<?php if (!empty($invoice['InvoicesItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
		<!-- <th><?php //__('Description'); ?></th> -->
		<th><?php __('Barcode'); ?></th>
		<th><?php __('Package Factor'); ?></th>
		<th><?php __('Sales Factor'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Unit Price'); ?></th>
		<th><?php __('Total Price'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($invoice['InvoicesItem'] as $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $item['Item']['name'];?></td>
			<!-- <td><?php //echo $item['Item']['description'];?></td> -->
			<td><?php echo $item['Item']['barcode'];?></td>
			<td><?php echo $item['Item']['package_factor'];?></td>
			<td><?php echo $item['Item']['sales_factor'];?></td>
			<td><?php echo $item['quantity'];?></td>
			<td><?php echo $item['individual_cost'];?></td>
			<td><?php echo $item['quantity'] * $item['individual_cost'];?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<?php if (!empty($invoice['CreditNote'])):?>
<div class="view related">
	<h3><?php __('Related Credit Notes');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Number'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Note'); ?></th>
		<th><?php __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($invoice['CreditNote'] as $note):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $note['number'];?></td>
			<td><?php echo $note['amount'];?></td>
			<td><?php echo h($note['note']);?></td>
			<td><?php echo $this->Html->link(__('Print', true), array('controller' => 'credit_notes', 'action' => 'print_note', $note['id']))?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>
<?php endif; ?>
<?php if (!empty($invoice['DebitNote'])):?>
<div class="view related">
	<h3><?php __('Related Debit Notes');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Number'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Note'); ?></th>
		<th><?php __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($invoice['DebitNote'] as $note):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $note['number'];?></td>
			<td><?php echo $note['amount'];?></td>
			<td><?php echo h($note['note']);?></td>
			<td><?php echo $this->Html->link(__('Print', true), array('controller' => 'debit_notes', 'action' => 'print_note', $note['id']))?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>
<?php endif; ?>
<?php endif;?>
