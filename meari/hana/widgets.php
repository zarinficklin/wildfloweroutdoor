<?php
/**
 * Widgets
 *
 * Main functions for the widgets manage. 
 * 
 * @author Hana
 */
 
 
add_filter('widget_text', 'do_shortcode'); 

add_filter('widget_title','hana_widget_force_title');
function hana_widget_force_title( $title ){	
	#add an empty title for widgets ( otherwise it might break the sidebar layout )
	if ( $title == '' ) $title = ' ';
	
	return $title;
}
?>