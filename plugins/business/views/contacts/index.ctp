<div class="contacts index">
<header><h3><?php __('Contacts');?></h3></header>
	<div class="index-filters">
	<?php

    echo $this->Form->create(null, array(
        'url' => array_merge(array('action' => 'index'), $this->params['pass'])
    ));
    echo $this->Form->input('name', array('div' => false));
    echo $this->Form->input('organization_id', array('div' => false, 'empty' =>__('Select',true)));
    echo $this->Form->submit(__('Search', true), array('div' => false));
    echo $this->Form->end();

    ?>
    </div>
<table cellpadding="0" cellspacing="0">
<tr>
	<!-- <th><?php //echo $this->Paginator->sort('id');?></th> -->
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('organization_id');?></th>
	<!-- <th><?php //echo $this->Paginator->sort('email');?></th> -->
	<th><?php echo $this->Paginator->sort('phone');?></th>
	<!-- <th><?php //echo $this->Paginator->sort('mobile');?></th> -->
	<!-- <th><?php //echo $this->Paginator->sort('position');?></th> -->
	<!-- <th><?php //echo $this->Paginator->sort('role');?></th>
	<th><?php //echo $this->Paginator->sort('created');?></th>
	<th><?php //echo $this->Paginator->sort('modified');?></th>  -->
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
		<!-- <td>
			<?php //echo $contact['Contact']['id']; ?>
		</td> -->
		<td>
			<?php echo $contact['Contact']['name']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($contact['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $contact['Organization']['id'])); ?>
		</td>
		<!-- <td>
			<?php //echo $contact['Contact']['email']; ?>
		</td> -->
		<td>
			<?php echo $contact['Contact']['phone']; ?>
		</td>
		<!-- <td>
			<?php //echo $contact['Contact']['mobile']; ?>
		</td>
		<td>
			<?php //echo $contact['Contact']['position']; ?>
		</td> -->
		<!-- <td>
			<?php //echo $contact['Contact']['role']; ?>
		</td>
		<td>
			<?php //echo $contact['Contact']['created']; ?>
		</td>
		<td>
			<?php //echo $contact['Contact']['modified']; ?>
		</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $contact['Contact']['id'])); ?> &nbsp;|&nbsp;
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $contact['Contact']['id'])); ?> &nbsp;|&nbsp;
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $contact['Contact']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo contacto', true), array('controller' => 'contacts', 'action' => 'add', 'plugin' => 'business', 'admin' => false))?></li>
	</ul>
</div>

