<div class="invoices form">
<?php echo $this->Form->create('Invoice', array('url' => array('action' => 'add')));?>
	<fieldset>
	<?php
		echo $this->Form->hidden('Organization.id');
		echo $this->Form->hidden('Invoice.type');
		if (!empty($this->data['PurchaseOrder'])) {
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total', array('class' => 'total'));
			echo $this->Form->input('insurance', array('class' => 'outgoings'));
			echo $this->Form->input('shipping', array('class' => 'outgoings'));
			echo $this->Form->input('customs_tax', array('class' => 'outgoings'));
			echo $this->Form->input('customs_adm', array('class' => 'outgoings'));
			echo $this->Form->input('internal_shipping', array('class' => 'outgoings'));
			echo $this->Form->hidden('PurchaseOrder.id', array('value' => $this->data['PurchaseOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));
			echo $this->Form->hidden('PurchaseOrder.id');					
		} else if (!empty($this->data['PrePurchaseOrder'])) {
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total', array('class' => 'total'));
			echo $this->Form->input('insurance', array('class' => 'outgoings'));
			echo $this->Form->input('shipping', array('class' => 'outgoings'));
			echo $this->Form->input('customs_tax', array('class' => 'outgoings'));
			echo $this->Form->input('customs_adm', array('class' => 'outgoings'));
			echo $this->Form->input('internal_shipping', array('class' => 'outgoings'));
			echo $this->Form->hidden('PrePurchaseOrder.id', array('value' => $this->data['PrePurchaseOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));
			echo $this->Form->hidden('PrePurchaseOrder.id');
		} else if (!empty($this->data['SalesOrder'])) {
			echo $this->Form->input('control');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance', array('class' => 'outgoings'));
			echo $this->Form->input('internal_shipping', array('class' => 'outgoings'));
			echo $this->Form->hidden('SalesOrder.id', array('value' => $this->data['SalesOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));
			echo $this->Form->hidden('SalesOrder.id');
		} else {
			echo $this->Form->input('organization_id');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('type');
		}
		
	?>
<?php if (!empty($items)) : ?>
	<div class="module width_full" id="orderTable">
	<header>
	<h3><?php __('Invoice Content') ?></h3>
			</header>
			<table>
			<?php if(!(isset($this->data['SalesOrder']))): ?>
				<?php
				$headers = array(
						__('Code', true),
						__('Item', true),
						__('Quantity', true),
						__('Price', true),
						__('Tax', true),
					);
				if (isset($this->data['PrePurchaseOrder'])) {
					$headers[] = __('Apportionment', true);
				}
					echo $html->tableHeaders($headers);
				?>
			<?php else: ?>
				<?php
					echo $html->tableHeaders(array(
							__('Code', true),
							__('Item', true),
							__('Description', true),
							__('Quantity', true),
							__('Price', true),
							__('Tax', true),
							__('Exempt', true),
						));
				?>	
			<?php endif; ?>
				<?php foreach ($items as $index => $item) : ?>
					<tr class="item">
						<td><?php echo $item['Item']['barcode']; ?></td>
						<td><?php echo $item['Item']['name']; ?></td>
						<td><?php echo $item['ItemsPurchaseOrder']['quantity']; ?></td>
						<!-- <?php //if (isset($this->data['PrePurchaseOrder']) || isset($this->data['PurchaseOrder'])): ?>
							<td><?php //echo $item['ItemsPurchaseOrder']['quantity']; ?></td>
						<?php //elseif (isset($this->data['SalesOrder'])): ?>
							<td><?php //echo $item['InvItemsSalesOrder']['quantity']; ?></td>
						<?php //endif;?> -->
						<td>
							<?php 
								echo $this->Form->hidden('InvoicesItem.' . $index . '.item_id', array('value' => $item['Item']['id']));
								if (isset($this->data['PrePurchaseOrder']) || isset($this->data['PurchaseOrder'])) {
									echo $this->Form->hidden('InvoicesItem.' . $index . '.quantity', array('value' => $item['ItemsPurchaseOrder']['quantity']));
								} else if (isset($this->data['SalesOrder'])) {
									echo $this->Form->hidden('InvoicesItem.' . $index . '.quantity', array('value' => $item['InvItemsSalesOrder']['quantity']));
								}
								echo $this->Form->input('InvoicesItem.' . $index . '.price', array('index' => $index, 'label' => false, 'div' => false, 'class' => 'item-price'));
							?>
						</td>
						<td>
							<?php echo $this->Form->input('InvoicesItem.' . $index . '.tax', array('class' => 'item-tax', 'index' => $index, 'label' => false, 'div' => false)); ?>
						</td>
						<?php if (isset($this->data['PrePurchaseOrder'])): ?>
							<td>
								<?php echo $this->Form->hidden('InvoicesItem.' . $index . '.apportionment', array('index' => $index));
									echo '<span class="apportionment-label" index="' . $index .'"></span>'; 
								?>
							</td>
						<?php elseif (isset($this->data['SalesOrder'])): ?>
							<td>
								<?php echo $this->Form->input('InvoicesItem.' . $index . '.exempt', array('type' => 'checkbox', 'class' => 'item-exempt', 'index' => $index, 'label' => false, 'div' => false)); ?>
							</td>
						<?php endif;?>
					</tr>	
				<?php endforeach; ?>	
				
			</table>
		</div>
<?php endif; ?>	
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php $this->Html->script('/orders/js/views/invoices/add',array('inline'=>false)) ?>

