<div class="module">
<header><h3><?php __d('categories', 'Categories');?></h3></header>
<?php 
	$this->Html->script(
		array(
			'/categories/js/jquery.treeview',
			'/categories/js/jquery.contextmenu',
			'autoload/categories/admin_tree'),
		array('inline' => false));
	$this->Html->css(
		array(
			'/categories/css/jquery.treeview',
			'/categories/css/jquery.contextmenu',
			'/categories/css/basic'), 
		null, 
		array('inline' => false));
	$this->Js->buffer('App.pagesAdminIndex.init();');
?>

<div id="category-menu">
	<?php if (empty($categories)) : ?>
	<p class="error-message">
	<?php 
		echo String::insert(
			__d('categories', 'No categories were added yet. :add-a-new-one now!', true),
			array('add-a-new-one' => $this->Html->link(__d('categories', 'Add a new one', true), array('action' => 'add'))));
	?>
	</p>
	<?php else :
		echo $this->Tree->generate($categories, array('element' => 'categories/tree_item', 'class' => 'categorytree', 'id' => 'categorytree'));
	endif; ?>
	<ul class="actions">
		<li class="as-button"><?php echo $this->Html->link(__d('categories', 'Add category', true), array('action' => 'admin_add')); ?></li>
	</ul>
</div>

<div id="placeholder"></div>

<ul id="actions-list" class="contextMenu">
	<li class="add separator"><?php echo $this->Html->link(__d('categories', 'Add a child', true), array('action' => 'admin_add')); ?></li>
	<li class="edit"><?php echo $this->Html->link(__d('categories', 'Edit', true), array('action' => 'admin_edit')); ?></li>
	<li class="delete separator"><?php echo $this->Html->link(__d('categories', 'Delete', true), array('action' => 'admin_delete')); ?></li>
</ul>
<div class="clear"></div>
</div>