(function($){
    "use strict";
    $('body').on('click', '.redux-group-menu>.redux-group-tab-link-li>a', function(e){
        e.preventDefault();
        if(!$(this).parent().hasClass('active')){
            $('.redux-group-tab-link-li').removeClass('active activeChild');
            $('.redux-group-tab-link-li .subsection').slideUp();
            $(this).parent().addClass('active');
            $(this).siblings('.subsection').slideDown();

            //Show hide tab
            $('.redux-group-tab').css('display', 'none');
            $('.redux-group-tab[data-rel='+$(this).data('rel')+']').fadeIn();
            if($(this).parent().hasClass('empty_section')){
                $(this).parent().addClass('activeChild');
                $(this).siblings('.subsection').find('.redux-group-tab-link-li:first-child').addClass('active');
                $('.redux-group-tab[data-rel='+$(this).siblings('.subsection').find('.redux-group-tab-link-li:first-child > a').data('rel')+']').fadeIn();
            }
        }
    });

    $('body').on('click', '.redux-group-menu>.redux-group-tab-link-li .redux-group-tab-link-li>a', function(e){
        e.preventDefault();
        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
        $('.redux-group-tab').css('display', 'none');
        $('.redux-group-tab[data-rel='+$(this).data('rel')+']').fadeIn();
    });

    $('body').on('click', '#redux-sticky, .redux-group-tab, #redux-footer-sticky', function(e) {
        e.preventDefault();
        $('.keenshot-promo').removeClass('hidden');
    });

    $('body').on('click', 'li[id^="customize-control-"][id$="_pro"]', function(e) {
        e.preventDefault();
    })
  
  })(jQuery);

  