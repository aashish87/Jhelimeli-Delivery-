<!DOCTYPE html>

<html>

  <head>

    <title>Online Delivery Form</title>

  </head>

  <body>

    <h1>Online Delivery Form</h1>

    <form action="delivery.php" method="POST">

      <label for="name">Name:</label>

      <input type="text" id="name" name="name" required><br><br>

      <label for="email">Email:</label>

      <input type="email" id="email" name="email" required><br><br>

      <label for="phone">Phone:</label>

      <input type="tel" id="phone" name="phone" required><br><br>

      <label for="address">Address:</label>

      <textarea id="address" name="address" required></textarea><br><br>

      <label for="delivery">Delivery Instructions:</label>

      <textarea id="delivery" name="delivery"></textarea><br><br>

      <input type="submit" value="Submit">

    </form>

  </body>

</html>

<?php

  // Set your email address and WhatsApp number

  $to_email = "jhelimeliservice@gmail.com";

  $whatsapp_number = "whatsapp:+9779863420952";

  

  // Collect user details from the form

  $name = $_POST['name'];

  $email = $_POST['email'];

  $phone = $_POST['phone'];

  $address = $_POST['address'];

  $delivery = $_POST['delivery'];

  

  // Format the email message

  $subject = "New delivery order from $name";

  $message = "Name: $name\nEmail: $email\nPhone: $phone\nAddress: $address\nDelivery Instructions: $delivery";

  $headers = "From: $email";

  

  // Send email notification

  mail($to_email, $subject, $message, $headers);

  

  // Send WhatsApp notification using Twilio API

  require_once '/path/to/twilio-php/autoload.php';

  $sid = 'YOUR_TWILIO_ACCOUNT_SID';

  $token = 'YOUR_TWILIO_AUTH_TOKEN';

  $client = new Twilio\Rest\Client($sid, $token);

  $message = $client->messages->create(

      $whatsapp_number,

      array(

          'from' => 'whatsapp:+9779863420952',

          'body' => "New delivery order from $name:\n\nName: $name\nEmail: $email\nPhone: $phone\nAddress: $address\nDelivery Instructions: $delivery"

      )

  );

  

  // Redirect user to thank you page

  header("Location: thank-you.html");

?>

