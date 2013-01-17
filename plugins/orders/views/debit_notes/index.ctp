<div class="debitNotes index">
<header><h3><?php  __('Debit Notes');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('number');?></th>
	<th><?php echo $this->Paginator->sort('amount');?></th>
	<th><?php echo $this->Paginator->sort('note');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($debitNotes as $debitNote):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $debitNote['DebitNote']['number']; ?>
		</td>
		<td>
			<?php echo $debitNote['DebitNote']['amount']; ?>
		</td>
		<td>
			<?php echo $debitNote['DebitNote']['note']; ?>
		</td>
		<td>
			<?php echo $debitNote['DebitNote']['created']; ?>
		</td>
		<td>
			<?php echo $debitNote['DebitNote']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $debitNote['DebitNote']['id'])); ?> &nbsp;|&nbsp;
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $debitNote['DebitNote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>