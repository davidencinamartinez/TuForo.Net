function dateConvertMsg() {
	// THREAD DATES
	$('.msgTime').each(function(index, el) {
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

function setTitle() {
	document.title = $('#threadBody h1').eq(0).text();
}

function replyFormat() {
	$('button').eq(1).on('click' , function(event) { // BOLD BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('bold');		
	});
	$('button').eq(2).on('click' , function(event) { // ITALIC BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('italic');		
	});
	$('button').eq(3).on('click' , function(event) { // UNDERLINE BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('underline');		
	});
	$('button').eq(4).on('click' , function(event) { // ALIGN LEFT BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyLeft');		
	});
	$('button').eq(5).on('click' , function(event) { // ALIGN CENTER BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyCenter');		
	});
	$('button').eq(6).on('click' , function(event) { // ALIGN RIGHT BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyRight');		
	});
	$('button').eq(7).on('click' , function(event) { // ALIGN JUSTIFY BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyFull');		
	});
	$('button').eq(8).on('click' , function(event) { // UNORDERED LIST BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('insertUnorderedList');		
	});
	$('button').eq(9).on('click' , function(event) { // ORDERED LIST BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('insertOrderedList');		
	});
	$('button').eq(10).on('click' , function(event) { // ADD IMAGE BUTTON
		var replyImg = prompt("Introduce la URL de la imagen:");
		$('div[name="replyMsg"]').focus();
		document.execCommand('insertParagraph');
		document.execCommand('insertimage', null, replyImg);		
	});
	$('button').eq(11).on('click' , function(event) { // YOUTUBE EMBED BUTTON
		var urlPrompt = prompt('Introduce el enlace del vídeo:\nPor ejemplo:\nhttps://www.youtube.com/watch?v=dc3KETiybOI');
		$('div[name="replyMsg"]').focus();
		var videoEmbed = '<iframe src="https://www.youtube.com/embed/'+urlPrompt.split("?v=")[1]+'">';
		if(urlPrompt != null){
	    	document.execCommand("insertHtml", false, videoEmbed);
		}
	});
	$('button').eq(13).on('click' , function(event) { // ADD LINK BUTTON
		var urlPrompt = prompt('Introduce el enlace de la página:');
		$('div[name="replyMsg"]').focus();
		document.execCommand('createLink', true, urlPrompt);
	});
	$('#replyButton').on('click', function(event) {
		replyCorrect		
	});
}

function replyCorrect() {
	$('input[name="thread_id"]').attr('value', window.location.pathname.split('/')[2]);
	$('input[name="creator"]').attr('value', $('.userLoged a b').text());
	$('input[name="content"]').attr('value', $('div[name="replyMsg"]').html());
	return true;
}