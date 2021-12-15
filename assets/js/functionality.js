$(function(){
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
    $(`.header-nav-main-link-top-link`).click(function() {
       if($(window).width() < 600) {
         event.preventDefault();
         $(`.header-nav-main-link-top-link`).siblings(`.header-nav-main-link-dropdown-list`)
         .not($(this).next(`.header-nav-main-link-dropdown-list`))
         .slideUp(500);
         $(this).next(`.header-nav-main-link-dropdown-list`).slideToggle(500);
       }
     });
    $(window).resize(function() {
       if ($(window).width() >= 600) {
       $(`.header-nav-main-link-dropdown-list`).removeAttr("style");
       $(`body`).css({'overflow': 'auto'});
       }
     });

// use Jquery Autocomplete for search functionality

  });
