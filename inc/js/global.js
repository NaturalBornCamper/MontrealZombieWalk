// JavaScript Document


// SAWP IMAGE FOR NEW ONE (I.E. WHEN LOADED)
function swapToHighRes(img, imgToReplace)
{
	var src = $(img).attr('src');
	$(imgToReplace).attr('src', src.replace('_low.jpg', '.jpg'));
}