<?php
	global $hana_page_options;
	$sidebar = $hana_page_options['sidebar'];
	if(!$sidebar || $sidebar=='' || $sidebar=='default') $sidebar='Default Sidebar';
	if(meari_get_layout()!='full'):
?>

<!-- START SIDEBAR -->
<div id="sidebar" class="grid_5 <?php echo (meari_get_layout()=='left')?'suffix_1 alignleft':'prefix_1 alignright';?>"><?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar)) {} ?></div>
<!-- END SIDEBAR -->

<?php endif;?>