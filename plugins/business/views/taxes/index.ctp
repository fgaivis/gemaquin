<div class="taxes index">
<header><h3><?php __('Taxes', true);?></h3></header>
<table cellpadding="0" cellspacing="0">
<tr>
	<!-- <th><?php //echo $this->Paginator->sort('id');?></th> -->
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('code');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('percent_value');?></th>
	<th><?php echo $this->Paginator->sort('active');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($taxes as $tax):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<!-- <td>
			<?php //echo $tax['Tax']['id']; ?>
		</td> -->
		<td>
			<?php echo $tax['Tax']['name']; ?>
		</td>
		<td>
			<?php echo $tax['Tax']['code']; ?>
		</td>
		<td>
			<?php echo $tax['Tax']['type']; ?>
		</td>
		<td>
			<?php echo $tax['Tax']['percent_value']; ?>
		</td>
		<td>
			<?php echo $tax['Tax']['active'] == 1 ? __('Yes') : __('No'); ?>
		</td>
		<td>
			<?php echo $tax['Tax']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tax['Tax']['id'])); ?> &nbsp;|&nbsp;
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tax['Tax']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tax['Tax']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Tax', true), array('action' => 'add')); ?></li>
	</ul>
</div>
