<header><h3><?php echo sprintf(__('Delete Category "%s"?', true), $category['Category']['name']); ?></h3></header>
<p>
	<?php __('Be aware that your Category and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('Category', array(
		'url' => array(
			'action' => 'admin_delete',
			$category['Category']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>

