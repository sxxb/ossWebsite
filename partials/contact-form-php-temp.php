<?php
if ($_POST) {
  $contactName = "";
  $contactBusinessName = "";
  $contactAddress = "";
  $contactPhone = "";
  $contactEmail = "";
  $contactHearAbout = "";
  $contactEnquiryType = "";
  $contactQuoteRequest = "";

  $contactName = filter_var($_POST['contactName'], FILTER_SANITIZE_STRING);
  $contactBusinessName = filter_var($_POST['contactBusinessName'], FILTER_SANITIZE_STRING);
  $contactAddress = filter_var($_POST['contactAddress'], FILTER_SANITIZE_STRING);
  $contactPhone = filter_var($_POST['contactPhone'], FILTER_SANITIZE_STRING);
  $contactHearAbout = filter_var($_POST['contactHearAbout'], FILTER_SANITIZE_STRING);
  $contactEnquiryType = filter_var($_POST['contactEnquiryType'], FILTER_SANITIZE_STRING);
  $contactQuoteRequest = filter_var($_POST['contactQuoteRequest'], FILTER_SANITIZE_STRING);

  if(isset($_POST['contactEmail'])) {
      $contactEmail = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['contactEmail']);
      $contactEmail = filter_var($contactEmail, FILTER_VALIDATE_EMAIL);
    }

  $email_from  = 'quoterequest@occsafetyservices.com.au';
  $email_subject = "Quote Request - $contactBusinessName";
  $email_body = "Contact Name: $contactName.\n".
                "Business: $contactBusinessName.\n".
                "Address: $contactAddress.\n".
                "Phone: $contactPhone.\n".
                "Email: $contactEmail.\n".
                "Enquiry Type: $contactEnquiryType.\n".
                "Message: $contactQuoteRequest.\n".
                "This person heard about OSS from: $contactHearAbout.\n";
  $email_to = "graphics@wavecom.com.au";
  $headers = "From: $email_form /r/n";
  $headers = "Reply-To: $contactEmail /r/n";

  $secretKey = "6LcDGGodAAAAAAn1yEZKDMkKn2kUoZZMRTyln0nr";
  $responseKey = $_POST['g-recaptcha-response'];
  $UserIP = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?
  secret=$secretKey&response=$responseKey&remoteIP=$UserIP";

  $response = file_get_contents($url);
  $response = json_decode($response);

  if ($response->success)
  {
    mail($email_to, $email_subject, $email_body, $headers);
    echo "Quote Request Sent Successfully";
  }
  else {
    echo "Oops, please try again";
  }
};

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
