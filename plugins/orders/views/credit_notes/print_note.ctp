<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<?php
	$invoice = $creditNote['InvoicesNote']['Invoice'];
?>
<div id="main" style="padding:20px">
	<table class="invoice-client" style="margin-top:10px;width:100%">
		<tr>
			<td colspan="3">
				Nombre o razón social: 
				<?php echo $invoice['Organization']['name']; ?>
			</td>
			
		</tr>
		<tr>
			<td colspan="3">Dirección Fiscal: <?php echo (isset($invoice['Organization']['Contact'][0]) ? $invoice['Organization']['Contact'][0]['name'] : 'N/A'); ?></td>
		</tr>
		<tr>
			<td>Rif: <?php echo $invoice['Organization']['fiscalid']; ?></td>
			<td>Nit: <?php echo $invoice['Organization']['yafiscalid']; ?></td>
			
		</tr>
	</table>
	<table class="invoice-details" style="margin-top:30px;width:100%">
		<tr>
			<th>
				Nota de Crédito
			</th>
			<th>
				Emision
			</th>
		</tr>
		<tr>
			<td align="center"><?php echo $creditNote['CreditNote']['number']; ?></td>
			<td align="center"><?php echo $this->Time->format($creditNote['CreditNote']['created'], '%d/%m/%Y'); ?></td>
		</tr>
		</table>
	<table class="invoice-details" style="text-align: center; margin-top:30px;width:100%">
		<tr>
			<th style="width:20%">
				Factura Número
			</th>
			<th>
				Descipción
			</th>
		</tr>
		<tr>
				<td>
					<?php echo $invoice['number']; ?>
				</td>
				<td>
					<?php echo nl2br(h($creditNote['CreditNote']['note'])); ?>
				</td>
		</tr>		
	</table>
</div>