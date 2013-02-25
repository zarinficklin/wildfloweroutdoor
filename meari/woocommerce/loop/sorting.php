<?php
/**
 * Loop Sorting
 */

?>

<div class="sorter clearfix">

	<div class="sort-by">
    <form method="POST">
    	<label>Sort By</label>
        <select name="sort" class="orderby">
            <?php
                $catalog_orderby = apply_filters('woocommerce_catalog_orderby', array(
                    'title' 	=> __('Alphabetically', 'woocommerce'),
                    'date' 		=> __('Most Recent', 'woocommerce'),
                    'price' 	=> __('Price', 'woocommerce')
                ));
    
                foreach ($catalog_orderby as $id => $name) echo '<option value="'.$id.'" '.selected( $_SESSION['orderby'], $id, false ).'>'.$name.'</option>';
            ?>
        </select>
    </form>
	</div>
    
    <div class="clear"></div>

</div>