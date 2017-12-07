/**
 * File theme.js.
 *
 * Custom JS
 *
 */

jQuery(document).ready(function($) {

  var toggleAffix = function(affixElement, scrollElement, wrapper) {

    var height = affixElement.outerHeight(),
        top = wrapper.offset().top;

    if (scrollElement.scrollTop() >= top){
        wrapper.height(height);
        affixElement.addClass("affix");
    }

    else {
        affixElement.removeClass("affix");
        wrapper.height('auto');
    }

  };


  $('[data-toggle="affix"]').each(function() {
    var ele = $(this),
        wrapper = $('<div></div>');

    ele.before(wrapper);
    $(window).on('scroll resize', function() {
        toggleAffix(ele, $(this), wrapper);
    });

    // init
    toggleAffix(ele, $(window), wrapper);
  });

	// Find all iframes
	var $iframes = $( "iframe" );

	// Find &#x26; save the aspect ratio for all iframes
	$iframes.each(function () {
	  $( this ).data( "ratio", this.height / this.width )
		// Remove the hardcoded width &#x26; height attributes
		.removeAttr( "width" )
		.removeAttr( "height" );
	});

	// Resize the iframes when the window is resized
	$( window ).resize( function () {
	  $iframes.each( function() {
		// Get the parent container&#x27;s width
		var width = $( this ).parent().width();
		$( this ).width( width )
		  .height( width * $( this ).data( "ratio" ) );
	  });
	// Resize to fix all iframes on page load.
	}).resize();


	/*--------------------------------------------------------------
	Widget PostsTabs
	--------------------------------------------------------------*/
	function widgetPostsTabs() {
		var $tabsNav       = jQuery('.posts-tabs-nav'),
		  $tabsNavLis      = $tabsNav.children('li'),
		  $tabsContainer   = jQuery('.posts-tabs-container');

		$tabsNav.each(function() {
			  var $_el = $(this);
			  $_el
				  .next()
				  .children('.post-tab')
				  .stop(true,true)
			 	  .hide()
				  .siblings( $_el.find('a').attr('href') ).show();

			  $_el.children('li').first().addClass('active').stop(true,true).show();
		});

		$tabsNavLis.on('click', function(e) {
			  var $this = $(this);

			  $this.siblings().removeClass('active').end()
			  .addClass('active');

			  $this.parent().next().children('.post-tab').stop(true,true).hide()
			  .siblings( $this.find('a').attr('href') ).fadeIn();
			  e.preventDefault();
			  return false;
		}).children( window.location.hash ? 'a[href="' + window.location.hash + '"]' : 'a:first' ).trigger('click');
	}

	widgetPostsTabs();

	/*--------------------------------------------------------------
	Smooth scroll anchor
	--------------------------------------------------------------*/

	// Select all links with hashes
	$('a[href*="#"]')
	// Remove links that don't actually link to anything
	.not('[href="#"]')
	.not('[href="#0"]')

	.click(function(event) {
		// On-page links
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({scrollTop: target.offset().top}, 1000);
			}
		}
	});


});
