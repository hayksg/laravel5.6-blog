$(function(){

	var pathname = window.location.pathname;

	// For highlighting menu

    if (pathname == '/') {
    	$('a.app-navbar-brand').addClass('active');
    }

    $('.navbar-nav > li > a[href="'+pathname+'"]').addClass('active');

    if ( pathname.match(new RegExp("/admin/")) ) {       
        $('.navbar-nav > li > a[href="/admin"]').addClass('active');
    }

    // Settings

    if ($(document).width() < 768) {
    	$('.app-navbar-brand').addClass('navbar-brand');
    	$('.navbar-brand').removeClass('app-navbar-brand');

    	$('a.active').addClass('hide-after'); // for hidding pseudo class

    	$('.navbar-nav').css('paddingLeft', '20px');
    }

    // For confirm delete

    $('.confirm-plugin-delete').jConfirmAction({
        question: 'Are you sure?',
        noText: 'Cancel'
    });
    
    // For Flash messenger
    
    $('#flash-message').delay(5000).fadeOut('slow');
    
    //
    
    if ($(document).width() > 432 && $(document).width() < 992) {
        $(":file").jfilestyle({
            theme: "custom",
            inputSize: "300px"
        });
    } else if ($(document).width() > 338 && $(document).width() <= 432) {
        $(":file").jfilestyle({
            theme: "custom",
            inputSize: "200px"
        }); 
    } else if ($(document).width() <= 338) {
        $(":file").jfilestyle({
            theme: "custom",
            input: false
        });  
    } else {
        $(":file").jfilestyle({
            theme: "custom",
            inputSize: "400px"
        });
    }
    
    // For multiple select
    
    $('.js-example-basic-multiple').select2();
   
   //
   
});