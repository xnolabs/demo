<?php 
header('Content-type: text/html; charset=utf-8');
if(isset($_POST['submit'])){
    $to = "chris@innolabs.tech";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = "Form submission";
    $subject2 = "XNoLabs - Email Subscription Confirmation";
    $message = "Customer Name: " . $name . "\r\n " . "Email: " . $_POST['email'];
    $message2 = "Hi, " . $name . "\r\n\n You have registered email: " . $_POST['email'] . "\r\n" . "We will keep you updated with our upcoming Launch! \r\n\n XNoLabs";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
    echo "Subscription Successful. Thank you " . $name . ", confirmation sent to your email address.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157473832-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-157473832-1');
	</script>

	<title>XNoLabs | Coming Soon</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/styles/util.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/coming-soon.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/red-theme.css">
<!--===============================================================================================-->
</head>
<body class="red-theme">
	<div class="size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
		<span></span>
		<div class="flex-col-c p-t-50 p-b-50">
			<h1 class="l1-txt1 txt-center p-b-10">
				&lt;/xnolabs&gt;
			</h1>

			<p class="txt-center l1-txt2 p-b-60">
				Coming Soon
			</p>

			<div class="flex-w flex-c cd100 p-b-82">
				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt3 p-b-9 days">49</span>
					<span class="s1-txt1">Days</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt3 p-b-9 hours">12</span>
					<span class="s1-txt1">Hours</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt3 p-b-9 minutes">00</span>
					<span class="s1-txt1">Minutes</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt3 p-b-9 seconds">00</span>
					<span class="s1-txt1">Seconds</span>
				</div>
			</div>

			<button class="flex-c-m s1-txt2 size3 how-btn"  data-toggle="modal" data-target="#subscribe">
				Follow us for update now!
			</button>
		</div>

		<span class="s1-txt3 txt-center">
			@ 2019 XNoLabs. Designed by <a style="color: #FFF" href="https://christopher-rees.herokuapp.com" target="_blank">Christopher Rees</a>
		</span>
		
	</div>

	<!-- Modal Form -->
	<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="modal-subscribe where1-parent bg0 bor2 size4 p-t-54 p-b-100 p-l-15 p-r-15">
				<button class="btn-close-modal how-btn2 fs-26 where1 trans-04">
					<i class="zmdi zmdi-close"></i>
				</button>

				<div class="wsize1 m-lr-auto">
					<h3 class="m1-txt1 txt-center p-b-36">
						<span class="bor1 p-b-6">Subscribe</span>
					</h3>

					<p class="m1-txt2 txt-center p-b-40">
						Follow us for updates now!
					</p>

					<form class="contact100-form validate-form" action="" method="post">
						<div class="wrap-input100 m-b-10 validate-input" data-validate = "Name is required">
							<input class="s1-txt4 placeholder0 input100" type="text" name="name" placeholder="Name">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 m-b-20 validate-input" data-validate = "Email is required: ex@abc.xyz">
							<input class="s1-txt4 placeholder0 input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
						</div>

						<div class="w-full">
							<input class="flex-c-m s1-txt2 size5 how-btn1 trans-04 red-theme" type="submit" name="submit" value="Get Updates">
						</div>
					</form>

					<p class="s1-txt5 txt-center wsize2 m-lr-auto p-t-20">
						And don’t worry, we hate spam too! You can unsubcribe at anytime.
					</p>
				</div>
			</div>

		</div>
	</div>

<!--===============================================================================================-->	
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/moment.min.js"></script>
	<script src="assets/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="assets/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			// Set Endtime here
			// Endtime must be > current time
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 49,
			endtimeHours: 12,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York", can be empty
			// go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>
</body>
</html>