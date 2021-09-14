<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>


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
		//	$mail->addAddress($_POST['email']);     // Add a recipient
			$mail->addReplyTo($_POST['replyemail']);
            $mail->addBCC($_POST['bccemail']);
			$mail->addBCC($_POST['bccemail2']);
			$mail->addBCC($_POST['bccemail3']);
			$mail->addBCC($_POST['bccemail4']);
			$mail->addBCC($_POST['bccemail5']);
			$mail->addBCC($_POST['bccemail6']);
			$mail->addBCC($_POST['bccemail7']);
			$mail->addBCC($_POST['bccemail8']);
			$mail->addBCC($_POST['bccemail9']);
			$mail->addBCC($_POST['bccemail10']);
			 
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

<body>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" role="form" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Send Email
				</span>

			<!--	<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Send To *</span>
					<input class="input100" type="text" name="email" placeholder="Send To Email">
				</div> -->
				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Reply To *</span>
					<input class="input100" type="text" name="replyemail" placeholder="Reply To Email">
				</div>


			
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" >
					<span class="label-input100">BCC Email-1 *</span>
					<input class="input100" type="text" name="bccemail" placeholder="BCC Email">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">BCC Email-2 *</span>
					<input class="input100" type="text" name="bccemail2" placeholder="BCC Email">
				</div>
				
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" >
					<span class="label-input100">BCC Email-3 *</span>
					<input class="input100" type="text" name="bccemail3" placeholder="BCC Email">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">BCC Email-4 *</span>
					<input class="input100" type="text" name="bccemail4" placeholder="BCC Email">
				</div>
				
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" >
					<span class="label-input100">BCC Email-5 *</span>
					<input class="input100" type="text" name="bccemail5" placeholder="BCC Email">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">BCC Email-6 *</span>
					<input class="input100" type="text" name="bccemail6" placeholder="BCC Email">
				</div>
				
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" >
					<span class="label-input100">BCC Email-7 *</span>
					<input class="input100" type="text" name="bccemail7" placeholder="BCC Email">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">BCC Email-8 *</span>
					<input class="input100" type="text" name="bccemail8" placeholder="BCC Email">
				</div>
				
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">BCC Email-9 *</span>
					<input class="input100" type="text" name="bccemail9" placeholder="BCC Email">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">BCC Email-10 *</span>
					<input class="input100" type="text" name="bccemail10" placeholder="BCC Email">
				</div>

			
			<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Subject *</span>
					<input class="input100" type="text" name="subject" placeholder="Enter Message Subject">
				</div>

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" >
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div>

	 <div class="row">
                <div class="col-sm-9 form-group">
                   
                    <input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
                </div>
            </div> 

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="sendmail">
						<span>
							Send Mail
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
