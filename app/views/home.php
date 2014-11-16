<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>BrewCrate</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/stylesheet.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='/js/semantic.min.js'></script>
	<?php //Assets::output()  ?>  
</head>
<body class="<? if(isset($body_classes)) echo $body_classes ?>">

	<? //if(isset($admin_navigation)) echo $admin_navigation ?>
	<? //if(isset($message)) echo $message ?>
	<? //if(isset($page_settings)) echo $page_settings ?>
<header class='blue_bg'>
	<div class='max_wrapper'>
		<div id='logo_container' class='float_left'>
			<h2 class='proxima text_white'><a href='/' class='text_white'>BrewCrate</a></h2>
		</div>
		<div id='registration' class='float_right' >
			<a href='/beerprofile' class='text_white'>Beer Profile</a>
			<a href='/signup' class='text_white'>Sign Up</a>
			<a href='/signin' class='text_white'>Login</a>
		</div>
	</div>
</header>
	<div id="page-content">
		<div class="home">
	<div id="hero">
		<img src="/images/beers.png">
	</div>
	
	<div class="slogan">
		<div>
			<h2 class="text_white">BrewCrate brings your next favorite beer to you</h2>
		</div>
	</div>
	<section class="buffer"></section>

	<section>
		<div class="max_wrapper">

			<div>
				<h2 class="text_brown text_center">What We Do</h2>
				<br>
				<p class="text_brown text_center">BrewCrate is a beer membership service that caters to your craft beer preferences.  Every month you will receive a package containing beers that based off your beer profile. Through our service we hope you discover great new beers and support craft breweries!</p>
			</div>
			
		</div>

	</section>
	<section class="buffer"></section>
	<section>
		<div>
			<img src="/images/bottles.jpg">
		</div>
	</section>
	<section>
		<div class="max_wrapper">
			<div>
				<h2 class="text_brown text_center">How We Do it</h2>
				<p>Andouille short loin ham hock shoulder tongue cow. Jowl pork drumstick pork belly landjaeger ribeye. Short ribs beef ribs cupim, flank leberkas tail cow bacon strip steak. Short loin jerky pork spare ribs kielbasa jowl shoulder andouille ball tip filet mignon.</p>
				<br>
				<div id="how" class="wrapper ">
					<div class="wrapper ui grid three column">
						<div class="column">
							<h2 class="text_center"><i class="fa fa-beer text_brown "></i></h2>
							<h2 class="text_brown text_center">Item1</h2>
							<p> ribs beef ribs cupim, flank leberkas tail cow bacon strip steak. Short loin jerky pork spare ribs kielbasa jowl shoulder andouille ball tip filet mignon.</p>
						</div>
						<div class="column">
							<h2 class="text_center"><i class="fa fa-heart text_brown "></i></h2>
							<h2 class="text_brown text_center">Item2</h2>
							<p> ribs beef ribs cupim, flank leberkas tail cow bacon strip steak. Short loin jerky pork spare ribs kielbasa jowl shoulder andouille ball tip filet mignon.</p>
						</div>
						<div class="column">
							<h2 class="text_center"><i class="fa fa-bullseye text_brown"></i></h2>
							<h2 class="text_brown text_center">Item3</h2>
							<p> ribs beef ribs cupim, flank leberkas tail cow bacon strip steak. Short loin jerky pork spare ribs kielbasa jowl shoulder andouille ball tip filet mignon.</p>
						</div>

					</div>


				</div>


			</div>

		</div>


	</section>
	<section class="buffer"></section>
	<footer>
		<section class="red_bg">
		<div class="max_wrapper">
			<div class="wrapper">
				<div class='ui three column grid'>
					<div class="sitemap column margin_zero">
						<ul>
							<li><a href="/signup">Sign Up</a></li>
							<li><a href="/privacy">Privacy Policy</a></li>
							<li><a href="/terms">Terms of Service</a></li>
						</ul>
					</div>
					<div id="newsletter" class='column margin_zero'>
						<form class="ui form newsletter" method="post" style='padding-top:1.25em' action='/newsletter'>
							<input type="hidden" name='honeypot'>
							<input type="text" name='email' placeholder='Your Email'>
							<input type='submit' value="Submit">
						</form>

					</div>
					<div class='column contact_us margin_zero'>
						<div class="text_right">
							<p class="text_white">Reach out to us! </p>
							<ul class="">
								<li class="inline_block"><i class='fa fa-facebook text_white'></i></li>
								<li class="inline_block"><i class='fa fa-twitter text_white'></i></li>
								<li class="inline_block"><i class='fa fa-instagram text_white'></i></li>

							</ul>

						</div>
						

					</div>
					

				</div>
			</div>
			<div>
				<p class='text_white text_center'>&#169;BrewCraft</p>
			</div>

		</div>

	</section>

	</footer>
</div>






	</div>
	
	

	
</div>
</body>
</html> 