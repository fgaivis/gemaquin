$(function(){
	$('#items input.quick_search').autocomplete({
		source: function (request, response) {
			var term = request.term;
			if (term.length < 3) {
				response([]);
				return;
			}
			$.ajax({
				url: App.basePath +'catalog/items/index/barcode:' + term + '.json',
				dataType: 'json',
				success: function(data) {
					response(data.content);
				},
				error: function() {
					response([]);
				}
			})
		},
		minlenght: 2,
		select: function(event, ui) {
			addItem(ui.item);
		}
	}).data( "autocomplete" )._renderItem = function(ul, item) {
		return $( "<li></li>")
			.data( "item.autocomplete", item)
			.append("<a>" + item.Item.name + " (" + item.Item.barcode + ")</a>")
			.appendTo(ul);
	};

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
	    row.append('<td><input type="text" name="data[InventoryItem][' + itemsQuantity + '][quantity]" value="1"></td>');
	    row.append(
		    '<td>' +
			    '<a class="delete" item="'+ item.Item.id +'">Delete</a>' +
			    '<input type="hidden" name="data[InventoryItem][' + itemsQuantity + '][item_id]" value="'+  item.Item.id +'">' +
		    '</td>'
	    );
	    $("#inventoryTable").show().find('table').append(row);
	    $('#save').removeAttr('disabled');
	} else {
	    var quantityTB = $(currentItem).find("input[type=text]");
	    $(quantityTB).val(parseInt($(quantityTB).val())+1);
	}
}

