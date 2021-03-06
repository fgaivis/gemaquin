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
<div class="users view">
<header><h3><?php  __d('users', 'User');?></h3></header>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('users', 'Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user[$model]['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('users', 'Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user[$model]['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('users', 'Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user[$model]['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('users', 'Edit User', true), array('action'=>'admin_edit', $user[$model]['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('default', 'Reset Password', true), array('action'=>'view', $user[$model]['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('users', 'Delete User', true), array('action'=>'admin_delete', $user[$model]['id']), null, sprintf(__d('users', 'Are you sure you want to delete # %s?', true), $user[$model]['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('users', 'List Users', true), array('action'=>'admin_index')); ?> </li>
		<li><?php echo $this->Html->link(__d('users', 'New User', true), array('action'=>'admin_add')); ?> </li>
	</ul>
</div>
