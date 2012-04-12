<header>
<h3><?php __('Items') ?></h3>
</header>
<ul class="poitems">
<?php foreach ($items as $item) {
    	echo $this->Html->tag('li',
			sprintf(__('%s (%d disp.) - Lote: %s - Exp: %s - Ext: %s', true), $item['Item']['name'], $item['InventoryItem']['quantity_left'], $item['InventoryItem']['batch'], $item['InventoryItem']['expiration_date'], $item['InventoryItem']['extension_date']),
			array('id' => $item['InventoryItem']['id']
		));
      }
?>
</ul>

