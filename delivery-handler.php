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

  $sid = 'ACc6852fb86476a466b861ef735190ec7c';

  $token = 'd4509c76bbbd129173bd38ebbe05b9ad';

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
