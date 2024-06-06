jQuery(document).ready(function ($) {
  var $button = $(".elementor-button-fixed");
  $button.css("display", "none");

  $(window).on("load", function () {
    // setTimeout(function () {
    //   $button.fadeIn();
    // }, 3000);

    var checkMastheadLoaded = setInterval(function () {
      if ($("#masthead").length) {
        $button.fadeIn();
        //  $button.addClass('animate-entry');
        clearInterval(checkMastheadLoaded);
      }
    }, 100);
  });

  $(window).on("scroll", function () {
    var scrollPosition = $(window).scrollTop();
    var windowHeight = $(window).height();

    var fadeStart = 100;
    var fadeEnd = 500;

    if (scrollPosition <= fadeStart) {
      $button.css("opacity", 1);
    } else if (scrollPosition >= fadeEnd) {
      $button.css("opacity", 0);
      $button.css("display", "none");
    } else {
      var opacity = 1 - (scrollPosition - fadeStart) / (fadeEnd - fadeStart);
      $button.css("display", "flex");
      $button.css("opacity", opacity);
    }
  });

  $button.on("click", function (e) {
    e.preventDefault();
    var target = $(this).attr("href");
    if (target) {
      $("html, body").animate(
        {
          scrollTop: $(target).offset().top,
        },
        1000
      );
    }
  });
});
