<?php
/**
 * This is the main class for managing siddbars. Its purpose is to build sidebars by a predefined
 * set of sidebars. 
 * @author Hana
 */

class Hana_Sidebar_Manager{
	
	var $sidebars = array();
	
	function Hana_Sidebar_Manager() {
		/**
		 * ADD THE ACTIONS
		 */
		add_action('widgets_init', array(&$this,'load_sidebar'), 9);
		add_action('widgets_init', array(&$this,'register_all_sidebars'), 20);
	}
	
	/**
	 * Loads all the existing sidebars.
	 */
	function load_sidebar(){
				
		//there always should be one default sidebar
		$sidebars=array(array('name'=>'Default Sidebar', 'id'=>'default'));
	
		//get the sidebar names that have been saved as option
		$sidebar_strings=get_option('_sidebar_names');
		$generated_sidebars=explode(HANA_SEPARATOR, $sidebar_strings);
		array_pop($generated_sidebars);
	
		//add the generated sidebars to the default ones
		foreach($generated_sidebars as $sidebar)
			$sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar));
	
		//set the main sidebars to the global manager object
		$this->sidebars=$sidebars;
	}
	
	/**
	 * Registers all the sidebars that have been created.
	 */
	function register_all_sidebars(){
		if (function_exists('register_sidebar')){
			//register the sidebars
			foreach($this->sidebars as $sidebar){
				$this->register_sidebar($sidebar);
			}
		}
	}

	/**
	 * Registers a sidebar.
	 */
	function register_sidebar($args){
		$default_args = array(
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget' => '</div><div class="widget-divider"></div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		);
		$args = wp_parse_args( $args, $default_args );
		register_sidebar($args);
	}
	
	/**
	 * Retrieve all registered sidebars
	 */
	function get_registered_sidebars(){
		return $this->sidebars;
	}
	
	/**
	 * Add a new sidebar
	 */
	function add_sidebar($sidebar){
		$this->sidebars[] = $sidebar;
	}
	
}