// JavaScript Document

// GLOBALS
var scrollingTimer;

// PULSATING ARROWS FUNCTIONS
function fadeInArrows()
{
	$('#upArrow').fadeTo(1000, 0.99);
	$('#downArrow').fadeTo(1000, 0.99, fadeOutArrows);
}
function fadeOutArrows()
{
	$('#upArrow').fadeTo(1000, 0.2);
	$('#downArrow').fadeTo(1000, 0.2, fadeInArrows);
}

// SCROLLING
function activateScrolling()
{
	var divTinyScroll = $("#mainContent");
	var divArrows = $("div.viewport");
	
	divTinyScroll.tinyscrollbar({ size: 420 });

	var speed = 10, scroll = 5;

/*
	$(document).keydown(function (evt)
	{
		if (evt.keyCode == 38) { // down arrow
			scrolling = window.setInterval(function() {
			evt.preventDefault();
				newScroll = divTinyScroll.tinyscrollbar_getScroll() - scroll;
				divTinyScroll.tinyscrollbar_setScroll(newScroll);
			}, speed);return false;
		}else if (evt.keyCode == 40) { // up arrow
			scrolling = window.setInterval(function() {
			evt.preventDefault();
				newScroll = divTinyScroll.tinyscrollbar_getScroll() + scroll;
				divTinyScroll.tinyscrollbar_setScroll(newScroll);
			}, speed);return false;
		}
	});
	$(document).keyup(function (evt)
	{
		if (scrolling) {
			window.clearInterval(scrolling);
			scrolling = false;
		}
	});
*/
	
	$('#upArrow').mousedown(function() {
		if (!scrollingTimer) {
			scrollingTimer = window.setInterval(function() {
				newScroll = divTinyScroll.tinyscrollbar_getScroll() - scroll;
				divTinyScroll.tinyscrollbar_setScroll(newScroll);
			}, speed);
		}
	});
	
	$('#downArrow').mousedown(function() {
		if (!scrollingTimer) {
			scrollingTimer = window.setInterval(function() {
				newScroll = divTinyScroll.tinyscrollbar_getScroll() + scroll;
				divTinyScroll.tinyscrollbar_setScroll(newScroll);
			}, speed);
		}
	});
	
	$(document.body).mouseup(function(evt) {
		window.clearInterval(scrollingTimer);
		scrollingTimer = false;
	});
}

// DOCUMENT READY
$(function()
{
	fadeOutArrows();
});

// FULLY LOADED, INCLUDING IMAGES
$(window).load(function ()
{
	activateScrolling();
});
