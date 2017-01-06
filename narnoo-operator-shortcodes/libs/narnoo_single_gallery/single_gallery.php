<?php 

global $narnoo_slg_shortcode_count;	
//if ( Narnoo_Distributor_Helper::wp_supports_enqueue_script_in_body() ) {
Narnoo_Shortcodes::load_scripts_for_single_gallery();
// }
if ( ! isset( $narnoo_slg_shortcode_count ) ) {
	$narnoo_slg_shortcode_count = 0;
}
extract( shortcode_atts( array(
	'album' => '',			
	'width' => '200',			// optional width
	'height' => '150',			// optional height
), $atts ) );

if(empty($album)){
	echo $error_msg_prefix . __( 'An album key is required', NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN );
}

$list 			= null;
$current_page 	= 1;
$cache	 		= Narnoo_Operator_Helper::init_noo_cache();
$request 		= Narnoo_Operator_Helper::init_api();


if ( ! is_null( $request ) ) {

	$list = $cache->get('album_'.$album.$current_page);
	

	if(empty($list)){

		try {
			$list = $request->getAlbumImages( $album, $current_page );
			
			if ( ! is_array( $list->operator_albums_images ) ) {
				throw new Exception( sprintf( __( "Error retrieving album images. Unexpected format in response page #%d.", NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN ), $current_page ) );
			}

			if(!empty( $list->success ) ){
				$cache->set('album_'.$album.$current_page, $list, 43200);
			}

		} catch ( Exception $ex ) {
			Narnoo_Operator_Helper::show_api_error( $ex );
		} 


	}


} 
?>

<!-- These are the images that will open in Imagebox. Because they have no thumbnails, they can be placed anywhere in the page. -->
				

<?php 
foreach ($list->operator_albums_images as $img) {
           
        echo '<a href="'.$img->xlarge_image_path.'" title="'.$img->caption.'" rel="imagebox[narnoo_slg'.$narnoo_slg_shortcode_count.']" id="narnoo_single_link_gallery-'.$narnoo_slg_shortcode_count.'"></a>';
 }
 ?>
<a href="javascript:imagebox.open(document.getElementById('narnoo_single_link_gallery-<?php echo $narnoo_slg_shortcode_count;  ?>'));" class="narnoo_single_link_gallery_thumbnail">
	<img src="<?php echo $list->operator_albums_images[0]->thumb_image_path; ?>" alt="Narnoo image" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	<span class="narnoo_single_link_gallery_cover"></span>
</a>
<?php $narnoo_slg_shortcode_count++ ?>
		
