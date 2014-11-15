<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title><?= $title ?> | CraftCrate</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/stylesheet.css">
	<link rel="stylesheet" href="/css/main.css">

	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='/js/semantic.min.js'></script>
	<?= Assets::output() ?>
</head>
<body class="<? if(isset($body_classes)) echo $body_classes ?>">

	<? if(isset($admin_navigation)) echo $admin_navigation ?>
	<? if(isset($message)) echo $message ?>
	<? if(isset($page_settings)) echo $page_settings ?>
	<? if(isset($breadcrumbs)) echo $breadcrumbs ?>

<header class="blue_bg">
	<div class="max_wrapper">
		<div id="logo_container" class="float_left">
			<h2 class="proxima text_white">CraftCrate</h2>
		</div>
		<div id="registration" class="float_right" >
			<a href="/signup" class="text_white">Sign Up</a>
			<a href="/login" class="text_white">Login</a>
		</div>
	</div>
</header>


	<div id="page-content">
		<?= $yield ?>
	</div>
	
	

	<footer>


	</footer>
</div>
</body>
</html>