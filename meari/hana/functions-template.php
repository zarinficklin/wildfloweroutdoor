<?php
/**
 * @author Hana
 */
 
/**
 * Add additional script to print at footer
 */
function hana_enqueue_additional_script($script){
	global $hana_data;
	$hana_data->scripts_to_print[] = $script;
}

/**
 * Add additional style to print at footer
 */
function hana_enqueue_additional_style($style){
	global $hana_data;
	$hana_data->styles_to_print[] = $style;
}


/* ------------------------------------------------------------------------*
 * LOCALE AND TRANSLATION
 * ------------------------------------------------------------------------*/

load_theme_textdomain( HANA_SHORTNAME, get_template_directory() . '/languages' );



/**
 * Returns a text depending on the settings set. By default the theme gets uses
 * the texts set in the Translation section of the Options page. If multiple languages enabled,
 * the default language texts are used from the Translation section and the additional language
 * texts are used from the added .mo files within the lang folder.
 * @param $textid the ID of the text
 */
function hana_get_text($textid){

	$locale=get_locale();
	$int_enabled=get_option(HANA_SHORTNAME.'_enable_translation')=='on'?true:false;
	$default_locale=get_option(HANA_SHORTNAME.'_def_locale');

	if($int_enabled && $locale!=$default_locale){
		//use translation - extract the text from a defined .mo file
		return __($textid, HANA_SHORTNAME);
	}else{
		//use the default text settings
		return stripslashes(get_option(HANA_SHORTNAME.$textid));
	}
}

function hana_get_resized_image($imgurl, $width, $height, $align='c'){
	$parsed_imgurl = parse_url( $imgurl );
	$parsed_site_url = parse_url( home_url() );
	$external_source = false;
	if ( array_key_exists('host', $parsed_imgurl) && ( str_replace( 'www.', '', $parsed_imgurl['host'] ) <> str_replace( 'www.', '', $parsed_site_url['host'] ) ) ) $external_source = true;	
		
	if(!$external_source) $imgurl=hana_get_multisite_image_url($imgurl);
	
	if(!$external_source && hana_get_opt('_timthumb_image_resizing')!='on' && $align=='c')
		return hana_resize_image($imgurl, $width, $height, true);
	else
		return HANA_TIMTHUMB_URL.'?src='.$imgurl.'&h='.$height.'&w='.$width.'&zc=1&q=100&a='.$align;
}

function hana_get_multisite_image_url($imgurl='') {
	global $blog_id;

	if(function_exists('get_blogaddress_by_id')){
		//this is a WordPress Network (multi) site
		
		$imagePath = explode('/files/', $imgurl);
		if(isset($imagePath[1]))
			$imgurl=get_blogaddress_by_id(1).get_blog_option($blog_id,'upload_path').'/'.$imagePath[1];
	}
	return $imgurl;
}

function hana_resize_image( $thumb, $new_width, $new_height, $crop ){
	$info = pathinfo($thumb);
	$dir = $info['dirname'];
	$ext = $info['extension'];
	$name = wp_basename($thumb, ".$ext");
	$suffix = "{$new_width}x{$new_height}";
	$destfilename = "{$dir}/{$name}-{$suffix}.{$ext}";
	
	#get local name for use in file_exists() and get_imagesize() functions
	$localfile = preg_replace('#https?://.+?/#', $_SERVER['DOCUMENT_ROOT'].'/', $thumb);
	$checkfilename = str_replace( $name, $name . '-' . $new_width . 'x' . $new_height, $localfile );
	
	#check if we have an image with specified width and height
	if ( file_exists( $checkfilename ) ) return $destfilename;

	$size = @getimagesize( $localfile ); 
	if ( !$size ) return new WP_Error('invalid_image_path', __('Image doesn\'t exist'), $thumb);
	list($orig_width, $orig_height, $orig_type) = $size;
	
	if ( $orig_width > $new_width || $orig_height > $new_height ){
		if ( $orig_width < $new_width ) $new_width = $orig_width;
		if ( $orig_height < $new_height ) $new_height = $orig_height;

		$suffix = "{$new_width}x{$new_height}";
		$destfilename = "{$dir}/{$name}-{$suffix}.{$ext}";
		$checkfilename = preg_replace('#https?://.+?/#', $_SERVER['DOCUMENT_ROOT'].'/', $destfilename);
		
		#check if we have an image with new calculated width and height parameters
		if ( file_exists($checkfilename) ) return $destfilename; 
		else {
			$result = image_resize( $localfile, $new_width, $new_height, $crop );
			
			#extract the correct filename and replace it in $thumb
			if ( !is_wp_error( $result ) )
				$result = str_replace( $name, wp_basename($result, ".$ext"), $thumb );
			
			#returns resized image path or WP_Error ( if something went wrong during resizing )
			return $result;
		}
	}
	
	return $thumb;
}


/*this function allows for the auto-creation of post excerpts*/
function hana_truncate_post($amount,$echo=true,$post='') {
	global $shortname;
	
	if ( $post == '' ) global $post;
		
	$postExcerpt = '';
	$postExcerpt = $post->post_excerpt;
	
	if (get_option($shortname.'_use_excerpt') == 'on' && $postExcerpt <> '') { 
		if ($echo) echo $postExcerpt;
		else return $postExcerpt;	
	} else {
		$truncate = $post->post_content;
		
		$truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate);
		
		if ( strlen($truncate) <= $amount ) $echo_out = ''; else $echo_out = '...';
		$truncate = apply_filters('the_content', $truncate);
		$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
		$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
		
		$truncate = strip_tags($truncate); 
		
		if ($echo_out == '...') $truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
		else $truncate = substr($truncate, 0, $amount);

		if ($echo) echo $truncate,$echo_out;
		else return ($truncate . $echo_out);
	};
}


/*this function truncates titles to create preview excerpts*/
function hana_truncate_title($amount,$echo=true,$post='') {
	if ( $post == '' ) $truncate = get_the_title(); 
	else $truncate = $post->post_title; 
	if ( strlen($truncate) <= $amount ) $echo_out = ''; else $echo_out = '...';
	$truncate = mb_substr( $truncate, 0, $amount, 'UTF-8' );
	if ($echo) {
		echo $truncate;
		echo $echo_out;
	}
	else { return ($truncate . $echo_out); }
}


/*this function allows users to use the first image in their post as their thumbnail*/
function hana_first_image() {
	global $post, $posts;
	$img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$img = $matches [1] [0];

	return trim($img);
} 

/**
 * Prints the pagination. Checks whether the WP-Pagenavi plugin is installed and if so, calls
 * the function for pagination of this plugin. If not- shows prints the previous and next post links.
 */
function hana_print_pagination(){
	if(function_exists('wp_pagenavi')){
	 wp_pagenavi();
	}else{?>
<div id="blog_nav_buttons" class="navigation">
<div class="alignleft"><?php previous_posts_link('<span>&laquo;</span> '.hana_get_text('_previous_text')) ?></div>
<div class="alignright"><?php next_posts_link(hana_get_text('_next_text').' <span>&raquo;</span>') ?></div>
</div>
	<?php
	}
}

function hana_list_comment($comment, $args, $depth) {

	global $wpdb;
	$user_level = 8; //Default user level (1-10)
	$admin_emails = array(); //Hold Admin Emails

	//Search for the ID numbers of all accounts at specified user level and up
	$admin_accounts = $wpdb->get_results("SELECT * FROM $wpdb->usermeta WHERE meta_key = 'wp_user_level' AND meta_value >= $user_level ");

	//Get the email address for each administrator via ID number
	foreach ($admin_accounts as $admin_account){

		//Get database row for current user id
		$admin_info = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE ID = $admin_account->user_id");

		//Add current user's email to array
		$admin_emails[$admin_account->user_id] = $admin_info->user_email;
	}

	$GLOBALS['comment'] = $comment;

	?>
<li <?php comment_class(); ?>>
	<div class="comment-container">
		<div class="coment-box clearfix">
			<div class="comment-autor"><?php echo get_avatar($comment,$size='50',$default='' ); ?>
				<p class="coment-autor-name"><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?></p>
			</div>
			<div class="comment-text"><?php comment_text(); ?></div>
			<div class="comment-date post-info">
				<div class="alignleft no-caps"><?php printf(__('%1$s', HANA_SHORTNAME), get_comment_date(get_option('date_format'))); ?> &nbsp; /</div>
		
				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => 4, 'reply_text'=>hana_get_text('_reply_text'))));
					?></div>
					
					
			</div>
		
		</div>
	</div>
</li>
	<?php
}

//modify the comment counts to only reflect the number of comments minus pings
if( version_compare( phpversion(), '4.4', '>=' ) ) add_filter('get_comments_number', 'hana_comment_count', 0);
function hana_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$get_comments = get_comments( array('post_id' => $id, 'status' => 'approve') );
		$comments_by_type = &separate_comments($get_comments);
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}



/**
 * Tack on the blank option for urls not in the menu
 */
add_filter( 'wp_nav_menu_items', 'hana_dropdown_add_blank_item', 10, 2 );
function hana_dropdown_add_blank_item( $items, $args ) {
	if ( isset( $args->walker ) && is_object( $args->walker ) && method_exists( $args->walker, 'is_dropdown' ) ) {
		if ( ( ! isset( $args->menu ) || empty( $args->menu ) ) && isset( $args->theme_location ) ) {
			$theme_locations = get_nav_menu_locations();
			$args->menu = wp_get_nav_menu_object( $theme_locations[ $args->theme_location ] );
		}
		$title = isset( $args->dropdown_title ) ? wptexturize( $args->dropdown_title ) : '&mdash; ' . $args->menu->name . ' &mdash;';
		if ( ! empty( $title ) )
			$items = '<option value="" class="blank">' . apply_filters( 'dropdown_blank_item_text', $title, $args ) . '</option>' . $items;
	}
	return $items;
}


/**
 * Remove empty options created in the sub levels output
 */
add_filter( 'wp_nav_menu_items', 'hana_dropdown_remove_empty_items', 10, 2 );
function hana_dropdown_remove_empty_items( $items, $args ) {
	if ( isset( $args->walker ) && is_object( $args->walker ) && method_exists( $args->walker, 'is_dropdown' ) )
		$items = str_replace( "<option></option>", "", $items );
	return $items;
}


/**
 * Script to make it go (no jquery! (for once))
 */
add_action( 'wp_footer', 'hana_dropdown_javascript' );
function hana_dropdown_javascript() {
	if ( is_admin() ) return; ?>
	<script>
		var getElementsByClassName=function(a,b,c){if(document.getElementsByClassName){getElementsByClassName=function(a,b,c){c=c||document;var d=c.getElementsByClassName(a),e=b?new RegExp("\\b"+b+"\\b","i"):null,f=[],g;for(var h=0,i=d.length;h<i;h+=1){g=d[h];if(!e||e.test(g.nodeName)){f.push(g)}}return f}}else if(document.evaluate){getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e="",f="http://www.w3.org/1999/xhtml",g=document.documentElement.namespaceURI===f?f:null,h=[],i,j;for(var k=0,l=d.length;k<l;k+=1){e+="[contains(concat(' ', @class, ' '), ' "+d[k]+" ')]"}try{i=document.evaluate(".//"+b+e,c,g,0,null)}catch(m){i=document.evaluate(".//"+b+e,c,null,0,null)}while(j=i.iterateNext()){h.push(j)}return h}}else{getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e=[],f=b==="*"&&c.all?c.all:c.getElementsByTagName(b),g,h=[],i;for(var j=0,k=d.length;j<k;j+=1){e.push(new RegExp("(^|\\s)"+d[j]+"(\\s|$)"))}for(var l=0,m=f.length;l<m;l+=1){g=f[l];i=false;for(var n=0,o=e.length;n<o;n+=1){i=e[n].test(g.className);if(!i){break}}if(i){h.push(g)}}return h}}return getElementsByClassName(a,b,c)},
			dropdowns = document.getElementsByTagName( 'select' );
		for ( i=0; i<dropdowns.length; i++ )
			if ( dropdowns[i].className.match( '<?php echo apply_filters( 'dropdown_menus_class', 'dropdown-menu' ); ?>' ) ) dropdowns[i].onchange = function(){ if ( this.value != '' ) window.location.href = this.value; }
	</script>
	<?php
}


/**
 * Overrides the walker argument and container argument then calls wp_nav_menu
 */
function dropdown_menu( $args ) {
	// if non array supplied use as theme location
	if ( ! is_array( $args ) )
		$args = array( 'menu' => $args );

	// enforce these arguments so it actually works
	$args[ 'walker' ] = new DropDown_Nav_Menu();
	$args[ 'items_wrap' ] = '<select id="%1$s" class="%2$s ' . apply_filters( 'dropdown_menus_class', 'dropdown-menu' ) . '">%3$s</select>';

	// custom args for controlling indentation of sub menu items
	$args[ 'indent_string' ] = isset( $args[ 'indent_string' ] ) ? $args[ 'indent_string' ] : '&ndash;&nbsp;';
	$args[ 'indent_after' ] =  isset( $args[ 'indent_after' ] ) ? $args[ 'indent_after' ] : '';

	return wp_nav_menu( $args );
}


class DropDown_Nav_Menu extends Walker_Nav_Menu {

	// easy way to check it's this walker we're using to mod the output
	function is_dropdown() {
		return true;
	}

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */

	function start_lvl( &$output, $depth ) {
		$output .= "</option>";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl( &$output, $depth ) {
		$output .= "<option>";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'menu-item-depth-' . $depth;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_unique( array_filter( $classes ) ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		// select current item
		if ( apply_filters( 'dropdown_menus_select_current', true ) )
			$selected = in_array( 'current-menu-item', $classes ) ? ' selected="selected"' : '';

		$output .= $indent . '<option' . $class_names .' value="'. $item->url .'"'. $selected .'>';

		// push sub-menu items in as we can't nest optgroups
		$indent_string = str_repeat( apply_filters( 'dropdown_menus_indent_string', $args->indent_string, $item, $depth, $args ), ( $depth ) ? $depth : 0 );
		$indent_string .= !empty( $indent_string ) ? apply_filters( 'dropdown_menus_indent_after', $args->indent_after, $item, $depth, $args ) : '';

		$item_output = $args->before . $indent_string;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_dropdown_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth ) {
		$output .= apply_filters( 'walker_nav_menu_dropdown_end_el', "</option>\n", $item, $depth);
	}
}

?>