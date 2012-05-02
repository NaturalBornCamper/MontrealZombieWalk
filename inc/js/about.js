// JavaScript Document

$(document).ready(function(){
	$('#mapImgLarge').load(function() {
		if (console && console.log) console.log('Image Swap');
		var filename = $('#mapImg').attr('src');
		newFilename = filename.replace("jpg", "png");
		$('#mapImg').attr('src', newFilename);
	});
});