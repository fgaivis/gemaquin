<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<div id="main" style="padding:20px">
	<h1 style="text-align:right; font-size:16px">Factura N. <?php echo $invoice['Invoice']['number']?></h1>
	<table class="invoice-date" style="width:20%">
		<tr>
			<th colspan="3">Fecha</th>
		</tr>
		<tr>
			<th>Dia</th>
			<th>Mes</th>
			<th>Año</th>
		</tr>
		<tr>
			<td><?php echo $this->Time->format($invoice['Invoice']['created'], '%d')?></td>
			<td><?php echo $this->Time->format($invoice['Invoice']['created'], '%m')?></td>
			<td><?php echo $this->Time->format($invoice['Invoice']['created'], '%Y')?></td>
		</tr>
	</table>
	<table class="invoice-client" style="margin-top:10px;width:100%">
		<tr>
			<td colspan="2">
				Nombre o razón social: 
				<?php echo $invoice['Organization']['name']; ?>
			</td>
			<td>Rif: <?php echo $invoice['Organization']['fiscalid']; ?></td>
		</tr>
		<tr>
			<td colspan="3">Dirección Fiscal: Completar</td>
		</tr>
		<tr>
			<td>Oficina: Completar</td>
			<td>Telefono: Completar</td>
			<td>Estado: Completar</td>
		</tr>
		<tr>
			<td colspan="2">Orden de Entrega: <?php echo 'Completar'?> </td>
			<td>Pago: Contado</td>
		</tr>
	</table>
	<table class="invoice-details" style="margin-top:30px;width:100%">
		<tr>
			<th>
				Cantidad
			</th>
			<th>
				Descripción
			</th>
			<th>
				Precio Unitario
			</th>
			<th>
				Total Bs.
			</th>
		</tr>
		<?php foreach ($invoice['InvoicesItem'] as $item) : ?>
		<tr>
				<td>
					<?php echo $item['quantity']; ?>
				</td>
				<td>
					<?php echo $item['Item']['name'] . ' (' . $item['Item']['package_factor']  . ')'; ?>
				</td>
				<td>
					<?php echo $this->Number->currency($item['price'], 'Bs'); ?>
				</td>
				<td>
					<?php echo $this->Number->currency($item['price'] * $item['quantity'], 'Bs'); ?>
				</td>
		</tr>
		<?php endforeach; ?>
		<tr>
		<tr>
			<td colspan="2" rowspan="3" valign="top">Firma y Sello</td>
			<td>Subtotal</td>
			<td><?php echo $this->Number->currency($invoice['Invoice']['subtotal'], 'Bs'); ?></td>
		</tr>
		<tr>
			<td>IVA</td>
			<td><?php echo $this->Number->format($invoice['Invoice']['tax'], array('decimals' => '.', 'positions' => 2, 'before' => '')); ?></td>
		</tr>
		<tr>
			<td>Total</td>
			<td><?php echo $this->Number->currency($invoice['Invoice']['total'], 'Bs'); ?></td>
		</tr>
	</table>
</div>