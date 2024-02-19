<!--// todo handle success and errors -->

<?php
if(isset($_POST['submit'])) {
  $email_to = "fish0859@gmail.com"; //email address for receiving email
  $subject = "Quote Form";

  //! Required Vars
  $companyName = $_POST['companyName'];
  $address = $_POST['address'];
  $contactName = $_POST['contactName'];
  $phone = $_POST['phone'];
  $apparelOptions = $_POST['apparel-options'];
  $shirtMaterial = $_POST['shirt-material'];
  $quantity = $_POST['quantity'];
  $preMadeDesign = $_POST['pre-made-design'];
  $numLocations = $_POST['numLocations'];
  $numColors = $_POST['numColors'];
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

  $message ="companyName: ";
  $message .= clean_string($companyName)."\n";
  $message .="address: ";
  $message .= clean_string($address)."\n";
  $message .="contactName: ";
  $message .= clean_string($contactName)."\n";
  $message .="phone: ";
  $message .= clean_string($phone)."\n";
  $message .="apparelOptions: ";
  $message .= clean_string($apparelOptions)."\n";
  $message .="shirtMaterial: ";
  $message .= clean_string($shirtMaterial)."\n";
  $message .="quantity: ";
  $message .= clean_string($quantity)."\n";
  $message .="preMadeDesign: ";
  $message .= clean_string($preMadeDesign)."\n";
  $message .="numLocations: ";
  $message .= clean_string($numLocations)."\n";
  $message .="numColors: ";
  $message .= clean_string($numColors)."\n";
  // todo format phone number - also turn into link for iphone


//! @mail() suppresses all warnings/errors vs mail()
  mail($email_to, $subject, $message, "From: no-reply@bluesmokemedia.net" . "\r\n" . "Content-Type: text/plain; charset=utf-8",
        "-fno-reply@bluesmokemedia.net");
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
