<?
Assets::addLarafishCss('css/admin.css');
Assets::addNamed('jqueryui');
Assets::addLarafishJs('js/PageManager.js');
?>
<div class="larafish">
	<h2>Pages</h2>
	<ul id="pages" data-list-type="primary">
		<?
		foreach($pages as $primary_uri => $primary_page_data)
		{
			echo '<li data-page-type="primary" data-id="'.$primary_page_data->id.'" id="page_'.$primary_page_data->id.'">';
				echo '<div>';
					echo '<i class="add sign box icon"></i> <span>'.$primary_page_data->title.'</span>';
					echo '<i class="small trash icon link" data-deletable data-id="'.$primary_page_data->id.'"></i>';
					echo '<a href="'.$primary_page_data->uri.'"><i class="small url icon"></i></a>';
				echo '</div>';

				# Secondary pages
				echo '<ul data-list-type="secondary" id="secondary_list_'.$primary_page_data->id.'" class="" style="display:none">';

				if(isset($primary_page_data->subpages))
				{

					foreach($primary_page_data->subpages as $secondary_page => $secondary_page_data)
					{
						echo '<li data-page-type="secondary" data-id="'.$secondary_page_data->id.'" id="page_'.$secondary_page_data->id.'">';
						echo '<div>';
							echo '<i class="add sign box icon"></i> <span>'.$secondary_page_data->title.'</span>';
							echo '<i class="small trash icon link" data-deletable data-id="'.$secondary_page_data->id.'"></i>';
							echo '<a href="'.$secondary_page_data->uri.'"><i class="small url icon"></i></a>';
						echo '</div>';

						# Tertiary pages
						echo '<ul data-list-type="tertiary" class="" style="display:none">';
						if(isset($secondary_page_data->subpages))
						{
							foreach($secondary_page_data->subpages as $tertiary_page => $tertiary_page_data)
							{
								echo '<li data-page-type="tertiary" data-id="'.$tertiary_page_data->id.'" id="page_'.$tertiary_page_data->id.'">';
								echo '<div>';
									echo '<i class="add sign box icon"></i> <span>'.$tertiary_page_data->title.'</span>';
									echo '<i class="small trash icon link" data-deletable data-id="'.$tertiary_page_data->id.'"></i>';
									echo '<a href="'.$tertiary_page_data->uri.'"><i class="small url icon"></i></a>';
								echo '</div>';
								echo '</li>';
							}
						}

						echo '<li class="ui small form"><div class="inline field"><input type="text" name="" placeholder="Title"><button type="button" class="ui mini button add_tertiary" data-page-type="tertiary"><i class="plus icon"></i> Add Tertiary Page</button></div></li>';
						echo '</ul>';

					}

					echo '</li>';

				}
				echo '<li class="ui small form"><div class="inline field"><input type="text" name="" placeholder="Title"><button type="button" class="ui mini button add_secondary" data-page-type="secondary"><i class="plus icon"></i> Add Secondary Page</button></div></li>';
				echo '</ul>';


			echo '</li>';
		}

		echo '<li class="ui small form"><div class="inline field"><input type="text" name="" placeholder="Title"><button type="button" class="ui mini button add_primary" data-page-type="primary"><i class="plus icon"></i> Add Primary Page</button></div></li>';
		?>
	</ul>
</div>