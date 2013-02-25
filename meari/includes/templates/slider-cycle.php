<?php
$style=hana_get_opt('_cycle_style');
if(!$style) $style="cycle-slider3";
$width=950; //fixed
$height=hana_get_opt('_cycle_height');
$autoplay=hana_get_opt('_cycle_autoplay')=='on'?'true':'false';
$resize=hana_get_opt('_cycle_auto_resize')=='on'?true:false;
$speed = hana_get_opt('_cycle_speed');
$interval = hana_get_opt('_cycle_interval');
$pauseOnHover=hana_get_opt('_cycle_pause_hover')=='on'?'true':'false';
?>

<div id="slider-container" class="cycle-slider-container with-margin" style="width:<?php echo $width;?>px; margin-left:auto; margin-right:auto; height:<?php echo $height;?>px;">

	<div class="<?php echo $style;?>" style="height:<?php echo $height;?>px;">
		
        <a href="#" class="slideshow_prev"><span>Previous</span></a>
        <a href="#" class="slideshow_next"><span>Next</span></a>
            
        <div class="slideshow_paging"></div>
        
        <div class="slideshow_box">
            <div class="data"></div>

        </div>
        
        <div id="slideshow" class="slideshow" style="height:<?php echo $height;?>px;">
            
		<?php 
        global $slider_data;
        $slider_posts=$slider_data['posts'];
        
        foreach($slider_posts as $key=>$slider_post){
        
            $link=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_link', true);
			$title=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'imgtitle', true);
            $tooltip=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'tooltip', true);
            $imgurl=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_url', true);
			if(!$imgurl) continue;
			
			if($resize){
                $path=hana_get_resized_image($imgurl, $width, $height);
            }else{
                $path=$imgurl;
            }
			if($style=='cycle-slider3') $thumb_path=hana_get_resized_image($imgurl,140,63);
            ?>
            <div class="slideshow_item" style="height:<?php echo $height;?>px;">
                <div class="image"><?php if($link!=''):?><a href="<?php echo $link;?>"><?php endif;?><img src="<?php echo $path;?>" alt="<?php echo $title;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" /><?php if($link!=''):?></a><?php endif;?></div>
                <?php if($style=='cycle-slider3'):?><div class="thumb"><img src="<?php echo $thumb_path;?>" alt="<?php echo $title;?>" width="140" height="63" /></div><?php endif;?>
                <div class="data">
                    <h4><?php echo ($link!='')?'<a href="'.$link.'">'.$title.'</a>':$title;?></h4>
                    <p><?php echo $tooltip;?></p>
                </div>
            </div>
        <?php }?>
            
        </div>

	</div><!-- .cycle-slider -->

	<script type="text/javascript">
	jQuery(document).ready(function($){
		
		<?php if($style=='cycle-slider'):?>
// ---------------------------------------------------
// Slideshow 1
        $('#slideshow').cycle({
			fx: 'scrollHorz',		
			easing: 'easeInOutCirc',
			speed:  <?php echo $speed; ?>, 
			timeout: <?php echo ($autoplay)?$interval:0; ?>, 
			pager: '.cycle-slider .slideshow_paging', 
			prev: '.cycle-slider .slideshow_prev',
			next: '.cycle-slider .slideshow_next',
			before: function(currSlideElement, nextSlideElement) {
				var data = $('.data', $(nextSlideElement)).html();
				$('.cycle-slider .slideshow_box .data').fadeOut(300, function(){
					$('.cycle-slider .slideshow_box .data').remove();
					$('<div class="data">'+data+'</div>').hide().appendTo('.cycle-slider .slideshow_box').fadeIn(600);
				});
			}
		});
		
		<?php if($pauseOnHover):?>
		// not using the 'pause' option. instead make the slideshow pause when the mouse is over the whole wrapper
		$('.cycle-slider').mouseenter(function(){
			$('#slideshow').cycle('pause');
		}).mouseleave(function(){
			$('#slideshow').cycle('resume');
		});
		<?php endif;?>
		
		<?php endif;?>
		
		
		<?php if($style=='cycle-slider2'):?>
// ---------------------------------------------------
// Slideshow 2
		$('#slideshow').cycle({
			fx: 'fade',		
			speed:  <?php echo $speed; ?>, 
			timeout: <?php echo ($autoplay)?$interval:0; ?>, 
			pager: '.cycle-slider2 .slideshow_paging', 
			prev: '.cycle-slider2 .slideshow_prev',
			next: '.cycle-slider2 .slideshow_next',
			before: function(currSlideElement, nextSlideElement) {
				var data = $('.data', $(nextSlideElement)).html();
				$('.cycle-slider2 .slideshow_box').stop(true, true).animate({ bottom:'-110px'}, 400, function(){
					$('.cycle-slider2 .slideshow_box .data').html(data);
				});
				$('.cycle-slider2 .slideshow_box').delay(100).animate({ bottom:'0'}, 400);
			}
		});
	
		$('.cycle-slider2').mouseenter(function(){
			$('.cycle-slider2 .slideshow_prev').stop(true, true).animate({ left:'20px'}, 200);
			$('.cycle-slider2 .slideshow_next').stop(true, true).animate({ right:'20px'}, 200);
		}).mouseleave(function(){
			$('.cycle-slider2 .slideshow_prev').stop(true, true).animate({ left:'-40px'}, 200);
			$('.cycle-slider2 .slideshow_next').stop(true, true).animate({ right:'-40px'}, 200);
		});
		
		<?php if($pauseOnHover):?>
		$('.cycle-slider2').mouseenter(function(){
			$('#slideshow').cycle('pause');
		}).mouseleave(function(){
			$('#slideshow').cycle('resume');
		});
		<?php endif;?>	
		
		<?php endif;?>		
		
		
		<?php if($style=='cycle-slider3'):?>
// ---------------------------------------------------
// Slideshow 3
		$('#slideshow').cycle({
			fx: 'uncover',		
			speed:  <?php echo $speed; ?>, 
			timeout: <?php echo ($autoplay)?$interval:0; ?>, 
			pager: '.cycle-slider3 .slideshow_paging', 
			pagerAnchorBuilder: pager_create,
			prev: '.cycle-slider3 .slideshow_prev',
			next: '.cycle-slider3 .slideshow_next',
			before: function(currSlideElement, nextSlideElement) {
				var data = $('.data', $(nextSlideElement)).html();
				$('.cycle-slider3 .slideshow_box .data').fadeOut(300, function(){
					$('.cycle-slider3 .slideshow_box .data').remove();
					$('<div class="data">'+data+'</div>').hide().appendTo('.cycle-slider3 .slideshow_box').fadeIn(600);
				});
			}
		});
		
		function pager_create(id, slide) {
			var thumb = $('.thumb', $(slide)).html();
			var title = $('h4 a', $(slide)).html();
			var add_first = (id==0)?' class="first"':'';
			return '<li><a href="#" title="'+title+'"'+add_first+'>'+thumb+'</a></li>';
		};
		
		<?php if($pauseOnHover):?>
		// not using the 'pause' option. instead make the slideshow pause when the mouse is over the whole wrapper
		$('.cycle-slider3').mouseenter(function(){
			$('#slideshow').cycle('pause');
		}).mouseleave(function(){
			$('#slideshow').cycle('resume');
		});
		<?php endif;?>	
		
		<?php endif;?>	
	});
    </script>
</div>

