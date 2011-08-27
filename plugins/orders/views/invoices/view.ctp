<div class="invoices view">
<h2><?php  __('Invoice');?></h2>
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
</div>
<div class="related">
	<h3><?php __('Related Purchase Orders');?></h3>
	<?php if (isset($invoice['PurchaseOrder']['id']) || isset($invoice['PrePurchaseOrder']['id'])):?>
		<?php $purchaseOrder = (isset($invoice['PurchaseOrder']['id']) ? $invoice['PurchaseOrder'] : $invoice['PrePurchaseOrder']); ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Number'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Status'); ?></th>
	</tr>
		
		<tr>
			<td><?php echo $purchaseOrder['id'];?></td>
			<td><?php echo $purchaseOrder['number'];?></td>
			<td><?php echo $purchaseOrder['organization_id'];?></td>
			<td><?php echo $purchaseOrder['status'];?></td>
		</tr>
	</table>
<?php endif; ?>
</div>
<!--  <div class="related">
	<h3><?php __('Related Items');?></h3>
	<?php if (!empty($invoice['Item'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Barcode'); ?></th>
		<th><?php __('Package Factor'); ?></th>
		<th><?php __('Sales Factor'); ?></th>
		<th><?php __('Weight'); ?></th>
		<th><?php __('Country'); ?></th>
		<th><?php __('Industry'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($invoice['Item'] as $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $item['id'];?></td>
			<td><?php echo $item['name'];?></td>
			<td><?php echo $item['description'];?></td>
			<td><?php echo $item['barcode'];?></td>
			<td><?php echo $item['package_factor'];?></td>
			<td><?php echo $item['sales_factor'];?></td>
			<td><?php echo $item['weight'];?></td>
			<td><?php echo $item['country'];?></td>
			<td><?php echo $item['industry'];?></td>
			<td><?php echo $item['category_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'items', 'action' => 'delete', $item['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
-->