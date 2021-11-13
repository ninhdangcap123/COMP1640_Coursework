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
    var x = document.getElementById("myDropdown");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
  }

});
 /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  function logoutFunction() {
    document.getElementById("logoutDropdown").classList.toggle("show");
  }
  function editIdeaFunction() {
    document.getElementById("editIdeaDropdown").classList.toggle("show");
  }
  function editCmtFunction() {
    document.getElementById("editCmtDropdown").classList.toggle("show");
  }
