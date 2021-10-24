'use strict';
jQuery(document).ready(function ($) {

    initIsotopeFiltering();
    myFunction();
function initIsotopeFiltering() {
    if ($(".custom-select").length) {
        $(".custom-select").click(function () {
            $(".custom-select.active").removeClass("active");
            $(this).addClass("active");

            var selector = $(this).attr("data-filter");
            $(".idea-grid").isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: "linear",
                    queue: false,
                },
            });
            return false;
        });
    }
}
function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
  }
});