$(document).ready(function(){
  
	$('#logIn').on('shown.bs.modal', function () {
		$('input[name=email]').focus();
	});

	$('#signUpStep1').on('shown.bs.modal', function () {
		$('input[name=email]').focus();
	});

	$('#signUpStep3').on('shown.bs.modal', function () {
		$('input[name=name]').focus();
  });
	
  $('#createPostTxt').on('keyup', function(){
    let inputVal = $(this).val();
    let postBtn = $(this).parents('.post-create-block').find('.btn-light-primary');
    if(inputVal.length >= 3){
      $('body').addClass('postWritted');
      $(postBtn).removeClass('btn-disabled');
    } else{
      $('body').removeClass('postWritted');
      $(postBtn).addClass('btn-disabled');
    }
  });

  // $('.white-style').on('click', function () {
  //   $(this).modal('hide');
  // }).children('.modal-dialog').on('click', function (e) {
  //   return true;
  // });
  
  // $('.check-block').click(function(){
  //   $(this).toggleClass('checked-block');
  // });

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
    if (scroll >= scrollVar) {
      $('#headerTripPlan').addClass('scrolled');
      $('#headerTripPlan .head-trip-plan_trip-line').show();
    } else{
      $('#headerTripPlan').removeClass('scrolled');
      $('#headerTripPlan .head-trip-plan_trip-line').hide();
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
    if(!$(this).parents('.post-block').hasClass('modal-post-slider')){
      let slideBlockId = $(this).parents('.post-block').find('.post-slider').attr('id');
      if($(this).hasClass('slide-prev')){
        customSliderObject[slideBlockId].goToPrevSlide();
      } else if($(this).hasClass('slide-next')){
        customSliderObject[slideBlockId].goToNextSlide();
      }
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
  $("#tripDestSlider").lightSlider({
    pager: false,
    controls: false,
    autoWidth:true,
    slideMargin: 0,
    addClass: 'trip-destination-slider-block'
  });
  $("#postFollowSlider").lightSlider({
    item:1,
    pager: false,
    slideMargin: 20,
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
  $("#tripLineSlider").lightSlider({
    autoWidth:true,
    pager: false,
    slideMargin: 10,
    prevHtml: '<i class="trav-angle-left"></i>',
    nextHtml: '<i class="trav-angle-right"></i>',
    addClass: 'trip-line-slider-wrap',
    onSliderLoad: function(){
      $('#headerTripPlan .head-trip-plan_trip-line').hide();
    }
  });

  $('.modal-child').on('hidden.bs.modal', function () {
    $('body').addClass('modal-open').css('padding-right', '15px');
  });

  $('#mapModePopup').on('shown.bs.modal', function(){
    if(!$("#tripMapSlider").hasClass('lightSlider')){
      $("#tripMapSlider").lightSlider({
        item:1,
        pager: false,
        slideMargin: 20,
        enableDrag: false,
        prevHtml: '<i class="trav-angle-left"></i>',
        nextHtml: '<i class="trav-angle-right"></i>',
        addClass: 'post-modal-follow-slider-wrap'
      });
    }
    if(!$("#tripDestSlider1, #tripDestSlider2, #tripDestSlider3").hasClass('lightSlider')){
      $("#tripDestSlider1, #tripDestSlider2, #tripDestSlider3").lightSlider({
        pager: false,
        autoWidth:true,
        slideMargin: 0,
        prevHtml: '<i class="trav-angle-left"></i>',
        nextHtml: '<i class="trav-angle-right"></i>',
        addClass: 'trip-destination-slider-block',
        onSliderLoad: function(el){
          $(el).css('opacity', 1);
        }
      });
    }
  });

  $('.trip-map_wrapper .destination-point').on('click', function(){
    $(this).toggleClass('selected');
  })

  $('#mapPopup').on('shown.bs.modal', function(){
    let getTheDirect = function(elem){
      let sliderController = $(elem).find('.lslide.active .dest-slide-vector');
      let leftDirect, rightDirect;
      if(sliderController.data('direct') == 'left'){
        leftDirect = sliderController;
      }
      if(sliderController.data('direct') == 'right'){
        rightDirect = sliderController;
      }
      $(leftDirect).on('click', function(){
        elem.goToPrevSlide();
      });
      $(rightDirect).on('click', function(){
        elem.goToNextSlide();
      });
    }
    
    $("#modalMapSlider").lightSlider({
      item:1,
      pager: false,
      controls: false,
      enableDrag: false,
      addClass: 'post-map-slider',
      onSliderLoad: function(el){
        getTheDirect(el);
      },
      onAfterSlide: function(el){
        getTheDirect(el);
      }
    });
  });

  $('#storyModePopup').on('shown.bs.modal', function(){
    let placeNameList = $(this).find('.place-name-list');
    let currentItem = $(placeNameList).find('.current');
    $.each(currentItem, function(){
      let itemWidth = $(this).outerWidth()/2;
      let parentBlock = $(this).parent();
      let parentBlockWidth = $(this).parent().width();
      let itemOffsetToParent = $(this).offset().left - parentBlock.offset().left;

      let calcCount = itemWidth + itemOffsetToParent;

      $(parentBlock).css('left', -calcCount);
    });

    if(!$("#moreStorySlider").hasClass('lightSlider')){
      $("#moreStorySlider").lightSlider({
        autoWidth:true,
        pager: false,
        controls: false,
        slideMargin: 10,
        loop: true,
        addClass: 'more-story-slider',
        onSliderLoad: function(el){
          $(el).parents('.post-block').find('.slide-link').on('click', function(e){
            e.preventDefault();
            let slideBlockId = $(this).parents('.post-block').find('.post-slider').attr('id');
            if($(this).hasClass('slide-prev')){
              el.goToPrevSlide();
            } else if($(this).hasClass('slide-next')){
              el.goToNextSlide();
            }
          });
        }
      });
    }
    
    if(!$("#calendarSlider").hasClass('lightSlider')){
      $("#calendarSlider").lightSlider({
        item:3,
        pager: false,
        controls: false,
        loop:false,
        slideMove:1,
        slideMargin: 0,
        centerSlider: true,
        addClass: 'head-calendar-slider',
        onSliderLoad: function(el){
          $('.day-slider a.prevDay').on('click', function(e){
            e.preventDefault();
            el.goToPrevSlide();
          });
          $('.day-slider a.nextDay').on('click', function(e){
            e.preventDefault();
            el.goToNextSlide();
          });
        }
      });
    }
    
    if(!$("#tripLineSliderModal").hasClass('lightSlider')){
      $("#tripLineSliderModal").lightSlider({
        autoWidth:true,
        pager: false,
        slideMargin: 10,
        prevHtml: '<i class="trav-angle-left"></i>',
        nextHtml: '<i class="trav-angle-right"></i>',
        addClass: 'trip-line-slider-wrap',
        onSliderLoad: function(el){
          $(el).parents('#modalHeadTripPlan').hide();
        }
      });
    }

    $(this).scroll(function() {    
      let scroll = $(this).scrollTop();
      let scrollVar = 50;
      if($(window).width() >= 576){
        scrollVar = 140;
      }
      if (scroll >= scrollVar) {
        $('#storyModePopup .modal-close').css('top', '17px');
        $('#modalHeadTripPlan').addClass('scrolled').show();
      } else{
        $('#storyModePopup .modal-close').css('top', '30px');
        $('#modalHeadTripPlan').removeClass('scrolled').hide();
      }
    })
    
  });
  $('#storyModePopup').on('hidden.bs.modal', function(){
    $('#storyModePopup .modal-close').css('top', '30px');
    $('#modalHeadTripPlan').removeClass('scrolled').hide();
  })
  
});
