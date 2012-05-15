<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<div id="main" style="padding:20px">
	<hr style="margin-top: 120px;">
	<table class="invoice-client" style="margin-top:20px;width:100%">
		<tr>
			<td colspan="2">Cliente: <b><?php echo $deliveryNote['Organization']['name']; ?></b></td>
			<!-- <td></td> -->		
		</tr>
		<tr>
			<td colspan="2">Dirección: <?php echo (isset($deliveryNote['Contact']) ? $deliveryNote['Contact']['name'] : 'N/A'); ?></td>
			<!-- <td></td> -->
		</tr>
		<tr>
			<td width="30%">Rif: <b><?php echo $deliveryNote['Organization']['fiscalid']; ?></b></td>
			<td width="70%">Nit: <?php echo $deliveryNote['Organization']['yafiscalid']; ?></td>			
		</tr>
	</table>
	<table class="invoice-top" style="margin-top:30px;width:100%">
		<tr>
			<th>
				O/Compra
			</th>
			<th>
				Nota de Entrega
			</th>
			<th>
				Emision
			</th>
		</tr>
		<tr>
			<td align="center"><?php echo $deliveryNote['SalesOrder']['number']; ?></td>
			<td align="center"><?php echo $deliveryNote['DeliveryNote']['number']; ?></td>
			<td align="center"><?php echo $this->Time->format($deliveryNote['DeliveryNote']['created'], '%d/%m/%Y'); ?></td>
		</tr>
		</table>
	<table class="invoice-details" style="text-align: center; margin-top:30px;width:100%">
		<tr>
			<th>
				Codigo
			</th>
			<th>
				Lote
			</th>
			<th>
				Descripción
			</th>
			<th>
				Cantidad
			</th>
			<th>
				Precio Unitario
			</th>
			<th>
				Total Neto (Bs.)
			</th>
			<th>
				Alicuota %
			</th>
		</tr>
		<?php foreach ($deliveryNote['InvItemsSalesOrder'] as $invItemsSalesOrder) : ?>
		<tr>
				<td>
					<?php echo $invItemsSalesOrder['InventoryItem']['Item']['barcode']; ?>
				</td>
				<td>
					<?php echo $invItemsSalesOrder['InventoryItem']['batch']; ?><br />
					<i><?php echo $invItemsSalesOrder['InventoryItem']['elaboration_date']; ?></i><br />
					<i><?php echo $invItemsSalesOrder['InventoryItem']['expiration_date']; ?></i>
				</td>
				<td>
					<?php echo $invItemsSalesOrder['InventoryItem']['Item']['name'] . ' (' . $invItemsSalesOrder['InventoryItem']['Item']['package_factor']  . ')'; ?>
				</td>
				<td>
					<?php echo $invItemsSalesOrder['InvItemsSoDlvNote']['quantity']; ?>
				</td>
				<td align="right">
					<?php //echo $this->Number->currency($invItemsSalesOrder['price'], ''); ?>
				</td>
				<td align="right">
					<?php //echo $this->Number->currency($invItemsSalesOrder['price'] * $invItemsSalesOrder['quantity'], ''); ?>
				</td>
				<td align="right">
					<?php //echo (!$invItemsSalesOrder['exempt'] ? ' 12' : 'N/A') ?>
				</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<hr style="margin-top:40px;">
	<?php if (!empty($deliveryNote['SalesOrder']['Invoice'])): ?>
	<table class="invoice-no-border">
		<tr>
			<td width="10%"></td>
			<td><span style="font-weight: bold;"><?php echo 'ENTREGA DE MATERIAL CORRESPONDIENTE A LA FACTURA ' . $deliveryNote['SalesOrder']['Invoice']['number']; ?> </span></td>
		</tr>
		<tr>
			<td width="10%"></td>
			<td><span style="font-weight: bold;"><?php echo 'Nro. CONTROL ' . $deliveryNote['SalesOrder']['Invoice']['control'] . ' DE FECHA ' . $this->Time->format($deliveryNote['SalesOrder']['Invoice']['created'], '%d/%m/%Y'); ?> </span></td>
		</tr>
	</table>
	<?php else: ?>
	<table class="invoice-no-border">
		<tr>
			<td width="10%"></td>
			<td><span style="font-weight: bold;"><?php echo 'ENTREGA DE MATERIAL'; ?> </span></td>
		</tr>
	</table>
	<?php endif; ?>
	<hr>
	<table class="invoice-bottom" style="text-align: center; margin-top:10px;width:100%">
		<tr>
			<td colspan="3" align="right">Total Neto:</td>
			<td align="right">0.00</td>
		</tr>
		<tr>
			<td colspan="3" align="right">IVA (12%):</td>
			<td align="right">0.00</td>
		</tr>
		<tr>
			<td colspan="3" align="right">Total Bs.:</td>
			<td align="right">0.00</td>
		</tr>		
	</table>
</div>