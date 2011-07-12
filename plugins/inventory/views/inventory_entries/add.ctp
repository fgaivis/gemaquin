<div class="inventoryEntry form">
	<header><h3><?php __('Select purchase order the new items belong to');?></h3></header>
	<?php echo $this->Form->create(); ?>
	<fieldset>
			<?php
				echo $this->Form->input('purchase_order_id', array(
					'empty' => __('Select Order', true),
					'options' => $purchaseOrders,
					'type' => 'select'
				));
			?>
	</fieldset>
	<div style="clear:both;"></div>
<?php echo $this->Form->end(array('label'=>__('Start loading items', true))); ?>
</div>

