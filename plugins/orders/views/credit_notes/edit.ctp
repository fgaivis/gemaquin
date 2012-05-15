<div class="creditNotes form">
<?php echo $this->Form->create('CreditNote', array('url' => array('action' => 'edit')));?>
	<header><h3><?php  __('Edit Credit Note');?></h3></header>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('amount');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>