<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V17</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/register/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/register/css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
        <div class="contact100-more flex-col-c-m" style="background-image: url('<?= base_url() ?>assets/register/images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
                    <span class="contact100-form-title" style="color:white">
                        Terima Kasih Telah Melakukan Bergabung Bersama Kami
                    </span>

					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Jl. Raya Legok Karawaci KM. 06 No.99 Bojong Nangka - TangerangBanten 15810
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
                        (021) 5471215
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
                        kompasiontechnology19@gmail.com
						</span>
					</div>
				</div>
			</div>
            
            <form class="contact100-form validate-form" action="<?= base_url() ?>registrasi/action/registrasi_admin" method="post">
				<span class="contact100-form-title">
					Admin User Registration
				</span>

				<label class="label-input100" for="first-name">Enter your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input">
					<input id="email" class="input100" type="email" name="email" placeholder="Enter Your Email">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number *</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="telp" placeholder="Enter Phone Number">
					<input required type="hidden" name="id" value="<?= $id ?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter Username *</label>
				<div class="wrap-input100">
					<input class="input100" type="text" name="username" placeholder="Enter Your Username">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter Password *</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="password" minlength="8" name="password"  placeholder="Enter Your Password">
					<span class="focus-input100"></span>
				</div>


				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Create Account
					</button>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/register/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/register/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/register/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>assets/register/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/register/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/register/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/register/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/register/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="<?= base_url() ?>assets/register/https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
