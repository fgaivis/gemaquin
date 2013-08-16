<div class="configurations index">
<header><h3><?php __('Configuration Parameters');?></h3></header>
<table cellpadding="0" cellspacing="0">
<tr>
	<!-- <th><?php //echo $this->Paginator->sort('id');?></th> -->
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('value');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($configurations as $configuration):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<!-- <td>
			<?php //echo $configuration['Configuration']['id']; ?>
		</td> -->
		<td>
			<?php echo $configuration['Configuration']['name']; ?>
		</td>
		<td>
			<?php echo $configuration['Configuration']['description']; ?>
		</td>
		<td>
			<?php echo $configuration['Configuration']['value']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $configuration['Configuration']['id'])); ?> &nbsp;|&nbsp;
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $configuration['Configuration']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $configuration['Configuration']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Configuration Parameter', true), array('action' => 'add')); ?></li>
	</ul>
</div>
