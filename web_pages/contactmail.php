	<?php 
	if(isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$to = "";
		$header = "Email from the Website by ". $email;
		//$txt = "You have received an email from ".$firstname." ".$lastname.".\n\n".$message;

		if(mail($email, $to, $subject, $header)){
			/*PHPMailer Gmail PHPS*/

			/**
			 * This example shows settings to use when sending via Google's Gmail servers.
			 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
			 */

			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that
			date_default_timezone_set('Etc/UTC');

			require './phpMailer/PHPMailerAutoload.php';

			//Create a new PHPMailer instance
			$mail = new PHPMailer;

			//Tell PHPMailer to use SMTP
			$mail->isSMTP();

			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;

			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';

			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			// use
			// $mail->Host = gethostbyname('smtp.gmail.com');
			// if your network does not support SMTP over IPv6

			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 465;

			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'ssl';

			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;

			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "";

			//Password to use for SMTP authentication
			$mail->Password = "";

			//Set who the message is to be sent from
			$mail->setFrom($email, $firstname, $lastname);

			//Set an alternative reply-to address
			$mail->addReplyTo('no-replyto@xyz.com', 'First Last');

			//Set who the message is to be sent to
			$mail->addAddress('', 'NSBESP Senior');

			//Set the subject line
			$mail->Subject = $subject;

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML('<!DOCTYPE html><html><body>'.$message.'</body></html>');

			//Replace the plain text body with one created manually
			$mail->AltBody = $subject;

			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');

			//send the message, check for errors
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			    //Section 2: IMAP
			    //Uncomment these to save your message in the 'Sent Mail' folder.
			    #if (save_mail($mail)) {
			    #    echo "Message saved!";
			    #}
			}

			//Section 2: IMAP
			//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
			//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
			//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
			//be useful if you are trying to get this working on a non-Gmail IMAP server.



			/*End of the PHPMailer Gmail PHPS*/
			/* To test the database side for the contact form sent*/
			echo "Successfully sent";
			header("Location: nsbe_contact.php?mailsend");

		}else {
			echo "There's a failure!";
		}

	function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}



	}
	?>