<?php
session_start();
  ?>
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
	<link rel="stylesheet" type="text/css" href="/packages/star-rating/jquery.rating.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='/js/semantic.min.js'></script>
	<script type="text/javascript" src='/packages/star-rating/jquery.rating.js'></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('input.star').rating();


			$('.fa.fa-thumbs-up').on('click',function(event) {
				event.preventDefault();
				$(this).addClass('text_blue').removeClass('text_brown');
			});

			$('.fa.fa-thumbs-down').on('click',function(event) {
				event.preventDefault();
				$(this).addClass('text_red').removeClass('text_brown');
			});




		});


	</script>
</head>
<body id="profile">
	<header class="blue_bg">
		<div class='max_wrapper'>
			<div id='logo_container'>
				<h2 class='proxima text_white'><a href='/' class='text_white'>BrewCrate</a></h2>
			</div>
			<div class="menu">
				<div class='item'>
					<a href="/dashboard">Dashboard</a>
				</div>
				<div class='item'>
					<a class="active" href="/profile">Profile</a>
				</div>
				<div class='item'>
					<a href="/upcoming-crate">Upcoming Crate</a>
				</div>
				<div class='item'>
					<a class="text_white" href="/instant-crate">Instant Crate</a>
				</div>
				<div class='item'>
					<a href="/logout"> Logout</a>
				</div>

			</div>
		</div>

	</header>
<div id="page-content">
<div >
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
		<div class="">
			<h2 class="text_blue">INSTANT CATE <?php echo "{$_SESSION['first_name']}"; ?></h2>
			
		</div>



		<div class="ui grid stackable">
			<div class="ten wide column">
				<h2 class='text_brown'>You love us!</h2>
				<h4 class="text_brown">Order an instant crate now and you can expect it within <span class='text_red'>one week</span></h4>
					<p class='text_brown'>Here is what you can expect:</p>

					<div class="past">
						
						<div class="past_beer">
							<h5 class="text_center">Beer Title</h5>
							<div class='image'>
								<img src="/images/brownale.jpg">
							</div>
							<div class="description">
								<ul>
									<li class="text_brown">Brewery: <span class="text_red">Unibroue</span></li>
									<li class="text_brown">Name: <span class="text_red">Maudite</span></li>
									<li class="text_brown">ABV: <span class="text_red">8.00%</span></li>
									<li class="text_brown">Attributes: <span class="text_red">brown, nutty ale</span></li>

								</ul>

							</div>
						</div>

					</div>
					<div class="past">
						
						<div class="past_beer">
							<h5 class="text_center">Beer Title</h5>
							<div class='image'>
								<img src="/images/brownale.jpg">
							</div>
							<div class="description">
								<ul>
									<li class="text_brown">Brewery: <span class="text_red">Unibroue</span></li>
									<li class="text_brown">Name: <span class="text_red">Maudite</span></li>
									<li class="text_brown">ABV: <span class="text_red">8.00%</span></li>
									<li class="text_brown">Attributes: <span class="text_red">brown, nutty ale</span></li>

								</ul>

							</div>
						</div>

					</div>
					<div class="past">
						
						<div class="past_beer">
							<h5 class="text_center">Beer Title</h5>
							<div class='image'>
								<img src="/images/brownale.jpg">
							</div>
							<div class="description">
								<ul>
									<li class="text_brown">Brewery: <span class="text_red">Unibroue</span></li>
									<li class="text_brown">Name: <span class="text_red">Maudite</span></li>
									<li class="text_brown">ABV: <span class="text_red">8.00%</span></li>
									<li class="text_brown">Attributes: <span class="text_red">brown, nutty ale</span></li>

								</ul>

							</div>
						</div>

					</div>
					<br><br><br>
					<input type='submit' value="Order">
			</div>
			<div class="four wide column">
			<div class="page_wrapper" class='featured'>
				<div class="four wide column">
						<h3 class="text_brown">Featured Beers</h3>
						<div>
							<h6 class="text_brown">Have you had a St.Bernardus Abt. 12?</h6>
							<div class="featured_image">
								<img src="/images/btv.jpg">
							</div>	
							<div class="featured_desc">
								<p class="text_brown">The St.Bernardus Abt 12 Abbey ale brewed in the classic 'Quadrupel' style of Belgium's best Abbey Ales. Dark with a full, ivory-colored head. It has a fruity aroma, full of complex flavours and excells because of its long bittersweet finish with a hoppy bite. </p>
							</div>
						</div>
					</div>
			</div>
		</div>
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




</body>

</html>