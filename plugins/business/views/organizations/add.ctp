<div class="organizations form">
<?php echo $this->Form->create('Organization', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Organization');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('country');
		echo $this->Form->input('fiscalid');
		echo $this->Form->input('yafiscalid');
		echo $this->Form->input('brand');
		echo $this->Form->input('business');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
