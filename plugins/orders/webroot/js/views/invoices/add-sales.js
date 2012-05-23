$(function(){
	$('.item-price').change(function() {
		var total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? 0 : parseFloat($('#InvoiceTotal').val()));
		var insurance = (isNaN(parseFloat($('#InvoiceInsurance').val())) ? 0 : parseFloat($('#InvoiceInsurance').val()));
		var intShipping = (isNaN(parseFloat($('#InvoiceInternalShipping').val())) ? 0 : parseFloat($('#InvoiceInternalShipping').val()));
		var outgoings  = insurance + intShipping;
		total = total + outgoings;
		//Calculo de precio total por renglon
			var index = $(this).attr('index');
			if (index === undefined) {
				$('.item-price').each(function(index){
					var quantity = $('#InvoicesItem' + index + 'Quantity').val();
					var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
					var tax = (((price * quantity) * 12) / 100);
					var total_price = ((price * quantity) + tax);
					var cost = $('.cost-label[index=' + index + ']').html();
					var profit_margin = (cost != 0) ? (((price - cost) * 100) / cost) : 0;
					$('#InvoicesItem' + index + 'IndividualCost').val(price);
					$('#InvoicesItem' + index + 'Tax').val(tax);
					$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
					$('.profit-label[index=' + index + ']').html(profit_margin.toFixed(2) + "%");
					$('.tax-label[index=' + index + ']').html(tax);
					$('.total_price-label[index=' + index + ']').html(total_price);
				});
			} else {
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
				var tax = (((price * quantity) * 12) / 100);
				var total_price = ((price * quantity) + tax);
				var cost = $('.cost-label[index=' + index + ']').html();
				var profit_margin = (cost != 0) ? (((price - cost) * 100) / cost) : 0;
				$('#InvoicesItem' + index + 'IndividualCost').val(price);
				$('#InvoicesItem' + index + 'Tax').val(tax);
				$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
				$('.profit-label[index=' + index + ']').html(profit_margin.toFixed(2) + "%");
				$('.tax-label[index=' + index + ']').html(tax);
				$('.total_price-label[index=' + index + ']').html(total_price);
			}
	});
	
	//Solo para Ordenes/Facturas de Venta
	$('.item-exempt').change(function() {
		var index = $(this).attr('index');
		var checked = $(this).attr('checked');
		if (index != undefined) {
			if (checked) {
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($('#InvoicesItem' + index + 'IndividualCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'IndividualCost').val()));
				var total_price = ((price * quantity));
				$('#InvoicesItem' + index + 'Tax').val(0);
				$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
				$('.tax-label[index=' + index + ']').html(0);
				$('.total_price-label[index=' + index + ']').html(total_price);
			} else {
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($('#InvoicesItem' + index + 'IndividualCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'IndividualCost').val()));
				var tax = (((price * quantity) * 12) / 100);
				var total_price = ((price * quantity) + tax);
				$('#InvoicesItem' + index + 'Tax').val(tax);
				$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
				$('.tax-label[index=' + index + ']').html(tax);
				$('.total_price-label[index=' + index + ']').html(total_price);
			}			
		} 
	});
		
});

