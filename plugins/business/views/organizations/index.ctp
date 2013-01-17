<div class="organizations index">
<header><h3><?php __('Organizations');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('code');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('country');?></th>
	<th><?php echo $this->Paginator->sort('fiscalid');?></th>
	<th><?php echo $this->Paginator->sort('brand');?></th>
	<th><?php echo $this->Paginator->sort('business');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($organizations as $organization):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $organization['Organization']['id']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['code']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['name']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['description']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['country']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['fiscalid']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['brand']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['business']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['type']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['created']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $organization['Organization']['id'])); ?> &nbsp;|&nbsp;
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $organization['Organization']['id'])); ?> &nbsp;|&nbsp;
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $organization['Organization']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>


