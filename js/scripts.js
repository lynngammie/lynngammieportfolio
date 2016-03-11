$(function(){

	$('.portfolio-masonryBLERP').masonry({
  // options
  itemSelector: '.portfolio-itemBLERP',
  columnWidth: 200
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