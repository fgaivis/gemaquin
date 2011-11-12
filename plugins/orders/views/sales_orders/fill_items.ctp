<header>
<h3><?php __('Items') ?></h3>
</header>
<ul class="poitems">
<?php foreach ($items as $item) {
    	echo $this->Html->tag('li',
			sprintf(__('%s (%d left)', true), $item['Item']['name'], $item['InventoryItem']['quantity_left']),
			array('id' => $item['InventoryItem']['id']
		));
      }
?>
</ul>

