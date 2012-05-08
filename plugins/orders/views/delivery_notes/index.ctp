<div class="deliveryNotes index">
<header><h3><?php __('Delivery Notes');?></h3></header>
<!-- <p>
<?php
/*echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));*/
?></p> -->
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('sales_order_id');?></th>
	<th><?php echo $this->Paginator->sort('number');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($deliveryNotes as $deliveryNote):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($deliveryNote['SalesOrder']['number'], array('controller' => 'sales_orders', 'action' => 'view', $deliveryNote['SalesOrder']['id'])); ?>
		</td>
		<td>
			<?php echo $deliveryNote['DeliveryNote']['number']; ?>
		</td>
		<td>
			<?php echo $deliveryNote['DeliveryNote']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $deliveryNote['DeliveryNote']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $deliveryNote['DeliveryNote']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $deliveryNote['DeliveryNote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

