<header>
<h3><?php __('Items') ?></h3>
</header>
<ul class="poitems">
<?php foreach ($items as $id => $item) {
    	echo $this->Html->tag('li', $item, array('id' => $id));
      }
?>
</ul>

