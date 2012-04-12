<?php App::import('Model', 'Orders.Invoice'); ?>
<div class="salesOrders view">
<header><h3><?php  __('Sales Order');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php //if ($i % 2 == 0) echo $class;?>><?php //__('Id'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $salesOrder['SalesOrder']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salesOrder['SalesOrder']['number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Client'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($salesOrder['Client']['name'], array('controller' => 'clients', 'action' => 'view', 'plugin' => 'business', $salesOrder['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Invoice'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($salesOrder['Invoice']['number'], array('controller' => 'invoices', 'action' => 'view', $salesOrder['Invoice']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo __d('default', $salesOrder['SalesOrder']['status'], true);  ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related index">
	<h3><?php __('Items');?></h3>
	<?php if (!empty($salesOrder['InventoryItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!-- <th><?php //__('Id'); ?></th> -->
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Barcode'); ?></th>
		<th><?php __('Package Factor'); ?></th>
		<th><?php __('Sales Factor'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<!-- <th><?php //__('Country'); ?></th>
		<th><?php //__('Industry'); ?></th> 
		<th><?php //__('Category Id'); ?></th> -->

	</tr>
	<?php
		$i = 0;
		foreach ($salesOrder['InventoryItem'] as $itm=>$item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php //echo $item['id'];?></td> -->
			<td><?php echo $item['Item']['name'];?></td>
			<td><?php echo $item['Item']['description'];?></td>
			<td><?php echo $item['Item']['barcode'];?></td>
			<td><?php echo $item['Item']['package_factor'];?></td>
			<td><?php echo $item['Item']['sales_factor'];?></td>
			<td><?php echo $salesOrder['InvItemsSalesOrder'][$itm]['quantity'];?></td>
			<!-- <td><?php //echo $item['country'];?></td>
			<td><?php //echo $item['industry'];?></td>
			<td><?php //echo $item['category_id'];?></td> -->
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="actions">
<?php //if ($salesOrder['SalesOrder']['status'] == SalesOrder::DRAFT) :?>
	<?php //echo $this->Form->create('SalesOrder', array('url' => array('action' => 'send')));?>
	<?php //echo $this->Form->hidden('SalesOrder.id', array('value' => $salesOrder['SalesOrder']['id']));?>
	<?php //echo $this->Form->end(array('label'=>__('Send', true),'id'=>'send'));?>
<?php //endif;?>
<?php if (in_array($salesOrder['SalesOrder']['status'], array(SalesOrder::DRAFT, SalesOrder::SENT))) : ?>
	<?php echo $this->Form->create('SalesOrder', array('url' => array('plugin' => 'orders', 'controller' => 'invoices', 'action' => 'add')));?>
	<?php echo $this->Form->hidden('SalesOrder.id', array('value' => $salesOrder['SalesOrder']['id']));?>
	<?php echo $this->Form->hidden('Organization.id', array('value' => $salesOrder['Client']['id']));?>
	<?php echo $this->Form->hidden('Invoice.type', array('value' => Invoice::SALES));?>
	<?php echo $this->Form->end(array('label'=>__('Add Invoice', true),'id'=>'addInvoice'));?>
<?php endif;?>
</div>
