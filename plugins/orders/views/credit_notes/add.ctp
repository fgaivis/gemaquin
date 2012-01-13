<div class="creditNotes form">
<?php echo $this->Form->create('CreditNote', array('url' => array('action' => 'add')));?>
	<header><h3><?php  __('Create Credit Note');?></h3></header>
	<fieldset>
	<?php
		echo $this->Form->input('amount');
		echo $this->Form->input('note');
		echo $this->Form->input('Invoice');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>