<header><h3><?php echo sprintf(__('Delete Address of "%s"?', true), $address['Organization']['name']); ?></h3></header>
<p>
	<?php __('Be aware that your Address and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('Address', array(
		'url' => array(
			'action' => 'delete',
			$address['Address']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>

