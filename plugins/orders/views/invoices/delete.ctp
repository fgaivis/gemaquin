<header><h3><?php echo sprintf(__('Delete Invoice "%s"?', true), $invoice['Invoice']['number']); ?></h3></header>
<p class="delete-warn">
	<?php __('Be aware that your Invoice and all associated data will be deleted if you confirm!'); ?>
</p>
<div class="delete-form">
<?php
	echo $this->Form->create('Invoice', array(
		'url' => array(
			'action' => 'delete',
			$invoice['Invoice']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm', true),
		'type' => 'checkbox',
		'error' => __('You have to confirm.', true)));
	echo $form->submit(__('Continue', true));
	echo $form->end();
?>
</div>
