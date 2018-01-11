$(document).ready(function(){

  $('#signUp').on('shown.bs.modal', function () {
    $('input[name=email]').focus();
  });

  $('.check-block').click(function(){
    $(this).toggleClass('checked-block');
  });

  $('#filterToggler').on('click', function(e){
    e.preventDefault();
    $(this).addClass('hidden');
    $('#leftOutsideMenu').toggleClass('filter-open');
  });
  $('#sidebarToggler').on('click', function(e){
    e.preventDefault();
    $(this).toggleClass('hidden');
    $('#sidebarLayer').toggleClass('sidebar-open');
  });

  // class changes binding
  (function( func ) {
    $.fn.addClass = function() { // replace the existing function on $.fn
      func.apply( this, arguments ); // invoke the original function
      this.trigger('classChanged'); // trigger the custom event
      return this; // retain jQuery chainability
    }
  })($.fn.addClass); // pass the original function as an argument

  (function( func ) {
    $.fn.removeClass = function() {
      func.apply( this, arguments );
      this.trigger('classChanged');
      return this;
    }
  })($.fn.removeClass);

  $('#sidebarLayer, #leftOutsideMenu').on('classChanged', function(){
    if ($('#sidebarLayer').hasClass('sidebar-open') || $('#leftOutsideMenu').hasClass('filter-open')) {
      $('body').css('overflow','hidden');
    } else {
      $('body').removeAttr('style');
    }
  });
  
  $('header.main-header, .main-content-layer').on('click', function(){
    if($('#leftOutsideMenu').hasClass('filter-open')){
      $('#leftOutsideMenu').removeClass('filter-open');
      setTimeout(function(){
        $('#filterToggler').removeClass('hidden');
      }, 400);
    }
    if($('#sidebarLayer').hasClass('sidebar-open')){
      $('#sidebarLayer').removeClass('sidebar-open');
      setTimeout(function(){
        $('#sidebarToggler').removeClass('hidden');
      }, 500);
    }
  });
  
  $(window).scroll(function() {    
    let scroll = $(window).scrollTop();
    let scrollVar = 50;
    if($(window).width() >= 576){
      scrollVar = 70;
    }
    if (scroll >= scrollVar && $(window).width() <= 991) {
      $("#leftOutsideMenu, #sidebarLayer").addClass('scrolled');
      $("#filterToggler, #sidebarToggler").css('top', 0);
    } else{
      $("#leftOutsideMenu, #sidebarLayer").removeClass('scrolled');
      $("#filterToggler, #sidebarToggler").removeAttr('style');
    }
  });

  // lightslider initialization
  var customSliderObject = {
    storySlider: $("#storySlider").lightSlider({
      item:1,
      pager: false,
      controls: false,
      loop: true
    }),
    trendingDescription: $("#trendingDescription").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true
    }),
    discoverNewDestination: $("#discoverNewDestination").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true
    }),
    trendingActivity: $("#trendingActivity").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true
    }),
    trendingActivity2: $("#trendingActivity2").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true
    }),
    placeYouMightLike: $("#placeYouMightLike").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true
    }),
    placeYouMightLikePostCard: $("#placeYouMightLikePostCard").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true
    }),
    videoYouMightLikePostCard: $("#videoYouMightLikePostCard").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true
    }),
    placeInfoPostCard: $("#placeInfoPostCard").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 20,
      loop: true,
      responsive:[{
        breakpoint:575,
        settings: {
          item: 1,
          autoWidth: false
        }
      }]
    }),
    newPeopleDiscover: $("#newPeopleDiscover").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 9,
      loop: true
    }),
    newTravelerDiscover: $("#newTravelerDiscover").lightSlider({
      autoWidth:true,
      pager: false,
      controls: false,
      slideMargin: 9,
      loop: true
    })
  };

  $('.post-block .slide-link').on('click', function(e){
    e.preventDefault();
    let slideBlockId = $(this).parents('.post-block').find('.post-slider').attr('id');
    if($(this).hasClass('slide-prev')){
      customSliderObject[slideBlockId].goToPrevSlide();
    } else if($(this).hasClass('slide-next')){
      customSliderObject[slideBlockId].goToNextSlide();
    }
  });

  $("#postProfileSlider").lightSlider({
    item:1,
    pager: false,
    slideMargin: 0,
    prevHtml: '<i class="trav-angle-left"></i>',
    nextHtml: '<i class="trav-angle-right"></i>',
    addClass: 'post-profile-block'
  });
  $("#postDestSlider").lightSlider({
    pager: false,
    autoWidth:true,
    slideMargin: 8,
    prevHtml: '<i class="trav-angle-left"></i>',
    nextHtml: '<i class="trav-angle-right"></i>',
    addClass: 'post-dest-slider-wrap'
  });
  $("#postFollowSlider").lightSlider({
    item:1,
    pager: false,
    slideMargin: 0,
    enableDrag: false,
    prevHtml: '<i class="trav-angle-left"></i>',
    nextHtml: '<i class="trav-angle-right"></i>',
    addClass: 'post-follow-slider-wrap'
  });
  $("#postDestSliderInner1, #postDestSliderInner2, #postDestSliderInner3").lightSlider({
    pager: false,
    autoWidth:true,
    slideMargin: 8,
    prevHtml: '<i class="trav-angle-left"></i>',
    nextHtml: '<i class="trav-angle-right"></i>',
    addClass: 'post-dest-slider-wrap'
  });
  
});
