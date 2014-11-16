<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>Beer Profile | BrewCrate</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/stylesheet.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/js/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='/js/semantic.min.js'></script>
	<script type="text/javascript" src='/js/slick/slick.min.js'></script>
	<script type="text/javascript">
function remove_image(){
	$('.loading').remove();
	$('#results').css('display', 'block');
}

$(document).ready(function() {
	$('#slide').slick({
		draggable: false,
		infinite: false
	});



	$('.fa.fa-thumbs-up, .fa.fa-thumbs-down').click(function(e) {  
  	  	$("#slide").slickNext();
  	
	});

	$('.last').click(function(event) {
		/* Act on the event */
		$('.ui.modal')
		.modal('show')
		.modal('setting', 'closable', false);
		setTimeout(remove_image,1000);
		

	});


});
	</script>
	<?php //Assets::output() ?>
</head>
<body class="<? if(isset($body_classes)) echo $body_classes ?>">

	<? if(isset($admin_navigation)) echo $admin_navigation ?>
	<? if(isset($message)) echo $message ?>
	<? if(isset($page_settings)) echo $page_settings ?>
<?php 

if (Auth::guest())
	
echo "<header class='blue_bg'>
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
</header>"


 ?>
<div id="page-content">
<div class="beer_profile">
	<div class="max_wrapper">
		<div>
			<h3 class="text_brown text_center">Lets start by building your beer profile!</h3>
			<div id="slide" class='ui grid three column'>
				<div class="column">
					<div class="beer">
						<h3 class="text_brown text_center">Brown Ale</h3>
						<div class='image'>
							<img src="/images/brownale.jpg">
						</div>
						<div class="answer">
							<div class="float_left"><h2><i class="fa fa-thumbs-down text_brown "></i></h2></div>
							<div class="float_right"><h2><i class="fa fa-thumbs-up text_brown "></i></h2></div>
							<input type='hidden' name='brown_ale' value=''>
							<div class="clearfix"></div>
						</div>
						<h4 class="text_brown">Description:</h4>
						<p class="text_brown">Spawned from the Mild Ale, Brown Ales tend to be maltier and sweeter on the palate, with a fuller body. Color can range from reddish brown to dark brown. Some versions will lean towards fruity esters, while others tend to be drier with nutty characters. All seem to have a low hop aroma and bitterness.</p>
						<h4 class="text_brown">Examples:</h4>
						<ul class="text_brown">
							<li>Samuel Smith's Nut Brown Ale </li>
							<li>Sierra Nevada Brown Ale</li>
							<li>Double Maxim</li>
						</ul>
					</div>
				</div>

				<div class="column">
					<div class="beer">
						<h3 class="text_brown text_center">Porter</h3>
						<div class='image'>
							<img src="/images/gtb-porter.jpg">
						</div>
						<div class="answer">
							<div class="float_left"><h2><i class="fa fa-thumbs-down text_brown"></i></h2></div>
							<div class="float_right"><h2><i class="fa fa-thumbs-up text_brown"></i></h2></div>
							<div class="clearfix"></div>
						</div>
						<h4 class="text_brown">Description:</h4>
						<p class="text_brown">Inspired from the now wavering English Porter, the American Porter is the ingenuous creation from that. Thankfully with lots of innovation and originality American brewers have taken this style to a new level. Whether it is highly hopping the brew, using smoked malts, or adding coffee or chocolate to complement the burnt flavor associated with this style. Some are even barrel aged in Bourbon or whiskey barrels. The hop bitterness range is quite wide but most are balanced. Many are just easy drinking session porters as well. </p>
						<h4 class="text_brown">Examples:</h4>
						<ul class="text_brown">
							<li>Vanilla Porter</li>
							<li>Mocha Porter</li>
							<li>New World Porter</li>
						</ul>
					</div>
				</div>
				<div class="column">
					<div class="beer">
						<h3 class="text_brown text_center">Belgian Strong Dark Ale</h3>
						<div class='image'>
							<img src="/images/darkale.jpg">
						</div>
						<div class="answer">
							<div class="float_left"><h2><i class="fa fa-thumbs-down text_brown"></i></h2></div>
							<div class="float_right"><h2><i class="fa fa-thumbs-up text_brown"></i></h2></div>
							<div class="clearfix"></div>
						</div>
						<h4 class="text_brown">Description:</h4>
						<p class="text_brown">Hop and malt character can vary, most are fruity and may have mild dark malt flavors. Phenols will range from minimal to high and most will be light on the hops. All in all most are spicy and alcoholic.</p>
						<h4 class="text_brown">Examples:</h4>
						<ul class="text_brown">
							<li>Monk's Blood</li>
							<li>Chimay Grande Réserve</li>
							<li>Trappistes Rochefort 8</li>
						</ul>
					</div>
				</div>
				<div class="column">
					<div class="beer">
						<h3 class="text_brown text_center">Hefeweizen</h3>
						<div class='image'>
							<img src="/images/brewery_hef_large.jpg">
						</div>
						<div class="answer">
							<div class="float_left"><h2><i class="fa fa-thumbs-down text_brown"></i></h2></div>
							<div class="float_right"><h2><i class="fa fa-thumbs-up text_brown"></i></h2></div>
							<div class="clearfix"></div>
						</div>
						<h4 class="text_brown">Description:</h4>
						<p class="text_brown"> Contains 30-70% wheat malt. This Bavarian style of wheat beer is pale and cloudy. It is bottled and served unfiltered so the yeast used during fermentation is still present. This special strain of yeast contributes banana and clove notes to the aroma and flavor of the beer. Often dry and tart, with some spiciness, bubblegum or notes of apple. Little hop bitterness and moderate level of alcohol. Wheat beer is an ale so it is heavier and doesn’t provide the smack of a lager. Served cold, with or without a slice of lemon.</p>
						<h4 class="text_brown">Examples:</h4>
						<ul class="text_brown">
							<li>Boulevard Wheat</li>
							<li>Pyramid Wheaten Ale</li>
							<li>Hoegaarden White</li>
						</ul>
					</div>
				</div>

				<div class="column">
					<div class="beer">
						<h3 class="text_brown text_center">Pale Ale</h3>
						<div class='image'>
							<img src="/images/pale_ale.jpg">
						</div>
						<div class="answer">
							<div class="float_left"><h2><i class="fa fa-thumbs-down text_brown"></i></h2></div>
							<div class="float_right"><h2><i class="fa fa-thumbs-up text_brown"></i></h2></div>
							<div class="clearfix"></div>
						</div>
						<h4 class="text_brown">Description:</h4>
						<p class="text_brown">Beer made with a top fermenting yeast. Generally, expect a lighter bodied beer with a good balance of malt and hops. Pale Ales usually contain 4.0-7.0% Alcohol. Bitterness can range from lightly floral to pungent. So called because they are brewed with more lightly roasted "pale" malts, pale ales typically have a more equal malt-to-hop balance with a dry finish.</p>
						<h4 class="text_brown">Examples:</h4>
						<ul class="text_brown">
							<li>Boulevard Pale Ale</li>
							<li>Samuel Adams Pale Ale</li>
							<li>New Belgium Tour de Fall Pale Ale</li>
						</ul>
					</div>
				</div>

				<div class="column">
					<div class="beer">
						<h3 class="text_brown text_center">Lagers</h3>
						<div class='image'>
							<img src="/images/lager-yeast-beer.jpg">
						</div>
						<div class="answer">
							<div class="float_left"><h2><i class="fa fa-thumbs-down text_brown"></i></h2></div>
							<div class="float_right"><h2><i class="fa fa-thumbs-up text_brown"></i></h2></div>
							<div class="clearfix"></div>
						</div>
						<h4 class="text_brown">Description:</h4>
						<p class="text_brown">Lagers utilize a blend of hops barley malts and rice to create a balanced and often light flavor.</p>
						<h4 class="text_brown">Examples:</h4>
						<ul class="text_brown">
							<li>Budweiser</li>
							<li>Yuengling</li>
							<li>Heineken</li>
						</ul>
					</div>
				</div>
				<div class="column">
					<div class="beer">
						<div class="response"></div>
						<h3 class="text_brown text_center">Stout</h3>
						<div class='image'>
							<img src="/images/stout-lead.jpg">
						</div>
						<div class="answer">
							<div class="float_left"><h2><i class="fa fa-thumbs-down text_brown last"></i></h2></div>
							<div class="float_right"><h2><i class="fa fa-thumbs-up text_brown last"></i></h2></div>
							<div class="clearfix"></div>
						</div>
						<h4 class="text_brown">Description:</h4>
						<p class="text_brown">Stout is a dark beer made using roasted malt or roasted barley, hops, water and yeast. Stouts were traditionally the generic term for the strongest or stoutest porters, typically 7% or 8%, produced by a brewery.</p>
						<h4 class="text_brown">Examples:</h4>
						<ul class="text_brown">
							<li>Guinness</li>
							<li>Left Hand Milk Stout</li>
							<li>Sam Adams Cream Stout</li>
						</ul>
					</div>
				</div>
			</div>

		</div>


	</div>
	<div class="ui modal" style="margin-top:-17em !important;">
		<i class="text_white fa fa-close"></i>
		<div class="content center">
			<h4 class="text_brown">Hang tight! We are retrieving your results</h4>
		</div>
		<div class="actions text_center">
			<img class="loading" src="/images/loader-large-inverted.gif">
		</div>
		<div class="">
			<div id="results" style='display:none;' class='ui two column grid'>
				<div class="column">
					<img class='buffer' src="/images/Coop.jpg">
				</div>
				
				<div class="column">
					<p class="text_brown">Based off your info we think you would really like <span class="text_green bold">DNR</span> by <span class="text_green bold">COOP</span></p>
					<ul class="listing"><span class="text_brown">You can find it here:</span>
						<li ><a href="" class='text_red'>Byron's Liquor Warehouse</a></li>
						<li><a href="" class='text_red'>Broadway Wine Merchants</a></li>
						<li><a href="" class='text_red'>Freeman's Liquor Mart</a></li>
					</ul>
					<div class='callout'>
						<h4 class="text_brown">To have your next favorite beer delivered <br><br><a href="/signup" class="uppercase"> Click Here</a></h4>

					</div>
				</div>
			</div>

		</div>
	</div>

</div>
</div>

</div>
</body>
</html>