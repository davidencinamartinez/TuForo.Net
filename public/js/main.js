function navBarActive() {
	var url = window.location.pathname.split('/')[1];
	var screenHeight = screen.availHeight;
	var msgCount = $('.threadMsg').length;
	var replyDiv = $('#replyPost').length;
	var threadsDiv = $('#threadsPanel').length;
	var threadsTable = $('#catPanel').length;
		$('.active').removeAttr('class');
	//var navBarButton = $('.NavBar *').removeAttr('class');
	if (url == '' || url == 'profile') {
		$('#startingPoint').attr('class', 'active');
	}
	if (url == 'foro' || url == 'thread') {
		$('#forumEntry').attr('class', 'active');
		if (url == 'thread' && screenHeight > 768 && msgCount <= 1 && replyDiv == 0) {
			$('#footer').css('position', 'absolute');
		}
		if (url == 'foro' && screenHeight > 768 && threadsDiv == 0) {
			$('#footer').css('position', 'absolute');
			if (threadsTable > 0) {
				$('#footer').css('position', 'relative');
			}
		}
	}
	if (url == 'registro') {
		$('#registerPage').attr('class', 'active');
		if (screen.availHeight > 768) {
			$('#footer').css('position', 'absolute');
		}
	}
	if (url == 'newthread') {
		$('#newThreadButton').css({
			backgroundColor: '#28A428',
			color: 'black',
			textShadow: '-1px 0 white, 0 1px white, 1px 0 white, 0 -1px white'
		});
		$('#startingPoint').attr('class', 'active');
		if (screen.availHeight > 768) {
			$('#footer').css('position', 'absolute');
		}
	}
}

function errorDisplay(position,message) {
	$(position).before($('<p>'+message+'</p>').attr({
		class: 'error'
	}));
}

function dateConvert() {
	if ($('.threadDate').length > 0) {
		$('.threadDate').each(function(index, el) {
			if ($(this).text() == moment().format('L')) {
				$(this).text('Hoy');
			} else if ($(this).text() == moment().subtract(1,'days').format('L')) {
				$(this).text('Ayer');
			}
		});
	}
	if ($('.msgTime').length > 0) {
		$('.msgTime').each(function(index, el) {
			if ($(this).text() == moment().format('L')) {
				$(this).text('Hoy');
			} else if ($(this).text() == moment().subtract(1,'days').format('L')) {
				$(this).text('Ayer');
			}
		});
	}
}