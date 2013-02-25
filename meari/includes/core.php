<?php

define( 'MEARI_THEME_FUNC_DIR', 	get_template_directory() . '/includes/' );
define( 'MEARI_THEME_FUNC_DIR_URL', 	get_template_directory_uri() . '/includes/' );

require_once MEARI_THEME_FUNC_DIR . 'functions.php';
require_once MEARI_THEME_FUNC_DIR . 'theme-init.php';
require_once MEARI_THEME_FUNC_DIR . 'hook.php';
require_once MEARI_THEME_FUNC_DIR . 'post-types.php';
require_once MEARI_THEME_FUNC_DIR . 'shortcodes.php';

//widget
require_once MEARI_THEME_FUNC_DIR . 'widgets/widget-recent.php';


if ( ! function_exists( 'is_plugin_active' ) )
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) 
	require_once MEARI_THEME_FUNC_DIR . 'woocommerce.php';  