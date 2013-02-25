<?php
/**
 * Ajax
 *
 * Main functions for the ajax manage.
 *
 * @author Hana
 */

add_action('wp_ajax_hana_send_email', 'hana_send_email');

function hana_send_email(){
	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['question'])){
		$todayis = date("l, F j, Y, g:i a") ;
	
		$name=$_POST["name"];
		$subject = "A message from ".$name;
		$notes = stripcslashes($_POST["question"]);
		$message = " $todayis [EST] \r\n
		Question: $notes \r\n
		";
		
		$from = "From: ".$_POST["email"];
		
		$emailToSend=hana_get_opt('_email');
		$res=wp_mail($emailToSend, $subject, $message, $from);
   		$res=$res?'1':'0';
		echo($res);
	}
	die(0);
}