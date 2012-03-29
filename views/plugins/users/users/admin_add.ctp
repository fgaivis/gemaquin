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
<?php echo $this->Form->create($model);?>
	<header><h3><?php __('Add User');?></h3></header>
	<fieldset>

	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('passwd', array('label' => __d('default', 'Password', true)));
		echo $this->Form->input('role', array('options' => array('0'=>'Administrador','1'=>'Gerencia','2'=>'Ventas/Compras', '3'=>'Almacen')));
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
		<li><?php echo $this->Html->link(__d('users', 'List Users', true), array('action'=>'admin_index'));?></li>
	</ul>
</div>
