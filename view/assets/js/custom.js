// Fading notifications
$(document).ready(function(){
	setInterval(function(){
		$('#error').fadeOut(1000);
		setTimeout(function(){$('#error').remove()}, 1400);
	}, 1500);
});

$(function($) {
	$.mask.definitions['~']='[+-]';
	$('#phone').mask('+1 999-999-9999');
});


function preview(){
	if(document.getElementById('author_name-in').value.length == 0 && document.getElementById('content-in').value.length == 0){
		$('#preview').slideUp('slow');
		$('#prev_h').slideUp('slow');
		return;
	}
	if(document.getElementById('preview').style.display == '' || document.getElementById('preview').style.display == 'none'){
		$('#preview').slideDown('slow');
		$('#prev_h').slideDown('slow');
	}
	document.getElementById('author_name-ou').innerHTML = htmlEntities(document.getElementById('author_name-in').value);
	document.getElementById('content-ou').innerHTML = htmlEntities(document.getElementById('content-in').value);
	return;
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}