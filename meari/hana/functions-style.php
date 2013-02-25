<?php
/**
 * Color
 *   
 * @author Hana
 */

function RGB_TO_HSV ($RGB) // RGB Values:Number 0-255
{ // HSV Results:Number 0-1
	$HSL = array();
	
	$var_R = ($RGB[0] / 255);
	$var_G = ($RGB[1] / 255);
	$var_B = ($RGB[2] / 255);
	
	$var_Min = min($var_R, $var_G, $var_B);
	$var_Max = max($var_R, $var_G, $var_B);
	$del_Max = $var_Max - $var_Min;
	
	$V = $var_Max;
	
	if ($del_Max == 0)
	{
	$H = 0;
	$S = 0;
	}
	else
	{
	$S = $del_Max / $var_Max;
	
	$del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
	$del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
	$del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
	
	if ($var_R == $var_Max) $H = $del_B - $del_G;
	else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
	else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;
	
	if ($H<0) $H++;
	if ($H>1) $H--;
	}
	
	return array($H,$S,$V);
}

function HSV_TO_RGB ($HSV) // HSV Values:Number 0-1
{ // RGB Results:Number 0-255
	$H = $HSV[0];
	$S = $HSV[1];
	$V = $HSV[2];
	$RGB = array();
	
	if($S == 0)
	{
	$R = $G = $B = $V * 255;
	}
	else
	{
	$var_H = $H * 6;
	$var_i = floor( $var_H );
	$var_1 = $V * ( 1 - $S );
	$var_2 = $V * ( 1 - $S * ( $var_H - $var_i ) );
	$var_3 = $V * ( 1 - $S * (1 - ( $var_H - $var_i ) ) );
	
	if ($var_i == 0) { $var_R = $V ; $var_G = $var_3 ; $var_B = $var_1 ; }
	else if ($var_i == 1) { $var_R = $var_2 ; $var_G = $V ; $var_B = $var_1 ; }
	else if ($var_i == 2) { $var_R = $var_1 ; $var_G = $V ; $var_B = $var_3 ; }
	else if ($var_i == 3) { $var_R = $var_1 ; $var_G = $var_2 ; $var_B = $V ; }
	else if ($var_i == 4) { $var_R = $var_3 ; $var_G = $var_1 ; $var_B = $V ; }
	else { $var_R = $V ; $var_G = $var_1 ; $var_B = $var_2 ; }
	
	$R = $var_R * 255;
	$G = $var_G * 255;
	$B = $var_B * 255;
	}
	
	return array($R, $G, $B);
}


function HTMLToRGB($color)
{
    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        list($r, $g, $b) = array($color[0].$color[1],
                                 $color[2].$color[3],
                                 $color[4].$color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
    else
        return false;

    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

    return array($r, $g, $b);
}

function RGBToHTML($RGB)
{
    $r = dechex($RGB[0]);
    $g = dechex($RGB[1]);
    $b = dechex($RGB[2]);
    
    return "#" . str_pad($r, 2, "0", STR_PAD_LEFT) . str_pad($g, 2, "0", STR_PAD_LEFT) . str_pad($b, 2, "0", STR_PAD_LEFT);
}

function add_opacity($color, $opacity) {
	$rgba = HTMLToRGB($color);
	$rgba[] = $opacity;
	return 'rgba('.implode(',',$rgba).')';
}

function convert_color($color, $before, $after) {
	$color_hsv = RGB_TO_HSV(HTMLToRGB($color));
	$before_hsv = RGB_TO_HSV(HTMLToRGB($before));
	$after_hsv = RGB_TO_HSV(HTMLToRGB($after));
	$H = $color_hsv[0] + $after_hsv[0] - $before_hsv[0];
	$S = $color_hsv[1] * $after_hsv[1] / $before_hsv[1];
	$V = $color_hsv[2] * $after_hsv[2] / $before_hsv[2];
	$color = RGBToHTML(HSV_TO_RGB(array(min($H,1), min($S,1), min($V,1))));
	return $color;
}


function set_bg($selector, $prefix) {
	$bg_options = array( $prefix.'_bg', $prefix.'_bg_pattern', $prefix.'_custom_bg_pattern', $prefix.'_bg_color', $prefix.'_bg_color_opacity', $prefix.'_bg_image', $prefix.'_bg_repeat', $prefix.'_bg_position', $prefix.'_bg_attachment');
	
	foreach($bg_options as $option) {
		$hana_css[$option] = hana_get_opt('_'.$option);
	}
	
	$styles = array();
	
	//set background color
	if($hana_css[$prefix.'_bg_color']!='') {
		if($hana_css[$prefix.'_bg_color_opacity']!='') {
			$rgba = HTMLToRGB($hana_css[$prefix.'_bg_color']);
			$rgba[] = $hana_css[$prefix.'_bg_color_opacity'];
			echo $selector.' { background-color: #'.$hana_css[$prefix.'_bg_color'].'}';
			$styles['background-color'] = 'rgba('.implode(',',$rgba).')';
		}
		else
			$styles['background-color'] = '#'.$hana_css[$prefix.'_bg_color'];
	}
	
	//set background img
	if($hana_css[$prefix.'_bg']=='image' && $hana_css[$prefix.'_bg_image']!='') {
		$styles['background-image'] = 'url('.$hana_css[$prefix.'_bg_image'].')';
		$styles['background-repeat'] = $hana_css[$prefix.'_bg_repeat'];
		$styles['background-position'] = $hana_css[$prefix.'_bg_position'];
		$styles['background-attachment'] = $hana_css[$prefix.'_bg_attachment'];
	} elseif($hana_css[$prefix.'_bg']=='pattern' && $hana_css[$prefix.'_custom_bg_pattern']!=''){
		$styles['background-image'] = 'url('.$hana_css[$prefix.'_custom_bg_pattern'].')';
	} elseif($hana_css[$prefix.'_bg']=='pattern' && $hana_css[$prefix.'_bg_pattern']!='' && $hana_css[$prefix.'_bg_pattern']!='none'){
		$styles['background-image'] = 'url('.get_bloginfo('template_url').'/images/patterns/'.$hana_css[$prefix.'_bg_pattern'].')';
	}
	
	//print style
	$style_string = '';
	if(!empty($styles)) foreach($styles as $style=>$value) {
		$style_string.=' '.$style.': '.$value.';';
	}
	if($style_string!='') 
		echo $selector.' {
			'.$style_string.'}
			';
}

function set_color($selector, $option, $important = false) {
	$color = hana_get_opt('_'.$option);
	if($color!='')
		echo $selector.' {
			color:#'.$color.($important?' !important':'').';}
			';
}

function set_border_color($selector, $option, $important = false) {
	$color = hana_get_opt('_'.$option);
	if($color!='')
		echo $selector.' {
			border-color:#'.$color.($important?' !important':'').';}
			';
}

function set_bg_color($selector, $option, $important = false) {
	$color = hana_get_opt('_'.$option);
	if($color!='')
		echo $selector.' {
			background-color:#'.$color.($important?' !important':'').';}
			';
}

function set_bg_image($selector, $option, $important = false) {
	$image = hana_get_opt('_'.$option);
	if($image!='')
		echo $selector.' {
			background-image:url('.$image.')'.($important?' !important':'').';}
			';
}

function set_bg_gradient($selector, $option, $first, $second) {
	$color = hana_get_opt('_'.$option);
	if($color=='') return;
	$new_first = '#'.$color;
	$new_second = convert_color($color, $first, $second);
	echo $selector.' {
	background: -moz-linear-gradient(top, '.$new_first.' 0%, '.$new_second.' 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$new_first.'), color-stop(100%,'.$new_second.'));
	background: -webkit-linear-gradient(top, '.$new_first.' 0%,'.$new_second.' 100%);
	background: -o-linear-gradient(top, '.$new_first.' 0%,'.$new_second.' 100%);
	background: -ms-linear-gradient(top, '.$new_first.' 0%,'.$new_second.' 100%);
	background: linear-gradient(top, '.$new_first.' 0%,'.$new_second.' 100%);}
	';
}

function set_font_family($selectors, $option, $important = false) {
	$family = hana_get_opt('_'.$option);
	if($family!='')
		echo $selectors.' {
		font-family: '.$family.($important?' !important':'').';}
		';
}

function set_font_size($selectors, $option, $important = false) {
	$size = hana_get_opt('_'.$option);
	if($size!='')
		echo $selectors.' {
		font-size: '.$size.'px'.($important?' !important':'').';}
		';
}

?>