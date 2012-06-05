<div style="width:332px;margin:0">
	<?php foreach ($inventoryItems as $item) :?>
		<?php for ($i=0; $i < $item['InventoryItem']['quantity']; $i++) : ?>
			<div style="border:none; height:260px; margin-top:0px;page-break-inside:avoid; padding:0 5px">
				<h2 style="text-align:center; font-size:13px">Identificación de Insumos</h2>
				<h3 style="text-align:center; font-size:13px">Representaciones IV Gemaquin C.A.</h3>
				<h3 style="text-align:center; font-size:12px">RIF: J-30269764-6</h3>
				<h3 style="text-align:center; font-size:12px">Email: gemaquin@cantv.net</h3>
				<div style="font-size:13px">
					Descripcion: <?php echo $item['Item']['name']; ?>
				</div>
				<div style="font-size:13px; margin-top:5px">
					<span style="display:inline-block; width:30%">Lote: <?php echo $item['InventoryItem']['batch']?></span>
					<span style="display:inline-block; width:30%">Fecha Elab.: <?php echo $item['InventoryItem']['elaboration_date']; ?></span>
					<span style="display:inline-block; width:30%">Fecha Ven.: <?php echo $item['InventoryItem']['expiration_date']; ?></span>
				</div>
				<div style="font-size:13px; margin-top:5px">
					Empaque: <?php echo $item['Item']['package_factor']; ?>
				</div>
				<div style="text-align:center;margin-top:15px">
					<?php if($item['Item']['barcode'] != ''): ?>
						<img width="160px" height="60px" src="<?php echo $this->Html->url(array('action' => 'barcode', $item['Item']['barcode'])); ?>" />
					<?php endif; ?>
				</div>
			</div>
		<?php endfor;?>
	<?php endforeach; ?>
</div>