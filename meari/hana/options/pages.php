<?php

//get all the categories
$categories=get_categories('hide_empty=0');
$hana_categories=array();
for($i=0; $i<sizeof($categories); $i++){
	$hana_categories[]=array('id'=>$categories[$i]->cat_ID, 'name'=>$categories[$i]->cat_name);
}

array_unshift($hana_categories, array('id'=>-1, 'name'=>'All Categories'));

$hana_sidebars = hana_get_registered_sidebars();
$hana_sliders = hana_get_created_sliders();

$hana_page_optionss_options= array( array(
"name" => "Page Settings",
"type" => "title",
"img" => HANA_IMAGES_URL."icon_home.png"
),


array(
"type" => "open",
"subtitles"=>array(array("id"=>"blog", "name"=>"Blog"), array("id"=>"post", "name"=>"Single Post"), array("id"=>"shop", "name"=>"Shop"), array("id"=>"product", "name"=>"Single Product"), array("id"=>"contact", "name"=>"Contact"), array("id"=>"login", "name"=>"Login"))
),

/* ------------------------------------------------------------------------*
 * BLOG PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'blog'
),

array(
"name" => "Blog Style",
"id" => HANA_SHORTNAME."_blog_style",
"type" => "select",
"options" => array(array('id'=>'default','name'=>'Default'), array('id'=>'fluid','name'=>'Fluid')),
"std" => 'default',
"desc" => 'If "Fluid" selected, full width layout will be used. This layout setting will affect the archives and search pages',
"conditional" => "true"
),
			
array(
"type" => "div",
"class" => HANA_SHORTNAME."_blog_style-default"
),

array(
"name" => "Blog Layout",
"id" => HANA_SHORTNAME."_blog_layout",
"type" => "select",
"options" => array(array('id'=>'right','name'=>'Right Sidebar'), array('id'=>'left','name'=>'Left Sidebar')),
"std" => 'right',
"desc" => 'This layout setting will affect the archives and search pages'
),

array(
"name" => "Sidebar",
"id" => HANA_SHORTNAME."_blog_sidebar",
"type" => "select",
"options" => $hana_sidebars,
"std" => 'default',
"desc" => 'This sidebar setting will affect the archives and search pages'
),

array(
"type" => "close"
),
			
array(
"type" => "div",
"class" => HANA_SHORTNAME."_blog_style-fluid"
),

array(
"name" => "Columns",
"id" => HANA_SHORTNAME."_blog_columns",
"type" => "select",
"options" => array('3'=>"3", '4'=>"4", '6'=>"6"),
"std" => '3'
),

array(
"type" => "close"
),

array(
"name" => "Header",
"id" => HANA_SHORTNAME."_blog_slider",
"type" => "select",
"options" => $hana_sliders,
"std" => 'none',
"desc" => 'If you have created additional sliders, you can select the name of the slider to be displayed
on the blog. By default the Default slider for each slider type is displayed.',
"conditional" => "true"
),
			
array(
"type" => "div",
"class" => HANA_SHORTNAME."_blog_slider-static"
),

array(
"name" => "Static Image URL",
"id" => HANA_SHORTNAME."_blog_static_image",
"type" => "upload",
"desc" => 'The header image URL when "Static Header Image" selected above.',
),

array(
"type" => "close"
),

array(
"name" => "Exclude categories from blog",
"id" => HANA_SHORTNAME."_exclude_cat_from_blog",
"type" => "multicheck",
"options" => $hana_categories,
"class"=>"exclude",
"desc" => "You can select which categories not to be shown on the blog"),

array(
"name" => "Number of posts per page",
"id" => HANA_SHORTNAME."_post_per_page_on_blog",
"type" => "text",
"std" => "6"
),


array(
"name" => "Show sections from post info",
"id" => HANA_SHORTNAME."_exclude_post_sections",
"type" => "multicheck",
"options" => array(array("id"=>"date", "name"=>"Post Date"), array("id"=>"author", "name"=>"Post Author"), array("id"=>"category", "name"=>"Post Category"), array("id"=>"tag", "name"=>"Post Tag"), array("id"=>"comments", "name"=>"Comment Number")),
"class"=>"exclude",
"desc" => "You can select which sections from the post info to be dispplayed.",
"std" => "")
,

array(
"name" => "Show post summary as",
"id" => HANA_SHORTNAME."_post_summary",
"type" => "select",
"options" => array(array('id'=>'readmore','name'=>"Separated with 'More' tag"), array('id'=>'excerpt','name'=>"Excerpt")),
"std" => 'excerpt',
"desc" => "This is the way the summary is displayed. Using the 'More' tag is more flexible than using the excerpt. With this
option selected, only the text that is displayed before the 'More' tag will be displayed as summary. 
You can insert a 'More' tag by using the 'Insert More tag' button that is located above the main content area.
<br /><br />With the Excerpt option
selected, only the first several words of the post will be displayed as summary."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SINGLE POST PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'post'
),

array(
"name" => "Page Layout",
"id" => HANA_SHORTNAME."_single_post_layout",
"type" => "select",
"options" => array(array('id'=>'right','name'=>'Right Sidebar'), array('id'=>'left','name'=>'Left Sidebar'), array('id'=>'full','name'=>'Full width')),
"std" => 'right',
"desc" => 'This is the layout of the single post page'
),

array(
"name" => "Sidebar",
"id" => HANA_SHORTNAME."_single_post_sidebar",
"type" => "select",
"options" => $hana_sidebars,
"std" => 'default',
"desc" => 'This is the sidebar that is displayed on the single post page.'
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SHOP PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'shop'
),

array(
"name" => "Page Layout",
"id" => HANA_SHORTNAME."_shop_layout",
"type" => "select",
"options" => array(array('id'=>'right','name'=>'Right Sidebar'), array('id'=>'left','name'=>'Left Sidebar'), array('id'=>'full','name'=>'Full width')),
"std" => 'right',
"desc" => 'This is the layout of the shop content page'
),

array(
"name" => "Sidebar",
"id" => HANA_SHORTNAME."_shop_sidebar",
"type" => "select",
"options" => $hana_sidebars,
"std" => 'default',
"desc" => 'This is the sidebar that is displayed on the shop content page.'
),


array(
"name" => "Header",
"id" => HANA_SHORTNAME."_shop_slider",
"type" => "select",
"options" => $hana_sliders,
"std" => 'none',
"desc" => 'If you have created additional sliders, you can select the name of the slider to be displayed
on the blog. By default the Default slider for each slider type is displayed.',
'conditional' => true
),
			
array(
"type" => "div",
"class" => HANA_SHORTNAME."_shop_slider-static"
),

array(
"name" => "Static Image URL",
"id" => HANA_SHORTNAME."_shop_static_image",
"type" => "upload",
"desc" => 'The header image URL when "Static Header Image" selected above.',
),

array(
"type" => "close"),

array(
"name" => "Number of products per page",
"id" => HANA_SHORTNAME."_post_per_page_on_shop",
"type" => "text",
"std" => "20"
),

array(
"name" => "Number of product columns",
"id" => HANA_SHORTNAME."_product_columns",
"type" => "text",
"std" => "4"
),

array(
"name" => "Product Style",
"id" => HANA_SHORTNAME."_product_style",
"type" => "select",
"options" => array(array('id'=>'traditional','name'=>'Traditional'), array('id'=>'modern','name'=>'Modern')),
"std" => 'modern',
"desc" => 'Select the style for the products list.'
),

array(
"name" => "Product Border Display",
"id" => HANA_SHORTNAME."_product_border",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If "ON" selected, the product border will be displayed.'
),

array(
"name" => "Product Name Display",
"id" => HANA_SHORTNAME."_product_name",
"type" => "checkbox",
"std" => 'on',
"desc" => 'Select if you want to show the product name on the products list.'
),

array(
"name" => "Product Price Display",
"id" => HANA_SHORTNAME."_product_price",
"type" => "checkbox",
"std" => 'on',
"desc" => 'Select if you want to show the price on the products list.'
),

array(
"name" => "Product Buttons Display",
"id" => HANA_SHORTNAME."_product_buttons",
"type" => "checkbox",
"std" => 'on',
"desc" => 'Select if you want to show the buttons ( Add to Cart) on the products list.'
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SINGLE PRODUCT PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'product'
),

array(
"name" => "Page Layout",
"id" => HANA_SHORTNAME."_single_product_layout",
"type" => "select",
"options" => array(array('id'=>'right','name'=>'Right Sidebar'), array('id'=>'left','name'=>'Left Sidebar'), array('id'=>'full','name'=>'Full width')),
"std" => 'full',
"desc" => 'This is the layout of the single product page'
),

array(
"name" => "Sidebar",
"id" => HANA_SHORTNAME."_single_product_sidebar",
"type" => "select",
"options" => $hana_sidebars,
"std" => 'default',
"desc" => 'This is the sidebar that is displayed on the single product page.'
),

array(
"name" => "Product Tabs Position",
"id" => HANA_SHORTNAME."_product_tabs_position",
"type" => "select",
"options" => array(array("id"=>"default", "name"=>"Default"), array("id"=>"below_summary", "name"=>"Below Summary")),
"std" => 'below_summary',
"desc" => 'If "Below Summary" selected, product tabs will be shown below product summary.'
),

array(
"name" => "Related Products Display",
"id" => HANA_SHORTNAME."_related_product_display",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If "ON" selected, the related products will be displayed.'
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * CONTACT PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'contact'
),

array(
"name" => "Email to which to send contact form message",
"id" => HANA_SHORTNAME."_email",
"type" => "text"),

array(
"name" => "Name text",
"id" => HANA_SHORTNAME."_name_text",
"type" => "text",
"std" => "Name"
),

array(
"name" => "Your e-mail text",
"id" => HANA_SHORTNAME."_your_email_text",
"type" => "text",
"std" => "Your e-mail"
),

array(
"name" => "Question text",
"id" => HANA_SHORTNAME."_question_text",
"type" => "text",
"std" => "Question"
),

array(
"name" => "Send text",
"id" => HANA_SHORTNAME."_send_text",
"type" => "text",
"std" => "Send"
),

array(
"name" => "Message sent text",
"id" => HANA_SHORTNAME."_message_sent_text",
"type" => "text",
"std" => "Message sent"
),

array(
"name" => "Validation error message",
"id" => HANA_SHORTNAME."_contact_error",
"type" => "text",
"std" => "Please fill in all the fields correctly."
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * LOGIN PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'login'
),

array(
"name" => "Login Page Style",
"id" => HANA_SHORTNAME."_login_page_style",
"type" => "select",
"options" => array(array("id"=>"classic", "name"=>"Classic"), array("id"=>"modern", "name"=>"Modern")),
"std" => 'modern',
"desc" => 'If "Modern" selected, new clean login form will be displayed.',
"conditional" => "true"
),

array(
"type" => "div",
"class" => HANA_SHORTNAME."_login_page_style-modern"
),

array(
"name" => "Logo (Login Page)",
"id" => HANA_SHORTNAME."_login_page_logo",
"type" => "select",
"options" => array(array("id"=>"text", "name"=>"Text"), array("id"=>"image", "name"=>"Image")),
"std" => 'image',
"desc" => 'Select logo style that will be shown above login form in the login page.',
"conditional" => "true"
),

array(
"type" => "div",
"class" => HANA_SHORTNAME."_login_page_logo-text"
),

array(
"name" => "Logo Text",
"id" => HANA_SHORTNAME."_login_page_logo_text",
"type" => "text",
"std" => "MeariShop"
),

array(
"type" => "close"
),

array(
"type" => "div",
"class" => HANA_SHORTNAME."_login_page_logo-image"
),

array(
"name" => "Logo Text",
"id" => HANA_SHORTNAME."_login_page_logo_image",
"type" => "upload",
"std" => MEARI_IMAGE_URL."logo_small.png"
),

array(
"type" => "close"
),

array(
"type" => "block",
"title" => "Login Page Background"
),

array(
"type" => "bgset",
"name" => "",
"prefix" => "login_page",
"stds" => array("bg"=>"image", "bg_color"=>"5b6e38", "bg_image"=>MEARI_IMAGE_URL."login_bg.jpg")
),

array(
"type" => "blockclose"
),

array(
"type" => "close"
),

array(
"type" => "close"),


array(
"type" => "close"));

hana_add_options($hana_page_optionss_options);