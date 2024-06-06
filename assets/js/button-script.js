jQuery(document).ready(function ($) {
  var $button = $(".elementor-button-fixed");

  $(window).on("load", function () {
    $button.fadeIn();
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
    } else {
      $button.css(
        "opacity",
        1 - (scrollPosition - fadeStart) / (fadeEnd - fadeStart)
      );
    }
  });
});
