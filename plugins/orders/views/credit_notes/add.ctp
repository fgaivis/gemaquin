<div class="creditNotes form">
<?php echo $this->Form->create('CreditNote', array('url' => $this->params['pass']));?>
	<header><h3><?php echo sprintf(__('Create Credit Note for Invoice %s', true), $invoice['Invoice']['number']); ?></h3></header>
	<fieldset>
	<?php
		echo $this->Form->input('concept');
		echo $this->Form->input('amount');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>