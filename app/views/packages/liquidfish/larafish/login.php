<? Assets::addCss('/assets/semantic/packaged/css/semantic.min.css') ?>

<form class="ui form segment" action="/login" method="post" style="padding-top:10em;">
	<div class="field">
		<label>Username</label>
		<div class="ui left labeled icon input">
			<input type="text" name="username" placeholder="email@address.com">
			<i class="user icon"></i>
			<div class="ui corner label">
				<i class="icon asterisk"></i>
			</div>
		</div>
	</div>
	<div class="field">
		<label>Password</label>
		<div class="ui left labeled icon input">
			<input type="password" name="password">
			<i class="lock icon"></i>
			<div class="ui corner label">
				<i class="icon asterisk"></i>
			</div>
		</div>
	</div>
	<a href="<?= URL::route('forgot-password') ?>">Forgot Password?</a>
	<div class="field">
		<button class="ui blue submit button" type="submit">Login</button>
	</div>
</form>