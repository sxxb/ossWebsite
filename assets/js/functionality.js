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
    $('#searchField').autocomplete({
      minLength: 1,
      autoFocus: true,
      source: [
        {
        label: "Appliance Testing and Tagging",
        href: "testingandsafety/testingandtagging/"
        },
        {
        label: "RCD Testing",
        href: "testingandsafety/rcdtesting/"
        },
        {
        label: "Microwave Testing",
        href: "testingandsafety/microwavetesting/"
        },
        {
        label: "Thermography",
        href: "testingandsafety/thermography/"
        },
        {
        label: "Light Level Testing",
        href: "testingandsafety/lightleveltesting/"
        },
        {
        label: "Emergency Exit Light Testing",
        href: "testingandsafety/emergencyexitlighttesting/"
        },
        {
        label: "Electrical Contracting",
        href: "electricalcontracting/electricalcontracting/"
        },
        {
        label: "Solar Installations",
        href: "electricalcontracting/solar/"
        },
        {
        label: "Data Cabling",
        href: "electricalcontracting/datacabling/"
        },
        {
        label: "Asset Management",
        href: "otherservices/assetmanagement/"
        },
        {
        label: "Security Systems",
        href: "otherservices/security/"
        },
        {
        label: "Lighting Installations",
        href: "otherservices/lighting/"
        },
        {
        label: "Get a Quote",
        href: "quote/"
        },
        {
        label: "Contact Us",
        href: "contact/"
        },
        {
        label: "Frequently Asked Questions",
        href: "faq/"
        },
        {
        label: "Privacy Policy",
        href: "privacy/"
        },
        {
        label: "Terms and Conditions",
        href: "terms/"
        }
      ],
      select: function( event, ui ) {
        window.location.href = "https://localhost/ossWebsite/" + ui.item.href;
      },
    }).autocomplete("instance")._renderItem = function( ul, item ) {
      var item = $('<div><a href="' + item.href + '">' + item.label + '</a></div>');
            return $( "<li>" )
            .append( item )
            .appendTo( ul );
          };;
});
