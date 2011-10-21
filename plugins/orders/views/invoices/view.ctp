<div class="invoices view">
<header><h3><?php  __('Invoice');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['id']; ?>
			&nbsp;
		</dd>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Internal Shipping'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['internal_shipping']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['type']; ?>
			&nbsp;
		</dd>
	</dl>
	<?php if($invoice['Invoice']['type'] === Invoice::SALES) : ?>
	<footer>
		<p style="margin-left: 10px;"><?php echo $this->Html->link(__('Print invoice', true), array('action' => 'print_invoice', $invoice['Invoice']['id'])); ?></p>
	</footer>
	<?php endif; ?>
</div>
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
			<td><?php echo $order['status'];?></td>
			<?php else:?>
			<td><?php echo $order['Provider']['name'];?></td>
			<td><?php echo $order['status'];?></td>
			<?php endif; ?>
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
		<th><?php __('Description'); ?></th>
		<th><?php __('Barcode'); ?></th>
		<th><?php __('Package Factor'); ?></th>
		<th><?php __('Sales Factor'); ?></th>
		<th><?php __('Weight'); ?></th>
		<th><?php __('Country'); ?></th>
		<th><?php __('Industry'); ?></th>
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
			<td><?php echo $item['Item']['description'];?></td>
			<td><?php echo $item['Item']['barcode'];?></td>
			<td><?php echo $item['Item']['package_factor'];?></td>
			<td><?php echo $item['Item']['sales_factor'];?></td>
			<td><?php echo $item['Item']['weight'];?></td>
			<td><?php echo $item['Item']['country'];?></td>
			<td><?php echo $item['Item']['industry'];?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
