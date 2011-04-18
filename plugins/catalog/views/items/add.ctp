<div class="items form">
<?php echo $this->Form->create('Item', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Item');?></legend>
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
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>

