<div class="items form">
<?php echo $this->Form->create('Item', array('url' => array('action' => 'add')));?>
	<header><h3><?php __('Add Item');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('barcode');
		echo $this->Form->input('package_factor');
		echo $this->Form->input('sales_factor');
		echo $this->Form->input('weight');
		echo $this->Form->input('country');
		echo $this->Form->input('industry');
		echo $this->Form->input('category_id');
		echo $this->Form->input('Organization');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>


