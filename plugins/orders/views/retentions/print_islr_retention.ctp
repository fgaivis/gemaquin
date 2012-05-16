<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<?php
	$invoice = $retention['Invoice'];
	$organization = $retention['Organization'];
?>
<div id="main" style="padding:20px">
	<hr style="margin-top: 30px;">
	<table class="invoice-no-border">
		<tr>
			<td width="25%"></td>
			<td><span style="font-weight: bold; text-decoration: underline;">Comprobante de Retención del Impuesto Sobre la Renta</span></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td><span style="font-weight: normal;">
				Decreto 1808 art. 9 
			</span></td>
		</tr>
	</table>
	<table class="invoice-client" style="margin-top:35px;width:100%">
		<tr>
			<td width="15%" style="border: none;"></td>
			<td width="25%">Nro. Comprobante</td>
			<td width="25%">Fecha</td>
			<td width="20%">Período Fiscal</td>
			<td width="15%" style="border: none;"></td>
		</tr>
		<tr>
			<td width="15%" style="border: none;"></td>
			<td width="25%"></td>
			<td width="25%"><?php echo $this->Time->format($retention['Retention']['created'], '%d/%m/%Y'); ?></td>
			<td width="20%"><?php echo $this->Time->format($retention['Retention']['created'], '%Y-%m'); ?></td>
			<td width="15%" style="border: none;"></td>
		</tr>
	</table>
	<table class="invoice-top" style="margin-top:15px;width:100%">
		<tr>
			<th>
				Nombre o Razón Social del Agente de Retención
			</th>
			<th>
				Registro de Informacion Fiscal del Agente de Retención
			</th>
		</tr>
		<tr>
			<td align="center">Representaciones I.V. Gemaquin, C.A.</td>
			<td align="center">J302697646</td>
		</tr>
		<tr>
			<th colspan="2">
				Dirección Fiscal del Agente de Retención
			</th>
		</tr>
		<tr>
			<td colspan="2" align="center">Calle 3B, Edif. Escachia, Piso1, Local 1-A  La Urbina Caracas</td>
		</tr>
	</table>
	<table class="invoice-top" style="margin-top:20px;width:100%">
		<tr>
			<th>
				Nombre o Razón Social del Sujeto de Retenido
			</th>
			<th>
				Registro de Informacion Fiscal del Contribuyente (R.I.F.)
			</th>
		</tr>
		<tr>
			<td align="center"><?php echo $organization['name']; ?></td>
			<td align="center"><?php echo $organization['fiscalid']; ?></td>
		</tr>
	</table>
	<table class="invoice-details" style="text-align: center; margin-top:40px;width:70%">
		<tr>
			<th>
				Fecha Factura
			</th>
			<th>
				Número Factura
			</th>
			<th>
				Número de Control
			</th>
			<th>
				# Nota Débito
			</th>
			<th>
				# Nota Crédito
			</th>
		</tr>
		<tr>
			<td>
				<?php echo $this->Time->format($invoice['created'], '%d/%m/%Y'); ?>
			</td>
			<td>
				<?php echo $invoice['number']; ?>
			</td>
			<td>
				<?php echo $invoice['control']; ?>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>		
	</table>
	<table class="invoice-bottom" style="text-align: center; margin-top:10px;width:100%">
		<tr>
			<td colspan="8" align="center">Compras Internas o importaciones</td>
		</tr>
		<tr>
			<td align="center">Oper. Nro.</td>
			<td align="center">Total de compras incluyendo IVA</td>
			<td align="center">Compras sin IVA</td>
			<td align="center">Base Imponible</td>
			<td align="center">Porcentaje IVA 12%</td>
			<td align="center">2% ISLR</td>
			<td align="center">3% ISLR</td>
			<td align="center">5% ISLR</td>
		</tr>
		<tr>
			<td align="left">0001</td>
			<td align="right"><?php echo $this->Number->currency($invoice['total'], ''); ?></td>
			<td align="right"><?php echo $this->Number->currency($invoice['total_exempt'], ''); ?></td>
			<td align="right"><?php echo $this->Number->currency($invoice['total_no_exempt'], ''); ?></td>
			<td align="right"><?php echo $this->Number->currency($invoice['tax'], ''); ?></td>
		 <?php if($retention['Retention']['rate'] == 2) : ?>
			<td align="right"><?php $retained =  (($invoice['total_exempt'] + $invoice['total_no_exempt']) * $retention['Retention']['rate']) / 100; ?><?php echo $this->Number->currency($retained, ''); ?></td>
			<td align="right"></td>
			<td align="right"></td>
		 <?php elseif ($retention['Retention']['rate'] == 3) : ?>
		 	<td align="right"></td>
			<td align="right"><?php $retained =  (($invoice['total_exempt'] + $invoice['total_no_exempt']) * $retention['Retention']['rate']) / 100; ?><?php echo $this->Number->currency($retained, ''); ?></td>
			<td align="right"></td>
		 <?php elseif ($retention['Retention']['rate'] == 5) : ?>
		 	<td align="right"></td>
			<td align="right"></td>
			<td align="right"><?php $retained =  (($invoice['total_exempt'] + $invoice['total_no_exempt']) * $retention['Retention']['rate']) / 100; ?><?php echo $this->Number->currency($retained, ''); ?></td>
		 <?php endif; ?>
		</tr>	
	</table>
	<table class="invoice-no-border" style="margin-top:80px; width:100%">
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;">-------------------------------------</span></td>
		</tr>
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;">Firma del Agente de Rentención</span></td>
		</tr>
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;"></span></td>
		</tr>
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;">Sello</span></td>
		</tr>
	</table>
</div>