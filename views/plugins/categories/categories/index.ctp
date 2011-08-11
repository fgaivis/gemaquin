<div class="index module">
<header><h3><?php __d('categories', 'Categories');?></h3></header>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('category_id');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th class="actions"><?php __d('categories', 'Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($categories as $category):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php $category['ParentCategory']['name']; ?>
		</td>
		<td>
			<?php echo $category['Category']['name']; ?>
		</td>
		<td>
			<?php echo $category['Category']['description']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('categories', 'Edit', true), array('action'=>'admin_edit', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__d('categories', 'Delete', true), array('action'=>'admin_delete', $category['Category']['id']), null, sprintf(__d('categories', 'Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging');?>
<footer>
	<p style="margin-left: 10px;"><?php echo $this->Html->link(__('View as Tree', true), array('action' => 'admin_tree')); ?></p>
</footer>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nueva categoria', true), array('controller' => 'categories', 'action' => 'admin_add', 'plugin' => 'categories'))?></li>
	</ul>
</div>