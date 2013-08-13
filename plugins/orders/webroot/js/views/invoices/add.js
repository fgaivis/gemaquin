$(function(){
	/*$('.no-exempt').change(function() {
		//var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? 0 : parseFloat($('#InvoiceTotal').val()));
		var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
		//var _tax = (isNaN(parseFloat($('#InvoiceTax').val())) ? 0 : parseFloat($('#InvoiceTax').val()));
		var _total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotal').val()));
		
		_tax = (no_exempt * 0.12).toFixed(2);
		$('#InvoiceTax').val(_tax);
		_total = _total + no_exempt + parseFloat(_tax);
		$('#InvoiceTotal').val(_total);
	});
	$('.exempt').change(function() {
		var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
		//var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? 0 : parseFloat($('#InvoiceTotal').val()));
		//var _tax = (isNaN(parseFloat($('#InvoiceTax').val())) ? 0 : parseFloat($('#InvoiceTotal').val()));
		var _total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotal').val()));
		
		_total = _total + _exempt;
		$('#InvoiceTotal').val(_total);
	});*/
	
	//A PARTIR DE ACA ES QUE SE USA ESTE ARCHIVO
	
	$('.item-price').change(function() {
		var total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? 0 : parseFloat($('#InvoiceTotal').val()));
		var insurance = (isNaN(parseFloat($('#InvoiceInsurance').val())) ? 0 : parseFloat($('#InvoiceInsurance').val()));
		var shipping = (isNaN(parseFloat($('#InvoiceShipping').val())) ? 0 : parseFloat($('#InvoiceShipping').val()));
		var customsTax = (isNaN(parseFloat($('#InvoiceCustomsTax').val())) ? 0 : parseFloat($('#InvoiceCustomsTax').val()));
		var customsAdm = (isNaN(parseFloat($('#InvoiceCustomsAdm').val())) ? 0 : parseFloat($('#InvoiceCustomsAdm').val()));
		var intShipping = (isNaN(parseFloat($('#InvoiceInternalShipping').val())) ? 0 : parseFloat($('#InvoiceInternalShipping').val()));
		var outgoings  = insurance + shipping + customsTax + customsAdm + intShipping;
		total = total + outgoings;
		//Calculo de precio total por renglon
			var index = $(this).attr('index');
			if (index === undefined) {
				$('.item-price').each(function(index){
					var checked = $('#InvoicesItem' + index + 'Exempt').attr('checked');
					var prev_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'IndividualCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'IndividualCost').val()));
					var quantity = $('#InvoicesItem' + index + 'Quantity').val();
					var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
					if(checked){
						var tax = 0;
					} else {
						var tax = (((price * quantity) * 12) / 100);
					}
					var total_price = ((price * quantity) + tax);
					//var total_price = (price * quantity);
					$('#InvoicesItem' + index + 'IndividualCost').val(price);
					$('#InvoicesItem' + index + 'Tax').val(tax);
					$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
					$('.tax-label[index=' + index + ']').html(tax);
					$('.total_price-label[index=' + index + ']').html(total_price);
					//Calculo de precios totales de la factura
					var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
					var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
					var _total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotal').val()));
					if(checked){
						_exempt = _exempt - (prev_cost * quantity);
						_exempt = _exempt + (price * quantity);
						$('#InvoiceTotalExempt').val(_exempt);
					} else {
						no_exempt = no_exempt - (prev_cost * quantity);
						no_exempt = no_exempt + (price * quantity);
						$('#InvoiceTotalNoExempt').val(no_exempt);
					}
					_tax = (no_exempt * 0.12).toFixed(2);
					$('#InvoiceTax').val(_tax);
					_total = _exempt + no_exempt + parseFloat(_tax);
					$('#InvoiceTotal').val(_total);
				});
			} else {
				var checked = $('#InvoicesItem' + index + 'Exempt').attr('checked');
				var prev_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'IndividualCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'IndividualCost').val()));
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
				if(checked){
					var tax = 0;
				} else {
					var tax = (((price * quantity) * 12) / 100);
				}
				var total_price = ((price * quantity) + tax);
				//var total_price = (price * quantity);
				$('#InvoicesItem' + index + 'IndividualCost').val(price);
				$('#InvoicesItem' + index + 'Tax').val(tax);
				$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
				$('.tax-label[index=' + index + ']').html(tax);
				$('.total_price-label[index=' + index + ']').html(total_price);
				//Calculo de precios totales de la factura
				var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
				var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
				var _total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotal').val()));
				if(checked){
					_exempt = _exempt - (prev_cost * quantity);
					_exempt = _exempt + (price * quantity);
					$('#InvoiceTotalExempt').val(_exempt);
				} else {
					no_exempt = no_exempt - (prev_cost * quantity);
					no_exempt = no_exempt + (price * quantity);
					$('#InvoiceTotalNoExempt').val(no_exempt);
				}
				_tax = (no_exempt * 0.12).toFixed(2);
				$('#InvoiceTax').val(_tax);
				_total = _exempt + no_exempt + parseFloat(_tax);
				$('#InvoiceTotal').val(_total);
			}
	});
});

//Seleccion de Item Exento de IVA Si o No
$('.item-exempt').change(function() {
	var index = $(this).attr('index');
	var checked = $(this).attr('checked');
	if (index != undefined) {
		if (checked) {
			var quantity = $('#InvoicesItem' + index + 'Quantity').val();
			var price = (isNaN(parseFloat($('#InvoicesItem' + index + 'Price').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'Price').val()));
			var total_price = ((price * quantity));
			$('#InvoicesItem' + index + 'Tax').val(0);
			$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
			$('.tax-label[index=' + index + ']').html(0);
			$('.total_price-label[index=' + index + ']').html(total_price);
			//Calculo de precios totales de la factura
			var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
			var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
			var _total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotal').val()));
			if(checked){
				no_exempt = no_exempt - (price * quantity);
				$('#InvoiceTotalNoExempt').val(no_exempt);
				_exempt = _exempt + (price * quantity);
				$('#InvoiceTotalExempt').val(_exempt);
			} else {
				_exempt = _exempt - (price * quantity);
				$('#InvoiceTotalExempt').val(_exempt);
				no_exempt = no_exempt + (price * quantity);
				$('#InvoiceTotalNoExempt').val(no_exempt);
			}
			_tax = (no_exempt * 0.12).toFixed(2);
			$('#InvoiceTax').val(_tax);
			_total = _exempt + no_exempt + parseFloat(_tax);
			$('#InvoiceTotal').val(_total);
		} else {
			var quantity = $('#InvoicesItem' + index + 'Quantity').val();
			var price = (isNaN(parseFloat($('#InvoicesItem' + index + 'Price').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'Price').val()));
			var tax = (((price * quantity) * 12) / 100);
			var total_price = ((price * quantity) + tax);
			$('#InvoicesItem' + index + 'Tax').val(tax);
			$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
			$('.tax-label[index=' + index + ']').html(tax);
			$('.total_price-label[index=' + index + ']').html(total_price);
			//Calculo de precios totales de la factura
			var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
			var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
			var _total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotal').val()));
			if(checked){
				no_exempt = no_exempt - (price * quantity);
				$('#InvoiceTotalNoExempt').val(no_exempt);
				_exempt = _exempt + (price * quantity);
				$('#InvoiceTotalExempt').val(_exempt);
			} else {
				_exempt = _exempt - (price * quantity);
				$('#InvoiceTotalExempt').val(_exempt);
				no_exempt = no_exempt + (price * quantity);
				$('#InvoiceTotalNoExempt').val(no_exempt);
			}
			_tax = (no_exempt * 0.12).toFixed(2);
			$('#InvoiceTax').val(_tax);
			_total = _exempt + no_exempt + parseFloat(_tax);
			$('#InvoiceTotal').val(_total);
		}			
	} 
});

//Suma de outgoings para prorrateo
$('.outgoings').change(function() {
	var insurance = (isNaN(parseFloat($('#InvoiceInsurance').val())) ? 0 : parseFloat($('#InvoiceInsurance').val()));
	var shipping = (isNaN(parseFloat($('#InvoiceShipping').val())) ? 0 : parseFloat($('#InvoiceShipping').val()));
	var customsTax = (isNaN(parseFloat($('#InvoiceCustomsTax').val())) ? 0 : parseFloat($('#InvoiceCustomsTax').val()));
	var customsAdm = (isNaN(parseFloat($('#InvoiceCustomsAdm').val())) ? 0 : parseFloat($('#InvoiceCustomsAdm').val()));
	var intShipping = (isNaN(parseFloat($('#InvoiceInternalShipping').val())) ? 0 : parseFloat($('#InvoiceInternalShipping').val()));
	var outgoings  = insurance + shipping + customsTax + customsAdm + intShipping;
	if(outgoings != 0){
		$('#EachText').show();
		$('#OutgoingsEach').show();
		$('#OutgoingsTotal').html(outgoings);
		var count_of_items = (isNaN(parseFloat($('#CountOfItems').html())) ? 0 : parseFloat($('#CountOfItems').html()));
		var outgoings_each = (outgoings / count_of_items);
		$('#OutgoingsEach').html(outgoings_each.toFixed(4));
	} else {
		$('#EachText').hide();
		$('#OutgoingsEach').hide();
		$('#OutgoingsTotal').html(outgoings);
	}
});

//Cargando precios la primera vez automaticamente
function updatePrices() {
	$('.item-price').each(function(index){
		var quantity = $('#InvoicesItem' + index + 'Quantity').val();
		var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
		var tax = (((price * quantity) * 12) / 100);
		var total_price = ((price * quantity) + tax);
		//var total_price = (price * quantity);
		$('#InvoicesItem' + index + 'IndividualCost').val(price);
		$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
		$('.tax-label[index=' + index + ']').html(tax);
		$('.total_price-label[index=' + index + ']').html(total_price);
	});
	$('#EachText').hide();
	$('#OutgoingsEach').hide();
}
updatePrices();
