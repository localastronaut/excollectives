<?php

require 'PHPMailerAutoload.php';

if (isset($_POST['firstName'])) {

    /* Field 1 */

    $firstName = $_POST['firstName'];

    /* Field 2 */

    $lastName = $_POST['lastName'];

    /* Field 3 */

    $email = $_POST['email'];

    /* Field 4 */

    $company = $_POST['company'];

    /* Field 5 */

    $phoneNumber = $_POST['phoneNumber'];

    /* Field 6 */

    $message = $_POST['msg'];

    /* Message's Body */

    $body = 'Hi,<br><br>'.
			'We have received a new message: <br><br>'.
			'Name: '.$firstName.' '.$lastName.'<br><br>'.
			'Email: '.$email.'<br><br>';
            if($company != '') {
                $body .= 'Company: '.$company.'<br><br>';
            }
            if($phoneNumber != '') {
                $body .= 'Phone Number: '.$phoneNumber.'<br><br>';
            }
	$body .= 'Message: '.$message.'<br><br>';

    /* Subject */

	$subject_mail = "Important: New Message";

    /* PHPMailer Settings */

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                              // Enable SMTP authentication
    $mail->Username = 'support@excollectives.com';        // SMTP username
    $mail->Password = '*XJj9D7q';                     // SMTP password
    $mail->Port = 25;                                     // TCP port to connect to

    $mail->From = 'support@excollectives.com';
    $mail->FromName = 'ExCollectives';
    $mail->addAddress('support@excollectives.com', 'Support');  // Add a recipient

    $mail->isHTML(true);                                 // Set email format to HTML

    $mail->Subject = $subject_mail;
    $mail->Body    = $body;
	if($mail->Send())
	{
        $success = true;
	}
	echo json_encode(array("success" => $success));
}

?>
