<?php
$to = "care.cookiestudio@gmail.com";
 	$headers = "MIME-Version: 1.0\n" ;
	$headers .= "From: webmaster@example.com" . "\r\n";
        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
        $headers .= "X-Priority: 1 (Highest)\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";

	$subject = "My subject";
	$txt = "Hello world!";


	mail($to,$subject,$txt,$headers);
?>