<?php
  $email = $_REQUEST['email'] ;
  $thankyou_page = "thank_you.html";

  mail( "zarinficklin@gmail.com", "Sign me up for the newsletter", "From: $email" );
  header( "Location: $thankyou_page" );
?>