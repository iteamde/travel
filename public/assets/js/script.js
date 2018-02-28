$(document).ready(function(){
  
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
  $("#postDestSlider, #postDestSliderInner1, #postDestSliderInner2, #postDestSliderInner3").lightSlider({
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

  var inputFocusBlur = (id) => {
    $(id).on('focus', function(){
      $(this).parents('.search-block-wrap').addClass('show');
      if(!$("#searchFilterList").hasClass('lightSlider')){
        $("#searchFilterList").lightSlider({
          autoWidth:true,
          pager: false,
          slideMargin: 0,
          prevHtml: '<i class="trav-angle-left"></i>',
          nextHtml: '<i class="trav-angle-right"></i>',
          addClass: 'filter-slider-wrap'
        });
      };
    });
    $(id).on('blur', function(){
      $(this).parents('.search-block-wrap').removeClass('show');
    });
  };

  $('#addPlacePopup, #wouldVisitPlacePopup').on('shown.bs.modal', function(){
    inputFocusBlur('#placeSearchInput');
    inputFocusBlur('#placeSearchInput2');
  });

  // message input dropdown
  $('#messageSearchInput').keyup(function(e){
    let value = $(e.target).val();
    if(value.length >= 3){
      $(this).parents('.header-search-block').addClass('show');
    } else{
      $(this).parents('.header-search-block').removeClass('show');
    }
  });
  $('.search-block .delete-search').on('click', function(e){
    $(e.target).parents('.header-search-block').removeClass('show').find('input').val(null);
    // $(e.target).parents('.search-block').find('input').val(null);
  })

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

  if(!$("#createTripCalendarSlider").hasClass('lightSlider')){
    $("#createTripCalendarSlider").lightSlider({
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
  };
  $('#storyModePopup').on('hidden.bs.modal', function(){
    $('#storyModePopup .modal-close').css('top', '30px');
    $('#modalHeadTripPlan').removeClass('scrolled').hide();
  });

  $('#storiesModePopup, #placeOneDayPopup').on('show.bs.modal', function(){
    $(this).find("#storiesModeSlider").lightSlider({
      autoWidth: true,
      pager: false,
      slideMargin: 15,
      prevHtml: '<i class="trav-angle-left"></i>',
      nextHtml: '<i class="trav-angle-right"></i>'
    });
    $(this).find("#postDestSliderInner4").lightSlider({
      pager: false,
      autoWidth:true,
      slideMargin: 8,
      prevHtml: '<i class="trav-angle-left"></i>',
      nextHtml: '<i class="trav-angle-right"></i>',
      addClass: 'post-dest-slider-wrap'
    });
  });

  $('.modal').on('shown.bs.modal', function(){
    let headComment = $(this).find('.post-comment-head');
    let headHeight = $(headComment).outerHeight();
    let scrollVar = 30;
    $(this).scroll(function() {    
      let scroll = $(this).scrollTop();
      let headTop = scroll - scrollVar - 1;
      if (scroll >= scrollVar) {
        $(this).find('.post-modal-comment').addClass('head-fixed').css('padding-top',headHeight);
        $(headComment).css('top',headTop);
      } else{
        $(this).find('.post-modal-comment').removeClass('head-fixed').removeAttr('style');
        $(headComment).removeAttr('style');
      }
    });
  });

  $("#mobileIconShow").on('click', function(e){
    e.preventDefault();
    let iconList = $(this).parents('.smile-link-wrap').find('.smile-list');
    $(iconList).toggleClass('show');
  });

  $('.message-chat').after().on('click', function(){
    $(this).parents('.message-block').addClass('hide-side');

  });
  $("#mobileSideToggler").on('click', function(){
    let messageBlock = $(this).parents('.message-block');
    $(messageBlock).toggleClass('hide-side');
  });

  $('#lightGalleryTrigger').on('click', function(){
    
    let $lg = $(this).lightGallery({
      dynamic: true,
      dynamicEl: [{
        "src": 'https://sachinchoolur.github.io/lightGallery/static/img/1-1600.jpg',
        'thumb': 'https://sachinchoolur.github.io/lightGallery/static/img/thumb-1.jpg',
        'subHtml': `<div class='cover-block' style='display:none;'>
          <div class='cover-block-inner'>
            <div class="top-gallery-content">
              <div class="top-info-layer">
                <div class="top-avatar-wrap">
                  <img src="http://placehold.it/50x50" alt="">
                </div>
                <div class="top-info-txt">
                  <div class="preview-txt">
                    <p class="dest-name" href="#">Rabat sale airport</p> 
                    <p class="dest-place">Airport in <span>Rabat-sale, Morocco</span></p>
                  </div>
                </div>
              </div>
              <div class="sub-post-info">
                <ul class="sub-list">
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-popularity-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">#4</div>
                      <div class="sub-txt">Popularity</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-safety-big-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">9/10</div>
                      <div class="sub-txt">Safety</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-user-rating-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">4.8/5</div>
                      <div class="sub-txt">User rating</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="map-preview">
              <img src="./assets/image/map-preview.jpg" alt="map">
            </div>
            <div class='post-map-info-caption map-black'>
              <div class='map-avatar'>
                <img src='http://placehold.it/25x25'>
              </div>
              <div class='map-label-txt'><b>Suzanne</b> checked on <b>2 Sep</b> at <b>8:30 am</b> and stayed <b>30 min</b></div>
            </div>
          </div>
        </div>`
      }, {
        "src": 'https://sachinchoolur.github.io/lightGallery/static/img/2-1600.jpg',
        'thumb': 'https://sachinchoolur.github.io/lightGallery/static/img/thumb-2.jpg',
        'subHtml': `<div class='cover-block' style='display:none;'>
          <div class='cover-block-inner comment-block'>
            <div class="map-preview">
              <img src="./assets/image/map-preview.jpg" alt="map">
            </div>
            <div class='gallery-comment-wrap'>
              <div class='gallery-comment-inner'>
                <div class="top-gallery-content gallery-comment-top">
                  <div class="top-info-layer">
                    <div class="top-avatar-wrap">
                      <img src="http://placehold.it/50x50" alt="">
                    </div>
                    <div class="top-info-txt">
                      <div class="preview-txt">
                        <p class="dest-name" href="#">Rabat sale airport</p> 
                        <p class="dest-place">Airport in <span>Rabat-sale, Morocco</span></p>
                      </div>
                    </div>
                  </div>
                  <div class="gallery-comment-top-line">
                    <p>
                      <a href="#" class="gallery-link">Photo</a>
                      by
                      <img src="http://placehold.it/22x22" alt="avatar">
                      <a href="#" class="gallery-link">Suzanne</a>
                      <span class="dot">·</span> 18 Jun 2017
                    </p>
                  </div>
                  <div class="gallery-comment-top-line">
                    <p>
                      Trip Plan
                      <a href="#" class="gallery-link">From Morocco to Japan in 7 Days</a>
                    </p>
                  </div>
                  <div class="gal-com-footer-info">
                    <div class="post-foot-block post-reaction">
                      <img src="./assets/image/reaction-icon-smile-only.png" alt="smile">
                      <span><b>2</b> Reactions</span>
                    </div>
                  </div>
                </div>
                <div class="post-comment-layer">
                  <div class="post-comment-top-info">
                    <div class="comm-count-info">
                      5 Comments
                    </div>
                    <div class="comm-count-info">
                      3 / 20
                    </div>
                  </div>
                  <div class="post-comment-wrapper">
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>21</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Amine</a>
                          <a href="#" class="comment-nickname">@ak0117</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-like.png" alt="">
                            <span>19</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>15</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <a href="#" class="load-more-link">Load more...</a>
                  </div>
                  <div class="post-add-comment-block">
                    <div class="avatar-wrap">
                      <img src="http://placehold.it/45x45" alt="">
                    </div>
                    <div class="post-add-com-input">
                      <input type="text" placeholder="Write a comment">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`
      }, {
        "src": 'https://sachinchoolur.github.io/lightGallery/static/img/2-1600.jpg',
        'thumb': 'https://sachinchoolur.github.io/lightGallery/static/img/thumb-2.jpg',
        'subHtml': `<div class='cover-block' style='display:none;'>
          <div class='cover-block-inner comment-block'>
            <ul class="modal-outside-link-list white-bg">
              <li class="outside-link">
                <a href="#">
                  <div class="round-icon">
                    <i class="trav-angle-left"></i>
                  </div>
                  <span>Back</span>
                </a>
              </li>
            </ul>
            <div class="top-gallery-content">
              <div class="sub-post-info">
                <ul class="sub-list">
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-popularity-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">#4</div>
                      <div class="sub-txt">Popularity</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-safety-big-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">9/10</div>
                      <div class="sub-txt">Safety</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-user-rating-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">4.8/5</div>
                      <div class="sub-txt">User rating</div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="follow-btn-wrap">
                <button type="button" class="btn btn-light-primary btn-bordered btn-icon-side btn-icon-right">
                  Interested
                  <span class="icon-wrap"><i class="trav-view-plan-icon"></i></span>
                </button>
              </div>
            </div>
            <div class="map-preview">
              <img src="./assets/image/map-preview.jpg" alt="map">
            </div>
            <div class='gallery-comment-wrap'>
              <div class='gallery-comment-inner'>
                <div class="top-gallery-content gallery-comment-top">
                  <div class="top-info-layer">
                    <div class="top-avatar-wrap">
                      <img src="http://placehold.it/50x50" alt="">
                    </div>
                    <div class="top-info-txt">
                      <div class="preview-txt">
                        <p class="dest-name" href="#">Grand Legacy At The Park</p> 
                        <p class="dest-place">Hotel - 6.27 km from Disneyland</p>
                      </div>
                    </div>
                  </div>
                  <div class="gal-com-footer-info">
                    <div class="post-foot-block post-reaction">
                      <img src="./assets/image/reaction-icon-smile-only.png" alt="smile">
                      <span><b>2</b> Reactions</span>
                    </div>
                  </div>
                </div>
                <div class="post-comment-layer">
                  <div class="post-comment-top-info">
                    <div class="comm-count-info">
                      5 Comments
                    </div>
                    <div class="comm-count-info">
                      3 / 20
                    </div>
                  </div>
                  <div class="post-comment-wrapper">
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>21</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Amine</a>
                          <a href="#" class="comment-nickname">@ak0117</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-like.png" alt="">
                            <span>19</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>15</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <a href="#" class="load-more-link">Load more...</a>
                  </div>
                  <div class="post-add-comment-block">
                    <div class="avatar-wrap">
                      <img src="http://placehold.it/45x45" alt="">
                    </div>
                    <div class="post-add-com-input">
                      <input type="text" placeholder="Write a comment">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`
      }, {
        "src": 'https://sachinchoolur.github.io/lightGallery/static/img/2-1600.jpg',
        'thumb': 'https://sachinchoolur.github.io/lightGallery/static/img/thumb-2.jpg',
        'subHtml': `<div class='cover-block' style='display:none;'>
          <div class='cover-block-inner comment-block'>
            <ul class="modal-outside-link-list white-bg">
              <li class="outside-link">
                <a href="#">
                  <div class="round-icon">
                    <i class="trav-angle-left"></i>
                  </div>
                  <span>Back</span>
                </a>
              </li>
              <li class="outside-link">
                <a href="#">
                  <div class="round-icon">
                    <i class="trav-flag-icon"></i>
                  </div>
                  <span>Report</span>
                </a>
              </li>
            </ul>
            <div class="top-gallery-content">
              <div class="sub-post-info">
                <ul class="sub-list">
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-popularity-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">#4</div>
                      <div class="sub-txt">Popularity</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-safety-big-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">9/10</div>
                      <div class="sub-txt">Safety</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-user-rating-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">4.8/5</div>
                      <div class="sub-txt">User rating</div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="follow-btn-wrap">
                <button type="button" class="btn btn-light-primary btn-bordered btn-icon-side btn-icon-right">
                  Interested
                  <span class="icon-wrap"><i class="trav-view-plan-icon"></i></span>
                </button>
              </div>
            </div>
            <div class="map-preview">
              <img src="./assets/image/map-preview.jpg" alt="map">
            </div>
            <div class='gallery-comment-wrap'>
              <div class='gallery-comment-inner'>
                <div class="top-gallery-content gallery-comment-top">
                  <div class="top-info-layer">
                    <div class="post-top-round-icon-wrap">
                      <i class="trav-event-icon"></i>
                    </div>
                    <div class="top-info-txt">
                      <div class="preview-txt">
                        <a class="post-name-link" href="#">Quick Chek New Jersey Festival of Ballooning</a>
                        <p>
                          <span>By</span>
                          <a href="#" class="post-name-link">Donec Ultrices Nunc</a>
                          <span class="dot">·</span>
                          <span>8 Days left</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="gal-com-footer-info">
                    <div class="post-foot-block post-reaction">
                      <img src="./assets/image/reaction-icon-smile-only.png" alt="smile">
                      <span><b>2</b> Reactions</span>
                    </div>
                    <div class="post-foot-block post-comment-place">
                      <i class="trav-location"></i>
                      <span class="place-name">New York City</span>
                    </div>
                  </div>
                </div>
                <div class="post-comment-layer">
                  <div class="post-comment-top-info">
                    <div class="comm-count-info">
                      5 Comments
                    </div>
                    <div class="comm-count-info">
                      3 / 20
                    </div>
                  </div>
                  <div class="post-comment-wrapper">
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>21</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Amine</a>
                          <a href="#" class="comment-nickname">@ak0117</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-like.png" alt="">
                            <span>19</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>15</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <a href="#" class="load-more-link">Load more...</a>
                  </div>
                  <div class="post-add-comment-block">
                    <div class="avatar-wrap">
                      <img src="http://placehold.it/45x45" alt="">
                    </div>
                    <div class="post-add-com-input">
                      <input type="text" placeholder="Write a comment">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`
      }, {
        "src": 'https://sachinchoolur.github.io/lightGallery/static/img/2-1600.jpg',
        'thumb': 'https://sachinchoolur.github.io/lightGallery/static/img/thumb-2.jpg',
        'subHtml': `<div class='cover-block' style='display:none;'>
          <div class='cover-block-inner comment-block'>
            <ul class="modal-outside-link-list white-bg">
              <li class="outside-link">
                <a href="#">
                  <div class="round-icon">
                    <i class="trav-angle-left"></i>
                  </div>
                  <span>Back</span>
                </a>
              </li>
              <li class="outside-link">
                <a href="#">
                  <div class="round-icon">
                    <i class="trav-flag-icon"></i>
                  </div>
                  <span>Report</span>
                </a>
              </li>
            </ul>
            <div class="top-gallery-content">
              <div class="sub-post-info">
                <ul class="sub-list">
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-popularity-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">#4</div>
                      <div class="sub-txt">Popularity</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-safety-big-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">9/10</div>
                      <div class="sub-txt">Safety</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-user-rating-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">4.8/5</div>
                      <div class="sub-txt">User rating</div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="follow-btn-wrap">
                <button type="button" class="btn btn-light-primary btn-bordered btn-icon-side btn-icon-right">
                  Interested
                  <span class="icon-wrap"><i class="trav-view-plan-icon"></i></span>
                </button>
              </div>
            </div>
            <div class="map-preview">
              <img src="./assets/image/map-preview.jpg" alt="map">
            </div>
            <div class='gallery-comment-wrap'>
              <div class='gallery-comment-inner'>
                <div class="top-gallery-content gallery-comment-top">
                  <div class="top-info-layer">
                    <div class="top-avatar-wrap">
                      <img src="http://placehold.it/50x50" alt="">
                    </div>
                    <div class="top-info-txt">
                      <div class="preview-txt">
                        <a class="dest-name" href="#">Julie</a> 
                        <p class="dest-place">uploaded a <b>photo</b> <span class="date">2 hours ago</span></p>
                      </div>
                    </div>
                  </div>
                  <div class="gallery-comment-txt">
                    <p>This is an amazing street to walk around and do some shopping</p>
                  </div>
                  <div class="gal-com-footer-info">
                    <div class="post-foot-block post-reaction">
                      <i class="trav-heart-fill-icon"></i>
                      <span><b>185</b></span>
                    </div>
                    <div class="post-foot-block post-comment-place">
                      <i class="trav-location"></i>
                      <span class="place-name">510 LaGuardia Pl, Paris, France</span>
                    </div>
                  </div>
                </div>
                <div class="post-comment-layer">
                  <div class="post-comment-top-info">
                    <div class="comm-count-info">
                      5 Comments
                    </div>
                    <div class="comm-count-info">
                      3 / 20
                    </div>
                  </div>
                  <div class="post-comment-wrapper">
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>21</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row happen-event">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Amine</a>
                          <a href="#" class="comment-nickname">@ak0117</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-like.png" alt="">
                            <span>19</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <div class="post-comment-row">
                      <div class="post-com-avatar-wrap">
                        <img src="http://placehold.it/45x45" alt="">
                      </div>
                      <div class="post-comment-text">
                        <div class="post-com-name-layer">
                          <a href="#" class="comment-name">Katherin</a>
                          <a href="#" class="comment-nickname">@katherin</a>
                        </div>
                        <div class="comment-txt">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat culpa qui odit delectus.</p>
                        </div>
                        <div class="comment-bottom-info">
                          <div class="com-reaction">
                            <img src="./assets/image/icon-smile.png" alt="">
                            <span>15</span>
                          </div>
                          <div class="com-time">6 hours ago</div>
                        </div>
                      </div>
                    </div>
                    <a href="#" class="load-more-link">Load more...</a>
                  </div>
                  <div class="post-add-comment-block">
                    <div class="avatar-wrap">
                      <img src="http://placehold.it/45x45" alt="">
                    </div>
                    <div class="post-add-com-input">
                      <input type="text" placeholder="Write a comment">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`
      }, {
        "src": 'https://sachinchoolur.github.io/lightGallery/static/img/13-1600.jpg',
        'thumb': 'https://sachinchoolur.github.io/lightGallery/static/img/thumb-13.jpg',
        'subHtml': `<div class='cover-block' style='display:none;'>
          <div class='cover-block-inner'>
            <div class="top-gallery-content">
              <div class="top-info-layer">
                <div class="top-avatar-wrap">
                  <img src="http://placehold.it/50x50" alt="">
                </div>
                <div class="top-info-txt">
                  <div class="preview-txt">
                    <p class="dest-name" href="#">Rabat sale airport</p> 
                    <p class="dest-place">Airport in <span>Rabat-sale, Morocco</span></p>
                  </div>
                </div>
              </div>
              <div class="sub-post-info">
                <ul class="sub-list">
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-popularity-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">#4</div>
                      <div class="sub-txt">Popularity</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-safety-big-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">9/10</div>
                      <div class="sub-txt">Safety</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-user-rating-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">4.8/5</div>
                      <div class="sub-txt">User rating</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="map-preview">
              <img src="./assets/image/map-preview.jpg" alt="map">
            </div>
            <div class='post-map-info-caption map-black'>
              <div class='map-avatar'>
                <img src='http://placehold.it/25x25'>
              </div>
              <div class='map-label-txt'><b>Suzanne</b> checked on <b>2 Sep</b> at <b>8:30 am</b> and stayed <b>30 min</b></div>
            </div>
          </div>
        </div>`
      }, {
        "src": 'https://sachinchoolur.github.io/lightGallery/static/img/4-1600.jpg',
        'thumb': 'https://sachinchoolur.github.io/lightGallery/static/img/thumb-4.jpg',
        'subHtml': `<div class='cover-block' style='display:none;'>
          <div class='cover-block-inner'>
            <div class="top-gallery-content">
              <div class="top-info-layer">
                <div class="top-avatar-wrap">
                  <img src="http://placehold.it/50x50" alt="">
                </div>
                <div class="top-info-txt">
                  <div class="preview-txt">
                    <p class="dest-name" href="#">Rabat sale airport</p> 
                    <p class="dest-place">Airport in <span>Rabat-sale, Morocco</span></p>
                  </div>
                </div>
              </div>
              <div class="sub-post-info">
                <ul class="sub-list">
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-popularity-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">#4</div>
                      <div class="sub-txt">Popularity</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-safety-big-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">9/10</div>
                      <div class="sub-txt">Safety</div>
                    </div>
                  </li>
                  <li>
                    <div class="icon-wrap">
                      <i class="trav-user-rating-icon"></i>
                    </div>
                    <div class="ctxt">
                      <div class="top-txt">4.8/5</div>
                      <div class="sub-txt">User rating</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="map-preview">
              <img src="./assets/image/map-preview.jpg" alt="map">
            </div>
            <div class='post-map-info-caption map-black'>
              <div class='map-avatar'>
                <img src='http://placehold.it/25x25'>
              </div>
              <div class='map-label-txt'><b>Suzanne</b> checked on <b>2 Sep</b> at <b>8:30 am</b> and stayed <b>30 min</b></div>
            </div>
          </div>
        </div>`
      }],
      
      addClass: 'main-gallery-block',
      pager: false,
      hideControlOnEnd: true,
      loop: false,
      slideEndAnimatoin : false,
      thumbnail:true,
      toogleThumb: false,
      thumbHeight: 100,
      thumbMargin: 20,
      thumbContHeight: 180,
      actualSize: false,
      zoom: false,
      autoplayControls: false,
      fullScreen: false,
      download: false,
      counter: false,
      mousewheel: false,
      appendSubHtmlTo: 'lg-item',
      prevHtml: '<i class="trav-angle-left"></i>',
      nextHtml: '<i class="trav-angle-right"></i>',
      hideBarsDelay: 100000000
    });

    $lg.on('onAfterOpen.lg',function(){
      $('body').css('overflow','hidden');
      let itemArr = [], thumbArr = [];
      let galleryBlock = $('.main-gallery-block');
      let galleryItem = $(galleryBlock).find('.lg-item');
      let galleryThumb = $(galleryBlock).find('.lg-thumb-item');
      $.each(galleryItem, function(i, val){
        // itemArr.push(val);
      });
      $.each(galleryThumb, function(i, val){
        // thumbArr.push(val);
        let startCnt = `<div class="thumb-txt"><i class="trav-flag-icon"></i> start</div>`;
        let startCntEmpty = `<div class="thumb-txt">&nbsp;</div>`;
        let placetxt = 'rabar-sale airport'
        let placeName = `<div class="thumb-txt">${placetxt}</div>`;
        if(i == 0){
          $(val).addClass('place-thumb');
          $(val).append(placeName).prepend(startCnt);
        }
        if(i == 2){
          $(val).addClass('place-thumb');
          $(val).append(placeName).prepend(startCntEmpty);
        }
      });
    });
    $lg.on('onBeforeClose.lg',function(){
      $('body').removeAttr('style');
    });
    let setWidth = function(){
      let mainBlock = $('.main-gallery-block');
      let subTtlWrp = $(mainBlock).find('.lg-current .cover-block');
      let subTtl = $(mainBlock).find('.lg-current .cover-block-inner');

      let slide = $('.main-gallery-block .lg-item');
      let currentItem = $('.main-gallery-block .lg-current');
      let currentImgWrap = $('.main-gallery-block .lg-current .lg-img-wrap');
      let currentImg = $('.main-gallery-block .lg-current .lg-image');
      let currentCommentIs = $(subTtl).hasClass('comment-block');
      let currentImgPos = $(currentImg).position().top;
      setTimeout(function(){
        let commentWidth = $('.main-gallery-block .lg-current .gallery-comment-wrap').width();
        let currentWidth = $(mainBlock).find('.lg-current .lg-object').width();
        if(currentCommentIs){
          // console.log('yes');
          $(currentImgWrap).css('padding-right', commentWidth);
          $(subTtl).css('width', currentWidth + commentWidth);
        } else{
          $(currentImgWrap).removeAttr('style');
          $(subTtl).css('width', currentWidth);
        }
        $(subTtlWrp).show();
        $('.mCustomScrollbar').mCustomScrollbar();
      }, 500);
    }

    $lg.on('onSlideItemLoad.lg',function(e){
      
      setWidth();
      $(window).on('resize', function(){
        setWidth();
      })
    });
    $lg.on('onAfterSlide.lg',function(){
      setWidth();
    });
  });

  $('.side-trip-tab .trip-tab-block').on('click', function(e){
    $('.side-trip-tab .trip-tab-block').removeClass('current-tab');
    $(this).addClass('current-tab');
  })
});
