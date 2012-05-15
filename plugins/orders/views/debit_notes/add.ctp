<div class="debitNotes form">
<?php echo $this->Form->create('DebitNote',  array('url' => $this->params['pass']));?>
	<header><h3><?php echo sprintf(__('Create Debit Note for Invoice %s', true), $invoice['Invoice']['number']); ?></h3></header>
	<fieldset>
	<?php
		echo $this->Form->input('amount');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>