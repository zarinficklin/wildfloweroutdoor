<?php
/**
 * This is the main class for managing options. Its purpose is to build an options page by a predefined
 * set of options. This class contains the functionality for printing the whole options page - its header,
 * footer and all the options inside.
 * @author Hana
 */
 
class Hana_Panel_Manager{

	var $options=array();
	var $before_option_title='<div class="option"><h4>';
	var $after_option_title='</h4>';
	var $before_option='<div class="option">';
	var $after_option='</div>';
	var $hana_images_url='';
	var $hana_version='';
	var $themename='';
	var $first_save='';
	
	/**
	 * The main constructor for the HanaOptionsManager class
	 * @param $themename the name of the the theme
	 * @param $options_url the URL of the options directory
	 * @param $images_url the URL of the functions directory
	 * @param $uploads_url the URL of the uploads directory
	 */
	function Hana_Panel_Manager($themename, $images_url, $version){
		$this->themename=$themename;
		$this->hana_images_url=$images_url;
		$this->hana_version=$version;
		$this->first_save=get_option(HANA_SHORTNAME.'_first_save');
		
		if ( isset($_GET['page']) && $_GET['page'] == HANA_OPTIONS_PAGE ){
			add_action('init', array(&$this,'save_options'), 20); 
		}
	}

	/**
	 * Returns the options array.
	 */
	function get_options(){
		return $this->options;
	}

	/**
	 * Adds an array of options to the current options array.
	 * @param $option_arr the array of options to be added
	 */
	function add_options($option_arr){
		foreach($option_arr as $option){
			if($option['type']=='bgset'){
				$this->add_bgset($option);
			}
			else
				$this->options[]=$option;
		}
	}
	
	function add_bgset($set) {
		if(!function_exists('get_bg_style_options')) return;
		$set_options = get_bg_style_options($set);
		if(!empty($set_options)) $this->add_options($set_options);
	}

	/**
	 * Sets the Hana Options save functionality.
	 */
	function save_options(){
		
		$nonsavable_types=array('open', 'close','subtitle','title','documentation','block','blockclose');
	
		//insert the default values if the fields are empty
		foreach ($this->options as $value) {
			if(isset($value['id']) && get_option($value['id'])===false && isset($value['std']) && !in_array($value['type'], $nonsavable_types)){
				update_option( $value['id'], $value['std']);
			}
		}
		
		//save the field's values if the Save action is present
		if ( $_GET['page'] == HANA_OPTIONS_PAGE ) {
			if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
				//verify the nonce
				if ( empty($_POST) || !wp_verify_nonce($_POST['hana-theme-options'],'hana-theme-update-options') )
				{
					print 'Sorry, your nonce did not verify.';
					exit;
				}else{
					if(!get_option(HANA_SHORTNAME.'_first_save')){
						update_option(HANA_SHORTNAME.'_first_save','true');
					}
					foreach ($this->options as $value) {
						if(isset($value['id']) ) if( isset( $_REQUEST[ $value['id'] ] ) &&  !in_array($value['type'], $nonsavable_types)) {
							update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
						} elseif(!in_array($value['type'], $nonsavable_types)){
							delete_option( $value['id'] );
						}
	
						/* Update the values for the custom options that contain unlimited suboptions - for example when having
						 * a slider with fields "title" and "imageurl", for all the entities the titles will be saved in one field,
						 * separated by a separator. In this case, if the field name is slider_title and it contains some data like
						 * title 1|*|title2|*|title3 (|*| is the separator), then all this data will be saved into a custom field
						 * with id slider_titles.
						 */
						if($value['type']=='custom'){
							foreach($value['fields'] as $field){
								update_option( $field['id'].'s', $_REQUEST[ $field['id'].'s' ] );
							}
						}
					}
					header("Location: admin.php?page=".HANA_OPTIONS_PAGE."&saved=true");
					die;
				}
			}
		}
	
	}
	
	/**
	 * Print the panel page
	 */
	function print_panel() {	
		if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] ) {
			$this->print_saved_message();
		}
		if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] ) {
			$this->print_reset_message();
		}
	
		$this->print_heading();
		$this->print_options();
		$this->print_footer();
	}

	/**
	 * Prints the heading of the options panel.
	 * @param $heading_text the welcoming heading text
	 */
	function print_heading(){
		if(isset($_GET['activated'])&&$_GET['activated']=='true'){
			echo '<div class="note_box">Welcome to '.$this->themename.' theme! On this page you can set the main options
			of the theme. For more information about the theme setup, please refer to the documentation included, which
			is located within the "documentation" folder of the downloaded zip file. We hope you will enjoy working with the theme!</div>';
		}
		echo '<div id="hana-content-container"><form method="post" id="hana-options">';
		if ( function_exists('wp_nonce_field') ){
			wp_nonce_field('hana-theme-update-options','hana-theme-options');
		}
		echo '<div id="sidebar"><div id="logo"></div><div id="navigation"><ul>';

		$i=1;
		foreach ($this->options as $value) {

			if($value['type']=='title'){
				echo '<li><span><a href="#navigation-'.$i.'"><img src="'.$value['img'].'" />'.$value['name'].'</a></span></li>';
				$i++;
			}
		}

		echo '</ul></div></div><div id="content"><div id="header"><h3 id="theme_name">'.$this->themename.' v.'.$this->hana_version.'</h3></div><div id="options_container">';
	}
	
	/**
	 * Prints the footer of the options panel.
	 */
	function print_footer(){
		echo '</div></div><div class="clear"></div><div id="hana-footer"><input type="hidden" name="action" value="save" />
			 <input type="submit" value="Save Changes" class="save-button" />
			 </div>	
			</form></div>';
	}

	/**
	 * Prints the options of the options panel.
	 */
	function print_options(){
		foreach ($this->options as $value) {
			$this->print_option($value);
		}
	}
	
	/**
	 * Checks the type of the option to be printed and calls the relevant printing function.
	 */
	function print_option($value){
		static $i=0;
		switch ( $value['type'] ) {
			case 'open':
				$this->print_subnavigation($value, $i);
				break;
			case 'subtitle':
				$this->print_subtitle($value, $i);
				break;
			case 'close':
				$this->print_close();
				break;
			case 'block':
				$this->print_block($value);
				break;
			case 'blockclose':
				$this->print_blockclose();
				break;
			case 'div':
				$this->print_div($value);
				break;
			case 'title':
				$i++;
				break;
			case 'text':
				$this->print_text_field($value);
				break;	
			case 'textarea':
				$this->print_textarea($value);
				break;
			case 'select':
				$this->print_select($value);
				break;
			case 'multicheck':
				$this->print_multicheck($value);
				break;
			case 'color':
				$this->print_color($value);
				break;
			case 'upload':
				$this->print_upload($value);
				break;
			case 'checkbox':
				$this->print_checkbox($value);
				break;
			case 'custom':
				$this->print_custom($value);
				break;
			case 'pattern':
				$this->print_stylebox($value, 'pattern');
				break;
			case 'stylecolor':
				$this->print_stylebox($value, 'color');
				break;
			case 'documentation':
				$this->print_text($value);	
				break;
		}
	}

	/**
	 * Prints the subnavigation tabs for each of the main navigation blocks.
	 * @param $value the option that contains the data that needs to be printed
	 * @param $i the index of the main navigation block to which the subnavigation belongs to
	 */
	function print_subnavigation($value, $i){
		echo '<div id="navigation-'.$i.'" class="main-navigation-container">';
		if($value['subtitles']){
			echo '<div id="tab_navigation-'.$i.'" class="tab_navigation"><ul>';
			foreach($value['subtitles'] as $subtitle){
				echo '<li><a href="#tab_navigation-'.$i.'-'.$subtitle['id'].'" class="tab"><span>'.$subtitle['name'].'</span></a></li>';
			}
			echo '</ul></div>';
	 	}
	}
	
	/**
	 * Prints a subtitle - a single tab title
	 * @param $value the option array that contains the data to be printed
	 * @param $i the index of the content block that will be opened when the tab is clicked
	 */
	function print_subtitle($value, $i){
		echo '<div id="tab_navigation-'.$i.'-'.$value['id'].'" class="sub-navigation-container">';
	}
	
	/**
	 * Prints a closing div tag.
	 */
	function print_close(){
		echo '</div>';
	}
	
	/**
	 * Prints a block div tag.
	 */
	function print_block($value){
		echo '<div class="options-block">';
		echo '<div class="handleblock" title="Click to toggle"><br></div>';
		echo '<h3>'.$value['title'].'</h3>';
		echo '<div class="inside">';
	}
	
	/**
	 * Prints a block closing div tag.
	 */
	function print_blockclose(){
		echo '</div></div>';
	}
	
	/**
	 * Prints a general div tag.
	 */
	function print_div($value){
		if(is_array($value['class'])) $class = implode(' ', $value['class']); else $class = $value['class'];
		echo '<div class="'.$class.'">';
	}
	
	/**
	 * Prints the code that goes after each option.
	 * @param $value the array that contains all the data for the option
	 */
	function close_option($value){
		if(!isset($value['desc'])) $value['desc']='';
		if (isset($value['std']) && $value['std']!='' && in_array($value['type'],array('text','color','upload')))
			$value['desc'] .= ' (default: '.$value['std'].')';
		if($value['desc'])
			echo '<a href="" class="help-button"><div class="help-dialog" title="'.$value['name'].'"><p>'.$value['desc'].'</p></div></a>';
		echo $this->after_option;
	}

	/**
	 * Prints a standart text field.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 *	array(
	 *	"name" => "Text Field Title",
	 *	"id" => $shortname."_test_textfield",
	 *	"type" => "text"
	 *	)
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_text_field($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
		if(isset($value['disabled']) && $value['disabled']=='disabled')
			$input_value = $value['std'];
		echo '<input class="option-input" name="'.$value['id'].'" id="'.$value['id'].'" type="'.$value['type'].'" value="'.$input_value.'" '.((isset($value['disabled']) && $value['disabled']=='disabled')?'disabled="disabled"':'').'/>';
		$this->close_option($value);
	}
	
	/**
	 * Prints a textarea.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 *	array(
	 *	"name" => "Textarea Name",
	 *	"id" => $shortname."_test_textarea",
	 *	"type" => "textarea")
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_textarea($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
		echo ' <textarea name="'.$value['id'].'" class="option-textarea" cols="" rows="">'.$input_value.'</textarea>';
		$this->close_option($value);
	}
	
	/**
	 * Prints a select drop down menu.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 *	array(
	 *	"name" => "Featured Category",
	 *	"id" => $shortname."_featured_cat",
	 *	"type" => "select",
	 *	"options" => array(array("name"=>"Option one", "id"=>1), array("name"=>"Option two", "id"=>2))
	 *	)
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_select($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
			
		echo '<select class="option-select'.((isset($value['conditional']) && $value['conditional'])?' option-conditional':'').'" name="'.$value['id'].'" id="'.$value['id'].'">';
		
		foreach ($value['options'] as $option) {
			$attr='';	
			 if ( get_option( $value['id'] ) == $option['id']) {
				$attr = ' selected="selected"';
			 }
		 	 if ( $option['id'] == 'disabled') {
				$attr.= ' disabled="disabled"';
			 }
			 if($option['class']){
				$attr.=' class="'.$option['class'].'"';			 	
			 }
			echo '<option '.$attr.' value="'.$option['id'].'">'.$option['name'].'</option>'; 
		} 
	
		echo '</select>';
		$this->close_option($value);
	}	
	
	
	/**
	 * Prints a multicheck widget.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 *	array(
	 *	"name" => "Exclude categories",
	 *	"id" => $shortname."_exclude_cat",
	 *	"type" => "multicheck",
	 *  "class" => "exclude", //exclude|include
	 *	"options" => array(array("name"=>"Option one", "id"=>1), array("name"=>"Option two", "id"=>2))
	 *	)
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_multicheck($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
		
		$checked_class=$value['class']==''?'include':$value['class'];
		echo '<input  name="'.$value['id'].'" id="'.$value['id'].'" type="hidden" value="'.$input_value.'" class="hidden-value" /><div class="option-check '.$checked_class.'">';
		
		$input_array=explode(',',$input_value);
		foreach ($value['options'] as $option) {
			$class='';	
			 if (in_array($option['id'], $input_array)) {
				$class = ' selected-check';
			 }
			echo '<div class="check-holder"><a href="" class="check'.$class.'" title="'.$option['id'].'"></a><span class="check-value">'.$option['name'].'</span></div>'; 
		} 
		echo '</div>';
	
		$this->close_option($value);
	}	
	
	/**
	 * Prints a text field with a color picker option.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 *	array(
	 *	"name" => "Headings color",
	 *	"id" => $shortname."_heading_color",
	 *	"type" => "color"
	 *	)
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_color($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
		echo '<span class="numbersign">&#35;</span><input class="option-input option-color" name="'.$value['id'].'" id="'.$value['id'].'" type="text" value="'.$input_value.'" />';
		echo '<div class="color-preview" style="background-color:#'.$input_value.'"></div>';
		$this->close_option($value);
	}
	
	/**
	 * Prints a text field with an upload button.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 *	array(
	 *	"name" => "Logo image",
	 *	"id" => $shortname."_logo_image",
	 *	"type" => "upload"
	 *	)
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_upload($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
		echo '<input class="option-input upload hana-upload" name="'.$value['id'].'" id="'.$value['id'].'" type="text" value="'.$input_value.'" />';
		echo '<div id="'.$value['id'].'_button" class="upload-button upload-logo hana-upload-btn" ><a class="hana-button alignright"><span>Upload</span></a></div><br/>';
		
		$this->close_option($value);
	}
	
	/**
	 * Prints a checkbox - this is the ON/OFF widget with an animation.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 *	array(
	 *	"name" => "Checkbox Title",
	 *	"id" => $shortname."_test_check",
	 *	"type" => "checkbox",
	 *	"std" => "off"
	 *	)
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_checkbox($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
		echo '<div class="on-off"><span></span></div>';
		if($input_value=='true'){
			$input_value='on';
		}
		if($input_value=='false'){
			$input_value='off';
		}
		echo '<input  name="'.$value['id'].'" id="'.$value['id'].'" type="hidden" value="'.$input_value.'" />';
		$this->close_option($value);
	}
	
	/**
	 * Prints a widget for selecting styles for the theme. Generally it prints different buttons with
	 * different styles set to them so that the user can select one of them. It can be mostly used for 
	 * selecting a color or a pattern from a given range.
	 * 
	 * EXAMPLE USAGE OF PATTERNS:
	 * ------------------------------------------------------------------------------------------
	 * array(
	 *	"name" => "Theme Pattern",
	 *	"id" => $shortname."_pattern",
	 *	"type" => "pattern",
	 *	"options" => $patterns
	 *	)
	 * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 * @param $type the type of the buttons, so far the supported values are "color" and "pattern"
	 */
	function print_stylebox($value, $type){
		
		echo $this->before_option_title.$value['name'].$this->after_option_title;
		$input_value = $this->get_field_value($value['id']);
		echo '<div class="styles-holder">';
		echo '<input  name="'.$value['id'].'" id="'.$value['id'].'" type="hidden" value="'.$input_value.'" /><ul>';
		
		$counter=0;
		foreach ($value['options'] as $option) {
			//set a style the option if this is an option for selecting a color or pattern 
			if($type=='pattern') {
				//this is a pattern, set a background image to it
				$style='background-image:url('.HANA_PATTERNS_URL.$option.');';
			}elseif($type=='color'){
				//this is a color, set background color to it
				$style='background-color:#'.$option.';';
			}
			$class=$option==$input_value?'selected-style':'';
			
			echo '<li style="'.$style.'" class="'.$class.'"><a class="style-box" title="'.$option.'" href=""></a></li>';
		} 
		echo '</ul></div>';
		$this->close_option($value);
	}
	
	/**
	 * Prints a custom set of fields with an Add button - this field will be mostly used when 
	 * several items that share the same data structure needs to be added. For example, this can be very
	 * useful for adding images to the slider with different options- title, link, etc.
	 * So far the fields that are supported by this function are text field, text field with upload button and a 
	 * textarea.
	 * 
	 * EXAMPLE USAGE:
	 * ------------------------------------------------------------------------------------------
	 * array(
	 *	"name"=>"Add Slider Image",
	 *	"id"=>'thumbnail_slider',
	 *	"type"=>"custom",
	 *	"button_text"=>'Add image',
	 *	"preview"=>"thumbnail_image_name",
	 *		"fields"=>array(
	 *			array('id'=>'thumbnail_image_name', 'type'=>'upload', 'name'=>'Image URL'),
	 *			array('id'=>'thumbnail_image_title', 'type'=>'text', 'name'=>'Image Title'),
	 *			array('id'=>'thumbnail_image_desc', 'type'=>'textarea', 'name'=>'Image Description')
	 *		)
	 *	)
     * ------------------------------------------------------------------------------------------
	 * @param $value the array that contains all the data for the option
	 */
	function print_custom($value){
		echo $this->before_option_title.$value['name'].$this->after_option_title.'<br/><br/><br/>';
		
		$field_ids=array();
		$field_names=array();
		$is_textarea=array();
		
		foreach($value['fields'] as $field){
			echo '<div class="custom-option"><span class="custom-heading">'.$field['name'].'</span>';
			switch($field['type']){
				case 'text':
					//print a standart text field
					echo '<input type="text" id="'.$field['id'].'" name="'.$field['id'].'"/>';
					$is_textarea[]="false";
				break;
				case 'upload':
					//print a field with an upload button
					echo '<input class="option-input upload" name="'.$field['id'].'" id="'.$field['id'].'" type="text" />';
					echo '<div id="'.$field['id'].'_button" class="upload-button upload-logo" ><a class="hana-button alignright"><span>Upload</span></a></div><br/>';
					echo '<script type="text/javascript">jQuery(document).ready(function($){
								hanaOptions.loadUploader(jQuery("div#'.$field['id'].'_button"));
						});</script>';
					$preview=$field['id'];
					$is_textarea[]="false";
				break;
				case 'textarea':
					//print a textarea
					echo '<textarea id="'.$field['id'].'" name="'.$field['id'].'"></textarea>';
					$is_textarea[]="true";
				break;
				case 'imageselect':
					//print a textarea
					echo '<div class="styles-holder images-select-holder" id="'.$field['id'].'_container">';
					echo '<input  name="'.$field['id'].'" id="'.$field['id'].'" type="hidden" /><ul>';
				
					$counter=0;
					foreach ($field['options'] as $key=>$option) {
						//$style='background-image:url('.$option.');';
						echo '<li><a class="style-box" title="'.$option.'" href=""><img src="'.$option.'" /></a>'.$key.'</li>';
					} 
					echo '</ul></div>';
					$is_textarea[]="false";
					break;
					break;
			}
			$saved_value=$this->get_field_value( $field['id'].'s');
			
			
			$saved_value=stripslashes($saved_value);
			//echo '<input type="hidden" name="'.$field['id'].'s" id="'.$field['id'].'s" value="'.$saved_value.'" /></div>';
			echo '<textarea style="display:none;" name="'.$field['id'].'s" id="'.$field['id'].'s">'.$saved_value.'</textarea></div>';
			$field_ids[]=$field['id'];
			$field_names[]=$field['name'];
		}
		
		//print the add button
		echo '<a class="hana-button custom-option-button" id="'.$value['id'].'_button"><span>'.$value['button_text'].'</span></a>';
		
		//print the list that will contain the added items
		echo '<ul id="'.$value['id'].'_list" class="sortable"></ul>';
		
		$idsString=implode('","', $field_ids);
		$namesString=implode('","', $field_names);
		$textareaString=implode(',', $is_textarea);
		
		//call the script that enables the functionality for adding custom fields
		echo '<script type="text/javascript">
			jQuery(document).ready(function($){
				hanaOptions.setCustomFieldsFunc("'.$value['id'].'", ["'.$idsString.'"], ["'.$namesString.'"], ['.$textareaString.'] , "'.((isset($value['preview']))?$value['preview']:'').'",  "'.HANA_TIMTHUMB_URL.'");
			});
		</script>';
		
		$this->close_option($value);
	}
	
	/**
	 * Gets the saved value for a field
	 * @param $id the ID of the field
	 */
	function get_field_value($id){
		return stripslashes(get_option( $id )); 
	}
	
	function print_text($value){
		echo $this->before_option;
		echo $value['text'];
		$this->close_option($value);
	}
	
	/**
	 * Prints the message that is displayed when the options have been saved
	 */
	function print_saved_message(){
		echo '<div class="note_box" id="saved_box">'.$this->themename.' settings saved.</div>';	
	}
	
	/**
	 * Prints the message that is displayed when the options have been reset
	 */
	function print_reset_message(){
		echo '<div><p>'.$this->themename.' settings reset.</p></div>';	
	}
	
}