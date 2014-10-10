jQuery(document).ready(function ($) {
function parallax() {

		$(window).load(function () {

			if($(".paarallax").get(0)) { // Parallax desactivado
				if (!$('html').hasClass('touch')) {
					$(window).stellar({
						responsive:true,
						scrollProperty: 'scroll',
						parallaxElements: false,
						horizontalScrolling: false,
						horizontalOffset: 0,
						verticalOffset: 40
					});
				} else {
					$(".parallax").addClass("disabled");
				}
			}
		});
		

	}
	
	parallax();

});

jQuery(document).ready(function($) {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});

jQuery(document).ready(function($) {
$("#revolutionSlider").get(0)&&$("#revolutionSlider").revolution({delay:9000,startheight:186,startwidth:960,hideThumbs:10,thumbWidth:100,thumbHeight:50,thumbAmount:5,navigationType:"both",navigationArrows:"verticalcentered",navigationStyle:"round",touchenabled:"on",onHoverStop:"on",navOffsetHorizontal:0,navOffsetVertical:20,stopAtSlide:-1,stopAfterLoops:-1,shadow:1,fullWidth:"on"})
	});


});
