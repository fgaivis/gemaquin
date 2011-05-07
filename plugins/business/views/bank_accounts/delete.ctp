<header><h3><?php echo sprintf(__('Delete Bank Account "%s"?', true), $bankAccount['BankAccount']['number']); ?></h3></header>
<p>
	<?php __('Be aware that your Bank Account and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('BankAccount', array(
		'url' => array(
			'action' => 'delete',
			$bankAccount['BankAccount']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>

