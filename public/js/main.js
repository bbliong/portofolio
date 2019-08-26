$(document).ready(function(){
	$('.button-collapse').sideNav();
		 $(window).scroll(function () {
			 	//console.log($(window).scrollTop());
			// console.log($(window).scrollTop())
		    if ($(window).scrollTop() > 650) {
		      	$('.toog').addClass('fixed navbar-fixed');
		    }
		    if ($(window).scrollTop() < 650) {
		      	$('.toog').removeClass('fixed navbar-fixed');
		    }
	});
	$('.post').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animated flipInX', // Class to add to the elements when they are visible
	    offset: 100    
	});   
	
	 $('.carousel.carousel-slider').carousel({fullWidth: true});
	// Next slide
	$('.next').click(function(){
		$('.carousel').carousel('next');
				// $('.carousel').carousel('next');
		// $('.carousel').carousel('next', 3); // Move next n times.

		// // Previous slide
		// $('.carousel').carousel('prev');
		// $('.carousel').carousel('prev', 4); // Move prev n times.

		// // Set to nth slide
		// $('.carousel').carousel('set', 4);
	});
	// Make Reveal animate up and display when mouseenter
    $(document).on('mouseenter.hover-reveal','.hover-reveal', function (e){
      $(e.target).closest('.card').css('overflow', 'hidden');
      $(this).find('.card-content>span').attr('style', 'color: rgba(0,0,0,0) !important');
      $(this).find('.card-reveal').css({ display: 'block'})
        .velocity("stop", false)
        .velocity({translateY: '-100%'},
        {duration: 300,
         queue: false,
         easing: 'easeInOutQuad'});
    });
    // Make Reveal animate down and display none when mouseleave
    $(document).on('mouseleave.hover-reveal','.hover-reveal', function (e){
      $(this).find('.card-reveal').velocity(
        {translateY: 0}, {
          duration: 225,
          queue: false,
          easing: 'easeInOutQuad',
          complete: function() { $(this).css({ display: 'none'}); }
        }
      );
      $(this).find('.card-content>span').attr('style', '');
    });
 //    $('.owl-carousel').owlCarousel({
	//     items:4,
	//     lazyLoad:true,
	//     loop:true,
	//     margin:10
	// });
	$(function() {
		var selectedClass = "";
		$(".fill").click(function(event){ 
			 event.preventDefault();
			 $(".fill").removeClass("actived");
			 $(this).addClass("actived");
			 console.log($(this).attr("data-rel"));
			selectedClass = $(this).attr("data-rel"); 
			$(".portofolio").fadeTo(100, 0.1);
			$(".portofolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
			setTimeout(function() {
			$("."+selectedClass).fadeIn().addClass('scale');
			$(".portofolio").fadeTo(400, 1);
			}, 300); 
		});
	});

	$(function() {
				cbpFixedScrollLayout.init();
			});
});


