<?php 
	//mail('pawarsunil888@gmail.com','Testing','this is just to check localhost email','From: sunil-b489f0@inbox.mailtrap.io');
	$emailTo = "sunilpawar.engg@gmail.com";
	$subject = "Testing";
	$body = "Lets check its working or not using better variable way";
	$headers = "From:sunil-b489f0@inbox.mailtrap.io";
	if(mail($emailTo, $subject, $body, $headers)){
		echo "Mail sent successfully!";
	}else{
		echo "Mail not Sent";
	}
?>