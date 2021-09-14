<!DOCTYPE html>
<html>
<head>
	<title>Send mail from PHP using SMTP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="container">
<h1 class="text-center">Send Bulk Email</h1>

<hr>
	<?php 
		if(isset($_POST['sendmail'])) {
			require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;

			 $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'mail.sixteen07.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Winner');
			$mail->addAddress($_POST['email']);     // Add a recipient
			//$mail->addAddress($_POST['email2']);     // Add a recipient
			$mail->addReplyTo($_POST['replyemail']);
			//$mail->addBCC(implode(",",$_POST['bccemail']));
            $mail->addBCC($_POST['bccemail']);
			$mail->addBCC($_POST['bccemail2']);
			 
			$mail->addReplyTo(EMAIL);
			// print_r($_FILES['file']); exit;
			for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			}
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $_POST['subject'];
			$mail->Body    = $_POST['message'];
			$mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			   // echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	 ?>
	<div class="row" style="margin-left:20%">
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
        	<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">To Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" maxlength="50" style="width:70%">
                </div>
            </div> <br>
			
			<!--<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">To Email2:</label>
                    <input type="email" class="form-control" id="email" name="email2" placeholder="Enter your email" maxlength="50">
                </div>
            </div> -->
			
		  <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">Reply-To:</label>
                    <input type="email" class="form-control" id="email" name="replyemail" placeholder="Enter your email" maxlength="50" style="width:70%">
                </div>
            </div> <br>
			
			  <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">BCC Email:</label>
                    <input type="text" class="form-control" id="email" name="bccemail" placeholder="Enter your email" maxlength="50" style="width:70%">
                </div>
            </div> <br>
			<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">BCC Email:</label>
                    <input type="text" class="form-control" id="email" name="bccemail2" placeholder="Enter your email" maxlength="50" style="width:70%">
                </div>
            </div> <br>

            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject"  placeholder="Your message subject" maxlength="50" style="width:70%">
                </div>
            </div> <br>
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">Message:</label>
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your message here" maxlength="6000" rows="20" style="width:70%"></textarea>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">File:</label>
                    <input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
                </div>
            </div> <br>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendmail" class="btn btn-lg btn-success btn-block">Send</button>
                </div>
            </div>
        </form>
	</div>
</div>
</body>
</html>
