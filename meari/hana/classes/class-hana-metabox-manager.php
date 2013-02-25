<?php
/**
 * This is the main class for managing metaboxes. Its purpose is to build metaboxes by a predefined
 * set of options. 
 * @author Hana
 */
   
class Hana_MetaBox_Manager{
	
	var $metaboxes = array();
	
	function Hana_MetaBox_Manager() {
		add_action( 'admin_enqueue_scripts', array(&$this,'load_meta_scripts'));
		add_action( 'add_meta_boxes', array(&$this,'register_metaboxes'));
		add_action( 'save_post', array(&$this,'save_postdata'));
		add_action( 'the_post', array(&$this,'load_post_meta'));
	}

	function load_meta_scripts( $hook_suffix ) {
		if ( in_array($hook_suffix, array('post.php','post-new.php')) ) {
			wp_enqueue_script('jquery-ui-tabs');
		}
	}
	
	
	/**
	 * Add a meta box to an edit form.
	 *
	 * @param string $id String for use in the 'id' attribute of tags.
	 * @param string $title Title of the meta box.
	 * @param string $page The type of edit page on which to show the box (post, page, link).             
	 * @param array $options_args All options to add into the metabox.
	 * @param string $context The context within the page where the boxes should show ('normal', 'advanced').
	 * @param string $priority The priority within the context where the boxes should show ('high', 'low').
	 */
	function register_metabox( $id, $title, $page, $options, $context = 'advanced', $priority = 'default' ) {
		
		$this->metaboxes[$id] = array(
			'title' => $title,
			'page' => $page,
			'options' => $options,
			'context' => $context,
			'priority' => $priority
		);
	}
	
	/**
	 * Get metaboxes
	 */
	function get_metaboxes() {
		return $this->metaboxes;
	}
	
	/**
	 * Register all metaboxes registered in the theme.
	 */
	function register_metaboxes() {	
		if(!empty($this->metaboxes)) foreach ( $this->metaboxes as $id => $the_ )
			add_meta_box('hana-'.$id, '<div class="icon-small"></div> '.HANA_THEMENAME.' '.$the_['title'], array(&$this,'print_metabox'), $the_['page'], $the_['context'], $the_['priority'], $the_['options'] );
	}
	
	
	/**
	 * Callback to print the meta box
	 * @param $metabox the callback args
	 */
	function print_metabox($post, $metabox) {
		$options = $metabox['args'];
		$html = '';
		if(!empty($options)) foreach ( $options as $option ) {
			switch($option['type']) {
				case 'open':
					$this->print_subnavigation($post, $option);	break;
				case 'subtitle':
					$this->print_subtitle($post, $option); break;
				case 'blockopen':
					$this->print_block($post, $option); break;
				case 'div':
					$this->print_div($post, $option); break;
				case 'close':
				case 'blockclose':
					$this->print_close($post, $option); break;
				case 'desc':
					$this->print_desc($post, $option); break;
				case 'text':
					$this->print_text($post, $option); break;
				case 'upload':
					$this->print_upload($post, $option); break;
				case 'textarea':
					$this->print_textarea($post, $option); break;		
				case 'imageradio':
					$this->print_imageradio($post, $option); break;		
				case 'select':
					$this->print_select($post, $option); break;		
			}
		}			
	}
	
	function print_subnavigation($post, $meta) {
		echo '<div class="hana-panel-wrap">';
		if($meta['subtitles']){
			echo '<ul class="meta-tabs tabs">';
			foreach($meta['subtitles'] as $subtitle){
				if(!empty($subtitle['options'])) $class=implode(' ',$subtitle['options']);
				else $class='general';
				echo '<li class="'.$class.'"><a href="#tab-'.$subtitle['id'].'" class="tab"><span>'.$subtitle['name'].'</span></a></li>';
			}
			echo '</ul>';
	 	}
	}
	
	function print_subtitle($post, $meta){
		echo '<div id="tab-'.$meta['id'].'" class="sub-navigation-container">';
	}
	
	function print_block($post, $meta) {
		if(!empty($meta['options'])) $class=implode(' ',$meta['options']);
		else $class='';
		echo '<div class="options-block '.$class.'">';
	}
	
	function print_div($post, $meta) {
		if(is_array($meta['class'])) $class = implode(' ', $meta['class']); else $class = $meta['class'];
		echo '<div class="'.$class.'">';
	}
	
	function print_close($post, $meta) {
		echo '</div>';
	}
	
	function print_desc($post, $meta) {
		$html = '<div class="option-container">';
		$html .= '<label class="page-option-title">'.$meta['title'].'</label>';
		if(isset($meta['description'])) $html .= '<span class="option-description">'.$meta['description'].'</span>';
		$html .= '<div class="clear"></div></div>';
		echo $html;
	}
	
	function print_text($post, $meta) {
		$meta_value = get_post_meta($post->ID, $meta['name'].'_value', true);
	
		if($meta_value == "" && isset($meta['std']))
			$meta_value = $meta['std'];
		
		$html = '<div class="option-container">';
		$html .= '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	
		$html .= '<label class="page-option-title">'.$meta['title'].'</label>';
	
		$html .= '<input type="text" name="'.$meta['name'].'_value" value="'.$meta_value.'" class="option-input"/>';
	
		if(isset($meta['description'])) $html .= '<span class="option-description">'.$meta['description'].'</span>';
		$html .= '<div class="clear"></div></div>';
		echo $html;
	}
	
	function print_upload($post, $meta) {
		$meta_value = get_post_meta($post->ID, $meta['name'].'_value', true);
	
		if($meta_value == "" && isset($meta['std']))
			$meta_value = $meta['std'];
		
		$html = '<div class="option-container">';
		$html .= '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	
		$html .= '<label class="page-option-title">'.$meta['title'].'</label>';
	
		$html .= '<input type="text" name="'.$meta['name'].'_value" value="'.$meta_value.'" id="hana-'.$meta['name'].'" class="option-input upload hana-upload"/>';
	
		$html .= '<input type="button" id="hana-'.$meta['name'].'_button" class="button-primary hana-upload-btn" value="Upload Image" />';
		$html .= '<input type="button" id="hana-media" class="button-secondary" value="Use Media Library" onclick="hanaPageOptions.loadMediaImage(jQuery(\'#hana-'.$meta['name'].'\'));"/>';
					
		if(isset($meta['description'])) $html .= '<br /><span class="option-description">'.$meta['description'].'</span>';
		$html .= '<div class="clear"></div></div>';
		echo $html;
	}
	
	function print_textarea($post, $meta) {
		$meta_value = get_post_meta($post->ID, $meta['name'].'_value', true);
	
		if($meta_value == "" && isset($meta['std']))
			$meta_value = $meta['std'];
		
		$html = '<div class="option-container">';
		$html .= '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	
		$html .= '<label class="page-option-title">'.$meta['title'].'</label>';
	
		$html .= '<textarea name="'.$meta['name'].'_value" class="option-textarea" />'.$meta_value.'</textarea>';
	
		if(isset($meta['description'])) $html .= '<span class="option-description">'.$meta['description'].'</span>';
		$html .= '<div class="clear"></div></div>';
		echo $html;
	}
	
	function print_imageradio($post, $meta) {
		$meta_value = get_post_meta($post->ID, $meta['name'].'_value', true);
	
		if($meta_value == "" && isset($meta['std']))
			$meta_value = $meta['std'];
		
		$html = '<div class="option-container">';
		$html .= '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	
		$html .= '<label class="page-option-title">'.$meta['title'].'</label>';
	
		if(sizeof($meta['options'])>0){
			foreach ($meta['options'] as $option) { 
				$checked= $meta_value == $option['id']?'checked="checked"':'';
				$html .= '<div class="imageradio"><input type="radio" name="'.$meta['name'].'_value" value="'.$option['id'].'" '.$checked.'/><img src="'.$option['img'].'" title="'.$option['title'].'"/></div>';
			}
		}
	
		if(isset($meta['description'])) $html .= '<div class="clear"></div><span class="option-description">'.$meta['description'].'</span>';
		$html .= '<div class="clear"></div></div>';
		echo $html;
	}
	
	function print_select($post, $meta) {
		$meta_value = get_post_meta($post->ID, $meta['name'].'_value', true);
	
		if($meta_value == "" && isset($meta['std']))
			$meta_value = $meta['std'];
		
		$html = '<div class="option-container">';
		$html .= '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	
		$html .= '<label class="page-option-title">'.$meta['title'].'</label>';
		$html .= '<select name="'.$meta['name'].'_value" id="'.$meta['name'].'_value" class="'.((isset($meta['conditional']) && $meta['conditional'])?' option-conditional':'').'">';
	
					
		if(sizeof($meta['options'])>0){
			foreach ($meta['options'] as $option) { 
	$html .= '<option';
	if ( $meta_value == $option['id']) {
		$html .= ' selected="selected"';
	}
	if ($option['id']=='disabled') {
		$html .= ' disabled="disabled"';
	}
	
	if (isset($option['class'])) {
		$html .= ' class="'.$option['class'].'"';
	}
		$html .= ' value="'.$option['id'].'">'.$option['name'].'</option>';
	
			}
		}
		$html .= '</select>';
	
		if(isset($meta['description'])) $html .= '<span class="option-description">'.(isset($meta['description'])?$meta['description']:'').'</span>';
		$html .= '<div class="clear"></div></div>';
		echo $html;
	}
	
	/**
	 * Save the post data of metaboxes.
	 *
	 * @param int $post_id The id of post
	 */
	function save_postdata( $post_id ) {
		
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
			return $post_id;                 
		
		// get post type
		if ( !isset($_REQUEST['post_type']) )
			$post_type = 'post';
		elseif ( in_array( $_REQUEST['post_type'], get_post_types( array('show_ui' => true ) ) ) )
			$post_type = $_REQUEST['post_type'];
		else
			return;
		
		if ( 'page' == $post_type ) {
			if ( !current_user_can( 'edit_page', $post_id ) )
			  return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) )
			  return $post_id;
		}             
		
		if(!empty($this->metaboxes)) foreach($this->metaboxes as $box_id=>$metabox) {
			if($metabox['page'] != $post_type) continue;
			
			foreach($metabox['options'] as $option) 
				if(isset($option['name'])) $this->save_meta_data($option, $post_id);
		}
	}                         
	
	
	/**
	 * Saves the post meta for all types of posts.
	 * @param $option the meta data array
	 * @param $post_id the ID of the post
	 */
	function save_meta_data($option, $post_id) {
		
		//validate
		if ( !wp_verify_nonce( $_POST[$option['name'].'_noncename'], plugin_basename(__FILE__) ) ) return;
		
		if ( in_array($option['type'], array('heading','open','close'))) return;
	
		$data = $_POST[$option['name'].'_value'];
	
		if(get_post_meta($post_id, $option['name'].'_value') == "")
			add_post_meta($post_id, $option['name'].'_value', $data, true);
		elseif($data != get_post_meta($post_id, $option['name'].'_value', true))
			update_post_meta($post_id, $option['name'].'_value', $data);
		elseif($data == "")
			delete_post_meta($post_id, $option['name'].'_value', get_post_meta($post_id, $option['name'].'_value', true));
	}
	
	/**
	 * Returns the default value of a meta box.
	 * @param int $page_id the ID of the page to retrieve the meta data
	 * @param $name the name (ID) of the meta box
	 */
	function get_meta_std_value($post_id, $name) {
		$post_type = get_post_type($post_id);
		
		if(!empty($this->metaboxes)) foreach($this->metaboxes as $box_id=>$metabox) {
			if($metabox['page'] != $post_type) continue;
			
			foreach($metabox['options'] as $option) 
				if(isset($option["name"]) && $option["name"]==$name) return (isset($option["std"]))?$option["std"]:'';
		}
		return '';
	}

	/**
	 * Returns the saved meta data for a page of each of the given keys.
	 * @param int $page_id the ID of the page to retrieve the meta data
	 * @param array $keys an array containing all the keys whose values will be retrieved
	 */
	function get_post_meta($post_id, $keys) {	
		$res=array();
		if(is_array($keys) && !empty($keys)) foreach($keys as $key){
			$meta=get_post_meta($post_id, $key.'_value', true);
			if($meta!=''){
				$res[$key]=$meta;
			}else{
				//if the value is not saved, get the default value from the array
				$res[$key]=$this->get_meta_std_value($post_id, $key);
			}
		}
		elseif(!is_array($keys)) {
			$meta=get_post_meta($post_id, $keys.'_value', true);
			if($meta!=''){
				$res=$meta;
			}else{
				//if the value is not saved, get the default value from the array
				$res=$this->get_meta_std_value($post_id, $keys);
			}
		}	
		return $res;
	}
	
	/**
	 * Load post meta values
	 */
	function load_post_meta() {
		global $post, $hana_post_meta;
		
		$hana_post_meta = array();
		$post_type = get_post_type();
		$post_id = $post->ID;
		
		if(!empty($this->metaboxes)) foreach($this->metaboxes as $box_id=>$metabox) {
			if($metabox['page'] != $post_type) continue;
			
			foreach($metabox['options'] as $option) 
				if(isset($option['name']))
					$hana_post_meta[$option['name']] = $this->get_post_meta($post_id,$option['name']);
		}
	}
	
}


