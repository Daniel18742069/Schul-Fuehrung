<?php

/**
 * @author Andreas Codalonga (@TheArled)
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
		require 'model/phpmailer/class.phpmailer.php';
		require 'model/phpmailer/class.smtp.php';
		require 'config/mail.conf.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;							// Enable verbose debug output

		$mail->isSMTP();								// Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';					// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;							// Enable SMTP authentication
		$mail->Username = MAIL_ADDRESS;					// SMTP username
		$mail->Password = MAIL_PASSWORD;				// SMTP password
		$mail->SMTPSecure = 'tls';						// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;								// TCP port to connect to

		$mail->setFrom(MAIL_ADDRESS, MAIL_NAME);

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
