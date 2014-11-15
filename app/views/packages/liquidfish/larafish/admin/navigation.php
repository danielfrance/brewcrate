<div class="ui small menu">
		<div class="ui simple dropdown link item ">
			<i class="users icon"></i> Users <i class="dropdown icon"></i>
			<div class="menu">
				<a class="item" href="/admin/users"><i class="reorder icon"></i> List</a>
				<a class="item" href="/admin/roles"><i class="key icon"></i> Roles</a>
				<a class="item" href="/admin/permissions"><i class="unlock alternate icon"></i> Permissions</a>
			</div>
		</div>
		<div class="ui link item">
			<a href="/admin/pages"><i class="sitemap icon"></i> Pages</a> <i class="dropdown icon"></i>
			<div class="menu">
				<!-- <a class="item" href="/admin/pages"><i class="reorder icon"></i> Manage</a> -->
				<!-- <a class="item" href="/admin/components"><i class="puzzle piece icon"></i> Components</a> -->
			</div>
		</div>
		<div class="ui   link item">
			<a href="/admin/staff"><i class="fa-user icon"></i> Staff <i class="dropdown icon"></i></a>
			<!-- <div class="menu">
				<a class="item" href="/admin/staff"><i class="reorder icon"></i> Manage</a>
				<a class="item" href="/admin/components"><i class="puzzle piece icon"></i> Components</a> 
			</div> -->
		</div>
		<div class="ui link item">
			<a href="/admin/events"><i class="fa-calendar icon"></i> Events <i class="dropdown icon"></i></a>
		</div>
		<div class="ui link item">
			<a href="/admin/news"><i class="fa-bullhorn icon"></i> News <i class="dropdown icon"></i></a>
		</div>
        <div class="ui simple dropdown link item">
            <i class="fa-briefcase icon"></i> Board <i class="dropdown icon"></i>
            <div class="menu">
            	<a class="item" href="/admin/directors">Board of Directors</a>
            	<a class='item' href="/admin/advocates">Board of Advocates</a>
            	<a class='item' href="/admin/board_meetings">Board Meetings</a>
            </div>
        </div>
    <div class="ui link item">
        <a href="/admin/champions"><i class="fa-star icon"></i> Champions <i class="dropdown icon"></i></a>
    </div>
    <div class="ui link item">
        <a href="/admin/spotlight"><i class="fa-lightbulb-o icon"></i> Spotlight <i class="dropdown icon"></i></a>
    </div>



		<div class="right menu">
			<div class="item">
			Hey <?= $larafish->user()->first_name ?>
			</div>
			<a class="item" href="/logout">
				Logout <i class="sign out icon"></i>
			</a>
		</div>


</div>

<div class="ui center aligned segment" id="alert" style="position:fixed; top: 0; z-index: 300; display: none; width: 100%; box-shadow">
	Page has been edited! <button id="save" class="ui green button">Save</button> or
	<button id="discard" class="ui red button">Discard</button>	the changes?
</div>