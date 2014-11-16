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