<!--// todo handle success and errors -->

<?php
if(isset($_POST['submit'])) {
  $email_to = "fish0859@gmail.com"; //email address for receiving email
  $subject = "Order Form";

  //! Required Vars
  $client = $_POST['client'];
  $Telephone = $_POST['Telephone'];
  $Contact = $_POST['Contact'];
  $EMail = $_POST['E-Mail'];
  $Address1 = $_POST['Address1'];
  $Address2 = $_POST['Address2'];
  $City = $_POST['City'];
  $State = $_POST['State'];
  $Zipcode = $_POST['Zipcode'];
  $Other = $_POST['Other'];

  $premadedesign = $_POST['premade-design'];
  $desc = $_POST['desc'];
  $locations = $_POST['locations'];
  $numColors = $_POST['num-colors']; //! here
  $front = $_POST['front'];
  $back = $_POST['back'];
  $Sleeve = $_POST['Sleeve'];
  $sleeveRadio = $_POST['sleeve-radio'];
  $apparelOptions = $_POST['apparel-options'];
  $shirtMaterial = $_POST['shirt-material'];
  $brand = $_POST['brand'];

  $quantityXS = $_POST['quantity-xs'];
  $quantityS = $_POST['quantity-S'];
  $quantityM = $_POST['quantity-M'];
  $quantityL = $_POST['quantity-L'];
  $quantityXL = $_POST['quantity-XL'];
  $quantity2XL = $_POST['quantity-2XL'];
  $quantity3XL = $_POST['quantity-3XL'];
  $quantity4XL = $_POST['quantity-4XL'];
  $colors = $_POST['colors'];


  //! Required Vars

  function died($error) {
    // your error code can go here
    echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and try again.<br /><br />";
    die();
  }

  // validation expected data exists
  if(!isset($client) ||
  // !isset($reply_to) ||
     !isset($Telephone)
  // !isset($companyName)
  // !isset($anti_spam) || !$anti_spam
    )  {
    died('We are sorry, but there appears to be a problem with the form you submitted. Please check all required fields.');
  }



  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }


  $message .= "client: ";
  $message .= clean_string($client)."\n";
  $message .= "Telephone: ";
  $message .= clean_string($Telephone)."\n";
  $message .= "Contact: ";
  $message .= clean_string($Contact)."\n";
  $message .= "E-Mail: ";
  $message .= clean_string($EMail)."\n";
  $message .= "Address1: ";
  $message .= clean_string($Address1)."\n";
  $message .= "Address2: ";
  $message .= clean_string($Address2)."\n";
  $message .= "City: ";
  $message .= clean_string($City)."\n";
  $message .= "State: ";
  $message .= clean_string($State)."\n";
  $message .= "Zipcode: ";
  $message .= clean_string($Zipcode)."\n";
  $message .= "Other: ";
  $message .= clean_string($Other)."\n\n";

  $message .= "premade-design: ";
  $message .= clean_string($premadedesign)."\n";
  $message .= "desc: ";
  $message .= clean_string($desc)."\n";
  $message .= "locations: ";
  $message .= clean_string($locations)."\n";
  $message .= "Number of Colors: ";
  $message .= clean_string($numColors)."\n";
  $message .= "front: ";
  $message .= clean_string($front)."\n";
  $message .= "back: ";
  $message .= clean_string($back)."\n";
  $message .= "Sleeve: ";
  $message .= clean_string($Sleeve)."\n";
  $message .= "sleeve-side: ";
  $message .= clean_string($sleeveRadio)."\n";
  $message .= "apparel-options: ";
  $message .= clean_string($apparelOptions)."\n";
  $message .= "shirt-material: ";
  $message .= clean_string($shirtMaterial)."\n";
  $message .= "brand: ";
  $message .= clean_string($brand)."\n\n";

  $message .= "quantity-xs: ";
  $message .= clean_string($quantityXS)."\n";
  $message .= "quantity-S: ";
  $message .= clean_string($quantityS)."\n";
  $message .= "quantity-M: ";
  $message .= clean_string($quantityM)."\n";
  $message .= "quantity-L: ";
  $message .= clean_string($quantityL)."\n";
  $message .= "quantity-XL: ";
  $message .= clean_string($quantityXL)."\n";
  $message .= "quantity-2XL: ";
  $message .= clean_string($quantity2XL)."\n";
  $message .= "quantity-3XL: ";
  $message .= clean_string($quantity3XL)."\n";
  $message .= "quantity-4XL: ";
  $message .= clean_string($quantity4XL)."\n";
  $message .= "colors: ";
  $message .= clean_string($colors)."\n";
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
<script type="text/javascript">alert("We have received your order form, we will get back to you shortly. Thank You.");
// todo redirect anywhere?
window.location.href='/';
</script>
    <h1>Order Form Sent</h1>
</body>
</html>

<?php
}
die();
?>

//todo validate phone number and email -->
