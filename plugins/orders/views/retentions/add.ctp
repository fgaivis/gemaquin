<div class="retentions form">
<?php //echo $this->Form->create('Retention', array('url' => array('action' => 'add')));?>
<?php echo $this->Form->create('Retention', array('url' => $this->params['pass']));?>
	<header><h3><?php echo sprintf(__('Create Retention for Invoice %s', true), $invoice['Invoice']['number']); ?></h3></header>
	<fieldset>
	<?php $types = array(
			'IVA' => __('IVA', true),
			'ISLR' => __('ISLR', true)
		);
	?>
	
	<?php $rates = array(
			'75' => __('75%', true),
			'100' => __('100%', true),
			'1' => __('1%', true),
			'2' => __('2%', true),
			'3' => __('3%', true),
			'5' => __('5%', true)
		);
	?>
	
	<?php
		echo $this->Form->input('invoice_id', array('type' => 'hidden', 'value' => $invoice['Invoice']['id']));
		echo $this->Form->input('organization_id', array('type' => 'hidden', 'value' => $invoice['Organization']['id']));
		//echo $this->Form->input('type');
		echo $this->Form->input('type', array('options' => $types));
		//echo $this->Form->input('rate');
		echo $this->Form->input('rate', array('options' => $rates));
		echo $this->Form->input('amount');
		echo $this->Form->input('subtrahend');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
