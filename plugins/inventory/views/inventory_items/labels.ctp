<div style="width:580px;margin:auto">
	<?php foreach ($inventoryItems as $item) :?>
		<?php for ($i=0; $i < $item['InventoryItem']['quantity']; $i++) : ?>
			<div style="border:1px solid black; height:173px; margin-top:15px;page-break-inside:avoid; padding:0 10px">
				<h2 style="text-align:center; font-size:14px">Identificación de Insumos</h2>
				<div style="font-size:13px">
					Descripcion: <?php echo $item['Item']['name']; ?>
				</div>
				<div style="font-size:13px; margin-top:5px">
					<span style="display:inline-block; width:30%">Lote: <?php echo $item['InventoryItem']['batch']?></span>
					<span style="display:inline-block; width:30%">Fecha Elab.: N/A</span>
					<span style="display:inline-block; width:30%">Fecha Ven.: <?php echo $item['InventoryItem']['expiration_date']; ?></span>
				</div>
				<div style="font-size:13px; margin-top:5px">
					Empaque: <?php echo $item['Item']['package_factor']; ?>
				</div>
				<div style="text-align:center;margin-top:15px">
					<img src="<?php echo $this->Html->url(array('action' => 'barcode', $item['InventoryItem']['id'])); ?>" />
				</div>
			</div>
		<?php endfor;?>
	<?php endforeach; ?>
</div>