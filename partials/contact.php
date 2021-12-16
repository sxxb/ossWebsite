<?php
echo '
<div class="quote-title">
 <h2>Get a Quote</h2>
</div>
<div class="quote-form">
 <form id="contactForm" action="" method="POST">
   <div>
     <fieldset>
       <input type="text" id="quoteFormName" placeholder="Name" name="contactName" required>
       <input type="text" id="quoteFormBusinessName" placeholder="Business Name" name="contactBusinessName" required>
       <input type="text" id="quoteFormAddress" placeholder="Address" name="contactAddress" required>
       <input type="tel"  id="quoteFormPhone" placeholder="Phone" name="contactPhone" required>
       <input type="email"  id="quoteFormEmail" placeholder="Email" name="contactEmail" required>
     </fieldset>
     <fieldset>
       <select id="quoteFormHearAbout" name="contactHearAbout" required>
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
       <select id="quoteFormEnquiryType" name="contactEnquiryType" required>
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
       <textarea id="quoteFormQuoteRequest" name="contactQuoteRequest" rows="5" placeholder="Quote Request Description"></textarea>
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




 </form>
';


if ($_POST) {
  $contactDate = "";
  $contactName = "";
  $contactBusinessName = "";
  $contactAddress = "";
  $contactPhone = "";
  $contactEmail = "";
  $contactHearAbout = "";
  $contactEnquiryType = "";
  $contactQuoteRequest = "";

  date_default_timezone_set("Australia/Adelaide");
  $contactDate = date("h:i A, d/m/Y");

  if(isset($_POST['contactName'])) {
    $contactName = filter_var($_POST['contactName'], FILTER_SANITIZE_STRING);
  }
  if(isset($_POST['contactBusinessName'])) {
    $contactBusinessName = filter_var($_POST['contactBusinessName'], FILTER_SANITIZE_STRING);
  }
  if(isset($_POST['contactAddress'])) {
    $contactAddress = filter_var($_POST['contactAddress'], FILTER_SANITIZE_STRING);
  }
  if(isset($_POST['contactPhone'])) {
    $contactPhone = filter_var($_POST['contactPhone'], FILTER_SANITIZE_STRING);
  }
  if(isset($_POST['contactHearAbout'])) {
    $contactHearAbout = filter_var($_POST['contactHearAbout'], FILTER_SANITIZE_STRING);
  }
  if(isset($_POST['contactEnquiryType'])) {
    $contactEnquiryType = filter_var($_POST['contactEnquiryType'], FILTER_SANITIZE_STRING);
  }
  if(isset($_POST['contactQuoteRequest'])) {
    $contactQuoteRequest = htmlspecialchars($_POST['contactQuoteRequest']);
  }
  if(isset($_POST['contactEmail'])) {
      $contactEmail = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['contactEmail']);
      $contactEmail = filter_var($contactEmail, FILTER_VALIDATE_EMAIL);
    }

  $email_from  = 'quoterequest@occsafetyservices.com.au';
  $email_subject = "Quote Request - $contactBusinessName";
  $email_body = "<div><em style='font-size:0.8em'>Quote requested at $contactDate</em></div>\n".
                "<div><strong>Contact Name:</strong> $contactName </div>\n".
                "<div><strong>Business:</strong> $contactBusinessName </div>\n".
                "<div><strong>Address:</strong> $contactAddress </div>\n".
                "<div><strong>Phone:</strong> $contactPhone </div>\n".
                "<div><strong>Email:</strong> $contactEmail </div>\n".
                "<br/>\n".
                "<div><strong>Enquiry Type:</strong> $contactEnquiryType </div>\n".
                "<div><strong>Message:</strong> </div>\n".
                "<div>$contactQuoteRequest </div>\n".
                "<br/>\n".
                "<div><strong>This person heard about OSS from:</strong> $contactHearAbout </div>\n";
  $email_to = "graphics@wavecom.com.au";

  $headers  = 'MIME-Version: 1.0' . "\r\n".
              'Content-type: text/html; charset=utf-8' . "\r\n".
              'From: ' . $email_from . "\r\n" .
              'Reply-To: ' . $contactEmail;

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
    echo "
      <div class='quote-form-notice quote-form-notice-good'>
        Quote Request Sent Successfully
      </div>
      ";
  }
  else {
    echo "
     <div class='quote-form-notice quote-form-notice-bad'>
       Oops, something went wrong - please try again;
      </div>
      ";
  }
};


?>
