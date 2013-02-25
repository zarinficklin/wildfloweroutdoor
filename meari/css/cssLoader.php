<?php header("Content-type: text/css; charset: UTF-8"); 

require_once( '../../../../wp-load.php' );




/**--------------------------------------------------------------------*
 * SET THE BACKGROUND
 *---------------------------------------------------------------------*/

set_bg('body.boxed', 'full_body');						// full body background
set_bg('#body_wrapper', 'body');					// body background
set_bg('#top_bar_wrapper', 'top_bar');				// top bar background
set_bg('#top_bar_wrapper ul.dropdown-menu ul li, #top_bar_wrapper .dropdown-menu > ul ul li', 'top_menu_dropdown');	// top menu dropdown background
set_bg('#nav_wrapper', 'main_nav');					// main nav background
set_bg('#nav_wrapper ul.dropdown-menu ul li, #nav_wrapper .dropdown-menu > ul ul li', 'main_menu_dropdown');	// top menu dropdown background
set_bg('#bottom_content_wrapper', 'bottom');		// footer background
set_bg('#footer_wrapper', 'footer');				// footer background
set_bg('#da-slider', 'content_slider');				// content slider background


/**--------------------------------------------------------------------*
 * SET THE COLOR
 *---------------------------------------------------------------------*/
 
set_color('body', 'body_text_color');
set_color('a', 'link_color');
set_color('a:hover, .widget_nav_menu ul li.current-menu-item > a, ul li.current-cat > a', 'link_hover_color');
set_color('h1,h2,h3,h4,h5,h6,.order_details li strong', 'headings_color');
set_color('.page-title', 'page_title_color');
set_color('#top_bar_wrapper .welcome', 'welcome_color');
set_color('#info_nav li a', 'top_menu_item_color');
set_border_color('#info_nav .cartmenu li:first-child', 'top_menu_item_color');
set_color('#info_nav li a:hover', 'top_menu_item_hover_color');
set_color('#info_nav li.current-menu-item > a, #info_nav li.current-menu-ancestor > a', 'top_menu_item_active_color');
set_color('#menu li a', 'main_menu_item_color');
set_color('#menu li a:hover', 'main_menu_item_hover_color');
set_color('#menu li.current-menu-item > a, #menu li.current-menu-ancestor > a', 'main_menu_item_active_color');
set_bg_color('#search_box #s', 'search_box_bg_color');
set_color('input[type=button], input[type=submit], .button, #submit', 'general_button_text_color', true);
set_bg_color('input[type=button], input[type=submit], .button, #submit', 'general_button_bg_color');
set_color('.button-alt, .button.alt, .add_to_cart_button.product_type_simple', 'alt_button_text_color', true);
set_bg_color('.button-alt, .button.alt, .add_to_cart_button.product_type_simple', 'alt_button_bg_color');
set_bg_gradient('.tabs li a', 'element_color', '#5ba4a4', '#4e8c8a');
set_bg_color('.tabs li a:hover, .tabs.third li a:hover:after, .tabs.third:hover ~ .clear-shadow', 'element_color');
set_bg_color('#accordion h2.current, table th, .pricing-table .table-title', 'element_color');
set_color('.breadcrumbs li,.breadcrumbs li a', 'breadcrumbs_text_color');
set_color('.breadcrumbs li a:hover', 'breadcrumbs_hover_color');
set_color('.post-title, .post-title a', 'post_title_color');
set_color('.post-title a:hover', 'post_title_hover_color');
set_color('.post-content', 'post_content_text_color');
set_color('.post-content a', 'post_content_link_color');
set_color('.post-content a:hover', 'post_content_link_hover_color');
set_color('.post-content h1,.post-content h2,.post-content h3,.post-content h4,.post-content h5,.post-content h6', 'post_content_headings_color');
set_bg_color('.post-meta div.post-date', 'post_date_bg_color');
set_color('.post-meta div.post-date', 'post_date_text_color');
set_bg_color('.post-meta div.comment-count', 'post_comment_bg_color');
set_color('.post-meta div.comment-count p a', 'post_comment_text_color');
set_color('#portfolio-categories ul li, #portfolio-categories h6', 'category_color');
set_color('#portfolio-categories ul li.selected', 'active_category_color');
set_bg_color('.portfolio-hover, .image-link:hover span', 'title_hover_bg_color');
set_color('.products li .product-name', 'products_title_color');
set_bg_color('div.product div.images p.price, ul.products li.modern .price, .productslider-wrapper .price', 'price_tag_color');
set_bg_color('div.product .onsale ~ div.images p.price, ul.products li.modern .onsale ~ .price, .productslider-wrapper .onsale ~ .price', 'sale_price_tag_color');
set_bg_color('.variations_form .price', 'price_tag_color');
$price_tag_color = hana_get_opt('_price_tag_color');
	if($price_tag_color!='')
		echo '.variations_form .price:before {
			border-color:#'.$price_tag_color.' transparent;}
			.variations_form .price:after {
			border-color:transparent transparent transparent #'.$price_tag_color.';}
			';
set_color('div.product .woocommerce_tabs', 'product_content_text_color');
set_color('div.product .woocommerce_tabs a', 'product_content_link_color');
set_color('div.product .woocommerce_tabs a:hover', 'product_content_link_hover_color');
set_color('div.product .woocommerce_tabs h1,div.product .woocommerce_tabs h2,div.product .woocommerce_tabs h3,div.product .woocommerce_tabs h4,div.product .woocommerce_tabs h5,div.product .woocommerce_tabs h6, #review_form #respond #reply-title', 'product_content_headings_color');
set_color('#sidebar .widgettitle', 'sidebar_widget_title_color');
set_color('#sidebar', 'sidebar_text_color');
set_color('#sidebar a', 'sidebar_link_color');
set_color('#sidebar a:hover, #sidebar .widget_nav_menu ul li.current-menu-item > a, #sidebar ul li.current-cat > a', 'sidebar_link_hover_color');
set_color('.footer-widget .widgettitle', 'bottom_title_color');
set_color('#bottom_content', 'bottom_text_color');
set_color('#bottom_content a', 'bottom_link_color');
set_color('#bottom_content a:hover, #bottom_content .widget_nav_menu ul li.current-menu-item > a, #bottom_content ul li.current-cat > a', 'bottom_link_hover_color');
set_color('#copyrights', 'footer_text_color');
set_border_color('#da-slider', 'content_slider_nav_color');
set_bg_color('#da-slider .da-arrows span', 'content_slider_nav_color');
set_bg_color('#da-slider .da-dots span', 'content_slider_nav_color');
set_bg_image('#nivo-slider, .ei-slider-loading, #supersized-loader, .elegant-loader', 'slider_loading_icon', true);

/**--------------------------------------------------------------------*
 * FONTS
 *---------------------------------------------------------------------*/

set_font_family('body', 'body_font_family');
set_font_family('h1', 'heading_1_font');
set_font_family('h2', 'heading_2_font');
set_font_family('h3', 'heading_3_font');
set_font_family('h4', 'heading_4_font');
set_font_family('h5', 'heading_5_font');
set_font_family('h6', 'heading_6_font');
set_font_family('#info_nav li a', 'topmenu_font');
set_font_family('#menu li a', 'mainmenu_font');
set_font_family('.page-title, .post-title, .post-title a', 'page_title_font');
set_font_family('#slogan h1, #slogan h2, #slogan h3, #slogan h4, #slogan h5, #slogan h6, .intro h1, .intro h2, .intro h3, .intro h4, .intro h5, .intro h6', 'slogan_font');
set_font_family('#sidebar .widgettitle', 'sidebar_widget_title_font');
set_font_family('.footer-widget .widgettitle', 'footer_widget_title_font');
set_font_size('body', 'body_fontsize');
set_font_size('h1', 'heading_1_fontsize');
set_font_size('h2', 'heading_2_fontsize');
set_font_size('h3', 'heading_3_fontsize');
set_font_size('h4', 'heading_4_fontsize');
set_font_size('h5', 'heading_5_fontsize');
set_font_size('h6', 'heading_6_fontsize');
set_font_size('#info_nav li a', 'topmenu_fontsize');
set_font_size('#menu li a', 'mainmenu_fontsize');
set_font_size('.page-title', 'page_title_fontsize');
set_font_size('.post-title, .post-title a', 'post_title_fontsize');
set_font_size('div.product .product_title', 'product_title_fontsize');
set_font_size('#sidebar .widgettitle', 'sidebar_widget_title_fontsize');
set_font_size('.footer-widget .widgettitle', 'footer_widget_title_fontsize');


/**--------------------------------------------------------------------*
 * ADDITIONAL STYLES
 *---------------------------------------------------------------------*/

if(hana_get_opt('_additional_styles')!=''){
	echo(hana_get_opt('_additional_styles'));
}
?>