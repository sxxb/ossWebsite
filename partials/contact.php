<?php
date_default_timezone_set("Australia/Adelaide");

$contactName = "";
$contactBusinessName = "";
$contactAddress = "";
$contactPhone = "";
$contactEmail = "";
$contactHearAbout = "";
$contactEnquiryType = "";
$contactQuoteRequest = "";

$contactNameError = $contactBusinessNameError = $contactAddressError = $contactPhoneError = $contactEmailError = $contactQuoteRequestError = $contactHearAboutError = $contactEnquiryTypeError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $secretKey = "6LcDGGodAAAAAAn1yEZKDMkKn2kUoZZMRTyln0nr";
  $responseKey = $_POST['g-recaptcha-response'];
  $UserIP = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$responseKey."&remoteIP=".$UserIP;
  $response = file_get_contents($url);
  $response = json_decode($response);

  if ($response->success) {

  $contactDate = date("h:i A, d/m/Y");

  $contactName = $_POST["contactName"];
  $contactBusinessName = $_POST["contactBusinessName"];
  $contactAddress = $_POST["contactAddress"];
  $contactPhone = $_POST["contactPhone"];
  $contactHearAbout = $_POST["contactHearAbout"];
  $contactEnquiryType = $_POST["contactEnquiryType"];
  $contactQuoteRequest = $_POST["contactQuoteRequest"];

  $contactEmail = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['contactEmail']);

  function parse_input($data) {
    if (!empty($data)) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = filter_var($data, FILTER_SANITIZE_STRING);
      $data = htmlspecialchars($data);
      return $data;
    }
    else {
      $data = FALSE;
      return $data;
    }
  }

  function parse_select($data) {
    if (isset($data)) {
      $data = filter_var($data, FILTER_SANITIZE_STRING);
      $data = htmlspecialchars($data);
      return $data;
    }
  }

  if (empty($contactName)) {
    $contactNameError = "Required";};
  if (empty($contactBusinessName)) {
      $contactBusinessNameError = "Required";};
  if (empty($contactAddress)) {
      $contactAddressError = "Required";};
  if (empty($contactPhone)) {
      $contactPhoneError = "Required";};
  if (!isset($contactHearAbout)) {
      $contactHearAboutError = "Required";};
  if (!isset($contactEnquiryType)) {
      $contactEnquiryTypeError = "Required";};
  if (empty($contactQuoteRequest)) {
      $contactQuoteRequestError = "Required";};
  if (empty($contactEmail)) {
      $contactEmailError = "Required";};
  if (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
      $contactEmailError = "Invalid Email Format";};

  if (!empty($contactBusinessName) and !empty($contactAddress) and !empty($contactPhone) and isset($contactHearAbout) and isset($contactEnquiryType) and !empty($contactQuoteRequest) and !empty($contactEmail) and filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
    $contactName = parse_input($_POST["contactName"]);
    $contactBusinessName = parse_input($_POST["contactBusinessName"]);
    $contactAddress = parse_input($_POST["contactAddress"]);
    $contactPhone = parse_input($_POST["contactPhone"]);
    $contactHearAbout = parse_select($_POST["contactHearAbout"]);
    $contactEnquiryType = parse_select($_POST["contactEnquiryType"]);
    $contactQuoteRequest = parse_input($_POST["contactQuoteRequest"]);
    $contactEmail = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['contactEmail']);

    $email_from  = 'quoterequest@occsafetyservices.com.au';
    $email_subject = "Quote Request - $contactBusinessName";
    $email_body = "<div><em style='font-size:0.8em'>Quote requested at $contactDate</em></div>\n".
                  "<div><strong>Contact Name:</strong> $contactName </div>\n".
                  "<div><strong>Business:</strong> $contactBusinessName </div>\n";
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
    //TODO
    $headers  = 'MIME-Version: 1.0' . "\r\n".
                'Content-type: text/html; charset=utf-8' . "\r\n".
                'From: ' . $email_from . "\r\n" .
                'Reply-To: ' . $contactEmail;


    {
      // mail($email_to, $email_subject, $email_body, $headers); // TODO:
      echo "$email_to, $email_subject, $email_body, $headers"; // TODO
      echo "
        <div class='quote-form-notice quote-form-notice-good'>
          Quote Request Sent Successfully
        </div>
        ";
    }
  }
  else {
    echo "
     <div class='quote-form-notice quote-form-notice-bad'>
       Oops, you forgot something - please try again
      </div>
      ";
  }
}
else {
  echo "
   <div class='quote-form-notice quote-form-notice-bad'>
     Oops, something went wrong - please try again
    </div>
    ";
}

};


?>

<div class="quote-title">
 <h2>Get a Quote - 2</h2>
</div>
<div class="quote-form">
 <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
   <div>
     <fieldset>
       <input type="text" id="quoteFormName" placeholder="Name" aria-label="Name" name="contactName" required></input><span class="error"><?php echo $contactNameError;?></span>
       <input type="text" id="quoteFormBusinessName" placeholder="Business Name" aria-label="Business Name" name="contactBusinessName"><span class="error"><?php echo $contactBusinessNameError;?></span>
       <input type="text" id="quoteFormAddress" placeholder="Address" aria-label="Address" name="contactAddress" required><span class="error"><?php echo $contactAddressError;?></span>
       <input type="tel"  id="quoteFormPhone" placeholder="Phone" aria-label="Phone" name="contactPhone" required><span class="error"><?php echo $contactPhoneError;?></span>
       <input type="email"  id="quoteFormEmail" placeholder="Email" aria-label="Email" name="contactEmail" required><span class="error"><?php echo $contactEmailError;?>
     </fieldset></span>
     <fieldset>
       <select id="quoteFormHearAbout" aria-label="How did you hear about OSS?" name="contactHearAbout" required><span class="error"><?php echo $contactHearAboutError;?></span>
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
       <select id="quoteFormEnquiryType" aria-label="What type of service do you require?" name="contactEnquiryType" required><span class="error"><?php echo $contactEnquiryTypeError;?></span>
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
       <textarea id="quoteFormQuoteRequest" aria-label="What is this quote request regarding?" name="contactQuoteRequest" rows="5" placeholder="Quote Request Description"></textarea><span class="error"><?php echo $contactQuoteRequestError;?>
     </fieldset>
   </div>
   <div>
     <input
       type="submit"
       value="Request Quote"
       aria-label="Submit"
       class="g-recaptcha"
       data-sitekey="6LcDGGodAAAAAPh66Ioy4kdhL1iDDf_iXAE1GZpP"
       data-callback="onSubmit"
       data-action="submit"
       >
   </div>
 </form>
