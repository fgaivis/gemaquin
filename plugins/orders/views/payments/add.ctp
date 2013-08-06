<div class="payments form">
<?php //echo $this->Form->create('Payment', array('url' => array('action' => 'add')));?>
<?php echo $this->Form->create('Payment', array('url' => $this->params['pass']));?>
	<?php if($invoice['Invoice']['type'] === Invoice::SALES): ?>
		<header><h3><?php echo sprintf(__('Register Collection for Invoice %s', true), $invoice['Invoice']['number']); ?></h3></header>
	<?php else: ?>
		<header><h3><?php echo sprintf(__('Register Payment for Invoice %s', true), $invoice['Invoice']['number']); ?></h3></header>
	<?php endif; ?>
	<fieldset>
	
	<?php $payment_types = array(
			'CASH' => __('CASH', true),
			'CHECK' => __('CHECK', true),
			'TRANSFER' => __('TRANSFER', true),
			'CREDIT' => __('CREDIT', true)
		);
	?>
	
	<?php
		echo $this->Form->input('invoice_id', array('type' => 'hidden', 'value' => $invoice['Invoice']['id']));
		echo $this->Form->input('organization_id', array('type' => 'hidden', 'value' => $invoice['Organization']['id']));
		if($invoice['Invoice']['type'] === Invoice::SALES) {
			echo $this->Form->input('type', array('type' => 'hidden', 'value' => Payment::SALES));
		} else {
			echo $this->Form->input('type', array('type' => 'hidden', 'value' => Payment::PURCHASE));
		}
		echo $this->Form->input('payment_type', array('options' => $payment_types));
		echo $this->Form->input('id_number');
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
