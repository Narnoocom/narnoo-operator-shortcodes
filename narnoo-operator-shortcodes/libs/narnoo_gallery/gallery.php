<?php 
Narnoo_Shortcodes::load_scripts_for_image_gallery();

extract( shortcode_atts( array(
	'album' 	=> '',
	'width' 	=> '200',	// optional width
	'height' 	=> '150',	// optional height
	'speed'		=> 5000,
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

//print_r($list); onSliderLoad: function(el){ el.lightGallery({selector:'#noo-gallery .lslide'})}
?>
<script>
    	 jQuery(document).ready(function() {
			jQuery('#noo-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:8,
                slideMargin: 0,
                pause: <?php echo $speed; ?>,
                speed:800,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    jQuery('#noo-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>
<div class="noo-gallery-holder" style="width:400px">      
            <div class="clearfix" style="max-width:474px;">
                <ul id="noo-gallery" class="list-unstyled cS-hidden">
                    <?php foreach ($list->operator_albums_images as $img) {
                    	
                    	echo '<li data-thumb="' .$img->image_400_path . '"> 
                        		<img src="' . $img->image_800_path . '" />
                    		</li>';

                    }?>
                </ul>
        </div>
</div>