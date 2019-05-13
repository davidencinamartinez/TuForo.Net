function dateConvert() {
	// THREAD DATES
	$('.threadDate').each(function(index, el) {
		if ($(this).text() == moment().format('L')) {
			$(this).text('Hoy');
		} else if ($(this).text() == moment().subtract(1,'days').format('L')) {
			$(this).text('Ayer');
		}
	});
	// DATE TODAY
	var dayToday = new Date().getDate();
	var monthToday = new Date().getMonth()+1;
	var yearToday = new Date().getFullYear();
	var dateToday = dayToday+'/'+monthToday+'/'+yearToday;
	
}