<?php
/**
 * Copyright 2010, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="users index">
	<!-- <h2><?php //__d('users', 'Users');?></h2>
	<h3><?php //__d('users', 'Filter'); ?></h3> -->
	<?php $roles = array(
			'0' => __('Administrator', true),
			'1' => __('Manager', true),
			'2' => __('Sales/Purchases', true),
			'3' => __('Stock', true)
		);
	?>
	<header><h3><?php __d('users', 'Users');?></h3></header>
	<div class="index-filters">
	<?php 
		echo $this->Form->create($model, array('action' => 'admin_search'));
		echo $this->Form->input('username', array('div' => false,
			'label' => __d('users', 'Username', true)));
		echo $this->Form->input('email', array('div' => false,
			'label' => __d('users', 'Email', true)));
		echo $this->Form->submit(__d('users', 'Search', true), array('div' => false));
		echo $this->Form->end();
	?>
	</div>
	<?php echo $this->element('paging'); ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<!--  <th><?php //echo $this->Paginator->sort('created');?></th> -->
			<th class="actions"><?php __d('users', 'Actions');?></th>
		</tr>
			<?php
			$i = 0;
			foreach ($users as $user):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $user[$model]['username']; ?>
				</td>
				<td>
					<?php echo $user[$model]['email']; ?>
				</td>
				<td>
					<?php echo $roles[$user[$model]['role']]; ?>
				</td>
				<td>
					<?php echo $user[$model]['active'] !=0 ? __d('default', 'Yes') : __d('default', 'No') ; ?>
				</td>
				<!-- <td>
					<?php //echo $user[$model]['created']; ?>
				</td> -->	
				<td class="actions">
					<?php echo $this->Html->link(__d('users', 'View', true), array('action'=>'admin_view', $user[$model]['id'])); ?>
					<?php echo $this->Html->link(__d('users', 'Edit', true), array('action'=>'admin_edit', $user[$model]['id'])); ?>
					<?php echo $this->Html->link(__d('users', 'Delete', true), array('action'=>'delete', $user[$model]['id']), null, sprintf(__d('users', 'Are you sure you want to delete # %s?', true), $user[$model]['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo usuario', true), array('controller' => 'users', 'action' => 'admin_add', 'plugin' => 'users'))?></li>
	</ul>
</div>