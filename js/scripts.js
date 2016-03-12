$(function(){

	$('.skills-item').on('click', function(){
		if (!$(this).hasClass('active')) {
		$('.active').removeClass('active').find('.skills-other').slideUp();
		$(this).toggleClass('active');
		$(this).children().slideDown('slow');
	} else {
		$(this).removeClass('active');
		$(this).find('.skills-other').slideUp();
	}
	});

	$('.details').on('click', function(){
		if (!$(this).hasClass('slide-details')) {
		$(this).siblings().slideDown();
		$(this).addClass('slide-details');
	} else {
		$(this).removeClass('slide-details');
		$(this).nextAll().slideUp();
	}
	});

	$(window).scroll(function(event) {
	    if ($(window).scrollTop()>=100) {$('.creatures').addClass('side-creatures');}
	    else {
	    	$('.creatures').removeClass('side-creatures');}
	});

	//add class of display:inline to word-master word-gallery1 go and add 1 to the word-gallery name

	var words = $(".word-master");
  var wordIndex = -1;
  
  //add one to word index, 
  function showNextQuote() {
      ++wordIndex;
      words.eq(wordIndex % words.length)
          .fadeIn(1500)
          .delay(1500)
          .fadeOut(1500, showNextQuote);
  }
  showNextQuote();

})();