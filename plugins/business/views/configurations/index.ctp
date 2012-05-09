<div class="configurations index">
<h2><?php __('Configurations');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
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
		<td>
			<?php echo $configuration['Configuration']['id']; ?>
		</td>
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
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $configuration['Configuration']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $configuration['Configuration']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $configuration['Configuration']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Configuration', true), array('action' => 'add')); ?></li>
	</ul>
</div>
