<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * @author Benno der große
 */
class email
{
	/**
	 * @param string $subject
	 * @param string $message
	 * @param string $to_address
	 * @param string $to_name optional
	 */
	public static function send(
		string $subject,
		string $message,
		string $to_address,
		string $to_name = ''
	): bool {

		$mail = new PHPMailer;

		$mail->SMTPDebug = 0;		
		//if(CONF['MAIL'] == 0){

		$mail->SMTPSecure = 'tls';						// Enatble TLS encryption, `ssl` also accepted
		$mail->Port = 25;								// TCP port to connect to
		$mail->Host = 'mail.gmx.com';		// Specify main and backup SMTP servers
		//}					// Enable verbose debug output

		$mail->isSMTP();								// Set mailer to use SMTP
		$mail->CharSet = "UTF-8";						// Set mail charset to UTF8
		$mail->SMTPAuth = true;							// Enable SMTP authentication
		$mail->Username = CONF['MAIL_ADDRESS'];			// SMTP username
		$mail->Password = CONF['MAIL_PASSWORD'];		// SMTP password
		

		$mail->setFrom(CONF['MAIL_ADDRESS'], CONF['MAIL_NAME']);

		if ($to_name == '') {
			$mail->addAddress($to_address);				// Add a recipient
		} else {
			$mail->addAddress($to_address, $to_name);	// Add a recipient
		}

		$mail->isHTML(true);							// Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body = $message;

		return $mail->send();
	}
}
