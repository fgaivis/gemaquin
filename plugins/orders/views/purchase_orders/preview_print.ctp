<?php $this->Number->addFormat('Bs', array('before' => 'Bs. ', 'thousands' => '.', 'decimals' => ',')); ?>
<?php
	$provider = $purchaseOrder['Provider'];
	$items = $purchaseOrder['Item'];
	$order = $purchaseOrder['PurchaseOrder'];
?>
<div id="main" style="padding:20px">
	<table class="invoice-no-border">
		<tr>
			<td width="20%"><?php echo $this->Html->image('logo-gemaquin.png', array()); ?></td>
			<td width="80%">
				<span>
				REPRESENTACIONES IV GEMAQUIN C.A.
				<br/>
				RIF: J-30269764-6
				<br/>
				Calle 3B, Edif. Escachia, Piso1, Local 1-A.  La Urbina, Caracas.
				<br/>
				Teléfonos: 0212 241 6468 / 241 6775 - Fax: 0212 241 7917
				<br/>
				email: venta.gemaquin@cantv.net
				</span>
			</td>
		</tr>
	</table>
	<hr style="margin-top: 30px;">
	<table class="invoice-no-border">
		<tr>
			<td width="25%"></td>
			<td><span style="font-weight: bold; font-size: 18px">
				 <?php echo __('PURCHASE ORDER'); ?>
			</span></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td><span style="font-weight: bold; font-size: 14px">
				<?php echo __('Fiscalid') . ': ' . $provider['fiscalid']; ?> 
			</span></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td><span style="font-weight: bold; font-size: 14px">
				<?php echo __('Provider')  . ': ' . $provider['name']; ?> 
			</span></td>
		</tr>
	</table>
	<table class="invoice-client" style="margin-top:20px;width:100%">
		<tr>
			<td width="60%" style="border: none;"></td>
			<td width="40%" colspan="2"><span style="font-weight: bold;"><?php echo __('PURCHASE ORDER'); ?></span></td>
		</tr>
		<tr>
			<td width="60%" style="border: none;"></td>
			<td width="40%" colspan="2"><span style="font-weight: bold;"><?php echo $order['number'] . ' / ' . date('Y', strtotime($order['created'])); ?></span></td>
		</tr>
		<tr>
			<td width="60%" style="border: none;"></td>
			<td width="40%" colspan="2">Caracas, <?php echo date('M d - Y', strtotime($order['created'])); ?></td>
		</tr>
		<tr>
			<td width="60%"><span style="font-weight: bold;"><?php echo __('PRODUCT'); ?></span></td>
			<td width="20%"><span style="font-weight: bold;"><?php echo __('QUANTITY'); ?></span></td>
			<td width="20%"><span style="font-weight: bold;"><?php echo __('PRICE'); ?></span></td>
		</tr>
		<?php foreach ($items as $item): ?>
		<tr>
			<td width="60%"><span><?php echo $item['name']; ?></span></td>
			<td width="20%"><span><?php echo $item['sells_by_kg'] ? $item['ItemsPurchaseOrder']['kg_quantity'] . ' Kg' : $item['ItemsPurchaseOrder']['quantity']; ?></span></td>
			<td width="20%"><span><?php echo $order['draft_invoice_id'] ? 'Precio' : 'N/A'; ?></span></td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<td width="80%" colspan="2"><span style="font-weight: bold;"><?php echo __('DELIVERY') . ':'; ?></span>
				<br/><span style="font-weight: bold; font-size: 24px"><?php echo __('INMEDIATE'); ?></span>
			</td>
			<td width="20%"></td>
		</tr>
		<tr>
			<td width="80%" colspan="2">
				<span style="font-weight: bold;">Enviar material de reciente fabricación con su respectivo certificado de análisis</span>
			</td>
			<td width="20%"></td>
		</tr>
		<tr>
			<td width="80%" colspan="2">
				<span style="font-weight: bold;">HORARIO DE RECEPCIÓN DE MERCANCÍA: 8:00 am a 12:00 m / 2:00 pm a 4:30 pm</span>
			</td>
			<td width="20%"></td>
		</tr>
		<tr>
			<td width="80%" colspan="2">
				<span style="font-weight: bold;">IMPORTANTE:</span>
				<br/><span style="font-weight: bold;">"EL MATERIAL QUEDA SUJETO A APROBACIÓN POR NUESTRO DPTO. DE CONTROL DE CALIDAD"</span>
			</td>
			<td width="20%"></td>
		</tr>
		<tr>
			<td width="100%" colspan="3">
				<span style="font-weight: bold;">OBSERVACIONES: ANEXAR LA SIGUIENTE DOCUMENTACIÓN</span>
				<br/>
				<ul>
					<li>DATA SHEET DEL PRODUCTO A DESPACHAR</li>
					<li>CERTIFICADO DE ANÁLISIS CORRESPONDIENTE</li>
					<li>DEBE ESPECIFICAR: Nombre del Fabricante, Fecha de Elaboración y Fecha de Expedición</li>
				</ul>
				<br/>
				<span style="font-weight: bold;">NO SE ACEPTARÁ MERCANCÍA SIN SU RESPECTIVO CERTIFICADO DE ANÁLISIS</span>
			</td>
		</tr>
	</table>
	<table class="invoice-no-border" style="margin-top:80px; width:100%">
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;">-------------------------------------</span></td>
		</tr>
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;">ESMERALDA TOLEDO</span></td>
		</tr>
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;"></span></td>
		</tr>
		<tr>
			<td width="65%"></td>
			<td><span style="font-weight: bold;">TELF. 0212 - 241 64 68</span></td>
		</tr>
	</table>
</div>