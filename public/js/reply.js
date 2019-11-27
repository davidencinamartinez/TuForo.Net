// REPLIES

function replyFormat() {
	$('div[name="replyMsg"]').on('paste', function(event) { // PASTE CONTENT
		event.preventDefault();
		var data = event.originalEvent.clipboardData.getData('text/plain');
		document.execCommand('insertText', false, data);
	});

	$('.wysiwyg').eq(0).on('click' , function(event) { // BOLD BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('bold');		
	});
	$('.wysiwyg').eq(1).on('click' , function(event) { // ITALIC BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('italic');		
	});
	$('.wysiwyg').eq(2).on('click' , function(event) { // UNDERLINE BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('underline');		
	});
	$('.wysiwyg').eq(3).on('click' , function(event) { // ALIGN LEFT BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyLeft');		
	});
	$('.wysiwyg').eq(4).on('click' , function(event) { // ALIGN CENTER BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyCenter');		
	});
	$('.wysiwyg').eq(5).on('click' , function(event) { // ALIGN RIGHT BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyRight');		
	});
	$('.wysiwyg').eq(6).on('click' , function(event) { // ALIGN JUSTIFY BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('justifyFull');		
	});
	$('.wysiwyg').eq(7).on('click' , function(event) { // UNORDERED LIST BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('insertUnorderedList');		
	});
	$('.wysiwyg').eq(8).on('click' , function(event) { // ORDERED LIST BUTTON
		$('div[name="replyMsg"]').focus();
		document.execCommand('insertOrderedList');		
	});
	$('.wysiwyg').eq(9).on('click' , function(event) { // ADD IMAGE BUTTON
		var replyImg = prompt("Introduce la URL de la imagen:");
		if (replyImg != null) {
			$('div[name="replyMsg"]').focus();
			document.execCommand('insertimage', null, replyImg);		
		} else {
			return false;
		}		
	});
	$('.wysiwyg').eq(10).on('click' , function(event) { // YOUTUBE EMBED BUTTON
		var urlPrompt = prompt('Introduce el enlace del vídeo:\nPor ejemplo:\nhttps://www.youtube.com/watch?v=dc3KETiybOI');
		$('div[name="replyMsg"]').focus();
		var videoEmbed = '<iframe src="https://www.youtube.com/embed/'+urlPrompt.split("?v=")[1]+'">';
		if(urlPrompt != null){
	    	document.execCommand("insertHtml", false, videoEmbed);
		}
	});
	$('.wysiwyg').eq(11).on('click' , function(event) { // ADD LINK BUTTON
		var urlPrompt = prompt('Introduce el enlace de la página:');
		if (urlPrompt != null) {
			$('div[name="replyMsg"]').focus();
			document.execCommand('createLink', true, urlPrompt);
		} else {
			return false;
		}
	});
	$('#replyButton').on('click', function(event) {
		replyCorrect		
	});
}

function replyCorrect() {
	$('.error').remove();
	var content = $('div[name="replyMsg"]').html();
	var contentEmpty = content.replace(/^(?:&nbsp;|\s)+|(?:&nbsp;|\s)+$/ig,'');
	var replyStatus = 0;
	if (contentEmpty.length <= 0) {
		errorDisplay($('#replyButton'),'No puedes enviar un mensaje vacío. Debes escribir al menos un carácter.');
		replyStatus = false;
	} else {
		contentEmpty.replace(/(<\/?(?:b|i|u|a|div|ul|ol|li|iframe|img)[^>]*>)|<[^>]+>/ig, '$1'); // WHITELIST
		$('input[name="thread_id"]').attr('value', window.location.pathname.split('/')[2]);
		$('input[name="creator"]').attr('value', $('.userLoged a b').text());
		$('input[name="content"]').attr('value', $('div[name="replyMsg"]').html());
		replyStatus = true;
	}
	return replyStatus;
}