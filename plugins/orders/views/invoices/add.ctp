<div class="invoices form">
<?php echo $this->Form->create('Invoice', array('url' => array('action' => 'add')));?>
	<fieldset>
	<?php
		if (isset($this->data['PurchaseOrder'])) {
			echo $this->Form->input('number');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance');
			echo $this->Form->input('shipping');
			echo $this->Form->input('customs_tax');
			echo $this->Form->input('customs_adm');
			echo $this->Form->input('internal_shipping');
			echo $this->Form->hidden('Invoice.type', array('value' => $this->data['Invoice']['type']));
			echo $this->Form->hidden('PurchaseOrder.id', array('value' => $this->data['PurchaseOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));						
		} if (isset($this->data['PrePurchaseOrder'])) {
			echo $this->Form->input('number');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance');
			echo $this->Form->input('shipping');
			echo $this->Form->input('customs_tax');
			echo $this->Form->input('customs_adm');
			echo $this->Form->input('internal_shipping');
			echo $this->Form->hidden('Invoice.type', array('value' => $this->data['Invoice']['type']));
			echo $this->Form->hidden('PrePurchaseOrder.id', array('value' => $this->data['PrePurchaseOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));
		} else if (isset($this->data['SalesOrder'])) {
			echo $this->Form->input('number');
			echo $this->Form->input('organization_id');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance');
			echo $this->Form->input('internal_shipping');
			echo $this->Form->hidden('Invoice.type', array('value' => $this->data['Invoice']['type']));
		} else {
			echo $this->Form->input('number');
			echo $this->Form->input('organization_id');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('type');
		}
		
	?>
	<div class="module width_full" id="orderTable">
	<header>
	<h3><?php __('Invoice Content') ?></h3>
			</header>
			<table>
				<?php
					echo $html->tableHeaders(array(
							__('Code', true),
							__('Item', true),
							__('Description', true),
							__('Quantity', true),
							__('Price', true),
							__('Tax', true),
						));
				?>
				<?php foreach ($items as $index => $item) : ?>
					<tr class="item">
						<td><?php echo $item['Item']['barcode']; ?></td>
						<td><?php echo $item['Item']['name']; ?></td>
						<td><?php echo $item['Item']['description']; ?></td>
						<td><?php echo $item['ItemsPurchaseOrder']['quantity']; ?></td>
						<td>
							<?php 
								echo $this->Form->hidden('InvoicesItem.' . $index . '.item_id', array('value' => $item['Item']['id']));
								echo $this->Form->hidden('InvoicesItem.' . $index . '.quantity', array('value' => $item['ItemsPurchaseOrder']['quantity']));
								echo $this->Form->input('InvoicesItem.' . $index . '.price', array('label' => false, 'div' => false));
							?>
						</td>
						<td>
							<?php echo $this->Form->input('InvoicesItem.' . $index . '.tax', array('label' => false, 'div' => false)); ?>
						</td>
					</tr>	
				<?php endforeach; ?>	
				
			</table>
		</div>	
	</fieldset>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>