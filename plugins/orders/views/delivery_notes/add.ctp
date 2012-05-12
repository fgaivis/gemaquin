<div class="deliveryNotes form">
<?php echo $this->Form->create('DeliveryNote', array('url' => array('action' => 'add')));?>
	<fieldset>
 	<?php
		echo $this->Form->hidden('sales_order_id', array('value' => $salesOrder['SalesOrder']['id']));

	?>
<div class="module width_3_quarter" id="orderTable">
    <header>
        <h3><?php __('Delivery Note Content') ?></h3>
    </header>
    <table>
        <?php
        echo $html->tableHeaders(array(
            __('Code', true),
            __('Item', true),
            __('Package', true),
            __('Ordered', true),
            __('Quantity Remaining', true),
            __('Quantity', true)
        ));
        ?>
        <?php foreach ($salesOrder['InventoryItem'] as $key => $item) :
                if ($item['InvItemsSalesOrder']['quantity_remaining'] > 0): ?>
        <tr class="item" id="<?php echo 'row' . $item['Item']['id']?>">
            <td><?php echo $item['Item']['barcode']; ?></td>
            <td><?php echo $item['Item']['name']; ?></td>
            <td><?php echo $item['Item']['package_factor']; ?></td>
            <td><?php echo $item['InvItemsSalesOrder']['quantity']; ?></td>
            <td><?php echo $item['InvItemsSalesOrder']['quantity_remaining']; ?></td>
            <td><?php echo $this->Form->input('InvItemsSoDlvNote.' . $key . '.quantity', array('value' => $item['InvItemsSalesOrder']['quantity_remaining'] ,'label' => false, 'div' => false)); ?>
                <?php echo $this->Form->input('InvItemsSoDlvNote.' . $key . '.inv_items_sales_order_id', array('type' => 'hidden', 'value' => $item['InvItemsSalesOrder']['id'])); ?>
            </td>
        </tr>
        <?php   endif;
                endforeach;?>
    </table>
</div>

        <?php echo $this->Form->end(__('Submit', true));?>
    </fieldset>
        </div>
