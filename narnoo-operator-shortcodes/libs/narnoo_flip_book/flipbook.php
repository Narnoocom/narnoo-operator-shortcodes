<?php

Narnoo_Shortcodes::load_scripts_for_flip_book();

extract( shortcode_atts( array(
	'brochure' 	=> '',
	'thumb'		=> 'thumb'
), $atts ) );


if( empty($brochure) ){
	echo $error_msg_prefix . __( 'A brochure ID is required', NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN );
}


$list 			= null;
$cache	 		= Narnoo_Operator_Helper::init_noo_cache();
$request 		= Narnoo_Operator_Helper::init_api();


if ( ! is_null( $request ) ) {

	$list = $cache->get('print_'.$brochure);
	

	if(empty($list)){

		try {
			$list = $request->brochureDetails( $brochure );
			
			if ( ! is_array( $list->zoom_pages ) ) {
				throw new Exception( sprintf( __( "Error retrieving brochure details. Unexpected format in response brochure #%d.", NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN ), $brochure ) );
			}

			if(!empty( $list->success ) ){
				$cache->set('print_'.$brochure, $list, 43200);
			}

		} catch ( Exception $ex ) {
			Narnoo_Operator_Helper::show_api_error( $ex );
		} 


	}


} 
//print_r($list);

switch ($thumb) {
	case 'thumb':
		$timg = $list->thumb_image_path; 
		break;
	case 'crop':
		$timg = $list->xcrop_image_path; 
		break;
	case 'preview':
		$timg = $list->preview_image_path; 
		break;
	default:
		$timg = $list->thumb_image_path;
		break;
}

?>
<!-- begin flipbook lightbox code  -->
<a class="btn" href="load_book_lightbox('narnoo_flip_book')" data-content="<?php echo NARNOO_OPERATOR_SHORTCODE_URL . 'libs/narnoo_flip_book/pages/content.php?'.http_build_query( $list->zoom_pages );  ?>" data-config="<?php echo NARNOO_OPERATOR_SHORTCODE_URL . 'libs/narnoo_flip_book/pages/config.html'?>"  target="_blank">
	<img src="<?php echo $timg; ?>" />

</a>
<!-- end flipbook lightbox code  -->


