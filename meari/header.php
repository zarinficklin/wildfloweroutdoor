<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type"	content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<!-- Set the viewport width to device width for mobile -->
 <meta name="viewport" content="width=device-width" />
<title>
<?php if (is_home() || is_front_page()) {
	if(hana_get_text('_seo_home_title') && hana_get_text('_seo_home_title')!="_seo_home_title"){
		echo hana_get_text('_seo_home_title').' '.hana_get_opt('_seo_separator').' '.bloginfo('name');
	} else if (get_bloginfo('description')) { echo get_bloginfo('name').' '.hana_get_opt('_seo_separator').' '.get_bloginfo('description'); 
	} else echo bloginfo('name');
} elseif (is_category()) {
	echo hana_get_text('_seo_category_title'); wp_title('&laquo; '.hana_get_opt('_seo_separator').' ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_tag()) {
	echo hana_get_text('_seo_tag_title'); wp_title('&laquo; '.hana_get_opt('_seo_separator').' ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_search()) {
	echo hana_get_text('_search_tag_title');
	echo the_search_query();
	echo '&laquo; '.hana_get_opt('_seo_separator').' ';
	echo bloginfo('name');
} elseif (is_404()) {
	echo '404 '; wp_title(' '.hana_get_opt('_seo_separator').' ', TRUE, 'right');
	echo bloginfo('name');
} else {
	echo wp_title(' '.hana_get_opt('_seo_separator').' ', TRUE, 'right');
	echo bloginfo('name');
} ?>
</title>

<!-- Description meta-->
<meta name="description" content="<?php if ((is_home() || is_front_page()) && hana_get_opt('_seo_description')) { echo (hana_get_opt('_seo_description')); }else{ bloginfo('description');}?>" />

<?php if(hana_get_opt('_seo_keywords')){ ?>
<!-- Keywords-->
<meta name="keywords" content="<?php echo hana_get_opt('_seo_keywords'); ?>" />
<?php } ?>

<?php 
//remove SEO indexation and following for the selected archives pages
if(is_archive() || is_search()){
	$pages=hana_get_multiopt('_seo_indexation');
	if((is_category() && in_array('category', $pages))
	|| (is_author() && in_array('author', $pages))
	|| (is_tag() && in_array('tag', $pages))
	|| (is_date() && in_array('date', $pages))
	|| (is_search() && in_array('search', $pages))){ ?>
	<!-- Disallow contain indexation on this page to remove duplicate content problems -->
	<meta name="googlebot" content="noindex,nofollow" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="msnbot" content="noindex,nofollow" />
	<?php }
}
?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo hana_get_opt('_favicon'); ?>" />
<link rel="icon" type="image/x-icon" href="<?php echo hana_get_opt('_favicon'); ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />

<?php 
// script
wp_deregister_script('jquery');
wp_enqueue_script( 'jquery', 		MEARI_SCRIPT_URL .'jquery.min.js');
wp_enqueue_script( 'prettyPhoto', 	MEARI_SCRIPT_URL .'jquery.prettyPhoto.min.js', array('jquery'));
wp_enqueue_script( 'main', 			MEARI_SCRIPT_URL . 'main.js', array('jquery'));
wp_localize_script( 'main', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

if (is_page_template('template-portfolio.php')) { 
	wp_enqueue_script("portfolio", 	MEARI_SCRIPT_URL.'portfolio.js');
} 

// cufon font
$enable_cufon=hana_get_opt('_enable_cufon');
if($enable_cufon=='on'){
	if(hana_get_opt('_custom_cufon_font')!=''){
		$font_file=hana_get_opt('_custom_cufon_font');
	}else{
		$font_file=MEARI_FONT_URL.hana_get_opt('_cufon_font');
	}
	wp_enqueue_script("hana-cufon", MEARI_SCRIPT_URL.'cufon-yui.js');
	wp_enqueue_script("hana-cufon-font", $font_file);
}

// style
wp_enqueue_style( '960_24_col', 	MEARI_CSS_URL . '960_24_col.css');
wp_enqueue_style( 'font', 			MEARI_CSS_URL . 'fonts/stylesheet.css');
wp_enqueue_style( 'prettyPhoto', 	MEARI_CSS_URL . 'prettyPhoto.css');

// Google fonts
if(hana_get_opt('_enable_google_fonts')!='off'){
	$fonts=hana_get_google_fonts();
	$i = 0;
	foreach($fonts as $font) {
		$i ++;
		wp_enqueue_style( 'hana-google-font-'.$i, 	$font);
	}
}

// slider
switch(hana_get_slider_type()) {
case 'nivoslider':
	wp_enqueue_script('nivo-slider', 	MEARI_SCRIPT_URL . 'jquery.nivo.slider.pack.js', array('jquery', 'jquery-ui-draggable'));
	wp_enqueue_script('touch-punch', 	MEARI_SCRIPT_URL . 'jquery.ui.touch-punch.min.js', array('jquery'));
	wp_enqueue_style( 'nivo-slider', 	MEARI_CSS_URL . 'nivo-slider.css');
	break;
case 'contentslider':
	wp_enqueue_script('cs-slider', 		MEARI_SCRIPT_URL . 'jquery.cslider.min.js', array('jquery'));
	wp_enqueue_style( 'cs-slider', 		MEARI_CSS_URL . 'cs-slider.css');
	break;
case 'elasticslider':
	wp_enqueue_script('elastic-slider', MEARI_SCRIPT_URL . 'jquery.eislideshow.min.js', array('jquery'));
	wp_enqueue_style( 'elastic-slider', MEARI_CSS_URL . 'elastic-style.css');
	break;
case 'supersizedslider':
	wp_enqueue_script('ss-slider', 		MEARI_SCRIPT_URL . 'supersized.3.2.7.min.js', array('jquery'));
	wp_enqueue_script('ss-shutter', 	MEARI_SCRIPT_URL . 'supersized.shutter.min.js', array('jquery', 'ss-slider'));
	wp_enqueue_style( 'ss-slider', 		MEARI_CSS_URL . 'supersized.css');
	wp_enqueue_style( 'ss-shutter', 	MEARI_CSS_URL . 'supersized.shutter.css');
	break;
case 'cycleslider':
	wp_enqueue_script('cycle-slider', 	MEARI_SCRIPT_URL . 'jquery.cycle.all.min.js', array('jquery'));
	wp_enqueue_style( 'cycle-slider', 	MEARI_CSS_URL . 'cycle-slider.css');
	break;
case 'productslider':
	wp_enqueue_script('mousewheel', 	MEARI_SCRIPT_URL . 'jquery.mousewheel.js', array('jquery'));
	wp_enqueue_script('cc-slider', 		MEARI_SCRIPT_URL . 'jquery.contentcarousel.min.js', array('jquery'));
	wp_enqueue_style( 'cc-slider', 		MEARI_CSS_URL . 'circular-products.css');
	wp_enqueue_style( 'jscrollpane', 	MEARI_CSS_URL . 'jquery.jscrollpane.css');
	break;
}

// cssLoader
wp_enqueue_style( 'cssLoader', 		MEARI_CSS_URL . 'cssLoader.php');
wp_enqueue_style( 'responsive', 	MEARI_CSS_URL . 'responsive.css');
?>
	
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<!-- enables nested comments in WP 2.7 -->

<?php wp_head(); ?>
</head>

<body <?php $class=hana_get_opt('_body_layout'); $class.=(hana_get_opt('_fixed_header')=='on')?' fixed-header':''; body_class( $class ); ?>><div id="body_wrapper">

<?php 
$lightbox_style=hana_get_opt('_lightbox_style');
?>
<script type="text/javascript">
hanaSite.ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";
hanaSite.enableCufon="<?php echo $enable_cufon; ?>";
hanaSite.lightboxStyle="<?php echo $lightbox_style; ?>";
jQuery(document).ready(function($){
	hanaSite.initSite();
});
</script>


<link rel="stylesheet" href="http://wildfloweroutdoor.com/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://wildfloweroutdoor.com/bootstrap/css/bootstrap-responsive.min.css">


<!-- ADDITONAL CODE BY ZARIN -->
<div class="wf-header">
	<div class="wf-container">
		<div class="wf-logo">
			<img src="http://hqbuilt.com/projects/wildflower/img/logo.png" />
		</div>
		<div class="cart-search-wrap">
			<div class="cart-nav">
				<p><a href="http://wildfloweroutdoor.com/store/?page_id=1436">My Account</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://wildfloweroutdoor.com/store/?page_id=1433">Shopping Cart</a></p>
			</div>
			<div class="wf-search">
				<!-- <div id="search_box"><?php get_template_part( 'searchform' ) ?></div> -->
			</div>
		</div>
	</div>
</div>


<ul class="main-nav container">
	<div class="dd-item">
		<a href="http://wildfloweroutdoor.com/"><ul style="padding:0;">HOME</ul></a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" style="cursor:pointer;" data-toggle="dropdown">MOUNTAIN <br/>BIKING</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=mountain-biking">View All</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=tops">Tops</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=bottoms">Bottoms</a></li>
		</ul>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">ROAD <br/>BIKING</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=road-biking">View All</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=tops-road-biking">Tops</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=bottoms-road-biking">Bottoms</a></li>
		</ul>
	</div>
	<div class="dd-item">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=skiing-and-snowboading ">SKIING &amp; <br/>SNOWBOARDING</a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">SHOES &amp; <br/>ACCESSORIES</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=shoes-and-accessories">View All</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=jewelry">Jewelry</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=cold-weather-gear">Cold weather gear</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=headwear">Headwear</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=electronics">Electronics</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=socks">Socks</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=water-bottles">Water Bottles</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=other">Other</a></li>
			
		</ul>
	</div>
	<div class="dropdown dd-item">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=bags-and-packs">BAGS &amp; <br/>PACKS</a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">APR&Egrave;S <br/>SPORT</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=tops-apres-sport">Tops</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=bottoms-apres-sport">Bottoms</a></li>
		</ul>
	</div>
	<div class="dropdown dd-item">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=training">TRAINING</a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">EVENT<br/>REGISTRATION</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/pedalfest-register/index.php">Wildflower Pedalfest</a></li>
			<li><a tabindex="-1" href="#">Wildflower Trailfest</a></li>
		</ul>
	</div>
	<div class="dropdown dd-item last">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=sale">SALE</a>
	</div>
</ul>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://wildfloweroutdoor.com/bootstrap/js/bootstrap.min.js"></script>
<!-- END ADDITIONAL CODE -->










<!-- START HEADER WRAPPER -->
<!--
<div id="header_wrapper">
	
    <div id="top_bar_wrapper">
    	<div class="container_24"><div class="grid_24">
        	<div class="welcome"><?php echo hana_get_opt('_topbar_text');?></div>
            <div id="info_nav">
            	<?php if( function_exists('meari_topcart')):?><ul class="dropdown-menu cartmenu">
            	<?php if( is_user_logged_in() ) :?>
                	<li><a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Logout', 'meari' ); ?></a></li>
                <?php
                    else :
                    	$my_account_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
                        $label = array();
                        $label[] = __( 'Login', 'meari' );
                        if ( get_option('woocommerce_enable_myaccount_registration')=='yes' )
                        	$label[] = __( 'Register', 'meari' );
                                    
                        if ( empty( $label ) )
                            $label = '';
                        else
                             $label = implode( '/', $label );
                ?>
                	<li><a href="<?php echo $my_account_url; ?>"><?php echo $label; ?></a></li>
                <?php endif;?>
                	<li class="cartlink"><?php meari_topcart();?></li>
                </ul><?php endif;?>
            	<?php $top_menu = array('theme_location' => 'top-menu', 'menu_class' => 'dropdown-menu');?>	
				<div class="hide-phone"><?php wp_nav_menu($top_menu);?></div>             
            </div>
        </div></div>
    </div>
    
    <div id="nav_wrapper">
    	<div class="container_24"><div class="grid_24">
        	<div id="header_logo">
            	<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="logo">
                	<?php $logo = (hana_get_opt('_logo_image') != '') ? hana_get_opt('_logo_image') : HEADER_IMAGE; ?>
                	<img src="<?php echo $logo;?>" alt="<?php bloginfo('name'); ?>" />
            	</a>
            </div>

            <div id="search_box"><?php get_template_part( 'searchform' ) ?></div>

            <div id="menu">
				<?php $main_menu = array('theme_location' => 'main-menu', 'menu_class' => 'dropdown-menu');?>	
                <div class="hide-phone"><?php wp_nav_menu($main_menu);?></div>
                <div class="show-phone"><?php dropdown_menu($main_menu,'top_dropdown_menu');?></div>
            </div>
        </div></div>
    </div>
    
</div>
-->
<!-- END HEADER WRAPPER -->

<!-- START MAIN WRAPPER -->
<div id="main_wrapper">
	<?php get_template_part('slider');?>
	<!-- <div id="shadow"></div> -->
	<div class="main"><div class="container_24">