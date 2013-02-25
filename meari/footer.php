
    </div></div>
</div>
<!-- END MAIN WRAPPER -->

<?php if(hana_get_opt('_widgetized_footer')=='on' && function_exists('dynamic_sidebar')):?>
<!-- START BOTTOM CONTENT WRAPPER -->
<div id="bottom_content_wrapper">
	<div id="bottom_content" class="container_24">
    	<div class="grid_5 first"><?php do_shortcode(dynamic_sidebar('footer-first'));?></div>
    	<div class="grid_5 second"><?php do_shortcode(dynamic_sidebar('footer-second'));?></div>
    	<div class="grid_5 third"><?php do_shortcode(dynamic_sidebar('footer-third'));?></div>
    	<div class="grid_5 fourth"><?php do_shortcode(dynamic_sidebar('footer-fourth'));?></div>
    </div>
</div>
<!-- END BOTTOM CONTENT WRAPPER -->
<?php endif;?>

<!-- START FOOTER WRAPPER -->
<!--
<div id="footer_wrapper">
	<div class="container_24">         
        <div id="copyrights" class="grid_24">
            <h5><?php echo hana_get_text('_copyright_text');?></h5>
        </div>
    </div>
</div>
-->
<!-- END FOOTER WRAPPER -->


<div class="wf-footer">
	<div class="wf-container">
		<ul class="footer-nav wf-container">
			<li><script language="JavaScript"> document.write('&copy;' + (new Date()).getFullYear()); </script> Wildflower Outdoor</li>
			<a href="http://wildfloweroutdoor.com/store/?page_id=1449"><li>ABOUT US</li></a>
			<a href="http://wildfloweroutdoor.com/store/?page_id=78"><li class="last">CONTACT US</li></a>
			<a href="http://wildfloweroutdoor.com/store/?page_id=1454"><li>PRIVACY POLICY</li></a>
			<a href="http://wildfloweroutdoor.com/store/?page_id=1454"><li>REFUND POLICY</li></a>
			<a href="http://wildfloweroutdoor.com/store/?p=1488"><li>SHIPPING POLICY</li></a>
		</ul>
	</div>
</div>




<?php wp_footer(); 
echo(hana_get_opt('_analytics')); ?>
</div></body>

</html>