<div class="providers index">
<header><h3><?php __('Providers');?></h3></header>

<table cellpadding="0" cellspacing="0">
<tr>
	<!-- <th><?php //echo $this->Paginator->sort('id');?></th> -->
	<th><?php echo $this->Paginator->sort('code');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<!-- <th><?php //echo $this->Paginator->sort('description');?></th>
	<th><?php //echo $this->Paginator->sort('country');?></th> -->
	<th><?php echo $this->Paginator->sort('fiscalid');?></th>
	<th><?php echo $this->Paginator->sort('brand');?></th>
	<!-- <th><?php //echo $this->Paginator->sort('business');?></th>
	<th><?php //echo $this->Paginator->sort('created');?></th>
	<th><?php //echo $this->Paginator->sort('modified');?></th> -->
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($providers as $provider):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<!-- <td>
			<?php //echo $provider['Provider']['id']; ?>
		</td>  -->
		<td>
			<?php echo $provider['Provider']['code']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['name']; ?>
		</td>
		<!-- <td>
			<?php //echo $provider['Provider']['description']; ?>
		</td>
		<td>
			<?php //echo $provider['Provider']['country']; ?>
		</td> -->
		<td>
			<?php echo $provider['Provider']['fiscalid']; ?>
		</td>
		<td>
			<?php echo $provider['Provider']['brand']; ?>
		</td>
		<!-- <td>
			<?php //echo $provider['Provider']['business']; ?>
		</td>
		<td>
			<?php //echo $provider['Provider']['created']; ?>
		</td>
		<td>
			<?php //echo $provider['Provider']['modified']; ?>
		</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $provider['Provider']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $provider['Provider']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $provider['Provider']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo proveedor', true), array('controller' => 'providers', 'action' => 'add', 'plugin' => 'business', 'admin' => false))?></li>
	</ul>
</div>


