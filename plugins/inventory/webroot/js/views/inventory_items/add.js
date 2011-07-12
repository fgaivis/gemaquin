$(function(){
	$(".delete").live("click",function() {
	    $(this).parent().parent().remove();
	    if ($(".delete").length == 0) {
		    $('#save').attr('disabled','disabled');
	    }
    });

	setupAutoComplete(window.items);
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

function setupAutoComplete(data) {
	options = [];
	for (var i =0; i < data.length; i++) {
		options.push({
			value: '',
			label: data[i].Item.name + " (" +  data[i].Item.barcode + ")",
			Item: data[i].Item
		});
	}
	bindCompleter(options);
}

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
				'<input type="hidden" name="data[InventoryItem][' + itemsQuantity + '][purchase_order_id]" value="'+ $('#InventoryItemPurchaseOrderId').val() +'">' +
				'<input type="hidden" name="data[InventoryItem][' + itemsQuantity + '][inventory_entry_id]" value="'+ $('#InventoryItemInventoryEntryId').val() +'">' +
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

