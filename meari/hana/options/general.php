<?php
global $sociable_icons;
$sociable_icons=array('500px'=>'500px', 'about.me'=>'aboutdotme', 'AIM'=>'aim', 'Amazon'=>'amazon', 'BBC iD'=>'bbcid', 'Creative Commons'=>'creativecommons', 'Delicious'=>'delicious', 'Digg'=>'digg', 'Digg This'=>'digg-this', 'Dribbble'=>'dribbble', 'Dopplr'=>'dopplr', 'Email'=>'email', 'Etsy'=>'etsy', 'Facebook'=>'facebook', 'Feed'=>'feed', 'Ffffound'=>'ffffound', 'Flickr'=>'flickr', 'Formspring'=>'formspring', 'Forrst'=>'forrst', 'Foursquare'=>'foursquare', 'Get Satisfaction'=>'getsatisfaction', 'Geotag'=>'geotag', 'Github'=>'github', 'Goodreads'=>'goodreads', 'Google'=>'google', 'Google+'=>'google+', 'Google Talk'=>'google-talk', 'Huffduffer'=>'huffduffer', 'Identi.ca'=>'identica', 'iLike'=>'ilike', 'IMDb'=>'imdb', 'Instagram'=>'instagram', 'iTunes'=>'itunes', 'Lanyrd'=>'lanyrd', 'Last.fm'=>'lastfm', 'LinkedIn'=>'linkedin', 'Meetup'=>'meetup', 'Messenger'=>'messenger', 'MySpace'=>'myspace', 'Newsvine'=>'newsvine', 'Nike+'=>'nikeplus', 'OpenID'=>'openid', 'Orkut'=>'orkut', 'Pinboard'=>'pinboard', 'Pintrest'=>'pintrest', 'Plancast'=>'plancast', 'Posterous'=>'posterous', 'Rdio'=>'rdio', 'Readernaut'=>'readernaut', 'Reddit'=>'reddit', 'Share This'=>'share', 'Skype'=>'skype', 'SlideShare'=>'slideshare', 'Speaker Deck'=>'speakerdeck', 'Soundcloud'=>'soundcloud', 'Spotify'=>'spotify', 'Stack Overflow'=>'stackoverflow', 'StumbleUpon'=>'stumbleupon', 'Tumblr'=>'tumblr', 'Twitter'=>'twitter', 'Twitter Retweet'=>'twitter-retweet', 'Upcoming'=>'upcoming', 'vCard'=>'vcard', 'Viddler'=>'viddler', 'Vimeo'=>'vimeo', 'Website'=>'website', 'Wikipedia'=>'wikipedia', 'Xbox Live'=>'xbox', 'Xing'=>'xing', 'Yahoo!'=>'yahoo', 'Yahoo! Messenger'=>'yahoo-messenger', 'Yelp'=>'yelp', 'YouTube'=>'youtube', 'Zerply'=>'zerply', 'Zootool'=>'zootool');
foreach($sociable_icons as $key=>$value){
	$sociable_icons[$key]=HANA_FRONT_IMAGES_URL.'icons/'.$value.'-16x16.png';
}


/**
 * Load the patterns into arrays.
 */
global $patterns;
$patterns[0]='none';
for($i=1; $i<=34; $i++){
	$patterns[]='pattern'.$i.'.png';
}

$hana_general_options= array( array(
"name" => "General",
"type" => "title",
"img" => HANA_IMAGES_URL."icon_general.png"
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"main", "name"=>"Main Settings"), array("id"=>"sidebars", "name"=>"Sidebars"), array("id"=>"sociable", "name"=>"Sociable Icons"), array("id"=>"seo", "name"=>"SEO"))
),

/* ------------------------------------------------------------------------*
 * MAIN SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'main'
),

array(
"name" => "Logo image URL",
"id" => HANA_SHORTNAME."_logo_image",
"type" => "upload",
"desc" => "If you wouldn't like to use the uploader: if the image is located within the images folder you can just insert images/image-name.jpg, otherwise
you have to insert the full path to the image, for example: http://site.com/image-name.jpg"
),

array(
"name" => "Favicon image URL",
"id" => HANA_SHORTNAME."_favicon",
"type" => "upload",
"desc" => "Upload a favicon image - with .ico extention."
),

array(
"name" => "Topbar text",
"id" => HANA_SHORTNAME."_topbar_text",
"type" => "textarea",
"std" => 'Welcome to Mearishop, a nice e-commerce template!',
"desc" => 'Specify the text for the topbar. '
),

array(
"name" => "Display page title on pages",
"id" => HANA_SHORTNAME."_show_page_title",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If "ON" selected, the page title will be displayed in the beginning of the page content
as a main title. '
),

array(
"name" => "Display comments on pages",
"id" => HANA_SHORTNAME."_page_comments",
"type" => "checkbox",
"std" => 'off',
"desc" => 'By default comments won\'t be displayed on pages, but if you turn this option ON, you will be able
to enable/disable comments for the separate pages in the "Allow comments" field of the page.<br />
Note: This option is available for the Default Page Template only'
),

array(
"name" => "Display footer widgets area",
"id" => HANA_SHORTNAME."_widgetized_footer",
"type" => "checkbox",
"std" => 'off',
"desc" => 'If "ON" selected, the widgetized footer will be displayed. '
),

array(
"name" => "Timthumb image resizing",
"id" => HANA_SHORTNAME."_timthumb_image_resizing",
"type" => "checkbox",
"std" => 'off',
"desc" => 'If "ON" selected, the images will be resized using TimThumb script. Otherwise, the images will be resized by default wordpress image-resizing functionality.'
),

array(
"name" => "Google Analytics Code",
"id" => HANA_SHORTNAME."_analytics",
"type" => "textarea",
"desc" => "You can paste your generated Google Analytics here and it will be automatically set to the theme."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SIDEBARS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'sidebars'
),

array(
"name"=>"Add Sidebar",
"id"=>'sidebars',
"type"=>"custom",
"button_text"=>'Add Sidebar',
"fields"=>array(
	array('id'=>'_sidebar_name', 'type'=>'text', 'name'=>'Sidebar Name')
),
"desc"=>"You can add as many custom sidebars you like and after that for each page you will be
able to assign a different sidebar."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SOCIABLE ICONS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'sociable'
),


array(
"name"=>"Add a sociable icon to the social media widget",
"id"=>'sociable_icons',
"type"=>"custom",
"button_text"=>'Add Icon',
"preview"=>'_icon_url',
"fields"=>array(
array('id'=>'_icon_url', 'type'=>'imageselect', 'name'=>'Select Icon','options'=>$sociable_icons),
	array('id'=>'_icon_link', 'type'=>'text', 'name'=>'Sociable Site Link'),
	array('id'=>'_icon_title', 'type'=>'text', 'name'=>'Hover title (optional)')
)
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SEO
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'seo'
),

array(
"type" => "documentation",
"text" => '<div class="note_box">
		 <b>Note: </b> This section contains some basic SEO options. For more advanced options, you may consider
		 using a SEO plugin - some plugins that we recommend are <a href="http://wordpress.org/extend/plugins/wordpress-seo/">WordPress SEO by Yoast</a> 
		 and <a href="http://wordpress.org/extend/plugins/all-in-one-seo-pack/">All in One SEO Pack</a>
		</div>'
),

array(
"name" => "Site keywords",
"id" => HANA_SHORTNAME."_seo_keywords",
"type" => "text",
"desc" => 'The main keywords that describe your site, separated by commas. Example:<br />
<i>photography,design,art</i>'
),

array(
"name" => "Home Page Description",
"id" => HANA_SHORTNAME."_seo_description",
"type" => "textarea",
"desc" => "By default the Tagline set in <b>Settings &raquo; General</b> will be displayed as a description of the site. Here
you can set a description that will be displayed on your home page only."
),

array(
"name" => "Home page title",
"id" => HANA_SHORTNAME."_seo_home_title",
"type" => "text",
"desc" => 'This is the home page document title. By default the blog name is displayed and if you insert a title here,
it will be prepended to the blog name'
),

array(
"name" => "Page title separator",
"id" => HANA_SHORTNAME."_seo_separator",
"type" => "text",
"std" => '@',
"desc" => 'Separates the different title parts'
),

array(
"name" => "Page title for category browsing",
"id" => HANA_SHORTNAME."_seo_category_title",
"type" => "text",
"std" => 'Category &raquo; ',
"desc" => 'This is the page title that is set to the document when browsing a category - the title is built by the
text entered here, the name of the category and the name of the blog - for example:<br /><i>Category &raquo; Business &laquo; @  Blog name</i>'
),

array(
"name" => "Page title for tag browsing",
"id" => HANA_SHORTNAME."_seo_tag_title",
"type" => "text",
"std" => 'Tag &raquo; ',
"desc" => 'This is the page title that is set to the document when browsing a tag - the title is built by the
text entered here, the name of the tag and the name of the blog - for example:<br /><i>Tag &raquo; business &laquo; @  Blog name</i>'
),

array(
"name" => "Page title for search results",
"id" => HANA_SHORTNAME."_search_tag_title",
"type" => "text",
"std" => 'Search results &raquo; ',
"desc" => 'This is the page title that is set to the document when displaying search results - the title is built by the
text entered here, the search query and the name of the blog - for example:<br /><i>Search results &raquo;  business &laquo; @  Blog name</i>'
),

array(
"name" => "Exclude pages from indexation",
"id" => HANA_SHORTNAME."_seo_indexation",
"type" => "multicheck",
"options" => array(array('id'=>'category', 'name'=>'Category Archive'), array('id'=>'date', 'name'=>'Date Archive'), array('id'=>'tag', 'name'=>'Tag Archive'), array('id'=>'author', 'name'=>'Author Archive'), array('id'=>'search', 'name'=>'Search Results')),
"class"=>"exclude",
"desc" => 'Pages, such as archives pages, display some duplicate content - for example, the same post can be found on your main Blog
page, but also in a category archive, date archive, etc. Some search engines are reported to penalize sites associated with too much duplicate
content. Therefore, excluding the pages from this option will remove the search engine indexiation by adding "noindex" and
"nofollow" meta tags which would prevent the search engines to index this duplicate content. By default, all the pages are indexed. '),

array(
"type" => "close"),


array(
"type" => "close"));

hana_add_options($hana_general_options);