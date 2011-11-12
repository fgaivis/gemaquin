<div class="invoices index">
<header><h3><?php __('Invoices');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('number');?></th>
	<th><?php echo $this->Paginator->sort('organization_id');?></th>
	<th><?php echo $this->Paginator->sort('subtotal');?></th>
	<th><?php echo $this->Paginator->sort('tax');?></th>
	<th><?php echo $this->Paginator->sort('total');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($invoices as $invoice):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $invoice['Invoice']['number']; ?>
		</td>
		<td>
			<?php
				$controller = $invoice['Invoice']['type'] === Invoice::SALES ? 'clients' : 'providers';
			?>
			<?php
				echo $this->Html->link(
					$invoice['Organization']['name'], array(
						'plugin' => 'business',
						'controller' => $controller, 'action' => 'view', $invoice['Organization']['id']
				));
			?>
		</td>
		<td>
			<?php echo $this->Number->format($invoice['Invoice']['subtotal']); ?>
		</td>   
		<td>           
			<?php echo $this->Number->format($invoice['Invoice']['tax']); ?>
		</td>
		<td>
			<?php echo $this->Number->format($invoice['Invoice']['total']); ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['type']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $invoice['Invoice']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>
