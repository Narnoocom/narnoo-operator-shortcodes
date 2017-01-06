<?php 

extract( shortcode_atts( array(
	'video' 	=> '',
	'height' 	=> '400',	// optional height
	'width' 	=> '315', 	// optional height
	'autoplay' 	=> TRUE, 	// optional autoplayer
), $atts ) );


if(empty($video)){
	echo $error_msg_prefix . __( 'A video ID is required', NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN );
}


?>
<div class="noo_video_player embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="https://player.narnoo.com/v/<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
</div>
                