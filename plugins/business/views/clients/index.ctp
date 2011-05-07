<div class="clients index">
<header><h3><?php __('Clients');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('code');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('country');?></th>
	<th><?php echo $this->Paginator->sort('fiscalid');?></th>
	<th><?php echo $this->Paginator->sort('brand');?></th>
	<th><?php echo $this->Paginator->sort('business');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($clients as $client):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $client['Client']['code']; ?>
		</td>
		<td>
			<?php echo $client['Client']['name']; ?>
		</td>
		<td>
			<?php echo $client['Client']['description']; ?>
		</td>
		<td>
			<?php echo $client['Client']['country']; ?>
		</td>
		<td>
			<?php echo $client['Client']['fiscalid']; ?>
		</td>
		<td>
			<?php echo $client['Client']['brand']; ?>
		</td>
		<td>
			<?php echo $client['Client']['business']; ?>
		</td>
		<td>
			<?php echo $client['Client']['created']; ?>
		</td>
		<td>
			<?php echo $client['Client']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $client['Client']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>



