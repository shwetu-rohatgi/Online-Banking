<?php
$email = "mymail@gmail.com";
$to = "shwetanshu.rohatgi@gmail.com";
$subject = "Hi PHP mailer!";
$body = "Hi,How are you ? I am php mailer";
$headers = 'From: ' .$email . "\r\n".'Reply-To: ' . $email. "\r\n".'X-Mailer: PHP/' . phpversion();
if (mail($to, $subject, $body, $headers)) echo("<p>Email successfully sent</p>");
else echo("<p>Email delivery failed</p>");
?>
<html>

<body>
	<h1>Wellcome to php mailer</h1>
</body>

</html>