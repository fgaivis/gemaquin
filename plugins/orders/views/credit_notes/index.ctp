<div class="creditNotes index">
<header><h3><?php __('Credit Notes');?></h3></header>
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
foreach ($creditNotes as $creditNote):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $creditNote['CreditNote']['number']; ?>
		</td>
		<td>
			<?php echo $creditNote['CreditNote']['amount']; ?>
		</td>
		<td>
			<?php echo $creditNote['CreditNote']['note']; ?>
		</td>
		<td>
			<?php echo $creditNote['CreditNote']['created']; ?>
		</td>
		<td>
			<?php echo $creditNote['CreditNote']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $creditNote['CreditNote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $creditNote['CreditNote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>
