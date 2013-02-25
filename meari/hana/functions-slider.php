<?php
/**
 * Slider - this file contains ana manages the main functionality that is related
 * with custom slider.
 * @author Hana
 */
 
$hana_custompage_manager = new Hana_CustomPage_Manager();


function hana_register_custompage( $post_type, $fields, $page_name, $allow_multiinstance, $parent_slug, $preview_image, $type, $file_name) {
	global $hana_custompage_manager;
	$hana_custompage_manager->register_custompage( $post_type, $fields, $page_name, $allow_multiinstance, $parent_slug, $preview_image, $type, $file_name);
}

/**
 * Returns all the main sliders data that are registered for the theme.
 */
function hana_get_custom_sliders(){
	global $hana_custompage_manager;
	$sliders=array();
	
	foreach($hana_custompage_manager->get_custompages() as $id=>$page){
		if($page->type==HANA_SLIDER_TYPE){
			$sliders[]=array('id'=>$id, 'name'=>$page->page_name, 'class'=>$id);
		}
	}
	return $sliders;
}

/**
 * Generates arrays containing all the sliders names, so that this data would be used in an drop down select.
 */
function hana_get_created_sliders(){
	$hana_slider_data=array();
	$hana_sliders=hana_get_custom_sliders();
	
	$hana_slider_data[]= array("name"=>"None", "id"=>"none");
	$hana_slider_data[]= array("name"=>"Static Image", "id"=>"static");
	$hana_slider_data[]= array("name"=>"Products Carousel", "id"=>"productslider");

	foreach($hana_sliders as $slider){
		$slider_id=$slider['id'];
		
		//the slider caption that will be shown in a select box as disabled
		$hana_slider_data[]=array('id'=>'disabled', 'name'=>$slider['name'], 'class'=>'caption');
		
		$terms=get_terms($slider_id.HANA_TERM_SUFFIX, array('hide_empty'=>false, 'orderby'=>'id', 'order'=>'desc'));
		//display all the instances of the page
		foreach($terms as $term){
			$name=$term->name==HANA_DEFAULT_TERM?$term->name.' '.$slider['name']:$term->name;
			$hana_slider_data[]=array('id'=>hana_generate_slider_id($slider_id, $term->slug), 'name'=>ucfirst($name));
		}
	}
	return $hana_slider_data;
}

function hana_generate_slider_id($name, $term_id){
	return $name.':'.$term_id;
}

/**
 * Creates an ordered post list - gets the unordered posts and the order string
 * saved as option that corresponds to those post group.
 * @param $posts the posts to be ordered
 * @param $cat_id the category the posts belong to
 * @return an array of the posts that ordered according to the saved order
 */
function hana_get_ordered_post_list($posts, $cat_id, $posttype){
	$new_post_array=array();

	$order=explode(',',get_option('hana_order'.$cat_id.$posttype));
	if(sizeof($order)!=sizeof($posts)){
		return $posts;
	}else{
		//make the post array key the ID of the post so that it can be accessed by ID
		foreach($posts as $post){
			$new_post_array[$post->ID]=$post;
		}
			
		foreach($order as $index){
			$ordered_post_array[]=$new_post_array[$index];
		}
	}

	return $ordered_post_array;
}

function hana_get_slider(){
	global $hana_page_options;

	if(isset($hana_page_options['slider']) && $hana_page_options['slider']!='none')
		return $hana_page_options['slider'];
}

function hana_get_slider_type(){
	
	$id=hana_get_slider();
	if(!$id) return false;
		
	$parts=explode(':', $id);
	$post_type=$parts[0];
	return $post_type;
}

function hana_get_slider_data(){
	global $hana_custompage_manager;
	
	$id=hana_get_slider();
	if(!$id) return false;
		
	$parts=explode(':', $id);
	$post_type=$parts[0];
	$category=$parts[1];
	$post_data=array();
	$post_data["name"]=$id;
	$post_data["type"]=$post_type;
	if(!post_type_exists($post_type) || !$category) return $post_data;
	
	$taxonomy=$post_type.HANA_TERM_SUFFIX;
	$cat_id=get_term_by('slug', $category, $taxonomy)->term_id;
	
	$args=array('numberposts' => -1, 
					'post_type' => $post_type, 
					$taxonomy=>$category);
					
	$posts = get_posts( $args );
	$ordered_posts=hana_get_ordered_post_list($posts, $cat_id, $post_type);
		
	//get the file name that will display the data
	$custompages = $hana_custompage_manager->get_custompages();
	$post_data['filename']=$custompages[$post_type]->file_name;
	$post_data['posts']=$ordered_posts;
	return $post_data;
}