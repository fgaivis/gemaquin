<div class="purchaseOrders form">
<?php echo $this->Form->create('PurchaseOrder', array('id'=>'poadd','url' => array('action' => 'edit')));?>
	<header><h3><?php echo __('Edit Purchase Order',true) . ' ' . $purchaseOrder['PurchaseOrder']['number'];?></h3></header>

	<fieldset>

	<?php
		echo $this->Form->input('organization_id',array('id'=>'providers',
    	    'label'=>__('Provider',true),
		    'empty' =>__('Select',true)
        ));
		echo $this->Form->hidden('user_creator_id',array('value' => $userData['User']['id']));
	?>

	<div class="module width_3_quarter" id="items"></div>
	<div class="module width_3_quarter" id="orderTable">
		<header>
		<h3><?php __('Order Content') ?></h3>
		</header>
		<table>
			<?php
				echo $html->tableHeaders(array(
					__('Code', true),
					__('Item', true),
					//__('Description', true),
					__('Package', true),
					__('Sells By Kg', true),
					__('Quantity / Kg', true),
					__('Actions', true)
					));
			?>
			<?php foreach ($purchaseOrder['Item'] as $key => $item) : ?>
			<?php $by_kg = $item['sells_by_kg']; ?>
				<tr class="item" id="<?php echo 'row' . $item['id']?>">
				    <td><?php echo $item['barcode']; ?></td>
				    <td><?php echo $item['name']; ?></td>
				    <!-- <td><?php //echo $item['description']; ?></td> -->
				    <td><?php echo $item['package_factor']; ?></td>
				    <td><?php echo $by_kg == 0 ? 'No' : 'Si'; ?></td>
				    <?php if($by_kg == 0) : ?>
				    	<td><?php echo $this->Form->input('ItemsPurchaseOrder.' . $key . '.quantity', array('label' => false, 'div' => false, 'value' => $item['ItemsPurchaseOrder']['quantity'])); ?></td>
				    <?php else:?>
				    	<td><?php echo $this->Form->input('ItemsPurchaseOrder.' . $key . '.kg_quantity', array('label' => false, 'div' => false, 'value' => $item['ItemsPurchaseOrder']['kg_quantity'])); ?></td>
				    <?php endif;?>
				    <td>
				    	<?php echo $this->Html->link(__('Delete', true), '#', array('item' => $item['id'], 'class' => 'delete')); ?>
						<?php echo $this->Form->input('ItemsPurchaseOrder.' . $key . '.item_id', array('type' => 'hidden', 'value' => $item['id'])); ?>
						<?php echo $this->Form->input('ItemsPurchaseOrder.' . $key . '.id', array('type' => 'hidden', 'value' => $item['ItemsPurchaseOrder']['id'])); ?>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
	<div style="clear:both;"></div>
<?php echo $this->Form->end(array('label'=>__('Save', true),'id'=>'save'));?>
</div>
<?php $this->Html->script('/orders/js/views/purchase_orders/add',array('inline'=>false)) ?>
