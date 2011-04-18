<h2><?php echo sprintf(__('Delete Item "%s"?', true), $item['Item']['name']); ?></h2>
<p>
	<?php __('Be aware that your Item and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('Item', array(
		'url' => array(
			'action' => 'delete',
			$item['Item']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>

