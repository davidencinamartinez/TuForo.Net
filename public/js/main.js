function navBarActive() {
	var pathArray = window.location.pathname.split('/');
	var url = pathArray[1];
	var navBarButton = $('.NavBar *').removeAttr('class');
	if (url == '') {
		$('a[id="startingPoint"]').attr('class', 'active');
	}
	if (url == 'forum' || url == 'thread') {
		$('a[id="forumEntry"]').attr('class', 'active');
	}
	if (url == 'registro') {
		$('a[id="registerPage"]').attr('class', 'active');
	}
}

function threadCategoryPic() {
	$('img[class="categoryPic"]').each(function(index, element) {
		if (element.alt == 'General') {
			this.src = 'storage/src/categories/category01.png';
		}
		if (element.alt == 'Motor') {
			this.src = 'storage/src/categories/category02.png';
		}
		if (element.alt == 'Informatica') {
			this.src = 'storage/src/categories/category03.png';
		}

		// REMAINING
	});
}

function dateConvert() {
	// THREAD DATES
	var threadDateVal = $('.threadDate').val();
	// DATE TODAY
	var dayToday = new Date().getDate();
	var monthToday = new Date().getMonth()+1;
	var yearToday = new Date().getFullYear();
	var dateToday = dayToday+'/'+monthToday+'/'+yearToday;
	// LOOP
	$.each(threadDateVal, function(index, val) {
		 console.log(val);
	});
}