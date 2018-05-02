
function main() {

(function () {
   'use strict';
   
  	$('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 40
            }, 900);
            return false;
          }
        }
      });

	// affix the navbar after scroll below header
$('#nav').affix({
      offset: {
        top: $('header').height()
      }
});	

	
  	// Portfolio isotope filter
    $(window).load(function() {
        var $container = $('.portfolio-items');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        $('.cat1 a').click(function() {
            $('.cat1 .active').removeClass('active');
            $(this).addClass('active');


            var selector1 = $('.cat2 .active').attr('data-filter')=="*"?"":$('.cat2 .active').attr('data-filter');

            var selector2 = $(this).attr('data-filter')=="*"?"":$(this).attr('data-filter');

            var selector = selector1.toString() + selector2.toString();
            if ($(this).attr('data-filter')=="*" && $('.cat2 .active').attr('data-filter')=="*")
            {
                selector="*";
            }
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

        $('.cat2 a').click(function() {

            $('.cat2 .active').removeClass('active');
            $(this).addClass('active');

            var selector1 = $('.cat1 .active').attr('data-filter')=="*"?"":$('.cat1 .active').attr('data-filter');

            var selector2 = $(this).attr('data-filter')=="*"?"":$(this).attr('data-filter');

            var selector = selector1.toString() + selector2.toString();
            if ($(this).attr('data-filter')=="*" && $('.cat1 .active').attr('data-filter')=="*")
            {
                selector="*";
            }
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

    });
	

    // Nivo Lightbox 
    $('.portfolio-item a').nivoLightbox({
            effect: 'slideDown',  
            keyboardNav: true,                            
        });
 

}());


}
main();