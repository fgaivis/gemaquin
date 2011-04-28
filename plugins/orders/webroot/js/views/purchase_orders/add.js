$(function(){
	$("#providers").change(function(){
		$.ajax({
			url: App.basePath+'orders/purchase_orders/fill_items/'+$(this).val()+'?t='+(new Date()).getTime(),
			success: function(msg){
				$("#items").html(msg).find("ul").selectable()
					.delegate('li', 'dblclick', function() { alert(this.id)});
			}
		})
	});
});

