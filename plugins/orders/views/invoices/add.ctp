<div class="invoices form">
<?php echo $this->Form->create('Invoice', array('url' => array('action' => 'add')));?>
	
	<header><h3>
	<?php if (!empty($this->data['PurchaseOrder'])) : ?>
		<?php __('Add Purchase Invoice'); ?>
	<?php elseif (!empty($this->data['PrePurchaseOrder'])) : ?>
		<?php __('Add Draft Invoice'); ?>
	<?php elseif (!empty($this->data['SalesOrder'])) : ?>
		<?php __('Add Sales Invoice'); ?>
	<?php else : ?>
		<?php __('Add Service Invoice'); ?>
	<?php endif; ?>
	</h3></header>

	<fieldset>
	<?php
		echo $this->Form->hidden('Organization.id');
		echo $this->Form->hidden('Invoice.type');
		if (!empty($this->data['PurchaseOrder'])) { // Ordenes de Compra - Facturas de Compra de Productos
			echo $this->Form->input('created', array('type' => 'date'));
			echo $this->Form->input('number');
			echo $this->Form->input('control');
			echo $this->Form->input('insurance', array('class' => 'outgoings'));
			echo $this->Form->input('shipping', array('class' => 'outgoings'));
			echo $this->Form->input('customs_tax', array('class' => 'outgoings'));
			echo $this->Form->input('customs_adm', array('class' => 'outgoings'));
			echo $this->Form->input('internal_shipping', array('class' => 'outgoings'));
			echo $this->Form->input('total_no_exempt', array('class' => 'no-exempt onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('total_exempt', array('class' => 'exempt onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('subtotal', array('class' => 'subtotal onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('tax', array('class' => 'tax-input onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('total', array('class' => 'total onlyread', 'readonly' => 'readonly'));
			echo $this->Form->hidden('user_creator_id', array('value' => $userData['User']['id']));
			echo $this->Form->hidden('PurchaseOrder.id', array('value' => $this->data['PurchaseOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));
		} else if (!empty($this->data['PrePurchaseOrder'])) { // Ordenes de Compra - Facturas proforma de Compra de Productos
			echo $this->Form->input('created', array('type' => 'date'));
			echo $this->Form->input('number');
			echo $this->Form->input('insurance', array('class' => 'outgoings'));
			echo $this->Form->input('shipping', array('class' => 'outgoings'));
			echo $this->Form->input('customs_tax', array('class' => 'outgoings'));
			echo $this->Form->input('customs_adm', array('class' => 'outgoings'));
			echo $this->Form->input('internal_shipping', array('class' => 'outgoings'));
			echo $this->Form->input('total_no_exempt', array('class' => 'no-exempt onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('total_exempt', array('class' => 'exempt onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('subtotal', array('class' => 'subtotal onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('tax', array('class' => 'tax-input onlyread', 'readonly' => 'readonly'));
			echo $this->Form->input('total', array('class' => 'total onlyread', 'readonly' => 'readonly'));
			echo $this->Form->hidden('user_creator_id', array('value' => $userData['User']['id']));
			echo $this->Form->hidden('PrePurchaseOrder.id', array('value' => $this->data['PrePurchaseOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));
		} else if (!empty($this->data['SalesOrder'])) { // Ordenes de Venta - Facturas de venta
			echo $this->Form->input('control');
			echo $this->Form->hidden('subtotal', array('value' => 0));
			echo $this->Form->hidden('tax', array('value' => 0));
			echo $this->Form->hidden('total', array('value' => 0));
			echo $this->Form->input('insurance', array('class' => 'outgoings'));
			echo $this->Form->input('internal_shipping', array('class' => 'outgoings'));
			echo $this->Form->hidden('user_creator_id', array('value' => $userData['User']['id']));
			echo $this->Form->hidden('SalesOrder.id', array('value' => $this->data['SalesOrder']['id']));
			echo $this->Form->hidden('Invoice.organization_id', array('value' => $this->data['Organization']['id']));
		} else { // Facturas de Servicios
			echo $this->Form->input('organization_id');
			echo $this->Form->input('created', array('type' => 'date'));
			echo $this->Form->input('number');
			echo $this->Form->input('control');
			echo $this->Form->hidden('subtotal', array('value' => 0));
			echo $this->Form->input('total_no_exempt');
			echo $this->Form->input('total_exempt');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->hidden('type', array('value' => Invoice::SERVICE));
			echo $this->Form->hidden('user_creator_id', array('value' => $userData['User']['id']));
		}
		
	?>
<?php if (!empty($items)) : ?>
	<?php if(!(isset($this->data['SalesOrder']))): ?>
		<div id="CountOfItems" style="visibility: hidden;"><?php echo count($items); ?></div>
		<span style="font-weight: bold; color: blue; font-size:14px;">Suma Total de Gastos: </span>
		<span id="OutgoingsTotal" style="font-weight: bold; color: red; font-size:14px;"></span>
		<span id="EachText" style="display: none; font-weight: bold; color: black; font-size:14px;"> - Aprox. c/item paga: </span>
		<span id="OutgoingsEach" style="font-weight: bold; color: black; font-size:14px;"></span>
	<?php endif; ?>	
	<div class="module width_full" id="orderTable">
	<header>
	<h3><?php __('Invoice Content') ?></h3>
			</header>
			<table>
			<?php if(isset($this->data['PurchaseOrder'])): ?>
				<?php
				$headers = array(
						__('Code', true),
						__('Item', true),
						__('Quantity', true),
						__('Unit Price', true),
						__('Item Cost', true),
						__('Exempt', true),
						__('Tax', true),
						__('Total Price', true),
					);
					/*if (isset($this->data['PrePurchaseOrder'])) {
						//$headers[] = __('Apportionment', true);
					}*/
					echo $html->tableHeaders($headers);
				?>
			<?php elseif (isset($this->data['PrePurchaseOrder'])): ?>
				<?php
				$headers = array(
						__('Code', true),
						__('Item', true),
						__('Quantity', true),
						__('Unit Price', true),
						__('Exempt', true),
						__('Tax', true),
						__('Total Price', true),
					);
					echo $html->tableHeaders($headers);
				?>
			<?php elseif (isset($this->data['SalesOrder'])): ?>
				<?php
					echo $html->tableHeaders(array(
							//__('Code', true),
							__('Item', true),
							__('Quantity', true),
							__('Individual Cost', true),
							__('Profit', true),
							__('Unit Price', true),
							__('Exempt', true),
							__('Tax', true),
							__('Total Price', true),
						));
				?>	
			<?php endif; ?>
				<?php foreach ($items as $index => $item) : ?>
					<tr class="item">
					  <?php if(!(isset($this->data['SalesOrder']))): ?>
						<td><?php echo $item['Item']['provider_code']; ?></td>
					  <?php endif; ?>
						<td><?php echo $item['Item']['name']; ?></td>
						<?php if(!(isset($this->data['SalesOrder']))) : ?>
							<?php if($item['Item']['sells_by_kg'] == 0): ?>
								<td><?php echo $item['ItemsPurchaseOrder']['quantity']; ?></td>
							<?php else:?>
								<td><?php echo $item['ItemsPurchaseOrder']['kg_quantity']; ?></td>
							<?php endif;?>
						<?php else : ?>
							<td><?php echo $item['InvItemsSalesOrder']['quantity']; ?></td>
							<td>
								<?php echo $item['purchase_cost'];
									  echo '<span style="display:none" class="cost-label" index="' . $index .'">'.$item['purchase_cost'].'</span>'; ?>
							</td>
							<td><?php echo '<span class="profit-label" index="' . $index .'"></span>'; ?></td>
						<?php endif;?>
						<td>
							<?php 
								echo $this->Form->hidden('InvoicesItem.' . $index . '.item_id', array('value' => $item['Item']['id']));
								if (isset($this->data['PrePurchaseOrder']) || isset($this->data['PurchaseOrder'])) {
									if($item['Item']['sells_by_kg'] == 0) {
										echo $this->Form->hidden('InvoicesItem.' . $index . '.quantity', array('value' => $item['ItemsPurchaseOrder']['quantity']));
										echo $this->Form->hidden('InvoicesItem.' . $index . '.kg_quantity', array('value' => 0));
									} else {
										echo $this->Form->hidden('InvoicesItem.' . $index . '.quantity', array('value' => 0));
										echo $this->Form->hidden('InvoicesItem.' . $index . '.kg_quantity', array('value' => $item['ItemsPurchaseOrder']['kg_quantity']));
									}
								} else if (isset($this->data['SalesOrder'])) {
									echo $this->Form->hidden('InvoicesItem.' . $index . '.quantity', array('value' => $item['InvItemsSalesOrder']['quantity']));
								}
								echo $this->Form->input('InvoicesItem.' . $index . '.price', array('index' => $index, 'label' => false, 'div' => false, 'class' => 'item-price'));
								echo $this->Form->hidden('InvoicesItem.' . $index . '.individual_cost', array('index' => $index));
							?>
						</td>
						<?php if(isset($this->data['PurchaseOrder'])): ?>
						<td>
							<?php echo $this->Form->input('InvoicesItem.' . $index . '.purchase_cost', array('index' => $index, 'label' => false, 'div' => false, 'class' => 'item-cost')); ?>
						</td>
						<?php endif; ?>
						<td>
							<?php echo $this->Form->input('InvoicesItem.' . $index . '.exempt', array('type' => 'checkbox', 'class' => 'item-exempt', 'index' => $index, 'label' => false, 'div' => false)); ?>
						</td>
						<td>
							<?php echo $this->Form->hidden('InvoicesItem.' . $index . '.tax', array('class' => 'item-tax', 'index' => $index, 'label' => false, 'div' => false)); ?>
							<?php echo $this->Form->hidden('InvoicesItem.' . $index . '.total_tax', array('class' => 'item-tax', 'index' => $index, 'label' => false, 'div' => false)); ?>		
							<?php echo '<span class="tax-label" index="' . $index .'"></span>'; ?>
						</td>
						<td>
							<?php echo $this->Form->hidden('InvoicesItem.' . $index . '.total_cost', array('index' => $index));
									echo '<span class="total_price-label" index="' . $index .'"></span>'; ?>
						</td>
						<?php if (isset($this->data['PrePurchaseOrder'])): ?>
							<!-- <td>
								<?php //echo $this->Form->hidden('InvoicesItem.' . $index . '.apportionment', array('index' => $index));
									//echo '<span class="apportionment-label" index="' . $index .'"></span>'; 
								?>
							</td>  -->
						<?php elseif (isset($this->data['SalesOrder'])): ?>
							<!-- NADA -->
						<?php endif;?>
					</tr>	
				<?php endforeach; ?>				
			</table>
		</div>
<?php endif; ?>	
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php if(!(isset($this->data['SalesOrder']))): ?>
	<?php $this->Html->script('/orders/js/views/invoices/add',array('inline'=>false)) ?>
<?php else: ?>
	<?php $this->Html->script('/orders/js/views/invoices/add-sales',array('inline'=>false)) ?>
<?php endif; ?>
