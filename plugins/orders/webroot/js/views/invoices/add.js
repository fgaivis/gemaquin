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
		//Calculo de precio total por renglon
			var index = $(this).attr('index');
			if (index === undefined) {
				$('.item-price').each(function(index){
					var quantity = $('#InvoicesItem' + index + 'Quantity').val();
					var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
					var total_price = (price * quantity);
					$('#InvoicesItem' + index + 'IndividualCost').val(price);
					$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
					$('.total_price-label[index=' + index + ']').html(total_price);
				});
			} else {
				var quantity = $('#InvoicesItem' + index + 'Quantity').val();
				var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
				var total_price = (price * quantity);
				$('#InvoicesItem' + index + 'IndividualCost').val(price);
				$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
				$('.total_price-label[index=' + index + ']').html(total_price);
			}			
	});
});
//Cargando precios la primera vez automaticamente
function updatePrices() {
	$('.item-price').each(function(index){
		var quantity = $('#InvoicesItem' + index + 'Quantity').val();
		var price = (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val()));
		var total_price = (price * quantity);
		$('#InvoicesItem' + index + 'IndividualCost').val(price);
		$('#InvoicesItem' + index + 'PurchaseCost').val(total_price);
		$('.total_price-label[index=' + index + ']').html(total_price);
	});
}
updatePrices();
