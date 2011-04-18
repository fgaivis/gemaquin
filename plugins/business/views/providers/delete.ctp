<h2><?php echo sprintf(__('Delete Provider "%s"?', true), $provider['Provider']['name']); ?></h2>
<p>
	<?php __('Be aware that your Provider and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('Provider', array(
		'url' => array(
			'action' => 'delete',
			$provider['Provider']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>

