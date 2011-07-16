<div class="purchaseOrders view">
<header><h3><?php  __('Purchase Order');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrder['PurchaseOrder']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrder['PurchaseOrder']['number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Provider'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrder['Provider']['name'], array('controller' => 'organizations', 'action' => 'view', $purchaseOrder['Provider']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Invoice'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrder['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $purchaseOrder['Invoice']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrder['PurchaseOrder']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php __('Items');?></h3>
	<?php if (!empty($purchaseOrder['Item'])):?>
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

	</tr>
	<?php
		$i = 0;
		foreach ($purchaseOrder['Item'] as $item):
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
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<?php if ($purchaseOrder['PurchaseOrder']['status'] == PurchaseOrder::DRAFT) :?>
<?php echo $this->Form->create('PurchaseOrder', array('url' => array('action' => 'send')));?>
<?php echo $this->Form->hidden('PurchaseOrder.id', array('value' => $purchaseOrder['PurchaseOrder']['id']));?>
<?php echo $this->Form->end(array('label'=>__('Send', true),'id'=>'send'));?>
<?php endif;?>
<?php echo $this->Form->create('PurchaseOrder', array('url' => array('plugin' => 'orders', 'controller' => 'invoices', 'action' => 'add')));?>
<?php echo $this->Form->hidden('PurchaseOrder.id', array('value' => $purchaseOrder['PurchaseOrder']['id']));?>
<?php echo $this->Form->hidden('Invoice.type', array('value' => Invoice::PURCHASE));?>
<?php echo $this->Form->end(array('label'=>__('Add Invoice', true),'id'=>'addInvoice'));?>
<?php echo $this->Form->create('PurchaseOrder', array('url' => array('plugin' => 'orders', 'controller' => 'invoices', 'action' => 'add')));?>
<?php echo $this->Form->hidden('PurchaseOrder.id', array('value' => $purchaseOrder['PurchaseOrder']['id']));?>
<?php echo $this->Form->hidden('Invoice.type', array('value' => Invoice::DRAFT));?>
<?php echo $this->Form->end(array('label'=>__('Add Draft Invoice', true),'id'=>'addInvoice'));?>
