//Mobile Menu Open
$(document).ready(function() {
  $(`#menuTrigger`).click(function() {
    if ($(window).width() < 600) {
      $(`.header-nav`).removeClass(`header-nav-closed`).addClass(`header-nav-open`);
      $(`body`).css({'overflow': 'hidden'});
    }
   });
   $(`#menuExit`).click(function() {
     $(`.header-nav`).removeClass(`header-nav-open`).addClass(`header-nav-closed`);
     $(`.header-nav-main-link-dropdown-list`).removeAttr("style");
     $(`body`).css({'overflow': 'auto'});
   });
});

//Mobile Menu Dropdown
$(document).ready(function() {
      $(`.header-nav-main-link-dropdown`).click(function () {
        if($(window).width() < 600) {
          event.preventDefault();
          $(this)
            .siblings(`.header-nav-main-link-dropdown`).children(`.header-nav-main-link-dropdown-list`)
            .not($(this).next(`.header-nav-main-link-dropdown-list`))
            .slideUp(500);
          $(this).siblings(`.fa`).css({'transform': 'rotate(-180deg}'});
          $(this).children(`.header-nav-main-link-dropdown-list`).slideToggle(500);
        }
        // else if($(window).width() < 600) {}
      });
});

//Screensize Menu Fix
$(document).ready(function() {
  $(window).resize(function() {
    if ($(window).width() >= 600) {
    $(`.header-nav-main-link-dropdown-list`).removeAttr("style");
    $(`body`).css({'overflow': 'auto'});
    }
  });
});
