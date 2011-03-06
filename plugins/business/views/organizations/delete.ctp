<h2><?php echo sprintf(__('Delete Organization "%s"?', true), $organization['Organization']['title']); ?></h2>
<p>	
	<?php __('Be aware that your Organization and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('Organization', array(
		'url' => array(
			'action' => 'delete',
			$organization['Organization']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>