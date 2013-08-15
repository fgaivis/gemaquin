$(function(){
	$('.item-price').change(function() {		
		//Calculo de precio total por renglon
			var index = $(this).attr('index');
			if (index === undefined) {
				$('.item-price').each(function(index){
					var checked = $('#InvoicesItem' + index + 'Exempt').attr('checked');
					var prev_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'IndividualCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'IndividualCost').val()));
					var quantity = (parseFloat($('#InvoicesItem' + index + 'Quantity').val()) == 0 ? parseFloat($('#InvoicesItem' + index + 'KgQuantity').val()) : parseFloat($('#InvoicesItem' + index + 'Quantity').val()));
					var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
					if(checked){
						var i_tax = 0;
						var tax = 0;
					} else {
						var i_tax = (((price * 1) * 12) / 100);
						var tax = (((price * quantity) * 12) / 100);
					}
					var total_price = ((price * quantity) + tax);
					$('#InvoicesItem' + index + 'IndividualCost').val(price);
					$('#InvoicesItem' + index + 'Tax').val(i_tax);
					$('#InvoicesItem' + index + 'TotalTax').val(tax);
					var purch_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val()));
					var total_cost = (purch_cost == 0 ? (price * quantity) : (purch_cost * quantity));
					$('#InvoicesItem' + index + 'TotalCost').val(total_cost);
					$('.tax-label[index=' + index + ']').html(tax);
					$('.total_price-label[index=' + index + ']').html(total_price);
					//Calculo de precios totales de la factura
					var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
					var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
					var _sub_total = (isNaN(parseFloat($('#InvoiceSubtotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceSubtotal').val()));
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
					_sub_total = _exempt + no_exempt;
					$('#InvoiceSubtotal').val(_sub_total);
					_total = _exempt + no_exempt + parseFloat(_tax);
					$('#InvoiceTotal').val(_total);
				});
			} else {
				var checked = $('#InvoicesItem' + index + 'Exempt').attr('checked');
				var prev_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'IndividualCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'IndividualCost').val()));
				var quantity = (parseFloat($('#InvoicesItem' + index + 'Quantity').val()) == 0 ? parseFloat($('#InvoicesItem' + index + 'KgQuantity').val()) : parseFloat($('#InvoicesItem' + index + 'Quantity').val()));
				var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
				if(checked){
					var i_tax = 0;
					var tax = 0;
				} else {
					var i_tax = (((price * 1) * 12) / 100);
					var tax = (((price * quantity) * 12) / 100);
				}
				var total_price = ((price * quantity) + tax);
				$('#InvoicesItem' + index + 'IndividualCost').val(price);
				$('#InvoicesItem' + index + 'Tax').val(i_tax);
				$('#InvoicesItem' + index + 'TotalTax').val(tax);
				var purch_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val()));
				var total_cost = (purch_cost == 0 ? (price * quantity) : (purch_cost * quantity));
				$('#InvoicesItem' + index + 'TotalCost').val(total_cost);
				$('.tax-label[index=' + index + ']').html(tax);
				$('.total_price-label[index=' + index + ']').html(total_price);
				//Calculo de precios totales de la factura
				var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
				var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
				var _sub_total = (isNaN(parseFloat($('#InvoiceSubtotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceSubtotal').val()));
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
				_sub_total = _exempt + no_exempt;
				$('#InvoiceSubtotal').val(_sub_total);
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
			var quantity = (parseFloat($('#InvoicesItem' + index + 'Quantity').val()) == 0 ? parseFloat($('#InvoicesItem' + index + 'KgQuantity').val()) : parseFloat($('#InvoicesItem' + index + 'Quantity').val()));
			var price = (isNaN(parseFloat($('#InvoicesItem' + index + 'Price').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'Price').val()));
			var total_price = ((price * quantity));
			$('#InvoicesItem' + index + 'IndividualCost').val(price);
			$('#InvoicesItem' + index + 'Tax').val(0);
			$('#InvoicesItem' + index + 'TotalTax').val(0);
			var purch_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val()));
			var total_cost = (purch_cost == 0 ? (price * quantity) : (purch_cost * quantity));
			$('#InvoicesItem' + index + 'TotalCost').val(total_cost);
			$('.tax-label[index=' + index + ']').html(0);
			$('.total_price-label[index=' + index + ']').html(total_price);
			//Calculo de precios totales de la factura
			var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
			var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
			var _sub_total = (isNaN(parseFloat($('#InvoiceSubtotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceSubtotal').val()));
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
			_sub_total = _exempt + no_exempt;
			$('#InvoiceSubtotal').val(_sub_total);
			_total = _exempt + no_exempt + parseFloat(_tax);
			$('#InvoiceTotal').val(_total);
		} else {
			var quantity = (parseFloat($('#InvoicesItem' + index + 'Quantity').val()) == 0 ? parseFloat($('#InvoicesItem' + index + 'KgQuantity').val()) : parseFloat($('#InvoicesItem' + index + 'Quantity').val()));
			var price = (isNaN(parseFloat($('#InvoicesItem' + index + 'Price').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'Price').val()));
			var i_tax = (((price * 1) * 12) / 100);
			var tax = (((price * quantity) * 12) / 100);
			var total_price = ((price * quantity) + tax);
			$('#InvoicesItem' + index + 'IndividualCost').val(price);
			$('#InvoicesItem' + index + 'Tax').val(i_tax);
			$('#InvoicesItem' + index + 'TotalTax').val(tax);
			var purch_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val()));
			var total_cost = (purch_cost == 0 ? (price * quantity) : (purch_cost * quantity));
			$('#InvoicesItem' + index + 'TotalCost').val(total_cost);
			$('.tax-label[index=' + index + ']').html(tax);
			$('.total_price-label[index=' + index + ']').html(total_price);
			//Calculo de precios totales de la factura
			var no_exempt = (isNaN(parseFloat($('#InvoiceTotalNoExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalNoExempt').val()));
			var _exempt = (isNaN(parseFloat($('#InvoiceTotalExempt').val())) ? parseFloat(0) : parseFloat($('#InvoiceTotalExempt').val()));
			var _sub_total = (isNaN(parseFloat($('#InvoiceSubtotal').val())) ? parseFloat(0) : parseFloat($('#InvoiceSubtotal').val()));
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
			_sub_total = _exempt + no_exempt;
			$('#InvoiceSubtotal').val(_sub_total);
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
		var quantity = (parseFloat($('#InvoicesItem' + index + 'Quantity').val()) == 0 ? parseFloat($('#InvoicesItem' + index + 'KgQuantity').val()) : parseFloat($('#InvoicesItem' + index + 'Quantity').val()));
		var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
		var checked = $('#InvoicesItem' + index + 'Exempt').attr('checked');
		if(checked){
			var i_tax = 0;
			var tax = 0;
		} else {
			var i_tax = (((price * 1) * 12) / 100);
			var tax = (((price * quantity) * 12) / 100);
		}
		var total_price = ((price * quantity) + tax);
		$('#InvoicesItem' + index + 'IndividualCost').val(price);
		$('#InvoicesItem' + index + 'Tax').val(i_tax);
		$('#InvoicesItem' + index + 'TotalTax').val(tax);
		var purch_cost = (isNaN(parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val())) ? 0 : parseFloat($('#InvoicesItem' + index + 'PurchaseCost').val()));
		var total_cost = (purch_cost == 0 ? (price * quantity) : (purch_cost * quantity));
		$('#InvoicesItem' + index + 'TotalCost').val(total_cost);
		$('.tax-label[index=' + index + ']').html(tax);
		$('.total_price-label[index=' + index + ']').html(total_price);
	});
	$('#EachText').hide();
	$('#OutgoingsEach').hide();
}
updatePrices();
//Cargando outgoings la primera vez automaticamente
function getOutgoings() {
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
}
getOutgoings();

//Evitando que se envíe con ENTER
$(document).ready(function() {
	  $(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      return false;
	    }
	  });
});
