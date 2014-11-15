var PageManager = {

	list : null,
	primary_lists : {},
	secondary_lists : {},
	tertiary_lists : {},

	init : function()
	{

		this.list = $('#pages');

		// Bind Events

		$('body').on('click', '.add_primary', this.addPage);
		$('body').on('click', '.add_secondary', this.addPage);
		$('body').on('click', '.add_tertiary', this.addPage);

		$('body').on('click', '.small.trash.icon.link.delete', this.removePage);

		$('body').on('click', 'i.sign.icon', this.toggleList);

		var primary = $('#pages');

		primary.each(function(index,el)
		{
			PageManager.primary_lists["primary_list_"+index] = $(el).sortable(
			{
				items : '> li[data-page-type="primary"]',
				update : PageManager.updateOrder
			});
		});

		var secondary = $('ul[data-list-type="secondary"]');

		secondary.each(function(index,el)
		{
			PageManager.secondary_lists["secondary_list_"+index] = $(el).sortable(
			{
				items : '> li[data-page-type="secondary"]',
				update : PageManager.updateOrder
			});
		});

		var tertiary = $('ul[data-list-type="tertiary"]');

		tertiary.each(function(index,el)
		{
			PageManager.tertiary_lists["tertiary_list_"+index] = $(el).sortable(
			{
				items : '> li[data-page-type="tertiary"]',
				update : PageManager.updateOrder
			});
		});

	},

	updateOrder : function(event,ui)
	{
		var sort = {};
		var items = $(event.target).children('li[data-page-type="'+event.target.getAttribute('data-list-type')+'"]');
		console.log(items);
		items.each(function(index)
		{
			sort['page_'+this.getAttribute('data-id')] = index;
		});

		$.ajax({
			url: '/admin/pages/update-priority',
			type: 'put',
			data: sort,
			success: function(response) {
				if(response.success)
				{
					console.log('success');
				}
				else
				{
					console.log('failed!');
				}
			}
		});
	},

	addPage : function(event)
	{
		var el = $(event.target);
		var input = el.prev();

		if(input.val())
		{

			var page_data = { title: input.val(), type: el.attr('data-page-type'), parent_page_id : null };

			var parent_type = null;

			if(page_data.type != 'primary')
			{
				if(page_data.type == 'secondary') parent_type = 'primary';
				if(page_data.type == 'tertiary') parent_type = 'secondary';
				page_data.parent_page_id = el.parents('li[data-page-type="'+parent_type+'"]').attr('data-id');
			}

			if(page_data.type == 'primary' || page_data.parent_page_id !== null)
			{

				// Create Page
				$.post("/admin/pages", page_data, function(data)
				{
					if(data.success)
					{

						var page_item_markup = '<li data-page-type="'+page_data.type+'" data-id="'+data.page.id+'" id="page_'+data.page.id+'">';

						page_item_markup += '<div>';
							page_item_markup += '<i class="add sign box icon"></i> <span>'+input.val()+'</span>';
							page_item_markup += '<i class="small trash icon link" data-id="'+data.page.id+'"></i>';
							page_item_markup += '<a href="'+data.uri+'"><i class="small url icon"></i></a>';
						page_item_markup += '</div>';

						if(page_data.type == 'primary')
						{
							page_item_markup += '<ul data-list-type="secondary" class="" style="display: none">';
								page_item_markup += '<li class="ui small form"><div class="inline field"><input type="text" name="" placeholder="Title"><button type="button" class="ui mini button add_secondary" data-page-type="secondary">+ Add Secondary Page</button></div></li>';
						}

						if(page_data.type == 'primary' || page_data.type == 'secondary')
						{
								page_item_markup += '<ul data-list-type="tertiary" class="" style="display: none">';

									page_item_markup += '<li class="ui small form"><div class="inline field"><input type="text" name="" placeholder="Title"><button type="button" class="ui mini button add_tertiary" data-page-type="tertiary"><i class="plus icon"></i> Add Tertiary Page</button></div></li>';

								page_item_markup += '</ul>';
						}

						if(page_data.type == 'primary')
						{
							page_item_markup += '</ul>';
						}

						page_item_markup += '</li>';

						var new_item = $(page_item_markup);
						el.parent().parent().before(new_item);

						// Refresh sortable
						$.each(PageManager[page_data.type+'_lists'], function(index,list)
						{
							// console.log(list);
							$(list).eq(0).sortable('refresh');
						});
						input.val('');
					}
				});
				
			}
		}
	},

	removePage : function(e)
	{
		var id = $(e.target).attr('data-id');
		$.ajax({
			url: "/admin/pages/"+id,
			type: 'delete',
			success: function(response) {
				if(response.success)
				{
					$(e.target).parent().parent().slideUp(100,function()
					{
						$(this).remove();
					});
				}
				else
				{
					console.log('failed!');
				}
			}
		});

	},

	toggleList : function(e)
	{
		var target = $(e.target);
		var parent = target.parent().parent();
		console.log(parent);
		var type = parent.attr('data-page-type');
		var childtype = (type == 'primary') ? 'secondary' : 'tertiary';

		parent.find('ul[data-list-type="'+childtype+'"]').slideToggle(
			100,
			function()
			{
				if(target.hasClass('add'))
				{
					target.removeClass('add').addClass('minus').addClass('alternate');
				}
				else
				{
					target.removeClass('minus').addClass('add');
				}
			}
		);

	}

}

$(document).ready(function(){

	PageManager.init();

});