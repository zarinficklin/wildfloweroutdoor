<?php
/**
 * Sidebars
 *
 * Main functions for the sidebares manage.
 *
 * @author Hana
 */

$hana_sidebar_manager = new Hana_Sidebar_Manager();

/**
 * Retrieve all registered sidebars
 */
function hana_get_registered_sidebars(){
	global $hana_sidebar_manager;
	return $hana_sidebar_manager->get_registered_sidebars();
}

/**
 * Register a new sidebar
 */
function hana_register_sidebar($args){
	global $hana_sidebar_manager;
	$hana_sidebar_manager->add_sidebar($args);
}


/**
 * Prints a sidebar.
 * @param $name the name of the sidebar to print
 */
function print_sidebar($name){
	?>
	<div id="sidebar">
		<?php   
		if ( function_exists('dynamic_sidebar')) { 
		dynamic_sidebar($name);  
		}?>
	</div>
<?php
}


?>