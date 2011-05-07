<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<header><h3><?php __d('categories', 'Add Category');?></h3></header>

	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id', array('empty' => true));
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__d('categories', 'Submit', true));?>
</div>