<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<?php
	$invoice = $creditNote['InvoicesNote']['Invoice'];
?>
<div id="main" style="padding:20px">
	<hr style="margin-top: 120px;">
	<table class="invoice-client" style="margin-top:10px;width:100%">
		<tr>
			<td colspan="2">Cliente: <b><?php echo $creditNote['Organization']['name']; ?></b></td>
			<!-- <td></td> -->		
		</tr>
		<tr>
			<td colspan="2">Dirección: <?php echo (isset($creditNote['Contact']) ? $creditNote['Contact']['name'] : 'N/A'); ?></td>
			<!-- <td></td> -->
		</tr>
		<tr>
			<td width="30%">Rif: <b><?php echo $creditNote['Organization']['fiscalid']; ?></b></td>
			<td width="70%">Nit: <?php echo $creditNote['Organization']['yafiscalid']; ?></td>			
		</tr>
	</table>
	<table class="invoice-top" style="margin-top:30px;width:100%">
		<tr>
			<th>
				O/Compra
			</th>
			<th>
				Nota de Crédito
			</th>
			<th>
				Emision
			</th>
		</tr>
		<tr>
			<td align="center"><?php echo $invoice['SalesOrder']['number']; ?></td>
			<td align="center"><?php echo $creditNote['CreditNote']['number']; ?></td>
			<td align="center"><?php echo $this->Time->format($creditNote['CreditNote']['created'], '%d/%m/%Y'); ?></td>
		</tr>
	</table>
	<table class="invoice-details" style="text-align: center; margin-top:30px;width:100%">
		<tr>
			<th width="50%">
				Descripción
			</th>
			<th width="25%">
				Total Neto (Bs.)
			</th>
			<th width="25%">
				Alicuota %
			</th>
		</tr>
		<tr>
			<td width="50%">
				<?php echo $creditNote['CreditNote']['concept']; ?>
			</td>
			<td width="25%">
				<?php echo $this->Number->currency($creditNote['CreditNote']['amount'], ''); ?>
			</td>
			<td width="25%">
				12%
			</td>
		</tr>		
	</table>
	<hr style="margin-top:40px;">
	<table class="invoice-no-border">
		<tr>
			<td width="10%"></td>
			<td><span style="font-weight: bold;"><?php echo nl2br(h($creditNote['CreditNote']['note'])); ?> </span></td>
		</tr>
	</table>
	<hr>
	<table class="invoice-bottom" style="text-align: center; margin-top:10px;width:100%">
		<tr>
			<td colspan="3" align="right">Total Neto:</td>
			<td align="right"><?php echo $this->Number->currency($creditNote['CreditNote']['amount'], ''); ?></td>
		</tr>
		<tr>
			<td colspan="3" align="right">IVA (12%):</td>
			<td align="right"><?php echo $this->Number->currency($creditNote['CreditNote']['amount'] * 0.12, ''); ?></td>
		</tr>
		<tr>
			<td colspan="3" align="right">Total Bs.:</td>
			<td align="right"><?php echo $this->Number->currency($creditNote['CreditNote']['amount'] * 1.12, ''); ?></td>
		</tr>		
	</table>
</div>