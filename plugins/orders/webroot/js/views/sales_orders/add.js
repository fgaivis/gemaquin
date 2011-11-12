$(function(){
	$("#orderTable").hide();
    $('#items').hide();
    $('#save').attr('disabled','disabled');
   	$("#clients").change(function(){
	    if ($(this).val() != '') {
	        $.ajax({
			    url: App.basePath+'orders/sales_orders/fill_items/'+$(this).val()+'?t='+(new Date()).getTime(),
			    success: function(msg){
				    $("#items").html(msg)
						.find("ul")
						.addClass('ui-selectable')
					    .delegate('li', 'dblclick', function() { addItem(this.id); })
							.find('li')
								.addClass('ui-selectee')
				    $('#items').show();
			    }
		    });
		} else {
			$('#orderTable').hide();
            $('#items').hide();
            $('#save').attr('disabled','disabled');
		}
	});

	$(".delete").live("click",function() {
	    $(this).parent().parent().remove();
	    if ($(".delete").length==0) {
		    $('#orderTable').hide();
		    $('#save').attr('disabled','disabled');
	    }
	    return false;
    });
    $('.item_qty').live('change', function(e) {
        var row = $(this).closest('tr');
        var qty = row.data('qty_left');
        console.log(e);
        if ($(this).val() > qty) {
            alert('No hay suficientes items en el inventario');
            return false;
        }
    });
});

function addItem(inventoryItemId) {
	$.ajax({
		url: App.basePath+'inventory/inventory_items/view/'+inventoryItemId+'.json?t='+(new Date()).getTime(),
		dataType: 'json',
		success: function(data){
			var itemsQuantity = $(".item").length;
			var currentItem = $("#row" + data.content.InventoryItem.id);
			if (currentItem.length == 0) {
			    var row = $('<tr class="item" id="row' + data.content.InventoryItem.id + '">');
			    row.append('<td>'+ data.content.Item.barcode +'</td>');
			    row.append('<td>'+ data.content.Item.name +'</td>');
			    row.append('<td>'+ data.content.Item.package_factor +'</td>');
			    row.append('<td><input class="item_qty" type="text" name="data[InvItemsSalesOrder][' + itemsQuantity + '][quantity]" value="1"></td>');
			    row.append(
				    '<td>' +
					    '<a href="#" class="delete" item="'+ data.content.Item.id +'">Delete</a>' +
					    '<input type="hidden" name="data[InvItemsSalesOrder][' + itemsQuantity + '][inventory_item_id]" value="'+  data.content.InventoryItem.id +'">' +
				    '</td>'
			    );
                row.data('qty_left',  data.content.InventoryItem.quantity_left);
			    $("#orderTable").show().find('table').append(row);
				row.effect('highlight');
			    $('#save').removeAttr('disabled');
			} else {
			    var left = currentItem.data('qty_left');
			    var quantityTB = $(currentItem).find("input[type=text]");
			    if ($(quantityTB).val()+1 > left) {
			        alert('No hay suficientes items en el inventario');
			        return;
			    }
			    $(quantityTB)
					.val(parseInt($(quantityTB).val())+1)
					.effect('highlight');
				
			}
		}
	});
}

