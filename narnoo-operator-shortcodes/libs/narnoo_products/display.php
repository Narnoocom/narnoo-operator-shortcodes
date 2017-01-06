<?php
Narnoo_Shortcodes::load_scripts_for_narnoo_products();
extract( shortcode_atts( array(
	'display' 	=> 'thumbs',
	'words'		=> 140,
	'columns'	=> 3
), $atts ) );


$query = new WP_Query( array( 'post_type' => 'narnoo_product', 'posts_per_page' => 3,'orderby' => 'title',
	'order'   => 'DESC', ) );

switch ($columns) {
	case 3:
		$col_lg = '4';
		$col_sm = '3';
		break;
	case 4:
		$col_lg = '3';
		$col_sm = '2';
		break;
	case 2:
		$col_lg = '2';
		$col_sm = '2';
		break;
	case 1:
		$col_lg = '12';
		$col_sm = '2';
		break;
	case 6:
		$col_lg = '2';
		$col_sm = '2';
		break;
	default:
		$col_lg = '4';
		$col_sm = '3';
		break;
}
// Check that we have query results.
if ( $query->have_posts() ) {
 echo '<div class="row">';
    // Start looping over the query results.
    while ( $query->have_posts() ) {
 
        $query->the_post();
 		echo '<div class="col-lg-'.$col_lg.' col-md-'.$col_lg.' col-sm-'.$col_sm.' narnoo-product">';
        // Contents of the queried post results go here.
        echo '<a href="'.get_post_permalink( $_post->ID ).'" class="narnoo-product-link">';
        echo '<div class="narnoo-product-hover">
                <div class="narnoo-product-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                </div>
         	 </div>';
        echo  get_the_post_thumbnail($_post->ID, "large");
        echo '</a>';
        echo '<h2><a href="'.get_post_permalink( $_post->ID ).'">'.get_the_title($_post->ID).'</a></h2>';
        //$text = get_the_excerpt( $_post->ID );
        //$text = substr($text, 0,$words);
        //echo '<p><span class="small">'.$text.'[...]</span></p>';

        //echo '<a href="'.get_post_permalink( $_post->ID ).'" class="btn btn-default">Read More</a>';
 		echo '</div>';
    }
   echo '</div>';
 
}
 
// Restore original post data.
wp_reset_postdata();

?>