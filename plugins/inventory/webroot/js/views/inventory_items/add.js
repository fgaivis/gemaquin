$(function(){

	$('#InventoryItemOrderId').change(function() {
		if (!$(this).attr('readonly')) {
			setupAutoComplete($(this).val());
			$(this).attr('readonly', 'readonly');
		}
	});

	function setupAutoComplete(order) {
		$.ajax({
			url: App.basePath +'catalog/items/index/limit:1000/purchase_order:' + order + '.json',
			dataType: 'json',
			success: function(data) {
				options = [];
				for (var i =0; i < data.content.length; i++) {
					options.push({
						value: '',
						label: data.content[i].Item.name + " (" +  data.content[i].Item.barcode + ")",
						Item: data.content[i].Item
					});
				}
				bindCompleter(options);
			},
			error: function() {
			}
		});

		function bindCompleter(options) {
			$('#items input.quick_search').autocomplete({
				autoFocus: true,
				source: options,
				minlenght: 3,
				delay:0,
				select: function(event, ui) {
					addItem(ui.item);
					$(this).val('');
				}
			})
		}
	}

	$(".delete").live("click",function() {
	    $(this).parent().parent().remove();
	    if ($(".delete").length == 0) {
		    $('#save').attr('disabled','disabled');
	    }
    });
});

function addItem(item) {
	var itemsQuantity = $(".item").length;
	var currentItem = $("#row" + item.Item.id);

	if (currentItem.length == 0) {
	    var row = $('<tr class="item" id="row' + item.Item.id + '">'); 
	    row.append('<td>'+ item.Item.name +'</td>');
		row.append('<td><input type="text" name="data[InventoryItem][' + itemsQuantity + '][batch]" value="1"></td>');
		row.append('<td><input type="text" name="data[InventoryItem][' + itemsQuantity + '][expiration_date]" value="2020-01-01"></td>');
	    row.append('<td><input type="text" class="quantity" name="data[InventoryItem][' + itemsQuantity + '][quantity]" value="1"></td>');
	    row.append(
		    '<td>' +
			    '<a class="delete" item="'+ item.Item.id +'">Delete</a>' +
			    '<input type="hidden" name="data[InventoryItem][' + itemsQuantity + '][item_id]" value="'+  item.Item.id +'">' +
				'<input type="hidden" name="data[InventoryItem][' + itemsQuantity + '][purchase_order_id]" value="'+ $('#InventoryItemOrderId').val() +'">' +
				'<input type="hidden" name="data[InventoryItem][' + itemsQuantity + '][transaction]" value="'+ $('#InventoryItemTransaction').val() +'">' +
		    '</td>'
	    );
	    $("#inventoryTable").show().find('table').append(row);
		row.effect('highlight');
	    $('#save').removeAttr('disabled');
	} else {
	    var quantityTB = $(currentItem).find("input.quantity");
	    $(quantityTB)
			.val(parseInt($(quantityTB).val())+1)
			.effect('highlight');
	}
}

