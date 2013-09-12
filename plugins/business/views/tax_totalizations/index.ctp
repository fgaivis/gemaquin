<div class="taxTotalizations index">
<header><h3><?php __('Tax Totalizations');?></h3></header>
<table cellpadding="0" cellspacing="0">
<tr>
	<!-- <th><?php //echo $this->Paginator->sort('id');?></th> -->
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('year');?></th>
	<th><?php echo $this->Paginator->sort('month');?></th>
	<th><?php echo $this->Paginator->sort('purchases');?></th>
	<th><?php echo $this->Paginator->sort('sales');?></th>
	<th><?php echo $this->Paginator->sort('tax_relation');?></th>
	<th><?php echo $this->Paginator->sort('tax_withholdings');?></th>
	<th><?php echo $this->Paginator->sort('tax_holded');?></th>
	<th><?php echo $this->Paginator->sort('withholdings_relation');?></th>
	<!-- <th><?php //echo $this->Paginator->sort('created');?></th> -->
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($taxTotalizations as $taxTotalization):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<!-- <td>
			<?php //echo $taxTotalization['TaxTotalization']['id']; ?>
		</td> -->
		<td>
			<?php echo $taxTotalization['TaxTotalization']['type']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['year']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['month']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['purchases']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['sales']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['tax_relation']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['tax_withholdings']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['tax_holded']; ?>
		</td>
		<td>
			<?php echo $taxTotalization['TaxTotalization']['withholdings_relation']; ?>
		</td>
		<!-- <td>
			<?php //echo $taxTotalization['TaxTotalization']['created']; ?>
		</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $taxTotalization['TaxTotalization']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $taxTotalization['TaxTotalization']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $taxTotalization['TaxTotalization']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>
<div class="actions">
	<!-- <ul>
		<li><?php //echo $this->Html->link(__('New Tax Totalization', true), array('action' => 'add')); ?></li>
		<li><?php //echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'tax_totals_report', true)) : ''); ?></li>
	</ul> -->
</div>
