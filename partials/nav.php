<?php
 echo '
   <div class="header-content">
    <a class="header-content-logo" href="">
      <div class="header-content-logo-img"></div>
      <h1>OSS</h1>
    </a>
    <div class="header-content-other">
      <div class="header-content-search">
        <form action="javascript:void(0);"> <!--This prevents the page from reloading when you hit enter - the search field provides results as a dropdown menu only -->
          <input id="searchField" type="text" placeholder="" autocomplete="off"> </input>
          <i class="fa fa-search"></i>
        </form>
      </div>
      <div class="header-content-contact">
        <h4>Contact Us</h4>
        <h3><a href="tel:1300858859">1300 858 859</a></h3>
      </div>
    </div>
    <div class="header-content-menu-trigger">
      <a id="menuTrigger"><i class="fa fa-bars"></i></a>
    </div>
  </div>
  <nav class="header-nav header-nav-closed">
    <div class="header-nav-mobile-header">
      <div>
        <div class="header-content-logo-img"></div>
        <h1>OSS</h1>
      </div>
      <div>
        <i class="fa fa-times" id="menuExit"></i>
      </div>
    </div>
    <ul class="header-nav-main-links">
      <li><a href="">Home</a></li>
      <li class="header-nav-main-link-dropdown">
        <a class="header-nav-main-link-top-link" href="testingandsafety\">
          <span>Testing & Safety</span>
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="header-nav-main-link-dropdown-list">
            <div>
              <li><a href="testingandsafety\testingandtagging\"><i class="fa fa-fw fa-plug"></i><span>Testing & Tagging</span></a></li>
              <li><a href="testingandsafety\rcdtesting\"><i class="fa fa-fw fa-minus-square"></i><span>RCD Testing</span></a></li>
              <li><a href="testingandsafety\microwavetesting\"><i class="fa fa-fw fa-wifi"></i><span>Microwave Leakage Testing</span></a></li>
              <li><a href="testingandsafety\thermography\"><i class="fa fa-fw fa-thermometer"></i><span>Thermography</span></a></li>
              <li><a href="testingandsafety\lightleveltesting\"><i class="fa fa-fw fa-lightbulb"></i><span>Light Level Testing</span></a></li>
              <li><a href="testingandsafety\emergencyexitlighttesting\"><i class="fa fa-fw fa-exclamation-triangle"></i><span>Emergency & Exit Light Testing</span></a></li>
            </div>
          </ul>
      </li>
      <li class="header-nav-main-link-dropdown">
        <a class="header-nav-main-link-top-link" href="dataandelectrical\">
          <span>Data & Electrical</span>
          <i class="fa fa-caret-down"></i>
        </a>
          <ul class="header-nav-main-link-dropdown-list">
            <div>

              <li><a href="dataandelectrical\electricalcontracting\"><i class="fa fa-fw fa-toolbox"></i><span>Electrical Contracting</span></a></li>
              <li><a href="dataandelectrical\solar\"><i class="fa fa-fw fa-sun"></i><span>Solar Installations</span></a></li>
              <li><a href="dataandelectrical\datacabling\"><i class="fa fa-fw fa-network-wired"></i><span>Data Cabling</span></a></li>

            </div>
          </ul>
      </li>
      <li class="header-nav-main-link-dropdown">
        <a class="header-nav-main-link-top-link" href="otherservices\">
          <span>Other Services</span>
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="header-nav-main-link-dropdown-list">
            <div>
              <li><a href="otherservices\assetmanagement\"><i class="fa fa-fw fa-tasks"></i><span>Asset Management</span></a></li>
              <li><a href="otherservices\security\"><i class="fa fa-fw fa-lock"></i><span>Security Systems</span></a></li>
              <li><a href="otherservices\lighting\"><i class="fa fa-fw fa-lightbulb"></i><span>Lighting</span></a></li>
            </div>
          </ul>
        </li>
      <li><a href="quote\">Get a Quote</a></li>
      <li><a href="contact\">Contact Us</a></li>
    </ul>
    <div class="header-nav-sub-links">
      <a href="faq\">FAQ</a>
      <a href="privacy\">Privacy Policy</a>
      <a href="terms\">Terms & Conditions</a>
    </div>
  </nav>
';
?>
