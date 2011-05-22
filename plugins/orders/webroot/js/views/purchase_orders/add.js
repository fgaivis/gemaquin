$(function(){
	$("#orderTable").hide();
    $('#items').hide();
    $('#save').attr('disabled','disabled');
   	$("#providers").change(function(){
	    if ($(this).val() != '') {
	        $.ajax({
			    url: App.basePath+'orders/purchase_orders/fill_items/'+$(this).val()+'?t='+(new Date()).getTime(),
			    success: function(msg){
				    $("#items").html(msg).find("ul").selectable()
					    .delegate('li', 'dblclick', function() { addItem(this.id);});
				    $('#items').show();

			    }
		    });
		} else {
			$('#orderTable').hide();
            $('#items').hide();
            $('#save').attr('disabled','disabled');
		}
	});
	$("#poadd").submit(function(){
			$('#providers').removeAttr('disabled');
			return true;
	});
	$(".delete").live("click",function() {
	    $(this).parent().parent().remove();
	    if ($(".delete").length==0) {
		    $('#providers').removeAttr('disabled');
		    $('#orderTable').hide();
		    $('#save').attr('disabled','disabled');
	    }
    });
});

function addItem(itemId) {
	$.ajax({
		url: App.basePath+'catalog/items/view/'+itemId+'.json?t='+(new Date()).getTime(),
		dataType: 'json',
		success: function(data){
			var itemsQuantity = $(".item").length;
			var currentItem = $("#row" + data.content.Item.id);
			if (currentItem.length == 0) {
			    var row = $('<tr class="item" id="row' + data.content.Item.id + '">');
			    row.append('<td>'+ data.content.Item.barcode +'</td>');
			    row.append('<td>'+ data.content.Item.name +'</td>');
			    row.append('<td>'+ data.content.Item.description +'</td>');
			    row.append('<td>'+ data.content.Item.package_factor +'</td>');
			    row.append('<td><input type="text" name="data[ItemsPurchaseOrder][' + itemsQuantity + '][quantity]" value="1"></td>');
			    row.append(
				    '<td>' +
					    '<a class="delete" item="'+ data.content.Item.id +'">Delete</a>' +
					    '<input type="hidden" name="data[ItemsPurchaseOrder][' + itemsQuantity + '][item_id]" value="'+  data.content.Item.id +'">' +
				    '</td>'
			    );
			    $('#providers').attr('disabled', 'disabled');
			    $("#orderTable").show().find('table').append(row);
			    $('#save').removeAttr('disabled');
			} else {
			    var quantityTB = $(currentItem).find("input[type=text]");
			    $(quantityTB).val(parseInt($(quantityTB).val())+1);
			}
		}
	});
}

