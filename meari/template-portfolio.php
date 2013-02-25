<?php
/*
 Template Name: Portfolio Gallery
 Displays the portfolio items in a grid, separated by pages. The items can be also
 filtered by a category.
 */
get_header();?>

<?php 
	global $hana_page_options;
	$hana_page_options['layout'] = 'full';
?>

<!-- START CONTENT -->
<div id="content">
    
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	global $hana_post_meta;
	$portfolio_page_meta = $hana_post_meta;
	
	if($hana_page_options['show_title']!='off')
		the_title( '<h1 class="page-title">', '</h1>' );     
	?>	
			
	<div id="post-<?php the_ID(); ?>" <?php post_class(meari_content_class()); ?>>
            
		<?php the_content();?>
        
        <div id="portfolio-gallery">

			<?php
            //display the category filter if enabled
            if($portfolio_page_meta['show_categories']=='true'){
                echo('<div id="portfolio-categories">');
                $args=array();
                if($portfolio_page_meta['postCategory']!='-1'){
                    $args['parent']=$portfolio_page_meta['postCategory'];
                }
                $cats=get_terms('portfolio_category', $args);
                echo '<h6>'.hana_get_text('_show_me_text').'</h6>';
                echo '<ul><li>'.hana_get_text('_all_text').'</li>';
                for($i=0; $i<count($cats); $i++){
                    echo('<li id="'.$cats[$i]->term_id.'" class="category">'.$cats[$i]->name.'</li>');
                }
                echo('</ul><div class="clear"></div></div>');
            }
            ?>
    
            <div class="items">
            <?php
                global $portfolio_loop;
                    
                //set the query_posts args
                $args= array(
                    'posts_per_page' =>-1, 
                    'post_type' => HANA_PORTFOLIO_POST_TYPE
                );
                
                if($portfolio_page_meta['postCategory']!='-1'){
                    $slug=get_taxonomy_slug($portfolio_page_meta['postCategory']);
                    $args['portfolio_category']=$slug;
                }
                
                //set the order arguments
                if($portfolio_page_meta['order']=='custom'){
                    $args['orderby']='menu_order';
                    $args['order']='asc';
                }else{
                    $args['orderby']='date';
                    $args['order']='desc';
                }
                
                //query portfolio posts
                query_posts($args);
    
                $portfolio_loop['columns']=$portfolio_page_meta['column_number'];
                $portfolio_loop['imgWidth']=hana_get_opt('_portfolio_width'.$portfolio_page_meta['column_number']);
                $portfolio_loop['imgHeight']=hana_get_opt('_portfolio_height'.$portfolio_page_meta['column_number']);
                $portfolio_loop['showdesc']=($portfolio_page_meta['showdesc']=='true'?true:false);
                $portfolio_loop['show_titles']=($portfolio_page_meta['show_titles']=='true'?true:false);
				$portfolio_loop['item_height']=$portfolio_page_meta['item_height'];
                $portfolio_loop['setFirst']=false;
                $portfolio_loop['setLast']=false;
                
                get_template_part('loop','portfolio');
                
                wp_reset_query();
            ?>
            </div>
    
            <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#portfolio-gallery').setPortfolio({
                    itemsPerPage:<?php echo $portfolio_page_meta['postNumber']; ?>, 
                    pageWidth:950,
                    showCategories:<?php echo $portfolio_page_meta['show_categories']; ?>,
                    showDescriptions:<?php echo $portfolio_page_meta['showdesc']; ?>,
                    columns:<?php echo $portfolio_page_meta['column_number']; ?>,
                    desaturate:<?php echo $portfolio_page_meta['desaturate']; ?>,
					itemHeight:<?php echo $portfolio_page_meta['item_height']; ?>
                });
            });
            </script>
    
        </div> 
              
	</div><?php
		
endwhile; endif;?>     
    
</div>
<!-- END CONTENT -->

<?php get_footer(); ?>