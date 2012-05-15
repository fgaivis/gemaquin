<div class="debitNotes form">
<?php echo $this->Form->create('DebitNote', array('url' => array('action' => 'add')));?>
	<header><h3><?php  __('Edit Debit Note');?></h3></header>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('amount');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>