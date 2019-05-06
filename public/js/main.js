function navBarActive() {
	var pathArray = window.location.pathname.split('/');
	var url = pathArray[1];
	var navBarButton = $('.NavBar *').removeAttr('class');
	if (url == '') {
		$('#startingPoint').attr('class', 'active');
		$('#footer').css('position', 'relative');
	}
	if (url == 'forum' || url == 'thread') {
		$('#forumEntry').attr('class', 'active');
		$('#footer').css('position', 'fixed');
	}
	if (url == 'registro') {
		$('#registerPage').attr('class', 'active');
		$('#footer').css('position', 'fixed');
	}
	if (url == 'thread') {
		$('#footer').css('position', 'relative');
	}
	if (url == 'newthread') {
		$('#footer').css('position', 'fixed');
		$('#newThreadButton').css({
			backgroundColor: '#28A428',
			color: 'black',
			textShadow: '-1px 0 white, 0 1px white, 1px 0 white, 0 -1px white'
		});
	}
}

function threadCategoryPic() {
	$('img[class="categoryPic"]').each(function(index, element) {
		if (element.alt == 'General') {
			this.src = 'storage/src/categories/Cat_General.png';
		}
		if (element.alt == 'Motor') {
			this.src = 'storage/src/categories/Cat_Cars.png';
		}
		if (element.alt == 'Informatica') {
			this.src = 'storage/src/categories/Cat_Computing.png';
		}
		if (element.alt == 'Gaming') {
			this.src = 'storage/src/categories/Cat_Gaming.png';
		}
		if (element.alt == 'Musica') {
			this.src = 'storage/src/categories/Cat_Music.png';
		}
		if (element.alt == 'Noticias') {
			this.src = 'storage/src/categories/Cat_News.png';
		}
		if (element.alt == 'Politica' || element.alt == 'Negocios') {
			this.src = 'storage/src/categories/Cat_Politics.png';
		}

		// REMAINING
	});
}

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