<div class="itemsPurchaseOrders view">
<header><h3><?php  __('Items Purchase Order');?></h3></header>
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

