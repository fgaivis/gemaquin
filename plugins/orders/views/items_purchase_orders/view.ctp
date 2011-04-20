<div class="itemsPurchaseOrders view">
<h2><?php  __('Items Purchase Order');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsPurchaseOrder['ItemsPurchaseOrder']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($itemsPurchaseOrder['Item']['name'], array('controller' => 'items', 'action' => 'view', $itemsPurchaseOrder['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Purchase Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($itemsPurchaseOrder['PurchaseOrder']['number'], array('controller' => 'purchase_orders', 'action' => 'view', $itemsPurchaseOrder['PurchaseOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsPurchaseOrder['ItemsPurchaseOrder']['quantity']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Items Purchase Order', true), array('action' => 'edit', $itemsPurchaseOrder['ItemsPurchaseOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Items Purchase Order', true), array('action' => 'delete', $itemsPurchaseOrder['ItemsPurchaseOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items Purchase Orders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Items Purchase Order', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Orders', true), array('controller' => 'purchase_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order', true), array('controller' => 'purchase_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
