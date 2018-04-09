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
    
    $('.admin-manage-list > li > a[href="'+pathname+'"]').addClass('active-color');
    if ( pathname.match(new RegExp("/admin/categories")) ) {       
        $('.admin-manage-list > li > a[href="/admin/categories"]').addClass('active-color');
    }
    if ( pathname.match(new RegExp("/admin/posts")) ) {       
        $('.admin-manage-list > li > a[href="/admin/posts"]').addClass('active-color');
    }
    if ( pathname.match(new RegExp("/admin/tags")) ) {       
        $('.admin-manage-list > li > a[href="/admin/tags"]').addClass('active-color');
    }
    if ( pathname.match(new RegExp("/admin/employees")) ) {       
        $('.admin-manage-list > li > a[href="/admin/employees"]').addClass('active-color');
    }  
    if ( pathname.match(new RegExp("/admin/users")) ) {       
        $('.admin-manage-list > li > a[href="/admin/users"]').addClass('active-color');
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
    
    $('#flash-message').delay(4000).fadeOut('slow');
    $('#flash-message-admin').delay(4000).fadeOut('slow');
    
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
   
    if ($(document).width() < 1330) {
        $('.admin-sidebar div.blog-post').css('paddingRight', '30px');
    }
    if ($(document).width() < 1200) {
        $('.admin-sidebar div.blog-post').css('position', 'inherit');
        $('.admin-sidebar div.blog-post').append('<hr>');
    }
    
    // For categories
    
    $(".topnav").accordion({
        accordion:true,
        speed: 500,
        closedSign: '<i class="fa fa-caret-left" aria-hidden="true"></i>',
        openedSign: '<i class="fa fa-caret-down" aria-hidden="true"></i>'
    });
    
    // In order don't work link witch has children

    $('ul.topnav li a').on('click', function(){
        if ($(this).parent('li').has('ul').length != 0) {
            return false;
        }
    });
	
    // To add padding to each nested link in menu
    
    var menuLinks = $('ul.topnav').find('a');

    menuLinks.each(function(){
        var parentsUntilLength = $(this).parentsUntil('.sidebar-module').length;
        var div = parentsUntilLength / 2;

        if (div > 1) {
            var res = (div - 1) * 20;
            $(this).css('paddingLeft', res + 'px').css('overflow', 'hidden');
        }
    })
    
    /// Highlighting for aside menu  ////////////////////////////////////////////////////
    
    $('ul.topnav li a').each(function(){
        var href = $(this).attr('href');
        
        if ( (href == pathname) ) {
            $(this).addClass('highlight');
        } else {
            $(this).removeClass('highlight');
        }
    });
    
    // Back to top
    
    $('#back-to-top').click(function () {			
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    
    // For text editor TinyMCE
    
    if (pathname.match(new RegExp("/admin/posts/create")) ||  
        pathname.match(new RegExp("/admin/posts/[0-9]+/edit")) ||
        pathname.match(new RegExp("/admin/employees/create")) ||
        pathname.match(new RegExp("/admin/employees/[0-9]+/edit"))
       ) 
    {
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
        } );
    }
    
    // Ajax query for about us page
    
    $('.employee-ajax').on('click', function(e){
        e.preventDefault();

//        $.ajaxSetup({
//            headers: {
//              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            }
//        });
        
        // This will only set the header if it is a local request.
        $.ajaxSetup({
            beforeSend: function(xhr, type) {
                if (!type.crossDomain) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            },
        });

        var employeeId = $(this).attr('data-id');
        
        $.ajax({
            url: '/about-us/post',
            method: 'post',
            data: {id: employeeId},
            
            success: function(result){
                if (result.success === 1) {
                    var employee = result.employee;

                    $('#employee-image').attr("src", '/storage/employee/' + employee.img);
                    
                    $('#employee-name').html(employee.name);
                    $('#employee-position').html(employee.position);
                    $('#employee-performance').hide().html(employee.performance);
                    $('#employee-performance').slideDown(500);
                }
            }
        });
    });
    
    // About Us page slider
    
    $('.carousel-slick').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000
    });
    
    // For users table on Admin area
    
    if (pathname.match(new RegExp("/admin/users"))) {
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#usersTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    }
    
    //
    
    
    
    
    
    
   
});
