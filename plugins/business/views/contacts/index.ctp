<div class="contacts index">
<h2><?php __('Contacts');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('organization_id');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('email');?></th>
	<th><?php echo $this->Paginator->sort('phone');?></th>
	<th><?php echo $this->Paginator->sort('mobile');?></th>
	<th><?php echo $this->Paginator->sort('position');?></th>
	<th><?php echo $this->Paginator->sort('role');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($contacts as $contact):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $contact['Contact']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($contact['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $contact['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $contact['Contact']['name']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['email']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['phone']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['mobile']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['position']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['role']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['created']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $contact['Contact']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $contact['Contact']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $contact['Contact']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging',array('plugin'=>'templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Contact', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>