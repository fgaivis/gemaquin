<div class="inventoryItem form">
	<header><h3><?php __('Add Items to Inventory');?></h3></header>
	<fieldset>
			<?php echo $this->Form->hidden('InventoryItem.inventory_entry_id', array('value' => $entry)); ?>
			<?php echo $this->Form->hidden('InventoryItem.purchase_order_id', array('value' => $order)); ?>
			<?php echo $this->Form->hidden('InventoryItem.transaction', array('value' => $transaction)); ?>
	</fieldset>
	<div class="module width_quarter" id="items">
		<?php echo $this->Form->input('Search.code', array('class' => 'quick_search', 'div' => false, 'label' => false)); ?>
		<ul>
		</ul>
	</div>
	<?php echo $this->Form->create(null, array('id' => 'inventoryLoad', 'url' => array($entry)));?>
	<div class="module width_3_quarter" id="inventoryTable">
		<header>
		<h3><?php __('Added Items') ?></h3>
		</header>
		<table>
			<?php
				echo $html->tableHeaders(array(
					__('Item', true),
					__('Batch', true),
					__('Expiration Date', true),
					__('Quantity', true),
					__('Actions', true)
				));
			?>
		</table>
	</div>
	<div style="clear:both;"></div>
<?php echo $this->Form->end(array('label'=>__('Save', true), 'id'=>'save')); ?>
</div>
<script>
var items = <?php echo json_encode($items); ?>
</script>
<?php $this->Html->script('/inventory/js/views/inventory_items/add', array('inline'=>false)); ?>