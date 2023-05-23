$( document ).ready(function() {

  //scrolled header



  $('.homepage-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
  });

  $('.product-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: false,
    dots: true,
    arrows: true,
  });


  //tabs homepage
  let tabTitle = $('.tab-title');
  if(tabTitle.length){
    let tabContent = $('.tab-content');
    tabTitle.each(function (){
      $(this).click(function (e){
        e.preventDefault();
        let attrHref = $(this).attr('href');
        let selectedContent = $(attrHref);
        let tabActive = $('.tab-active');
        if(tabActive){
          tabTitle.removeClass('tab-active');
          $(this).addClass('tab-active');
          tabContent.removeClass('content-active');
          selectedContent.addClass('content-active');
        }else{

        }
      })
    })
  }


  //accordions
  let accordions = $('.accordions')
  if(accordions.length){

    /*        // make first accordion open
            let firstAccordionTitle = $('.accordions.career-accordions > .acc-wrapper:first-of-type > a.acc-title');
            let firstAccordionContent = $('.accordions.career-accordions > .acc-wrapper:first-of-type > div.acc-content');
            let firstAccordionWrapper = $('.accordions.career-accordions > .acc-wrapper:first-of-type');
            firstAccordionTitle.addClass('active');
            firstAccordionWrapper.addClass('isActive');
            firstAccordionContent.slideDown();*/

    let accWrapper = $('.acc-wrapper');

    $('.acc-title').click(function (e){
      e.preventDefault();
      var target = $(e.target);
      var content = $('.acc-content');
      var visible = content.is(':visible');
      var visibleTarget = target.next('div').is(':visible');



      if(!visible && !visibleTarget){
        target.next('div').slideDown();
        target.parent('div').addClass('isActive');
        //target.next('div').attr('aria-expanded', 'true');
        target.addClass('active').attr('aria-expanded', 'true');
      }
      if(visible && !visibleTarget){
        content.slideUp();
        content.prev('a').removeClass('active').attr('aria-expanded', 'false');
        content.parent('div').removeClass('isActive');
        //content.prev('a').attr('aria-expanded', 'false');
        target.next('div').slideDown();
        target.parent('div').addClass('isActive');
        target.next('div');
        target.addClass('active').attr('aria-expanded', 'true');
      }
      if(visibleTarget){
        target.next('div').slideUp();
        target.parent('div').removeClass('isActive')
        //target.next('div').attr('aria-expanded', 'false');
        target.removeClass('active').attr('aria-expanded', 'false');
      }
    });
  }


  // toolbar

  let toolbar = $('.toolbar');
  if(toolbar.length){
    let toolbarInfo = $('.toolbar-info');
    let closeToolbar = $('.close-toolbar, .close-if-anfahrt');
    toolbar.click(function (){
      toolbarInfo.toggleClass('to-left');
      toolbar.toggleClass('to-left');
    })
    closeToolbar.click(function (){
      toolbarInfo.toggleClass('to-left');
      toolbar.toggleClass('to-left');
    })
  }


  let headerHeight = $('header').outerHeight();
  let sidebarIcons = $('.sidebar-icons .toolbar');
  sidebarIcons.css('top', headerHeight + 100 +  'px' );


  // tabs slider if mobile
  let windowWidth = $( window ).width();

  if(windowWidth <= 767){
    $('.tab-content-wrapper').on('init', function(event, slick){
      var dots = $( '.slick-dots li' );
      dots.each( function( k, v){
        $(this).find( 'button' ).addClass( 'heading'+ k );
      });
      var items = slick.$slides;
      items.each( function( k, v){
        var text = $(this).find( 'img' ).attr('title');
        $( '.heading' + k ).text(text);
      });
    });
    $('.tab-content-wrapper').slick({
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      speed: 500,
      //fade: true,
      //cssEase: 'linear',
      autoplay: false,
      autoplaySpeed: 2000,
      arrows: true,
    });
  }

  $('.mobile-menu-icon').click(function (){

    let mainNav = $('#main-navigation');
    let header = $('header');
    let footer = $('footer');
    mainNav.toggleClass('is-visible');
    header.toggleClass('menu-isActive');
    footer.toggleClass('menu-isActive');

    $('.mobile-menu-icon').toggleClass('close-menu');
    $(document.body).toggleClass('no-scroll');
    $("html").toggleClass('hidden');


  });


  // load more certificates
  /*    let loadMoreBtn = $('.load-more');
      if(loadMoreBtn.length){
          let containerToOpen = $('.load-on-click');
          loadMoreBtn.click(function (e){
              e.preventDefault();
              containerToOpen.slideToggle('fast');
              if ($(this).text() === "WEITERE DOKUMENTE LADEN") {
                  $(this).text("WENIGER DOKUMENTE LADEN");
              } else {
                  $(this).text("WEITERE DOKUMENTE LADEN");
              }
          })
      }*/

  //hover year

  let historyYear = $('.y1');
  if(historyYear.length){
    historyYear.each(function (){

      $(this).on("touchstart, mouseover", function(e) {
        let year = $(this);
        let allYears = $('.y1')
        let allYtexts = $('.text-to-show')
        let hoveredID = year.attr('id');
        let textID = $('div[data-hover=' + hoveredID + ']');
        if(year.hasClass('hovered')){
          allYears.removeClass('hovered');
          year.addClass('hovered');
          allYtexts.removeClass('show');
          textID.addClass('show');
          console.log(year)
          console.log(allYears);
          console.log(allYtexts);
          console.log(textID);
        }else{
          allYears.removeClass('hovered');
          year.addClass('hovered');
          allYtexts.removeClass('show');
          textID.addClass('show');
        }
      })


    })
  }





  function directions(){
    $(".close-if-anfahrt").click(function(e) {
      let headerIsScrolled = $('.isScrolled');

      if(headerIsScrolled.length){
        setTimeout(function (){
          console.log('is scrolled')
          $('html, body').animate({
            scrollTop: $('#anfahrt-kwm').offset().top - 50
          }, 500);
        },0)
      }if(headerIsScrolled.length === 0){
        setTimeout(function (){
          console.log('is not scrolled')
          $('html, body').animate({
            scrollTop: $('#anfahrt-kwm').offset().top - 300
          }, 500);
        },0)
      }
      e.preventDefault();
    });
  }

  if (window.location.href.indexOf("contact") > -1) {
    setTimeout(directions, 1000);
  }



  // custom lightbox

  let simpleLightbox = $('.simpleLightbox');
  if(simpleLightbox.length){
    simpleLightbox.click(function (e){
      let target = $(e.target);
      let element = $(this);
      let iamgeFilePath = element.attr('href');
      let body = $('body');

      body.append('<div class="body-overlay"> <div class="large-image"><img src=" '+ iamgeFilePath +' " /></div> <div class="close-image"></div></div>');

      let closeImage = $('.close-image');
      closeImage.click(function (){
        $('.body-overlay').remove();
      })

      console.log(iamgeFilePath)
      e.preventDefault();
    })
  }



});



$(window).on('scroll', function () {
  let isScrollTop = $(window).scrollTop();
  if(isScrollTop > 250){
    $('header:not(.no--fixed)').addClass('isScrolled');
  }
  if(isScrollTop < 250){
    $('header:not(.no--fixed)').removeClass('isScrolled');
  }
});

