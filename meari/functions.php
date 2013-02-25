<?php

define( 'MEARI_THEME_PATH', dirname(__FILE__).'/' );
define( 'MEARI_THEME_URL', get_template_directory_uri().'/' );
define( 'MEARI_CSS_URL', MEARI_THEME_URL.'css/' );
define( 'MEARI_SCRIPT_URL', MEARI_THEME_URL.'js/' );
define( 'MEARI_FONT_URL', MEARI_SCRIPT_URL.'fonts/' );
define( 'MEARI_IMAGE_URL', MEARI_THEME_URL.'images/' );


//main theme info constants
define("HANA_THEMENAME", 'Meari');
define("HANA_SHORTNAME", 'meari');

require_once MEARI_THEME_PATH . 'hana/core.php';			//the hana framework

require_once MEARI_THEME_PATH . 'includes/core.php';		//the theme funtion