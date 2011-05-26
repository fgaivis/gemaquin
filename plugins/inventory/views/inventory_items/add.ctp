<div class="inventoryItem form">
	<header><h3><?php __('Add Items to Inventory');?></h3></header>
	<fieldset>
			<?php echo $this->Form->input('InventoryItem.order_id', array('empty' => __('Select Order', true))); ?>
			<?php echo $this->Form->hidden('InventoryItem.transaction', array('value' => $transaction)); ?>
	</fieldset>
	<div class="module width_quarter" id="items">
		<?php echo $this->Form->input('Search.code', array('class' => 'quick_search', 'div' => false, 'label' => false)); ?>
		<ul>
		</ul>
	</div>
	<?php echo $this->Form->create(null, array('id' => 'inventoryLoad'));?>
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
<?php $this->Html->script('/inventory/js/views/inventory_items/add', array('inline'=>false)); ?>

