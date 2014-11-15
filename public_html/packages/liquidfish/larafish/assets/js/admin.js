var DEBUG = 1;

CKEDITOR.disableAutoInline = true;
// CKEDITOR.config.contentsCss = '/assets/stylesheets/style.css';
CKEDITOR.config.allowedContent = true;
CKEDITOR.config.removePlugins = 'forms';
CKEDITOR.config.extraPlugins = 'sourcedialog';
// CKEDITOR.config.protectedSource.push(/<protected>[\s\S]*<\/protected>/g);

CKEDITOR.config.colorButton_colors = '5a9ee4,fdb501,de1217,5ec7b9,012eac';

CKEDITOR.on( 'instanceCreated', function( event ) {
	var editor = event.editor
	var element = editor.element;
	if(DEBUG) console.log(element);

	editor.config.filebrowserBrowseUrl = '/admin/files/browser';
	editor.config.filebrowserImageBrowseUrl = '/admin/files/browser';
	editor.config.filebrowserWindowWidth = 800;
	editor.config.filebrowserWindowHeight = 500;

	if ( element.is( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) ) {
		editor.on( 'configLoaded', function() {
			editor.config.removePlugins = 'colorbutton,find,flash,font,' +
				'forms,iframe,image,newpage,removeformat,' +
				'smiley,specialchar,stylescombo,templates,about,sourcedialog';

			editor.config.toolbarGroups = [
				{ name: 'editing',              groups: [ 'basicstyles', 'links' ] },
				{ name: 'undo' },
				{ name: 'clipboard',    groups: [ 'selection', 'clipboard' ] }
			];
		});
	}

	if( (element.hasClass('icon') || (element.hasClass('no-paragraph')) ))
	{
		editor.config.autoParagraph = false;
	}

});

var Admin = {

	// Properties
	uploaders : new Array(),

	init : function(){

		// Save
		$('#save').on('click', this.savePage);
		$('#discard').on('click',location.reload);
		// Messages
		$('.message .close').on('click', function() {
			$(this).closest('.message').slideUp(100);
		});
		// Deletes
		$('[data-deletable]').on('click',function()
		{
			var r = confirm("Are you sure you want to delete?");
			if (r == false){
				return false;
			} else {
				return true;
			}
		});

		// Create CK Fields
		this.createCKEditorFields();

		// Let CKEditor init then watch for DOM changes
		setTimeout(function(){
			$('[data-slot]').bind('DOMSubtreeModified',function(e)
			{
				Admin.pageEdited();
			});
			$('[data-slot]').bind("animationstart MSAnimationStart webkitAnimationStart", function(e)
			{
				// Fix for deprecated DOM mutation methods
				if(DEBUG) console.log('DOM modified');
				if(DEBUG) console.log(e);
				if(e.originalEvent.animationName == 'nodeInserted') Admin.pageEdited();
			});
		},2000);

		$('select.data,input.data').on('change', Admin.pageEdited);

		// Change Photos - mostly homepage
		$('div.change-photo').each(function()
		{
			Admin.createUploader($(this).attr('id'),$(this).attr('data-photo-size'),$(this).attr('data-target'),$(this).attr('data-target-type'));
		});


		$('.upload').each(function()
		{
			id = $(this).attr('id');
			gallery_id = $('#gallery_id').val();
			Admin.uploaders['uploader_'+Admin.randomString()] = new qq.FineUploader({
				debug: DEBUG,
				text : {
					uploadButton: 'Add Photo...',
				},
				element: document.getElementById(id),
				request: {
					endpoint: '/admin/galleries/add-photo'
				},
				callbacks: {
					onComplete: function(id,name,response){
						if(DEBUG) console.log(response);
						if(response.success)
						{
							// TODO add photo to DOM
							Admin.addItemToGalleryTable(response.item);
							$('#photo_title').val('');
							$('#photo_description').val('');
						}
					},
					onSubmit: function(){
						// Determine what type of photo we want to create
						this.setParams({ 'gallery_id': gallery_id, 'title': $('#photo_title').val(), 'description': $('#photo_description').val() });
					}
				}
			});

		});

		$('#add-component').on('click','li a',function(e)
		{
			e.preventDefault();
			Admin.addComponent($(this).attr('data-component-view'));
		});

		/* Semantic elements */
		$('.ui.accordion').accordion();
	},

	createCKEditorFields : function(id)
	{
		// CK inline editors
		$('.editor').each(function()
		{
			// $(this).attr('contenteditable','true');
			if(DEBUG) console.log('adding:');
			if(DEBUG) console.log($(this).attr('id'));

			CKEDITOR.inline($(this).attr('id'));
		})
	},

	recreateCKEditorFields : function()
	{
		for(instance in CKEDITOR.instances){
			CKEDITOR.instances[instance].destroy();
		}

		this.createCKEditorFields();
	},

	pageEdited : function()
	{
		if(DEBUG) console.log('Page Edited!');
		$('#alert').show();
	},

	pageSaved : function()
	{
		if(DEBUG) console.log('Page Saved.');
		$('#alert').fadeOut(100);
		$('.data').removeClass('modified');
		$('.qq-upload-list').empty();
	},

	// Components
	savePage : function()
	{

		// Components
		components = new Array();

		$(document).find('[data-component]').each(function(i)
		{

			component_type = $(this).attr('data-component');
			component_id = $(this).attr('data-component-data-id');

			// Loop through each piece of data
			component_data = new Object();

			// nested callback function so we inherit scope vars
			function processComponentData(item)
			{
				slot = $(this).attr('data-slot');
				type = $(this).attr('data-type');

				component_data['id'] = component_id; // if id key is undefined, it will be omitted

				switch(type)
				{
					case 'image':
						component_data[slot] = $(this).attr('src');
						break;
					case 'custom':
						component_data[slot] = $(this).attr('data-custom');
						break;
					case 'input':
						component_data[slot] = $(this).val();
						break;
					case 'array':
						wrapper = $(this).attr('data-wrapper');
						sub_data = new Array();
						$(this).find(wrapper).each(function()
						{
							sub_data.push($(this).html());
						});
						component_data[slot] = sub_data;
						break;
					case 'style':
						component_data[slot] = $(this).attr('style');
						break;
					default:
						component_data[slot] = CKEDITOR.instances[$(this).attr('id')].getData();
						break;
				}

			}

			$(this).find('[data-slot]').each(processComponentData);

			components.push(component_data);

		});

		if(DEBUG) console.log(components);

		// Save the data
		$.ajax({
			url: '/admin/pages/components/data/update',
			type: 'put',
			data: {
				"page_id": window.page_id,
				"page_content": $('#page-content').children().not('[data-ignored]').text(),
				"components": JSON.stringify(components)
			},
			success: function(data)
			{
				if(data.success == 1){
					Admin.pageSaved();
				}
			}
		});

	},

	createUploader : function(el,size,target,target_type)
	{
		target_type = typeof target_type !== 'undefined' ? target_type : 'image';
		if(DEBUG) console.log('target type:');
		if(DEBUG) console.log(target_type);
		this.uploaders['uploader_'+this.randomString] = new qq.FineUploader({
			debug: DEBUG,
			text : {
				uploadButton: 'Choose a Photo',
			},
			element: document.getElementById(el),
			request: {
				endpoint: '/admin/photos'
			},
			callbacks: {
				onComplete: function(id,name,response){
					if(response.success)
					{
						switch(target_type)
						{
							case 'image':
								$('#'+target).attr('src',response.uri);
								Admin.pageEdited();
								break;
							case 'style':
								$('#'+target).css('background-image','url('+response.uri+')');
								Admin.pageEdited();
								break;
						}
					}
				},
				onSubmit: function(){
					// Determine what type of photo we want to create
					this.setParams({ 'photo_size': size });
				}
			}
		});

	},

	randomString : function()
	{
		var text = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

		for( var i=0; i < 5; i++ )
			text += possible.charAt(Math.floor(Math.random() * possible.length));

		return text;
	},

}

var ComponentManager = {

	init : function()
	{
		$(document).on('click', '[data-component-id-to-add]', this.addComponent);
		$(document).on('click', '[data-component-id-to-remove]', this.removeComponent);
	},

	addComponent : function(e)
	{
		var button = $(this);
		var componentId = button.attr('data-component-id-to-add');
		var pageId = button.attr('data-page-id');

		var currentComponents = $('table[data-current-components]');

		$.post('/admin/pages/components', { 'component_id' : componentId, 'page_id' : pageId }, function(response)
		{
			var titles = {};
			$.each(currentComponents.find('tr').find('td:first-child'), function(index, value)
			{
				titles[value.innerText] = true;
			});

			var componentTitle = response.component.title;

			if(titles.hasOwnProperty(response.component.title))
			{
				componentTitle = componentTitle+'-'+response.id;
			}

			currentComponents.append('<tr class="warning"><td>'+componentTitle+'</td><td><a class="ui tiny red button right floated" data-page-id="'+pageId+'" data-component-id-to-remove="'+response.id+'"><i class="remove icon"></i>Remove</a></td></tr>');

			ComponentManager.showWarning();

		}, 'json');
	},

	removeComponent : function(e)
	{
		var button = $(this);
		var componentId = button.attr('data-component-id-to-remove');

		$.ajax({
			url: '/admin/pages/components',
			type: 'delete',
			data: { "page_component_id" : componentId },
			success: function(response)
			{
				if(response.id)
				{
					button.closest('tr').remove();
					ComponentManager.showWarning();
				}
				else
				{

				}
			}
		});

	},

	showWarning: function()
	{
		$('#pleaseRefresh').slideDown(100);
	}

};

$(document).ready(function(){
	Admin.init();
	ComponentManager.init();
});