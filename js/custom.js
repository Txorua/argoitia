jQuery(document).ready(function ($) {
function parallax() {

		$(window).load(function () {

			if($(".parallax").get(0)) { 
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
  $("#revolutionSlider").get(0) && $("#revolutionSlider").revolution({
         delay:9000,
         startwidth:960,
         startheight:480,
         autoHeight:"off",
         fullScreenAlignForce:"off",
 
         onHoverStop:"on",
 
         thumbWidth:100,
         thumbHeight:50,
         thumbAmount:3,
 
         hideThumbsOnMobile:"off",
         hideBulletsOnMobile:"off",
         hideArrowsOnMobile:"off",
         hideThumbsUnderResoluition:0,
 
         hideThumbs:0,
         hideTimerBar:"off",
 
         keyboardNavigation:"on",
 
         navigationType:"bullet",
         navigationArrows:"solo",
         navigationStyle:"round",
 
         navigationHAlign:"center",
         navigationVAlign:"bottom",
         navigationHOffset:30,
         navigationVOffset:30,
 
         soloArrowLeftHalign:"left",
         soloArrowLeftValign:"center",
         soloArrowLeftHOffset:20,
         soloArrowLeftVOffset:0,
 
         soloArrowRightHalign:"right",
         soloArrowRightValign:"center",
         soloArrowRightHOffset:20,
         soloArrowRightVOffset:0,
 
 
         touchenabled:"on",
         swipe_velocity:"0.7",
         swipe_max_touches:"1",
         swipe_min_touches:"1",
         drag_block_vertical:"false",
 
         stopAtSlide:-1,
         stopAfterLoops:-1,
         hideCaptionAtLimit:0,
         hideAllCaptionAtLilmit:0,
         hideSliderAtLimit:0,
 
         dottedOverlay:"none",
 
         fullWidth:"off",
         forceFullWidth:"off",
         fullScreen:"off",
         fullScreenOffsetContainer:"#topheader-to-offset",
 
         shadow:0,
         hideTimerBar: "on"

  })
});


});
