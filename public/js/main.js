function navBarActive() {
	var url = window.location.pathname.split('/')[1];
	var screenHeight = screen.availHeight;
	var msgCount = $('.threadMsg').length;
	var replyDiv = $('#replyPost').length;
	var threadsDiv = $('#threadsPanel').length;
	var threadsTable = $('#catPanel').length;
		$('.active').removeAttr('class');
	//var navBarButton = $('.NavBar *').removeAttr('class');
	if (url == '') {
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

function threadCategoryPic() {
	$('img[class="categoryPic"]').each(function(index, element) {
		if (element.alt == 1) { // OFFICIAL
			this.src = '/storage/src/categories/Cat_Official.png';
		}
		if (element.alt == 2) { // GENERAL
			this.src = '/storage/src/categories/Cat_General.png';
		}
		if (element.alt == 3) { // MOTOR
			this.src = '/storage/src/categories/Cat_Cars.png';
		}
		if (element.alt == 4) { // NEWS
			this.src = '/storage/src/categories/Cat_News.png';
		}
		if (element.alt == 5) { // COMPUTING
			this.src = '/storage/src/categories/Cat_Computing.png';
		}
		if (element.alt == 6) { // GAMES
			this.src = '/storage/src/categories/Cat_Gaming.png';
		}
		if (element.alt == 7) { // MUSIC
			this.src = '/storage/src/categories/Cat_Music.png';
		}
		if (element.alt == 8) { // POLITICS
			this.src = '/storage/src/categories/Cat_Politics.png';
		}
		if (element.alt == 9) { // FITNESS
			this.src = '/storage/src/categories/Cat_Gym.png';
		}
		if (element.alt == 10) { // SPORTS
			this.src = '/storage/src/categories/Cat_Sports.png';
		}
		if (element.alt == 11) { // CRIPTO
			this.src = '/storage/src/categories/Cat_Cripto.png';
		}
	});
}

function dateConvert() {
	$('.threadDate').each(function(index, el) {
		if ($(this).text() == moment().format('L')) {
			$(this).text('Hoy');
		} else if ($(this).text() == moment().subtract(1,'days').format('L')) {
			$(this).text('Ayer');
		}
	});
}