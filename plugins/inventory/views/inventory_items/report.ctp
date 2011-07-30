<div id="main">
	<div id="col1" role="main">
        <div id="col1_content">
			<?php foreach($inventoryItems as $i => $item): ?>
			<table style="width:100%">
				<tr>
					<td style="width:25%">Gemaquin</td>
					<td style="width:75%"><h1><?php __('Goods Reception'); ?></h1></td>
				</tr>
			</table>
			<h2><?php __('Reception'); ?></h2>
			<table style="width:100%">
				<tr>
					<td style="width:25%"><?php __('Inventory Entry Number'); ?></td>
					<td style="width:25%"><?php echo $item['InventoryItem']['inventory_entry_id']; ?></td>
					<td style="width:25%"><?php __('Page'); ?></td>
					<td style="width:25%"><?php echo ($i + 1) ?></td>
				</tr>
				<tr>
					<td style="width:25%"><?php __('Provider'); ?></td>
					<td style="width:75%" colspan="3"><?php echo $item['PurchaseOrder']['Provider']['name']; ?></td>
				</tr>
				<tr>
					<td style="width:25%"><?php __('Provider ID'); ?></td>
					<td style="width:25%"><?php echo $item['PurchaseOrder']['Provider']['code']; ?></td>
					<td style="width:25%"><?php __('Date'); ?></td>
					<td style="width:25%"><?php echo $this->Time->format(time(), '%x %r'); ?></td>
				</tr>
				<tr>
					<td style="width:25%"><?php __('Purchase Order'); ?></td>
					<td style="width:25%"><?php echo $item['PurchaseOrder']['number']; ?></td>
					<td style="width:25%"><?php __('Invoice'); ?></td>
					<td style="width:25%"><?php echo $item['PurchaseOrder']['Invoice']['number']; ?></td>
				</tr>
			</table>
			<h2><?php __('Goods'); ?></h2>
			<table style="width:100%">
				<tr>
					<td style="width:25%"><?php __('Batch'); ?></td>
					<td style="width:25%"><?php echo $item['InventoryItem']['batch']; ?></td>
					<td style="width:25%"><?php __('Industry'); ?></td>
					<td style="width:25%"><?php echo $item['Item']['industry']; ?></td>
				</tr>
				<tr>
					<td style="width:25%"><?php __('Manufacturing Date'); ?></td>
					<td style="width:25%"> </td>
					<td style="width:25%"><?php __('Expiration Date'); ?></td>
					<td style="width:25%"><?php echo $this->Time->format($item['InventoryItem']['expiration_date'], '%x'); ?></td>
				</tr>				
			</table>
			<table style="width:100%">
				<tr>
					<td style="width:17%"><?php __('Exceeding units'); ?></td>
					<td style="width:17%"></td>
					<td style="width:17%"><?php __('Damaged units'); ?></td>
					<td style="width:17%"> </td>
					<td style="width:17%"><?php __('Total units'); ?></td>
					<td style="width:17%"><?php echo $item['InventoryItem']['quantity']; ?></td>
				</tr>
			</table>
			<h2><?php __('Conditions'); ?></h2>
			<table style="width:100%">
				<tr>
					<td style="width:70%; text-align:center"><?php __('Conditions'); ?></td>
					<td style="width:15%;"><?php __('Yes'); ?></td>
					<td style="width:15%;"><?php __('No'); ?></td>
				</tr>
				<tr>
					<td style="width:70%;">Coinciden todos los datos de la mercancia recibida con la orden de compra</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%;">Se encuentra externamente en buenas condiciones los envios contentivos de la materia prima solicitada</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%;">La identificacion de la mercancia se encuentra completa incluyendo el certificado de analisis</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>	
				<tr>
					<td style="width:70%;">Estan todos los envases sellados e identificados</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%;">La identificacion externa incluye los siguientes datos</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%; padding-left:50px">Nombre</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%; padding-left:50px">Numero de Lote</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%; padding-left:50px">Fecha de elaboracion</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%; padding-left:50px">Fecha de expiracion</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
				<tr>
					<td style="width:70%;padding-left:50px">Contenido neto por envase</td>
					<td style="width:15%;"></td>
					<td style="width:15%;"></td>
				</tr>
			</table>
			<hr class="pagebreak"/>
			<?php endforeach; ?>
        </div>
      </div>
</div>