<?php

$hana_translation_options= array( array(
"name" => "Translation",
"type" => "title",
"img" => HANA_IMAGES_URL."icon_translate.png"
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"settings", "name"=>"Settings"), array("id"=>"blog", "name"=>"Blog"), array("id"=>"comment", "name"=>"Comments"), array("id"=>"portfolio", "name"=>"Portfolio"), array("id"=>"search", "name"=>"Search"), array("id"=>"other", "name"=>"Other"))
),

/* ------------------------------------------------------------------------*
 * BLOG TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'settings'
),

array(
"name" => "Enable translation",
"id" => HANA_SHORTNAME."_enable_translation",
"type" => "checkbox",
"std" => 'off',
"desc" => 'Enable this option when using .mo files for translation. By default the texts from the "Translation" section are
used. If you would like to enable an additional language, you can use an additional .mo file for this language. For more
information please refer to the "Translation" section of the documentation.'
),

array(
"name" => "Default locale",
"id" => HANA_SHORTNAME."_def_locale",
"type" => "text",
"std" => "en_US",
"desc" => 'This is the default language locale. If the default selected language is different than English (US), you
have to insert the locale name here. The default language can be changed here in the "Translation" section, the additional
language texts should be set in a .mo file. For more information please refer to the "Translation" section of the documentation.'
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * BLOG TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'blog'
),

array(
"name" => "Read more text",
"id" => HANA_SHORTNAME."_read_more_text",
"type" => "text",
"std" => "Read More ..."
),

array(
"name" => "Category text",
"id" => HANA_SHORTNAME."_category_text",
"type" => "text",
"std" => "Category"
),

array(
"name" => "Tag text",
"id" => HANA_SHORTNAME."_tag_text",
"type" => "text",
"std" => "Tag"
),


array(
"name" => "Previous page text",
"id" => HANA_SHORTNAME."_previous_text",
"type" => "text",
"std" => "Previous"
),

array(
"name" => "Next page text",
"id" => HANA_SHORTNAME."_next_text",
"type" => "text",
"std" => "Next"
),

array(
"name" => "No posts available text",
"id" => HANA_SHORTNAME."_no_posts_available_text",
"type" => "text",
"std" => "No posts available"
),

array(
"name" => "Posted by text",
"id" => HANA_SHORTNAME."_posted_by_text",
"type" => "text",
"std" => "Posted by"
),


array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * COMMENTS TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'comment'
),


array(
"name" => "No comments text",
"id" => HANA_SHORTNAME."_no_comments_text",
"type" => "text",
"std" => "No comments"
),


array(
"name" => "One comment text",
"id" => HANA_SHORTNAME."_one_comment_text",
"type" => "text",
"std" => "One comment"
),


array(
"name" => "Comment text",
"id" => HANA_SHORTNAME."_comment_text",
"type" => "text",
"std" => "comment"
),


array(
"name" => "Comments text",
"id" => HANA_SHORTNAME."_comments_text",
"type" => "text",
"std" => "Comments"
),


array(
"name" => "Leave a comment text",
"id" => HANA_SHORTNAME."_leave_comment_text",
"type" => "text",
"std" => "Leave a comment"
),



array(
"name" => "Name text",
"id" => HANA_SHORTNAME."_comment_name_text",
"type" => "text",
"std" => "Name"
),

array(
"name" => "Email text",
"id" => HANA_SHORTNAME."_email_text",
"type" => "text",
"std" => "Email(will not be published)"
),

array(
"name" => "Website text",
"id" => HANA_SHORTNAME."_website_text",
"type" => "text",
"std" => "Website"
),

array(
"name" => "Your comment text",
"id" => HANA_SHORTNAME."_your_comment_text",
"type" => "text",
"std" => "Your comment"
),

array(
"name" => "Submit comment text",
"id" => HANA_SHORTNAME."_submit_comment_text",
"type" => "text",
"std" => "Submit Comment"
),

array(
"name" => "Reply to comment text",
"id" => HANA_SHORTNAME."_reply_text",
"type" => "text",
"std" => "Reply"
),

array(
"name" => "Leave a reply to text",
"id" => HANA_SHORTNAME."_leave_reply_to_text",
"type" => "text",
"std" => "Leave a reply to"
),

array(
"name" => "Cancel Reply",
"id" => HANA_SHORTNAME."_cancel_reply_text",
"type" => "text",
"std" => "Cancel Reply"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * PORTFOLIO TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'portfolio'
),


array(
"name" => "All text",
"id" => HANA_SHORTNAME."_all_text",
"type" => "text",
"std" => "All"
),

array(
"name" => "Show Me text",
"id" => HANA_SHORTNAME."_show_me_text",
"type" => "text",
"std" => "Show Me"
),



array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SEARCH TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'search'
),


array(
"name" => "Search box text",
"id" => HANA_SHORTNAME."_search_text",
"type" => "text",
"std" => "Search..."
),

array(
"name" => "Search results text",
"id" => HANA_SHORTNAME."_search_results_text",
"type" => "text",
"std" => "Search results for"
),

array(
"name" => "No results found text",
"id" => HANA_SHORTNAME."_no_results_text",
"type" => "text",
"std" => "No results found. Try a different search?"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * OTHER TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'other'
),

array(
"name" => "404 Page not found text",
"id" => HANA_SHORTNAME."_404_text",
"type" => "text",
"std" => "Looks like the page you we're looking for doesn't exist. Sorry about that."
),

array(
"name" => "404 Page search again text",
"id" => HANA_SHORTNAME."_404_search_again_text",
"type" => "text",
"std" => "Check the web address for types, visit the home page or use our site search below."
),

array(
"name" => "Archive Page Last 30 posts text",
"id" => HANA_SHORTNAME."_last_posts_text",
"type" => "text",
"std" => "Last 30 posts"
),

array(
"name" => "Archive Page Archives by Month text",
"id" => HANA_SHORTNAME."_archives_by_month_text",
"type" => "text",
"std" => "Archives by Month"
),

array(
"name" => "Archive Page Archives by Subject text",
"id" => HANA_SHORTNAME."_archives_by_subject_text",
"type" => "text",
"std" => "Archives by Subject"
),


array(
"name" => "Footer Copyright text",
"id" => HANA_SHORTNAME."_copyright_text",
"type" => "text",
"std" => "Copyright &copy; MeariShop by Hana"
),


array(
"type" => "close"),

array(
"type" => "close"));

hana_add_options($hana_translation_options);