$(function(){
	$('.item-price').change(function() {
		var total = (isNaN(parseFloat($('#InvoiceTotal').val())) ? 0 : parseFloat($('#InvoiceTotal').val()));
		var insurance = (isNaN(parseFloat($('#InvoiceInsurance').val())) ? 0 : parseFloat($('#InvoiceInsurance').val()));
		var shipping = (isNaN(parseFloat($('#InvoiceShipping').val())) ? 0 : parseFloat($('#InvoiceShipping').val()));
		var customsTax = (isNaN(parseFloat($('#InvoiceCustomsTax').val())) ? 0 : parseFloat($('#InvoiceCustomsTax').val()));
		var customsAdm = (isNaN(parseFloat($('#InvoiceCustomsAdm').val())) ? 0 : parseFloat($('#InvoiceCustomsAdm').val()));
		var intShipping = (isNaN(parseFloat($('#InvoiceInternalShipping').val())) ? 0 : parseFloat($('#InvoiceInternalShipping').val()));
		var outgoings  = insurance + shipping + customsTax + customsAdm + intShipping;
		total = total + outgoings;
		if (total > 0) {
			var index = $(this).attr('index');
			if (index === undefined) {
				$('.item-price').each(function(index){
					var quantity = $('#InvoicesItem' + index + 'Quantity').val();
					var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
					//var tax = (isNaN(parseFloat($('.item-tax[index=' + index + ']').val())) ? 0 : parseFloat($('.item-tax[index=' + index + ']').val()));
					var apportionment = (price * quantity);
					$('#InvoicesItem' + index + 'Apportionment').val(apportionment);
					$('.apportionment-label[index=' + index + ']').html(apportionment);
				});
			} else {
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($('.item-price[index=' + index + ']').val())) ? 0 : parseFloat($('.item-price[index=' + index + ']').val()));
				//var tax = (isNaN(parseFloat($('.item-tax[index=' + index + ']').val())) ? 0 : parseFloat($('.item-tax[index=' + index + ']').val()));
				var apportionment = (price * quantity);
				$('#InvoicesItem' + index + 'Apportionment').val(apportionment);
				$('.apportionment-label[index=' + index + ']').html(apportionment);
			}			
		} else {
			var index = $(this).attr('index');
			if (index === undefined) {
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
				var apportionment = (price * quantity);
				$('#InvoicesItem' + index + 'Apportionment').val(apportionment);
				$('.apportionment-label[index=' + index + ']').html(apportionment);
			} else {
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
				var apportionment = (price * quantity);
				$('#InvoicesItem' + index + 'Apportionment').val(apportionment);
				$('.apportionment-label[index=' + index + ']').html(apportionment);
			}			
		}
	});
	
	//Solo para Ordenes/Facturas de Venta
	$('.item-exempt').change(function() {
		var index = $(this).attr('index');
		var checked = $(this).attr('checked');
		if (index != undefined) {
			$('.invoice-tax[index=' + index + ']').val(0);
			if (checked) {
				$('.item-tax[index=' + index + ']').attr('disabled', 'disabled');
			} else {
				$('.item-tax[index=' + index + ']').removeAttr('disabled');
			}			
		} 
	});
		
});

