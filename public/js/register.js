function showPassword(element) {
	if ($(element).attr('show') == 'on') {
		$(element).attr({
			src: 'storage/src/other/hide.png',
			show: 'off'
		});
		$(element).prev('input').attr('type', 'text');
	} else {
		$(element).attr({
			src: 'storage/src/other/show.png',
			show: 'on'
		});
		$(element).prev('input').attr('type', 'password');
	}
}

function termsAccepted() {
	var terms = $('input[name="terms"]').is(':checked');
}

function userExists() {
	$.ajaxSetup({
		headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
	   type:'POST',
	   url:'user_exists',
	   data:'_token = <?php echo csrf_token() ?>',
	   success:function(data) {
	      console.log(data);

	      //$('input').eq(4).after('<label class="preventError"> '+data.msg+'</label>');
	   }
	});      
}