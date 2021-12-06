<?php
  if(isset($_POST['submit]'])
  {
    $contactName = $_POST['name'];
    $contactBusinessName = $_POST['businessName'];
    $contactAddress = $_POST['address'];
    $contactPhone = $_POST['phone'];
    $contactEmail = $_POST['email'];
    $contactHearAbout = $_POST['hearAbout'];
    $contactEnquiryType = $_POST['enquiryType'];
    $contactQuoteRequest = $_POST['quoteRequest'];

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
    $email_to = "";
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
  }
?>
