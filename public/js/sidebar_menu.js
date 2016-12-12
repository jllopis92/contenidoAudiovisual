var j = jQuery.noConflict();
j("#menu-toggle").click(function(e) {
        e.preventDefault();
        j("#wrapper").toggleClass("toggled");
    });
     j("#menu-toggle").click(function(e) {
        e.preventDefault();
        j("#wrapper").toggleClass("toggled-2");
        j('#menu ul').hide();
    });
 
     function initMenu() {
      j('#menu ul').hide();
      j('#menu ul').children('.current').parent().show();
      //$('#menu ul:first').show();
      j('#menu li a').click(
        function() {
          var checkElement = j(this).next();
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
            }
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            j('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
            }
          }
        );
      }
    j(document).ready(function() {initMenu();});