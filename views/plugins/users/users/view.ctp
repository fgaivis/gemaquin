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
<div class="users form">
<?php echo $this->Form->create($model, array('action' => 'admin_edit'));?>
	<header><h3><?php __('Reset Password');?></h3></header>
	<fieldset>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('username');
		echo $this->Form->input('passwd', array('label' => __d('default', 'Password', true), 'value' => ''));
		echo $this->Form->hidden('tos', array('value' => true));
		echo $this->Form->hidden('active', array('value' => true));
		echo $this->Form->hidden('email_authenticated', array('value' => true));
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit'));?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('users', 'Delete', true), array('action'=>'admin_delete', $this->Form->value('User.id')), null, sprintf(__d('users', 'Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__d('users', 'List Users', true), array('action'=>'admin_index'));?></li>
	</ul>
</div>
