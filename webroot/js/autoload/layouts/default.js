$(document).ready(function() { 
	$(".tablesorter").tablesorter(); 
});
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	$('.column').equalHeight();
	createCalendar();
});

function createCalendar() {
        var day;
        var month;
        var year;
        $('div.input.date select').each(function() {
            var name = this.name;
            if (name.match(/\[day\]/)) {
                day = this.id;
            }
            if (name.match(/\[month\]/)) {
                month = this.id;
            }
            if (name.match(/\[year\]/)) {
                year = this.id;
            }
        })
        .css('display','none')
            .parent().html($('div.input.date').html().replace(/\-/g,''))
                .append('<input type="text" id="datepicker" />')
                .find('input#datepicker')
                    .css('display','inline');
        day = $('#' + day);
        month = $('#' + month);
        year = $('#' + year);
 
        defaultDate = (new Date(year.val() + '/' + month.val() + '/' + day.val()));
        currentText = defaultDate.toLocaleDateString();
        $("#datepicker").datepicker({
            showOn: 'button',buttonImage: '',
            onSelect: synchronizeDates,
            dateFormat : 'dd/mm/yy',
            defaultDate: defaultDate
        }).val(day.val() + '/' + month.val() + '/' + year.val());
 
        function synchronizeDates(dateText,inst) {
            var parts = dateText.split('/');
            var date = $.datepicker.parseDate( 'dd/mm/yy', dateText);
            day.val(parts[0]);
            month.val(parts[1]);
            year.val(parts[2]);
        }
    }