<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<?php
	$invoice = $debitNote['InvoicesNote']['Invoice'];
?>
<div id="main" style="padding:20px">
	<hr style="margin-top: 120px;">
	<table class="invoice-client" style="margin-top:10px;width:100%">
		<tr>
			<td colspan="2">Cliente: <b><?php echo $debitNote['Organization']['name']; ?></b></td>
			<!-- <td></td> -->		
		</tr>
		<tr>
			<td colspan="2">Dirección: <?php echo (isset($debitNote['Contact']) ? $debitNote['Contact']['name'] : 'N/A'); ?></td>
			<!-- <td></td> -->
		</tr>
		<tr>
			<td width="30%">Rif: <b><?php echo $debitNote['Organization']['fiscalid']; ?></b></td>
			<td width="70%">Nit: <?php echo $debitNote['Organization']['yafiscalid']; ?></td>			
		</tr>
	</table>
	<table class="invoice-top" style="margin-top:30px;width:100%">
		<tr>
			<th>
				O/Compra
			</th>
			<th>
				Nota de Débito
			</th>
			<th>
				Emision
			</th>
		</tr>
		<tr>
			<td align="center"><?php echo $invoice['SalesOrder']['number']; ?></td>
			<td align="center"><?php echo $debitNote['DebitNote']['number']; ?></td>
			<td align="center"><?php echo $this->Time->format($debitNote['DebitNote']['created'], '%d/%m/%Y'); ?></td>
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
				<?php echo $debitNote['DebitNote']['concept']; ?>
			</td>
			<td width="25%">
				<?php echo $this->Number->currency($debitNote['DebitNote']['amount'], ''); ?>
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
			<td><span style="font-weight: bold;"><?php echo nl2br(h($debitNote['DebitNote']['note'])); ?> </span></td>
		</tr>
	</table>
	<hr>
	<table class="invoice-bottom" style="text-align: center; margin-top:10px;width:100%">
		<tr>
			<td colspan="3" align="right">Total Neto:</td>
			<td align="right"><?php echo $this->Number->currency($debitNote['DebitNote']['amount'], ''); ?></td>
		</tr>
		<tr>
			<td colspan="3" align="right">IVA (12%):</td>
			<td align="right"><?php echo $this->Number->currency($debitNote['DebitNote']['amount'] * 0.12, ''); ?></td>
		</tr>
		<tr>
			<td colspan="3" align="right">Total Bs.:</td>
			<td align="right"><?php echo $this->Number->currency($debitNote['DebitNote']['amount'] * 1.12, ''); ?></td>
		</tr>		
	</table>
</div>