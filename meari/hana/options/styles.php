<?php

$hana_styles_options=array(array(
"name" => "Style settings",
"type" => "title",
"img" => HANA_IMAGES_URL.'icon_style.png'
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"background", "name"=>"Background"), array("id"=>"color", "name"=>"Color"), array("id"=>"font", "name"=>"Typography"), array("id"=>"other", "name"=>"Other"))
),

/* ------------------------------------------------------------------------*
 * BACKGROUND OPTIONS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'background'
),

array(
"name" => "Body Layout",
"id" => HANA_SHORTNAME."_body_layout",
"type" => "select",
"options" => array(array("id"=>"stretched", "name"=>"Stretched"), array("id"=>"boxed", "name"=>"Boxed")),
"std" => "stretched",
"conditional" => "true"
),

array(
"name" => "Fixed Header",
"id" => HANA_SHORTNAME."_fixed_header",
"type" => "checkbox",
"std" => 'off',
"desc" => 'If "On" selected, the header will be scrolling.'
),

array(
"type" => "div",
"class" => HANA_SHORTNAME."_body_layout-boxed"
),

array(
"type" => "documentation",
"text" => '<p>If <big>"Boxed"</big> layout selected, <big>"Full Body Background"</big> will be used for the basic body background and <big>"Body Background"</big> will be used for the boxed content background. </p>'
),

array(
"type" => "block",
"title" => "Full Body Background"
),

array(
"type" => "bgset",
"name" => "Body",
"prefix" => "full_body",
"stds" => array("bg"=>"image", "bg_color"=>"4C4E52", "bg_image"=>MEARI_IMAGE_URL."bg.jpg", "bg_repeat"=>"repeat")
),

array(
"type" => "blockclose"
),

array(
"type" => "close"
),

array(
"type" => "block",
"title" => "Body Background"
),

array(
"type" => "bgset",
"name" => "",
"prefix" => "body",
"stds" => array("bg"=>"pattern", "bg_color"=>"E9E9E9", "bg_pattern"=>"pattern8.png")
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Top Bar Background"
),

array(
"type" => "bgset",
"name" => "Top Bar",
"prefix" => "top_bar",
"stds" => array("bg_color"=>"232323")
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Top Menu Dropdown Background"
),

array(
"type" => "bgset",
"name" => "Top Dropdown",
"prefix" => "top_menu_dropdown",
"set" => "color",
"stds" => array("bg_color"=>"333")
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Main Navigation Background"
),

array(
"type" => "bgset",
"name" => "Main Navigation",
"prefix" => "main_nav",
"stds" => array("bg"=>"image", "bg_color"=>"333", "bg_image"=>MEARI_IMAGE_URL."navigation.png", "bg_repeat"=>"repeat-x")
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Main Menu Dropdown Background"
),

array(
"type" => "bgset",
"name" => "Dropdown",
"prefix" => "main_menu_dropdown",
"set" => "color",
"stds" => array("bg_color"=>"333")
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Bottom Section Background"
),

array(
"type" => "bgset",
"name" => "Bottom",
"prefix" => "bottom",
"stds" => array("bg_color"=>"202020")
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Footer Background"
),

array(
"type" => "bgset",
"name" => "Footer",
"prefix" => "footer",
"stds" => array("bg_color"=>"090909")
),

array(
"type" => "blockclose"
),

array(
"name" => "Additional CSS styles",
"id" => HANA_SHORTNAME."_additional_styles",
"type" => "textarea",
"desc" => "You can insert some more additional CSS code here. If you would like to do some modifications to the theme's CSS, it is better to insert the modifications in this field rather than modifying the original style.css file, as the modifications in this field will remain saved trough the theme updates."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * Color
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'color',
),

array(
"type" => "block",
"title" => "General Text and Link Colors"
),

array(
"name" => "Body Text Color",
"id" => HANA_SHORTNAME."_body_text_color",
"type" => "color",
"std" => "5F5F5F",
"desc" => 'Main body text color affecting the entire site.'
),

array(
"name" => "Link Color",
"id" => HANA_SHORTNAME."_link_color",
"type" => "color",
"std" => "744C25",
"desc" => ' Main link color affecting the entire site.'
),

array(
"name" => "Link Hover Color",
"id" => HANA_SHORTNAME."_link_hover_color",
"type" => "color",
"std" => "686868",
"desc" => ' Main link hover color affecting the entire site.'
),

array(
"name" => "Headings Color",
"id" => HANA_SHORTNAME."_headings_color",
"type" => "color",
"std" => "444",
"desc" => 'This is the color for general H1, H2, H3, H4 ,H5 ,H6 Headings where applicable.'
),

array(
"name" => "Page Title Color",
"id" => HANA_SHORTNAME."_page_title_color",
"type" => "color",
"std" => "3F3F3F",
"desc" => ' This is the color for the title of pages/posts/archives, etc.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Header Area"
),

array(
"name" => "Welcome Text Color",
"id" => HANA_SHORTNAME."_welcome_color",
"type" => "color",
"std" => "929292",
"desc" => 'Select the color of top welcome text.'
),

array(
"name" => "Top Menu Link Color",
"id" => HANA_SHORTNAME."_top_menu_item_color",
"type" => "color",
"std" => "929292",
"desc" => 'Select the color of each item in top menu.'
),

array(
"name" => "Top Menu Link Hover Color",
"id" => HANA_SHORTNAME."_top_menu_item_hover_color",
"type" => "color",
"std" => "BFBFBF",
"desc" => 'Select the color of each item in top menu when the hover event is triggered.'
),

array(
"name" => "Top Menu Link Active Color",
"id" => HANA_SHORTNAME."_top_menu_item_active_color",
"type" => "color",
"desc" => 'Select the color of each item in main menu when the item is active.'
),

array(
"name" => "Main Menu Link Color",
"id" => HANA_SHORTNAME."_main_menu_item_color",
"type" => "color",
"std" => "CCC",
"desc" => 'Select the color of each item in the main navigation.'
),

array(
"name" => "Main Menu Link Hover Color",
"id" => HANA_SHORTNAME."_main_menu_item_hover_color",
"type" => "color",
"std" => "FFFFFF",
"desc" => 'Select the color of each item in the main navigation when the hover event is triggered.'
),

array(
"name" => "Main Menu Link Active Color",
"id" => HANA_SHORTNAME."_main_menu_item_active_color",
"type" => "color",
"std" => "8D8D8D",
"desc" => 'Select the color of each item in the main navigation when the item is active.'
),

array(
"name" => "Search Box Bg Color",
"id" => HANA_SHORTNAME."_search_box_bg_color",
"type" => "color",
"std" => "444",
"desc" => 'Select the bg color of search box in the header.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Store General Buttons"
),

array(
"name" => "General Button Text Color",
"id" => HANA_SHORTNAME."_general_button_text_color",
"type" => "color",
"std" => "FFF",
"desc" => 'Select the text color of buttons.'
),

array(
"name" => "General Button Background Color",
"id" => HANA_SHORTNAME."_general_button_bg_color",
"type" => "color",
"std" => "5C5C5C",
"desc" => 'Select the background color of buttons.'
),

array(
"name" => "Alt Button Text Color",
"id" => HANA_SHORTNAME."_alt_button_text_color",
"type" => "color",
"std" => "FFF",
"desc" => 'Select the text color of alt buttons.'
),

array(
"name" => "Alt Button Background Color",
"id" => HANA_SHORTNAME."_alt_button_bg_color",
"type" => "color",
"std" => "6B90A9",
"desc" => 'Select the background color of alt buttons.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Elements"
),

array(
"name" => "Tab, Accordion, Table",
"id" => HANA_SHORTNAME."_element_color",
"type" => "color",
"std" => "6B90A9",
"desc" => 'Select the scheme color of the elements(tab, accordion, table).'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Blog"
),

array(
"name" => "Post Title Color",
"id" => HANA_SHORTNAME."_post_title_color",
"type" => "color",
"std" => "3F3F3F",
"desc" => 'Select the color for blog post titles.'
),

array(
"name" => "Post Title Hover Color",
"id" => HANA_SHORTNAME."_post_title_hover_color",
"type" => "color",
"std" => "7C7C7C",
"desc" => 'Select the color for blog post titles, on the mouse over.'
),

array(
"name" => "Post Content Text Color",
"id" => HANA_SHORTNAME."_post_content_text_color",
"type" => "color",
"desc" => 'Text color affecting the post content.'
),

array(
"name" => "Post Content Link Color",
"id" => HANA_SHORTNAME."_post_content_link_color",
"type" => "color",
"desc" => 'Link color affecting the post content.'
),

array(
"name" => "Post Content Link Hover Color",
"id" => HANA_SHORTNAME."_post_content_link_hover_color",
"type" => "color",
"desc" => 'Link hover color affecting the post content.'
),

array(
"name" => "Post Content Headings Color",
"id" => HANA_SHORTNAME."_post_content_headings_color",
"type" => "color",
"desc" => 'This is the color for general H1, H2, H3, H4 ,H5 ,H6 Headings where applicable.'
),

array(
"name" => "Post Date and Time Box Color",
"id" => HANA_SHORTNAME."_post_date_bg_color",
"type" => "color",
"desc" => 'Select the bg color of post-date box.'
),

array(
"name" => "Post Date and Time Text Color",
"id" => HANA_SHORTNAME."_post_date_text_color",
"type" => "color",
"desc" => 'Select the text color of post date info.'
),

array(
"name" => "Post Comment Count Box Color",
"id" => HANA_SHORTNAME."_post_comment_bg_color",
"type" => "color",
"std" => "333",
"desc" => 'Select the bg color of post-comment box.'
),

array(
"name" => "Post Comment Count Text Color",
"id" => HANA_SHORTNAME."_post_comment_text_color",
"type" => "color",
"std" => "ffffff",
"desc" => 'Select the text color of post comment count info.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Portfolio"
),

array(
"name" => "Category Text Color",
"id" => HANA_SHORTNAME."_category_color",
"type" => "color",
"std" => "444",
"desc" => 'Select the color for the category text in portfolio gallery page.'
),

array(
"name" => "Active Category Text Color",
"id" => HANA_SHORTNAME."_active_category_color",
"type" => "color",
"std" => "D74A38",
"desc" => 'Select the color for the active category text in portfolio gallery page.'
),

array(
"name" => "Title Hover Bg Color",
"id" => HANA_SHORTNAME."_title_hover_bg_color",
"type" => "color",
"std" => "D74A38",
"desc" => 'Select the bg color(hover) for the portfolio item title in portfolio gallery page.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Shop"
),

array(
"name" => "Products Title Color",
"id" => HANA_SHORTNAME."_products_title_color",
"type" => "color",
"std" => "5F5F5F",
"desc" => 'Text color of the product titles.'
),

array(
"name" => "Price Tag Color",
"id" => HANA_SHORTNAME."_price_tag_color",
"type" => "color",
"std" => "4CB1CA",
"desc" => 'Select the bg color of the price tags.'
),

array(
"name" => "Sale Price Tag Color",
"id" => HANA_SHORTNAME."_sale_price_tag_color",
"type" => "color",
"std" => "F12B63",
"desc" => 'Select the bg color of the sale price tags.'
),

array(
"name" => "Product Content Text Color",
"id" => HANA_SHORTNAME."_product_content_text_color",
"type" => "color",
"desc" => 'Text color affecting the product tabs content such as description.'
),

array(
"name" => "Product Content Link Color",
"id" => HANA_SHORTNAME."_product_content_link_color",
"type" => "color",
"desc" => 'Link color affecting the product tabs content.'
),

array(
"name" => "Product Content Link Hover Color",
"id" => HANA_SHORTNAME."_product_content_link_hover_color",
"type" => "color",
"desc" => 'Link hover color affecting the product tabs content.'
),

array(
"name" => "Product Content Headings Color",
"id" => HANA_SHORTNAME."_product_content_headings_color",
"type" => "color",
"desc" => 'This is the color for general H1, H2, H3, H4 ,H5 ,H6 Headings where applicable.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Sidebar"
),

array(
"name" => "Sidebar Widget Titles Color",
"id" => HANA_SHORTNAME."_sidebar_widget_title_color",
"type" => "color",
"desc" => ' This is the color applied to the sidbar area widget titles.'
),

array(
"name" => "Sidebar Text Color",
"id" => HANA_SHORTNAME."_sidebar_text_color",
"type" => "color",
"desc" => ' This is the default text color applied to the sidebar area.'
),

array(
"name" => "Sidebar Link Color",
"id" => HANA_SHORTNAME."_sidebar_link_color",
"type" => "color",
"desc" => ' This is the sidebar area link color.'
),

array(
"name" => "Sidebar Link Hover Color",
"id" => HANA_SHORTNAME."_sidebar_link_hover_color",
"type" => "color",
"desc" => 'This is the sidebar area link hover color.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Bottom Area"
),

array(
"name" => "Bottom Titles Color",
"id" => HANA_SHORTNAME."_bottom_title_color",
"type" => "color",
"std" => "DED9CD",
"desc" => ' This is the color applied to the bottom area widget titles.'
),

array(
"name" => "Bottom Text Color",
"id" => HANA_SHORTNAME."_bottom_text_color",
"type" => "color",
"std" => "CCA782",
"desc" => ' This is the default text color applied to the bottom area.'
),

array(
"name" => "Bottom Link Color",
"id" => HANA_SHORTNAME."_bottom_link_color",
"type" => "color",
"std" => "8F887C",
"desc" => ' This is the bottom area link color.'
),

array(
"name" => "Bottom Link Hover Color",
"id" => HANA_SHORTNAME."_bottom_link_hover_color",
"type" => "color",
"std" => "C9C5BE",
"desc" => 'This is the bottom area link hover color.'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Footer Area"
),

array(
"name" => "Footer Text Color",
"id" => HANA_SHORTNAME."_footer_text_color",
"type" => "color",
"std" => "999",
"desc" => ' This is the default text color applied to the footer area.'
),

array(
"type" => "blockclose"
),


array(
"type" => "close"),

array(
"type" => "subtitle",
"id" => 'font'
),

array(
"type" => "block",
"title" => "Cufon Fonts"
),

array(
"name" => "Enable Cufon for headings",
"id" => HANA_SHORTNAME."_enable_cufon",
"type" => "checkbox",
"std" =>"off",
"desc" => "If it is enabled, you will be able to use another custom fonts for the headings. You will be able to
either select one of the default fonts that the theme comes with or upload your own font below."
),

array(
"name" => "Heading Cufon Font",
"id" => HANA_SHORTNAME."_cufon_font",
"type" => "select",
"options" => array(array('id'=>'andika.js','name'=>'Andika Basic'),array('id'=>'caviar_dreams.js','name'=>'Caviar Dreams'),array('id'=>'charis_sil.js','name'=>'Charis'),array('id'=>'chunk_five.js','name'=>'Chunk Five'),array('id'=>'comfortaa.js','name'=>'Comfortaa'),array('id'=>'droid_serif.js','name'=>'Droid Serif'), array('id'=>'kingthings_exeter.js','name'=>'Kingthings Exeter'), array('id'=>'luxy_sans.js','name'=>'Luxy Sans'), array('id'=>'sling.js','name'=>'Sling'), array('id'=>'vegur.js','name'=>'Vegur')),
"desc" => 'You can select one of the fonts that the theme goes with. In order the font to replace the default one
the "Enable Cufon" field above should be enabled.'
),

array(
"name" => "Custom Heading Font",
"id" => HANA_SHORTNAME."_custom_cufon_font",
"type" => "upload",
"desc" => 'You can upload your custom JavaScript font file here. You can generate the font here: http://cufon.shoqolate.com/generate/'
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Google API Fonts"
),

array(
"name" => "Enable Google Fonts",
"id" => HANA_SHORTNAME."_enable_google_fonts",
"type" => "checkbox",
"std" =>"on"
),

array(
"name"=>"Add Google Font",
"id"=>'google_fonts',
"type"=>"custom",
"button_text"=>'Add Font',
"fields"=>array(
	array('id'=>'hana_google_fonts_name', 'type'=>'textarea', 'name'=>'Font URL',"std"=>HANA_GOOGLE_FONTS)
),
"desc"=>"In this field you can add or remove Google Fonts to the theme. Please note that only the font
URL should be inserted here (the value that is set within the 'href' attribute of the embed link tag Google provides), not the whole embed link tag.
<b>Example:</b><br />
http://fonts.googleapis.com/css?family=Lato<br />
<br />In order to enable the new font for the theme, simply add its name before the other font names in the Font Family fields below."

),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Font Family"
),

array(
"type" => "documentation",
"text" => '<p>You can change the font family for the theme. If you have loaded a Google API font, you can insert its name here. </p>
<span>Notes:</span>
<p>1. If the font name contains an empty space, you have to surround its name with a quotation marks, for example: "Times New Roman"
<br />2. If Cufon font replacement is enabled above, the Cufon font selected will have higher priority than the fonts set in here
<br />3. The different font names should be separated by commas</p>'
),

array(
"name" => "Body font family",
"id" => HANA_SHORTNAME."_body_font_family",
"type" => "text",
"std" => "Helvetica, Arial, sans-serif",
"desc" => ''
),

array(
"name" => "Heading 1 font",
"id" => HANA_SHORTNAME."_heading_1_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"name" => "Heading 2 font",
"id" => HANA_SHORTNAME."_heading_2_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"name" => "Heading 3 font",
"id" => HANA_SHORTNAME."_heading_3_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"name" => "Heading 4 font",
"id" => HANA_SHORTNAME."_heading_4_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"name" => "Heading 5 font",
"id" => HANA_SHORTNAME."_heading_5_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"name" => "Heading 6 font",
"id" => HANA_SHORTNAME."_heading_6_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"name" => "Topmenu Font Family",
"id" => HANA_SHORTNAME."_topmenu_font",
"type" => "text",
"std" => "Tahoma, Geneva, sans-serif",
"desc" => ''
),

array(
"name" => "Main Menu Font Family",
"id" => HANA_SHORTNAME."_mainmenu_font",
"type" => "text",
"std" => "Tahoma, Geneva, sans-serif",
"desc" => ''
),

array(
"name" => "Page Title Font Family",
"id" => HANA_SHORTNAME."_page_title_font",
"type" => "text",
"std" => "'Androgyne Medium'",
"desc" => ''
),

array(
"name" => "Slogan/Intro Font Family",
"id" => HANA_SHORTNAME."_slogan_font",
"type" => "text",
"std" => "'Androgyne Medium'",
"desc" => ''
),

array(
"name" => "Sidebar Widget Title Font Family",
"id" => HANA_SHORTNAME."_sidebar_widget_title_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"name" => "Footer Widget Title Font Family",
"id" => HANA_SHORTNAME."_footer_widget_title_font",
"type" => "text",
"std" => "'Open Sans Condensed','Arial Narrow', serif",
"desc" => ''
),

array(
"type" => "blockclose"
),

array(
"type" => "block",
"title" => "Font Size"
),

array(
"name" => "Body Font Size",
"id" => HANA_SHORTNAME."_body_fontsize",
"type" => "text",
"std" => '13',
"desc" => ''
),

array(
"name" => "Heading 1 Font Size",
"id" => HANA_SHORTNAME."_heading_1_fontsize",
"type" => "text",
"std" => '24',
"desc" => ''
),

array(
"name" => "Heading 2 Font Size",
"id" => HANA_SHORTNAME."_heading_2_fontsize",
"type" => "text",
"std" => '21',
"desc" => ''
),

array(
"name" => "Heading 3 Font Size",
"id" => HANA_SHORTNAME."_heading_3_fontsize",
"type" => "text",
"std" => '18',
"desc" => ''
),

array(
"name" => "Heading 4 Font Size",
"id" => HANA_SHORTNAME."_heading_4_fontsize",
"type" => "text",
"std" => '16',
"desc" => ''
),

array(
"name" => "Heading 5 Font Size",
"id" => HANA_SHORTNAME."_heading_5_fontsize",
"type" => "text",
"std" => '14',
"desc" => ''
),

array(
"name" => "Heading 6 Font Size",
"id" => HANA_SHORTNAME."_heading_6_fontsize",
"type" => "text",
"std" => '12',
"desc" => ''
),

array(
"name" => "Topmenu Font Size",
"id" => HANA_SHORTNAME."_topmenu_fontsize",
"type" => "text",
"std" => '13',
"desc" => ''
),

array(
"name" => "Main Menu Font Size",
"id" => HANA_SHORTNAME."_mainmenu_fontsize",
"type" => "text",
"std" => '13',
"desc" => ''
),

array(
"name" => "Page Title Font Size",
"id" => HANA_SHORTNAME."_page_title_fontsize",
"type" => "text",
"std" => '40',
"desc" => ''
),

array(
"name" => "Blog Post Title Font Size",
"id" => HANA_SHORTNAME."_post_title_fontsize",
"type" => "text",
"std" => '36',
"desc" => ''
),

array(
"name" => "Product Title Font Size",
"id" => HANA_SHORTNAME."_product_title_fontsize",
"type" => "text",
"std" => '24',
"desc" => ''
),

array(
"name" => "Sidebar Widget Title Font Size",
"id" => HANA_SHORTNAME."_sidebar_widget_title_fontsize",
"type" => "text",
"std" => '15',
"desc" => ''
),

array(
"name" => "Footer Widget Title Font Size",
"id" => HANA_SHORTNAME."_footer_widget_title_fontsize",
"type" => "text",
"std" => '13',
"desc" => ''
),

array(
"type" => "blockclose"
),

array(
"type" => "close"),

array(
"type" => "subtitle",
"id" => 'other'
),

array(
"name" => "LightBox Style",
"id" => HANA_SHORTNAME."_lightbox_style",
"type" => "select",
"options" => array(array("id"=>"pp_default", "name"=>"Default"), array("id"=>"light_rounded", "name"=>"Light Rounded"), array("id"=>"dark_rounded", "name"=>"Dark Rounded"), array("id"=>"dark_square", "name"=>"Dark Square"), array("id"=>"light_square", "name"=>"Light Square"), array("id"=>"facebook", "name"=>"Facebook")),
"std" => 'pp_default',
"desc" => 'Select style of prettyphoto lightbox.'
),

array(
"name" => "Slider Loading Icon",
"id" => HANA_SHORTNAME."_slider_loading_icon",
"type" => "upload",
"std" => MEARI_IMAGE_URL."loading-animation.gif",
"desc" => 'Upload loading icon image for slider.'
),

array(
"type" => "close"),

array(
"type" => "close"));


hana_add_options($hana_styles_options);