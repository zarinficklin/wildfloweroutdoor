<?php

/**
 * CustomPage - this file contains ana manages the main functionality that is related
 * with custom pages. Custom pages are pages that allow adding items from selected post types.
 * The items data(fields) that should be added is set within an array and the custom pages
 * structure is built depending on the data set in that array.
 * @author Hana
 */
 
 
 

/**
 * This is a custom page class - it contains all fields that are needed for a custom page builder to build a page.
 * @author Hana
 *
 */
class Hana_CustomPage{

	var $post_type='none';
	var $fields=array();
	var $page_name='none';
	var $allow_multiinstance=false;
	var $parent_slug='none';
	var $preview_image='none';
	var $type='none';
	var $file_name='none';

	/**
	 * Main Constructor
	 * @param $post_type the custom post type that will represent the custom page
	 * @param $fields an array containing all the fields from which the main form structure will be built
	 * Example fields array:
	 * array(
	 *	array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
	 *	array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
	 *	array('id'=>'description', 'type'=>'textarea', 'name'=>'Image Description')
	 *	)
	 * @param $page_name the name of the page that will appear on the menu
	 * @param $allow_multiinstance a bool variable setting whether to allow creating multiple instances
	 * @param $parent_slug the slug of the parent menu item
	 * @param $preview_image the ID of the field that will be used for preview image of the items
	 * @param $type the type of the page content (slider, portfolio, etc.)
	 * @param $file_name the name of the file that will be used to display the data
	 */
	function Hana_CustomPage($post_type, $fields, $page_name, $allow_multiinstance, $parent_slug, $preview_image, $type, $file_name){
		$this->post_type=$post_type;
		$this->fields=$fields;
		$this->page_name=$page_name;
		$this->allow_multiinstance=$allow_multiinstance;
		$this->parent_slug=$parent_slug;
		$this->preview_image=$preview_image;
		$this->type=$type;
		$this->file_name=$file_name;
	}

}


/**
 * Custom page builder - this class contains the main functionality for building custom pages -
 * creating their main structure.
 * @author Hana
 *
 */
class Hana_CustomPage_Builder{

	var $custom_page=null;
	var $id_prefix='';
	var $templater=null;
	var $taxonomy='';
	var $suffix='';
	var $default='';
	var $nonce='';

	/**
	 * Main constructor
	 * @param $custom_page a custom page object whose data will be used to build the page
	 * @param $id_prefix a prefix for the custom page field data
	 * @param $suffix the custom term suffix 
	 * @param $default the default term name for the custom post type category
	 * @param $nonce the name of the nonce to be generated
	 */
	function Hana_CustomPage_Builder($custom_page, $id_prefix, $suffix, $default, $nonce){
		$this->custom_page=$custom_page;
		$this->id_prefix=$id_prefix;
		$this->suffix=$suffix;
		$this->default=$default;
		$this->nonce=$nonce;
	}

	/**
	 * Builds a page - calls the main functionality for creating the main structure of the
	 * custom page.
	 */
	function build_page(){
		$title='Default '.$this->custom_page->page_name;
		$category = get_term_by('name', $this->default, $this->custom_page->post_type.$this->suffix)->term_id;
		$this->templater=new Hana_Templater();
		$this->taxonomy=$this->custom_page->post_type.$this->suffix;
		$terms=get_terms($this->taxonomy, array('hide_empty'=>false, 'orderby'=>'id', 'order'=>'desc'));
		
		echo '<div class="custom-page-wrapper">';
		$this->print_heading();

		//display all the instances of the page
		foreach($terms as $term){
			echo $this->templater->get_before_custom_section($term->name);
			$this->print_custom_section($term->name, $term->term_id);
			echo $this->templater->get_after_custom_section();
		}

		echo '<input type="hidden" value="'.$this->taxonomy.'" id="taxnonomy_id" />
			  <input type="hidden" value="'.$this->custom_page->post_type.'" id="post_type" />
			  <input type="hidden" value="'.wp_create_nonce(HANA_NONCE).'" id="hana_nonce" />
		      </div>';
	}

	/**
	 * Prints the heading of the custom page- the main title and an "Add instance" button.
	 */
	function print_heading(){
		$html='';
		$html.='<h1>'.$this->custom_page->page_name.'</h1>';

		//if the page allows multiple instances, add an "Add instance" button
		if($this->custom_page->allow_multiinstance){
			$html.='<a class="button new-instance-button">Add New '.$this->custom_page->page_name.'</a>';
		}

		echo $html;
	}

	/**
	 * Prints the section that contains the form for adding new items
	 * @param $title the title of the section
	 * @param $cat_id the custom category id that corresponds to the custom section
	 */
	function print_custom_section($title, $cat_id){

		//build the section template
		echo $this->templater->get_custom_page_form_template($title, $cat_id, $this->custom_page, $this->id_prefix);
		$this->print_items($cat_id);

	}

	/**
	 * Prints the already added items to a section
	 * @param $cat_id the custom category id that corresponds to the custom section
	 */
	function print_items($cat_id){
		$args=array('numberposts' => -1, 
					'post_type' => $this->custom_page->post_type, 
					$this->taxonomy=>get_term($cat_id, $this->taxonomy)->slug);
		$posts = get_posts( $args );
		
		$ordered_posts=hana_get_ordered_post_list($posts, $cat_id,$this->custom_page->post_type);

		$html='<ul class="sortable">';
		foreach($ordered_posts as $post){
			$html.=$this->templater->get_custom_page_list_template($post, $this->custom_page, $this->id_prefix);
		}

		$html.='</ul>';
		echo $html;
	}

}


/**
 * This class contains some functionality for creating/updating different data structures
 * such as posts, taxonomies, terms etc.
 * @author Hana
 *
 */
class Hana_CustomData_Manager{

	/**
	 * Creates a custom post.
	 * @param $data an array that contains the data to be inserted
	 * @param $custom_page a custom page object that represents the current custom page
	 * @param $prefix the prefix of the fields in the form
	 * @param $sufix the category term suffix
	 */
	function insert_post($data, $custom_page, $prefix, $suffix){
		global $current_user;

		$title=isset($data[$prefix.'title'])?$data[$prefix.'title']:$data['default_title'];
		$content=isset($data[$prefix.'content'])?$data[$prefix.'content']:'';
		$post_type=$data['post_type'];
		$order=(isset($_POST['order'])&&$_POST['order'])?$_POST['order']:'';
		$cat_id=intval($data['category']);

		//Create post object
		$new_post = array(
		     'post_title' => $title,
		     'post_content' => $content,
		     'post_status' => 'publish',
		     'post_author' => $current_user->ID,
		  	 'post_type' =>$post_type
		);

		// Insert the post into the database
		$post_id=wp_insert_post( $new_post );

		$order.=','.$post_id;

		update_option('hana_order'.$cat_id.$post_type, $order);

		//set the category to the item
		wp_set_object_terms($post_id, $cat_id, $post_type.$suffix );


		$prefix_length=strlen($prefix);
		$post_keys=array_keys($data);
		foreach($post_keys as $key){
			//if this is a custom field (not a setting field)
			if(substr($key, 0, $prefix_length)==$prefix && $key!=$prefix.'_title' && $key!=$prefix.'_content'){
				add_post_meta($post_id, $key, $data[$key]);
			}
		}

		$post=get_post($post_id);
		return $post;
	}

	/**
	 * Edits a post (item).
	 * @param $data the data that corresponds to the post such as ID, title and other custom meta fields
	 * @param $prefix the custom meta id prefix, so that these fields can be distinguished apart the other fields in the post
	 */
	function edit_post($data, $prefix){
		$itemid=(int)$data['itemid'];
		$edited_post = array();
		$toEdit=false;  //whether the single post should be edited (if the title and content are set)

		foreach ($data as $key => $value){
			if(strpos($key, $prefix)!==false){
				//this is a custom value, insert it
				if($key==$prefix.'_title'){
					$edited_post['title'] = $value;
					$toEdit=true;
				}elseif($key==$prefix.'_content'){
					$edited_post['post_content'] = $value;
					$toEdit=true;
				}else{
					update_post_meta($itemid, $key, $value);
				}
			}
		}

		if($toEdit){
			wp_update_post( $edited_post );
		}
	}

	/**
	 * Deletes a term (instance) and all the items (posts) that belong to it.
	 * @param $id the ID of the term
	 * @param $taxonomy the taxonomy it belongs to
	 * @param $post_type the post type of the items that belong to this term
	 */
	function delete_term($id, $taxonomy,$post_type){
		$slug=get_term($id, $taxonomy)->slug;
		
		$posts = get_posts(array('post_type' => $post_type,
		$taxonomy=>$slug));

		//delete the posts
		foreach($posts as $post){
			wp_delete_post($post->ID);
		}

		//delete the category
		wp_delete_term( $id, $taxonomy);
	}

}


/**
 * This is the main class for managing custom pages. Its purpose is to build slider post type.
 * @author Hana
 */
   
class Hana_CustomPage_Manager{
	
	var $custom_pages = array();
	var $custom_posttypes = array();
	
	function Hana_CustomPage_Manager() {
		
		add_action('init', array(&$this, 'register_custom_posttypes'));
		add_action('admin_menu', array(&$this, 'add_custom_pages'));
		add_action('wp_ajax_hana_insert_post', array(&$this, 'insert_post'));
		add_action('wp_ajax_hana_add_instance', array(&$this, 'add_instance'));
		add_action('wp_ajax_hana_save_order', array(&$this, 'save_order'));
		add_action('wp_ajax_hana_detele_item', array(&$this, 'detele_item'));
		add_action('wp_ajax_hana_edit_item', array(&$this, 'edit_item'));
		add_action('wp_ajax_hana_detele_instance', array(&$this, 'detele_instance'));
	}
	
	
	/**
	 * Add a custom post types.
	 *
	 * @param $post_type the custom post type that will represent the custom page
	 * @param $fields an array containing all the fields from which the main form structure will be built
	 * Example fields array:
	 * array(
	 *	array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
	 *	array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
	 *	array('id'=>'description', 'type'=>'textarea', 'name'=>'Image Description')
	 *	)
	 * @param $page_name the name of the page that will appear on the menu
	 * @param $allow_multiinstance a bool variable setting whether to allow creating multiple instances
	 * @param $parent_slug the slug of the parent menu item
	 * @param $preview_image the ID of the field that will be used for preview image of the items
	 * @param $type the type of the page content (slider, portfolio, etc.)
	 * @param $file_name the name of the file that will be used to display the data
	 */
	function register_custompage( $post_type, $fields, $page_name, $allow_multiinstance, $parent_slug, $preview_image, $type, $file_name) {
		$this->custom_pages[$post_type] = new Hana_CustomPage($post_type, $fields, $page_name, $allow_multiinstance, $parent_slug, $preview_image, $type, $file_name);
		$this->custom_posttypes[] = $post_type;
	}
	
	
	function get_custompages() {
		return $this->custom_pages;
	}
	
	function get_custom_posttypes() {
		return $this->custom_posttypes;
	}
	
	
	
	/**
	 * Register all the custom post types that are needed for the custom pages.
	 */
	function register_custom_posttypes(){
			
		foreach($this->custom_posttypes as $posttype){
			$custom_taxonomy=$posttype.HANA_TERM_SUFFIX;
			//register the category
			register_taxonomy($custom_taxonomy,
			array($posttype),
			array(	"hierarchical" => true,
						"rewrite" => true,
						"query_var" => true,
						"show_in_nav_menus"=>false
			));
				
			if(!get_term_by('name', HANA_DEFAULT_TERM, $custom_taxonomy)){
				//insert a separate category for this post type
				wp_insert_term(HANA_DEFAULT_TERM, $custom_taxonomy);
			}
	
			//register the custom post type
			register_post_type( $posttype,
			array(
				 'public' => true,  
				 'show_ui' => false,  
				 'capability_type' => 'post',  
				 'hierarchical' => false,  
				 'exclude_from_search' => true,
				 'show_in_nav_menus'=>false,
				 'can_export' => true,
				 'taxonomies' => array($custom_taxonomy),
				 'supports' => array('title', 'editor', 'thumbnail', 'page-attributes') ) );
		}
	}

	/**
	 * Adds all the custom pages to the menu.
	 */
	function add_custom_pages(){
			
		foreach($this->custom_pages as $page){
			add_submenu_page( $page->parent_slug, $page->page_name, $page->page_name, 'delete_pages', $page->post_type, array(&$this, 'build_custom_page') );
		}
	}
	
	
	/**
	 * Builds a custom page - when the page is opened, an object from a manager class builds the page structure.
	 */
	function build_custom_page(){
		
		if(isset($_GET['page'])){	
			$pageid=$_GET['page'];
			$custom_page=$this->custom_pages[$pageid];
			$custom_page_builder=new Hana_CustomPage_Builder($custom_page, HANA_CUSTOM_PREFIX, HANA_TERM_SUFFIX, HANA_DEFAULT_TERM, HANA_NONCE);
			$custom_page_builder->build_page();
		}
	}
	
	
	/*********************/
	/*******  AJAX *******/
	/*********************/
	
	
	/**
	 * Inserts a post - this is the function that is called via AJAX request, when
	 * a new custom post should be inserted.
	 */
	function insert_post(){
		//check the nonce field for security
		check_ajax_referer(HANA_NONCE, 'nonce');
	
		global $current_user;
	
		$post_type=$_POST['post_type'];
		$custom_page=$this->custom_pages[$post_type];
	
		//insert the post
		$dataManager=new Hana_CustomData_Manager();
		$post=$dataManager->insert_post($_POST, $custom_page, HANA_CUSTOM_PREFIX, HANA_TERM_SUFFIX);
	
		//get the display template for the inserted post
		$templater=new Hana_Templater();
		echo $templater->get_custom_page_list_template($post, $custom_page, HANA_CUSTOM_PREFIX);
		die();
	
	}
	
	/**
	 * Creates a new instance of a custom page item - it is related with inserting a new
	 * category from the selected custom post type.
	 */
	function add_instance(){
	
		//check the nonce field for security
		check_ajax_referer(HANA_NONCE, 'nonce');
	
		//insert a new category(term) for the custom post type
		$res=wp_insert_term( $_POST['name'], $_POST['taxonomy']);
		$custom_page=$this->custom_pages[$_POST['post_type']];
	
		if($res instanceof WP_Error){
			$html='-1';
		}else{
			$templater=new Hana_Templater();
			$html=$templater->get_before_custom_section($_POST['name']);
			$html.=$templater->get_custom_page_form_template($_POST['name'], $res['term_id'], $custom_page, HANA_CUSTOM_PREFIX);
			$html.='<ul class="sortable"></ul>'.$templater->get_after_custom_section();
		}
	
		echo $html;
		die();
	
	}
	
	/**
	 * Saves the new order of the items - should be called via AJAX post request, 
	 * the following parameters should be set in the request:
	 * - order - the new order to be saved (as a string, separated by commas)
	 * - category - the category the items to be ordered belong to
	 */
	function save_order(){
		//check the nonce field for security
		check_ajax_referer(HANA_NONCE, 'nonce');
	
		if(isset($_POST['order'])&& $_POST['order'] && isset($_POST['category']) && $_POST['category'] && isset($_POST['posttype'])){
				update_option('hana_order'.$_POST['category'].$_POST['posttype'], $_POST['order']);
		}
	}
	
		
	/**
	 * Deletes an item and changes the saved item order not to contain this item. Should be called via AJAX post request, 
	 * the following parameters should be set in the request:
	 * - itemid - the ID of the item to be deleted
	 * - category - the category the item belongs to
	 */
	function detele_item(){
		//check the nonce field for security
		check_ajax_referer(HANA_NONCE, 'nonce');
	
		if(isset($_POST['itemid']) && isset($_POST['category']) && isset($_POST['posttype'])){
			$res=wp_delete_post($_POST['itemid']);
			if($res){
				//the item has been deleted successfully, update the new order value
				$order_option='hana_order'.$_POST['category'].$_POST['posttype'];
				$order_arr=explode(',',get_option($order_option));
				$new_order=remove_item_by_value($order_arr,$_POST['itemid']);
				update_option($order_option, implode(',',$new_order));
			}else{
				echo '-1';
				die();
			}
		}
	}
	
	/**
	 * Edits an item - Should be called via AJAX post request, 
	 * the following parameters should be set in the request:
	 * - itemid - the ID of the item to be edited
	 */
	function edit_item(){
		//check the nonce field for security
		check_ajax_referer(HANA_NONCE, 'nonce');
	
		if(isset($_POST['itemid'])&& $_POST['itemid']){
			$dataManager=new Hana_CustomData_Manager();
			$post=$dataManager->edit_post($_POST, HANA_CUSTOM_PREFIX);
		}
	}
	
	/**
	 * Deletes a group of items with their parent instance. Should be called via AJAX request, 
	 * the following parameters should be set in the request:
	 * - category - the category (term name) the slider represents
	 * - taxonomy - the taxonomy name
	 * - post_type - the type of the posts the slider contains
	 */
	function detele_instance(){
		//check the nonce field for security
		check_ajax_referer(HANA_NONCE, 'nonce');
	
		if(isset($_POST['category'])&& isset($_POST['taxonomy'])){
			$dataManager=new Hana_CustomData_Manager();
			$dataManager->delete_term($_POST['category'],$_POST['taxonomy'],$_POST['post_type']);
		}
	}
}


