<?php
/**
 * This file contains all the default metaboxes.
 *
 * @author Hana
 */
 
 
/* REGISTER DEFAULT METABOXES
------------------------------------------------------------ */
add_action( 'init', 'hana_default_metaboxes' );

function hana_default_metaboxes(){
	//load the porftfolio categeories
	$portf_taxonomies=get_terms('portfolio_category', array('hierarchical'=>true, 'hide_empty'=>0));
	$portf_categories=array(array('id'=>'-1', 'name'=>'All Portfolio Categories'));

	foreach($portf_taxonomies as $taxonomy){
		$portf_categories[]=array("name"=>$taxonomy->name, "id"=>$taxonomy->term_id);
	}
	$loader_portf_categories=array_merge(array(array('id'=>'hide','name'=>'Hide'), (array('id'=>'disabled','name'=>'Show:'))), $portf_categories);

	//load the post categeories
	$categories=get_categories('hide_empty=0');
	$hana_categories=array(array('id'=>'-1', 'name'=>'All Categories'));
	for($i=0; $i<sizeof($categories); $i++){
		$hana_categories[]=array('id'=>$categories[$i]->cat_ID, 'name'=>$categories[$i]->cat_name);
	}
	
	$hana_sidebars = hana_get_registered_sidebars();
	$hana_sliders = hana_get_created_sliders();

	/* ------------------------------------------------------------------------*
	 * META BOXES FOR THE PAGES
	 * ------------------------------------------------------------------------*/

	//the meta data for pages
	$meta_page_box = array(
	
		array(
			"type" => "open",
			"subtitles"=>array(array("id"=>"general", "name"=>"General"), array("id"=>"portfolio", "name"=>"Portfolio Template","options" => array("template-portfolio")), array("id"=>"blog", "name"=>"Blog", "options" => array("template-blog")))),

		array(
			"type" => "subtitle",
			"id" => "general"),
	
		array(
			"title" => "Header",
			"name" => "slider",
			"type" => "select",
			"options" => $hana_sliders,
			"std" => 'none',
			"conditional" => 'true'),
			
		array(
			"type" => "div",
			"class" => "slider_value-static"),

		array(
			"title" => "Static Image Height",
			"name" => "static_image_height",
			"std" => "300",
			"type" => "text",
			"description" => "Image Height to crop if you select 'Static Image' as header"),
			
		array(
			"type" => "close"),
		
		array(
			"name" => "show_title",
			"title" => "Display Page Title",
			"type" => "select",
			"options" => array(array("name"=>"Use Global Settings", "id"=>"global"),
			array("name"=>"Display", "id"=>"on"),
			array("name"=>"Hide", "id"=>"off")),
			"std" => 'global',
			"description" => 'Whether to display the page title or not - if "Use Global Settings" selected, the global setting selected in the
			'.HANA_THEMENAME.' Options &raquo; General &raquo; "Display page title on pages" field will be used.'),
		
		array(
			"type" => "blockopen",
			"options" => array("template-home")),

		array(
			"title" => "Slogan",
			"name" => "slogan",
			"type" => "textarea",
			"description" => 'If "Home Page" template selected, you can set slogan here.'),
			
		array("type" => "blockclose"),
		
		array(
			"type" => "blockopen",
			"options" => array("not-template-portfolio")),

		array(
			"title" => "Page Layout",
			"name" => "layout",
			"type" => "imageradio",
			"options" => array(array("img"=>HANA_IMAGES_URL.'layout-right-sidebar.png', "id"=>"right", "title"=>"Right Sidebar Layout"),
			array("img"=>HANA_IMAGES_URL.'layout-left-sidebar.png', "id"=>"left", "title"=>"Left Sidebar Layout"),
			array("img"=>HANA_IMAGES_URL.'layout-full-width.png', "id"=>"full", "title"=>"Full Width Layout")),
			"std" => 'right',
			"description" => 'Available for Default, Archives, FAQ and Contact page templates'),

		array(
			"name" => "sidebar",
			"title" => "Sidebar",
			"type" => "select",
			"options" => $hana_sidebars,
			"description" => 'You can select a sidebar for this page between the default one and another one that
			you have created. If you would like to use another sidebar, rather than the default one, you can
			create a new sidebar in "'.HANA_THEMENAME.' Options->General->Sidebars" section and after that you will be able to select the
			sidebar here.'),
	
		array("type" => "blockclose"),
	
		array(
			"type" => "blockopen",
			"options" => array("template-portfolio")),

		array(
			"title" => "Page Layout and Sidebar",
			"type" => "desc",
			"description" => 'If "Portfolio Gallery" template selected, the global settings selected in the "'.HANA_THEMENAME.' Options->Page Settings->Portfolio" section will be used.'),
			
		array("type" => "blockclose"),
	
		array("type" => "close"),
		
		array(
			"type" => "subtitle",
			"id" => "portfolio"),

		array(
			"name" => "postCategory",
			"title" => "Display items from categories",
			"type" => "select",
			"none" => true,
			"options" => $portf_categories,
			"std" => '-1',
			"description" => 'If "All Categories" selected, all the Portfolio items will be displayed. If another category is selected, only the Portfolio items that belong
			to this category or this category\'s subcategories will be displayed.'),

		array(
			"name" => "column_number",
			"title" => "Number of columns",
			"type" => "select",
			"options" => array(array("name"=>"Two Columns", "id"=>"2"),
			array("name"=>"Three Columns", "id"=>"3"),
			array("name"=>"Four Columns", "id"=>"4")),
			"std" => '3',),

		array(
			"name" => "item_height",
			"title" => "Item Height",
			"type" => "text",
			"std" => '410',),

		array(
			"name" => "order",
			"title" => "Portfolio item order",
			"type" => "select",
			"options" => array(array("name"=>"By Date", "id"=>"date"),
			array("name"=>"By Custom Order", "id"=>"custom")),
			"std" => 'date',
			"description" => 'If you select "By Date" the last created item will be displayed first. If you select by "By Custom Order"
			you will have to set the order field of each of the items.'),


		array(
			"name" => "show_categories",
			"title" => "Show portfolio categories",
			"type" => "select",
			"options" => array(array("name"=>"Show", "id"=>"true"),
			array("name"=>"Hide", "id"=>"false")),
			"std" => 'true',
			"description" => 'If "Show" selected, a category filter will be displayed above the portfolio items (only for the Gallery template)'),


		array(
			"name" => "showdesc",
			"title" => "Show item descriptions",
			"type" => "select",
			"options" => array( array("name"=>"Hide", "id"=>"false"),
			array("name"=>"Show", "id"=>"true")),
			"std" => 'false',
			"description" => 'If "Show" selected, the portfolio item description will be displayed below the image (only for the Gallery template)'),
		
		array(
			"name" => "show_titles",
			"title" => "Show item titles",
			"type" => "select",
			"options" => array( array("name"=>"Hide", "id"=>"false"),
			array("name"=>"Show", "id"=>"true")),
			"std" => 'true',
			"description" => 'If "Show" selected, the portfolio item title will be displayed over the image (only for the Gallery template)'),


		array(
			"title" => "Number of posts per page",
			"name" => "postNumber",
			"std" => "6",
			"type" => "text",
			"description" => "The number of smaller thumbnails to be displayed per page"),
		
		array(
			"name" => "desaturate",
			"title" => "Black/white image effect",
			"type" => "select",
			"options" => array( array("name"=>"OFF", "id"=>"false"),array("name"=>"ON", "id"=>"true")),
			"std" => 'off',
			"description" => 'If this option is enabled, the images will be automatically converted to black/white (desaturated) and they will be colored on hover (only for the Gallery template).'),
		
		array("type" => "close"),
		
		array(
			"type" => "subtitle",
			"id" => "blog"),

		array(
			"name" => "blog_style",
			"title" => "Blog Style",
			"type" => "select",
			"none" => true,
			"options" => array(array("id"=>"default", "name"=>"Default"), array("id"=>"fluid","name"=>"Fluid")),
			"std" => 'default',
			"description" => 'If "Fluid" selected, full width layout will be used.',
			"conditional" => 'true'),
			
		array(
			"type" => "div",
			"class" => "blog_style_value-fluid"),

		array(
			"title" => "Blog Page Layout",
			"type" => "desc",
			"description" => 'If "Fluid Style" selected, full width layout will be used.'),
			
		array(
			"name" => "blogcolumn",
			"title" => "Blog Column",
			"type" => "select",
			"none" => true,
			"options" => array(array("id"=>"3", "name"=>"3"), array("id"=>"4","name"=>"4"), array("id"=>"6","name"=>"6")),
			"std" => '3',
			"description" => ''),
			
		array("type" => "close"),
			
		array("type" => "close"),
			
		array("type" => "close"),
			
	);



	/* ------------------------------------------------------------------------*
	 * META BOXES FOR THE PORTFOLIO POSTS
	 * ------------------------------------------------------------------------*/

	$meta_portfolio_box = array(
	
		array(
			"type" => "open",
			"subtitles"=>array(array("id"=>"gallery", "name"=>"Grid Gallery Setting"))),
		
		array(
			"type" => "subtitle",
			"id" => "gallery"),
		
		array(
			"title" => "When clicked on the image open:",
			"name" => "action",
			"type" => "select",
			"options" => array(array("name"=>"Preview image in lightbox", "id"=>"lightbox"),
			array("name"=>"Play Video", "id"=>"video"),
			array("name"=>"The content of the item", "id"=>"permalink"),
			array("name"=>"Custom link", "id"=>"custom"),
			array("name"=>"Do Nothing", "id"=>"nothing")),
			"std" => "lightbox",
			"description" => "Select the action to be performed after clicking on the portfolio item."),
		
		array(
			"title" => "Custom Link/Video URL",
			"name" => "custom",
			"std" => "",
			"type" => "text",
			"description" => 'If "Play Video" selected above, you can insert a video URL here. If "Custom link" selected above, 
			you can insert the custom URL'),
		
		array(
			"title" => "Item Description",
			"name" => "description",
			"std" => "",
			"type" => "textarea",
			"description" => 'If "Preview image in lightbox" or "Play Video" has been selected in the clicking
			action field above, you can insert a description in this field that will be displayed below the image/video in lightbox.'),
		
		array(
			"title" => '<div class="ui-icon ui-icon-image"></div>Showcase and single page items settings',
			"type" => "heading"),
		
		array(
			"title" => "Crop image from",
			"name" => "crop",
			"type" => "imageradio",
			"options" => array(array("img"=>HANA_IMAGES_URL.'crop-c.png', "id"=>"c", "title"=>"Center"),
			array("img"=>HANA_IMAGES_URL.'crop-t.png', "id"=>"t", "title"=>"Top"),
			array("img"=>HANA_IMAGES_URL.'crop-b.png', "id"=>"b", "title"=>"Bottom"),
			array("img"=>HANA_IMAGES_URL.'crop-l.png', "id"=>"l", "title"=>"Left"),
			array("img"=>HANA_IMAGES_URL.'crop-r.png', "id"=>"r", "title"=>"Right")
			),
			"std" => "c",
			"description" => 'This option is available when the thumbnail will be automatically generated from the preview image (when the "Thumbnail URL" field above is empty)- you can see above how the cropping settings will affect both portrait and landscape oriented images.'
			),
			
		array("type" => "close"),
		
		array("type" => "close")
		
	);
		
	hana_register_metabox( 'page-meta-boxes', 'Page Settings', 'page', $meta_page_box, 'normal', 'high');
	hana_register_metabox( 'portfolio-meta-boxes', 'Portfolio Settings', 'portfolio', $meta_portfolio_box, 'normal', 'high');
}