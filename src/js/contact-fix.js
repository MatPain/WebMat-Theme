/**
 * File contact-fix.js.
 *
 * Contact Form Fix JS
 *
 */

jQuery(document).ready(function($) {

    //alert('yo');

    $('.arrow-up').click(function(e){
        e.preventDefault();


        $('.content-form').addClass('active');

        $('.arrow-up').hide();
        $('.arrow-down').show();

    });


    $('.arrow-down').click(function(e){
        e.preventDefault();

        $('.content-form').removeClass('active');
        $('.arrow-up').show();
        $('.arrow-down').hide();
    });



});
