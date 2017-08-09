<?php
	$json = file_get_contents('php://input');
	$dbContact = json_decode($json);
	$title = "Eltec - Nous joindre";
	$content = sprintf("Nom : %s\r\nTéléphone: %s\r\nCourriel : %s\r\nMessage : %s\r\n",htmlspecialchars($dbContact->nom), htmlspecialchars($dbContact->phone),htmlspecialchars($dbContact->email),htmlspecialchars($dbContact->message));
	$from = "farrelld@gmail.com";
	$to = "farrelld@gmail.com";
	$headers = sprintf("From: %s\r\nReply-To: %s\r\nX-Mailer: PHP/%s",$from,$from,phpversion());
	if (trim($dbContact->email) !== "" && $dbContact->nom !== "" && $dbContact->phone !== "") mail($to, $title, $content, $headers);	
?>