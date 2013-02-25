<?php
function hana_contactform($atts, $content = null) {
	ob_start();
	meari_get_template('contact-form.php');
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode('contactform', 'hana_contactform');
?>