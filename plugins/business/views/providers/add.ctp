<div class="providers form">
<?php echo $this->Form->create('Provider', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Provider');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('country');
		echo $this->Form->input('fiscalid');
		echo $this->Form->input('brand');
		echo $this->Form->input('business');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>


