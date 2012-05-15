<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<div id="main" style="padding:20px">
	<hr style="margin-top: 120px;">
	<table class="invoice-client" style="margin-top:20px;width:100%">
		<tr>
			<td colspan="2">Cliente: <b><?php echo $invoice['Organization']['name']; ?></b></td>
			<!-- <td></td> -->		
		</tr>
		<tr>
			<td colspan="2">Dirección: <?php echo (isset($invoice['Organization']['Contact'][0]) ? $invoice['Organization']['Contact'][0]['name'] : 'N/A'); ?></td>
			<!-- <td></td> -->
		</tr>
		<tr>
			<td width="30%">Rif: <b><?php echo $invoice['Organization']['fiscalid']; ?></b></td>
			<td width="70%">Nit: <?php echo $invoice['Organization']['yafiscalid']; ?></td>			
		</tr>
	</table>
	<table class="invoice-top" style="margin-top:30px;width:100%">
		<tr>
			<th>
				O/Compra
			</th>
			<th>
				Factura
			</th>
			<th>
				Emision
			</th>
			<th>
				Condiciones de pago
			</th>
		</tr>
		<tr>
			<td align="center"><?php echo $invoice['SalesOrder']['number']; ?></td>
			<td align="center"><?php echo $invoice['Invoice']['number']; ?></td>
			<td align="center"><?php echo $this->Time->format($invoice['Invoice']['created'], '%d/%m/%Y'); ?></td>
			<td align="center">30 DIAS</td>
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
		<?php foreach ($invoice['InvoicesItem'] as $item) : ?>
		<tr>
				<td>
					<?php echo $item['Item']['barcode']; ?>
				</td>
				<td>
					<?php echo $item['InventoryItem']['batch']; ?><br />
					<i><?php echo $item['InventoryItem']['elaboration_date']; ?></i><br />
					<i><?php echo $item['InventoryItem']['expiration_date']; ?></i>
				</td>
				<td>
					<?php echo $item['Item']['name'] . ' (' . $item['Item']['package_factor']  . ')' .  ($item['exempt'] ? ' (E)' : '') ; ?>
				</td>
				<td>
					<?php echo $item['quantity']; ?>
				</td>
				<td align="right">
					<?php echo $this->Number->currency($item['price'], ''); ?>
				</td>
				<td align="right">
					<?php echo $this->Number->currency($item['price'] * $item['quantity'], ''); ?>
				</td>
				<td align="right">
					<?php echo (!$item['exempt'] ? ' 12' : 'N/A') ?>
				</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<table class="invoice-bottom" style="text-align: center; margin-top:30px;width:100%">
		<tr>
			<td colspan="3" align="right">Total Exento:</td>
			<td><?php echo $this->Number->currency($invoice['Invoice']['total_exempt'], ''); ?></td>
			<td align="right">Subtotal:</td>
			<td align="right"><?php echo $this->Number->currency($invoice['Invoice']['subtotal'], ''); ?></td>
		</tr>
		<tr>
			<td colspan="3" align="right">Base Imponible:</td>
			<td><?php echo $this->Number->currency($invoice['Invoice']['total_no_exempt'], ''); ?></td>
			<td align="right">IVA (12%):</td>
			<td align="right"><?php echo $this->Number->currency($invoice['Invoice']['tax'], ''); ?></td>
		</tr>
		<tr>
			<td colspan="4"></td>
			<td align="right">Total Bs.:</td>
			<td align="right"><?php echo $this->Number->currency($invoice['Invoice']['total'], ''); ?></td>
		</tr>
		<tr>
			<td colspan="5" align="left"><b>FORMA DE PAGO</b></td>
		</tr>
		<tr>
			<td colspan="2">CHEQUE</td>
			<td>EFECTIVO</td>
			<td colspan="2">TRASFERENCIA No.</td>
		</tr>	
		<tr>
			<td>FECHA:</td>
			<td>BANCO</td>
			<td>No. REF.</td>
			<td colspan="2">MONTO BS.</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
		</tr>		
	</table>
</div>