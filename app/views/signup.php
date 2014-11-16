<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>Sign Up | BrewCrate</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/stylesheet.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='/js/semantic.min.js'></script>
	<?php //Assets::output() ?>
</head>
<body class="<? if(isset($body_classes)) echo $body_classes ?>">

	<? if(isset($admin_navigation)) echo $admin_navigation ?>
	<? if(isset($message)) echo $message ?>
	<? if(isset($page_settings)) echo $page_settings ?>
 

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
<div id="signup">
	<div class="max_wrapper">
		<div class="response">
			<?php 

				$response = Session::get('response');
				
				if (!is_null($response)) {
					echo "<div class='ui green message'>" . $response . "</div>";
					Session::forget('response');
				}


			 ?>

		</div>
		<div class="wrapper">
			<h3 class="text_brown">Call out</h3>
			<p class="text_brown">Bacon ipsum dolor amet cupim bresaola picanha capicola. Tail shank landjaeger, flank cow turkey pig pastrami cupim brisket tongue meatball. Tongue sirloin pork chop</p>

		</div>
		<div class="wrapper">
			<h1>hello</h1>
			<form class="ui form " method="post" action="/create">
				<input type="hidden" name='honeypot'>
				<input required type="text" name="first_name" placeholder="First Name: *">
				<br><br>
				<input required type="text" name="last_name" placeholder="Last Name: *">
				<br><br>
				<input require type="text" name="email" placeholder="Email: *">
				<br><br>
				<input require type="password" name="password" placeholder="Password: *">
				<br><br>
				<label for="age">Are you 21 years or older?</label>
				<input type="checkbox" name="age">
				<br>
				<input type="submit" value="Sign Up"> 
			</form>


		</div>
	</div>
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
						<form class="ui form" method="post" style='padding-top:1.25em'>
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