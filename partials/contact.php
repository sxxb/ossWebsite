<?php
 echo '
<div class="quote-title">
  <h2>Get a Quote</h2>
</div>
<div class="quote-form">
  <form id="contactForm" action="" method="POST">
    <div>
      <fieldset>
        <input type="text" id="quoteFormName" placeholder="Name" name="name" required>
        <input type="text" id="quoteFormBusinessName" placeholder="Business Name" name="businessName" required>
        <input type="text" id="quoteFormAddress" placeholder="Address" name="address" required>
        <input type="tel"  id="quoteFormPhone"placeholder="Phone" name="phone" required>
        <input type="email"  id="quoteFormEmail" placeholder="Email" name="email" required>
      </fieldset>
      <fieldset>
        <select id="quoteFormHearAbout" name="hearAbout" required>
          <option value="" class="option-placeholder" disabled selected>How did you hear about OSS?</option>
          <option value="Business Contact">Business Contact</option>
          <option value="Google Search">Google Search</option>
          <option value="Google Ads">Google Ads</option>
          <option value="Other Search Engine">Other Search Engine</option>
          <option value="Family/Friends">Family/Friends</option>
          <option value="Exisiting Customer">Exisiting Customer</option>
          <option value="Promotion">Promotion</option>
          <option value="Social Network">Social Network</option>
          <option value="Facebook Ad">Facebook Ad</option>
          <option value="Trade Show">Trade Show</option>
          <option value="Brochure">Brochure</option>
          <option value="Others">Others</option>
        </select>
        <select id="quoteFormEnquiryType" name="enquiryType" required>
          <option value="" class="option-placeholder" disabled selected>Service Required</option>
          <option value="Service Visit">Service Visit</option>
          <option value="Appliance Testing">Appliance Testing</option>
          <option value="RCD Testing">RCD Testing</option>
          <option value="Emergency Exit/Light Testing">Emergency Exit/Light Testing</option>
          <option value="Thermography">Thermography</option>
          <option value="LED Lighting">LED Lighting</option>
          <option value="Electrical Maintenance">Electrical Maintenance</option>
          <option value="Solar Panel Installations">Solar Panel Installations</option>
          <option value="Others">Others</option>
        </select>
        <textarea id="quoteFormQuoteRequest" name="quoteRequest" rows="5" placeholder="Quote Request Description"></textarea>
        <!-- <span class="captcha-container">
          <span class="captcha">A1B2C3</span>
          <input type="text" placeholder="Captcha" name="">
        </span> -->
      </fieldset>
    </div>
    <div>
      <input
        type="submit"
        value="Request Quote"
        class="g-recaptcha"
        data-sitekey="6LcDGGodAAAAAPh66Ioy4kdhL1iDDf_iXAE1GZpP"
        data-callback="onSubmit"
        data-action="submit"
        >
    </div>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>function onSubmit(token) {document.getElementById("contactForm").submit();}</script>

    
  </form>
'
?>