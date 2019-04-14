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
}

function threadCategoryPic() {
	$('img[class="categoryPic"]').each(function(index, element) {
		if (element.alt == 'motor') {
			this.src = 'storage/src/categories/category02.png';
		}
		if (element.alt == 'informatica') {
			this.src = 'storage/src/categories/category01.png';
		}

		// REMAINING
	});
}