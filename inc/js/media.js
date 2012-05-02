// JavaScript Document

$(function()
{
	$('#wrapper #content #mainContent img[alt=zoom]').mouseenter(function()
	{
		$('.zoom').remove();
		$(this).after('<span class="zoom">&nbsp;</span>');
		var width = $(this).width();
		var height = $(this).height();
		var top = $(this).position().top+'px';
		$(this).next().css(
		{
			'top': top,
			'left': $(this).position().left+'px',
			'width': width+'px',
			'height': height+'px'
		});
		$(this).next().mouseleave(function()
		{
			$('.zoom').remove();
		});
	});
});