<!--// todo handle success and errors -->

<?php

if(isset($_POST['submit'])) {
  $email_to = "fish0859@gmail.com"; //email address for receiving email
  $subject = "Quote Form";

  //! Required Vars
  $contactName = $_POST['contactName'];
  // $reply_to = $_POST['email'];
  $phone = $_POST['phone'];
  $companyName = $_POST['companyName'];
  // $anti_spam = $_POST['antiSpam'] == "";
  //! Required Vars

  function died($error) {
    // your error code can go here
    echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and try again.<br /><br />";
    die();
  }

  // validation expected data exists
  if(!isset($contactName) ||
  // !isset($reply_to) ||
  !isset($phone) ||
  !isset($companyName)
  // !isset($anti_spam) || !$anti_spam
    )  {
    died('We are sorry, but there appears to be a problem with the form you submitted. Please check all required fields.');
  }



  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  // $reply_to = clean_string($reply_to);

  $contactName = clean_string($contactName);

  $message = "Website: ";
  $message .= clean_string($companyName)."\n";
  $message .= "contactName: ";
  $message .= clean_string($contactName)."\n";
  $message .= "Phone: ";
  $message .= clean_string($phone)."\n";
  // todo format phone number - also turn into link for iphone


// create email headers

// $headers = 'From: '.$reply_to."\n".
// 'Reply-To: '.$reply_to;
  // $headers = "From: admin@bluesmokemedia.net" . "\r\n" . "Content-Type: text/plain; charset=utf-8",
  //       "-fadmin@bluesmokemedia.net";


  // Define SMTP authentication parameters: 
// $smtp_params['host'] = 'ssl://mi3-ss112.a2hosting.com';
// $smtp_params['port'] = '465';
// $smtp_params['auth'] = true;
// $smtp_params['username'] = 'admin@bluesmokemedia.net';
// $smtp_params['password'] = '2tpuZb~g6Xvd';

//! @mail() suppresses all warnings/errors vs mail()
 mail($email_to, $subject, $message, $params);
// mail($email_to, $subject, $message, "From: admin@bluesmokemedia.net" . "\r\n" . "Content-Type: text/plain; charset=utf-8",
//         "-fadmin@bluesmokemedia.net");
// echo mail
?>


<!-- place your own success html below -->
<html>
<head></head>
<body>
<script type="text/javascript">alert("We have received your request, we will get back to you shortly. Thank You.");
// todo redirect anywhere?
// window.location.href='../html/Contact.html';
</script>
    <h1>audit sent</h1>
</body>
</html>

<?php
}
die();
?>

//todo validate phone number and email -->
