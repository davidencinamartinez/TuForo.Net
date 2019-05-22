function threadEmptyTitle() {
	$('.error').remove();
	var status = 0;
	if ($('input[name="thread_title"]').val().replace(/\s/g, "").length <= 0 ) {
		errorDisplay($('#replyButton'),'Debes ponerle un nombre al tema para continuar.');
		status = false;
	} else {
		status = true;
	}
	return status;
}