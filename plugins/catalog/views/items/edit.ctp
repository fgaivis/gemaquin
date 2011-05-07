<div class="items form">
<?php echo $this->Form->create('Item', array('url' => array('action' => 'edit')));?>
	<header><h3><?php __('Edit Item');?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('id');
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
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Item.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>

