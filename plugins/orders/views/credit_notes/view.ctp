<div class="creditNotes view">
<header><h3><?php  __('Credit Note');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $creditNote['CreditNote']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Note'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $creditNote['CreditNote']['note']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $creditNote['CreditNote']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $creditNote['CreditNote']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related view">
	<header><h3><?php  __('Related Invoices');?></h3></header>
	<?php if (!empty($creditNote['Invoice'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Number'); ?></th>
		<th><?php __('Client'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($creditNote['Invoice'] as $invoice):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php
				echo $this->Html->link($invoice['number'], array(
					'plugin' => 'orders',
					'controller' => 'invoices',
					'action' => 'view',
					$invoice['id']
				));
			?></td>
			<td><?php echo $invoice['Organization']['name'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
