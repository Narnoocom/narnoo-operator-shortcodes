<?php 
extract( shortcode_atts( array(
	'type' 	=> 'rating',
	'size'	=> 'narrow',

), $atts ) );

if(!empty($content)){ 
//string https://www.tripadvisor.com.au/Restaurant_Review-g1137831-d2099612-Reviews-Sandy_Bay_Beach_Club_Lembongan-Nusa_Lembongan_Bali.html
//get ID
$url = explode('-', $content);
$trip_id = str_replace( 'd', '', $url[2] );

if(empty($trip_id)){
	echo $error_msg_prefix . __( 'Please check your tripadvisor link', NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN );
	exit();
}

switch ($size) {
	case 'narnoo':
		$size = 'TA_cdsratingsonlynarrow';
		break;
	case 'wide':
		$size = 'TA_cdsratingsonlywide';
		break;
	
	default:
		$size = 'TA_cdsratingsonlynarrow';
		break;
}



if($type == 'rating'){
?>
<div id="TA_cdsratingsonlynarrow527" class="TA_cdsratingsonlynarrow">
<ul id="CkkMgobEUl" class="TA_links yAO8lbTzp">
<li id="h2fZT6" class="KhGth0g">
<a target="_blank" href="https://www.tripadvisor.com.au/"><img src="https://www.tripadvisor.com.au/img/cdsi/img2/branding/tripadvisor_logo_transp_340x80-18034-2.png" alt="TripAdvisor"/></a>
</li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=cdsratingsonlynarrow&amp;uniq=527&amp;locationId=<?php echo $trip_id; ?>&amp;lang=en_AU&amp;border=true&amp;display_version=2"></script>
<?php
}
if($type == 'reviews'){
?>
<div id="TA_selfserveprop703" class="TA_selfserveprop">
<ul id="4pDuqoPFYF9" class="TA_links QJjTDHq">
<li id="uwiMiA3XAIhX" class="5U1VrZPxeT7u">
<a target="_blank" href="https://www.tripadvisor.com.au/"><img src="https://www.tripadvisor.com.au/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
</li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=703&amp;locationId=<?php echo $trip_id; ?>&amp;lang=en_AU&amp;rating=true&amp;nreviews=4&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=true&amp;display_version=2"></script>
<?php
}
if($type == 'scrolling'){
?>
<div id="TA_cdsscrollingravewide403" class="TA_cdsscrollingravewide">
<ul id="0F8NQ5" class="TA_links KJEjdhkVn">
<li id="RXZtOyJDf" class="HMOgrDIIwPo">
<a target="_blank" href="https://www.tripadvisor.com.au/"><img src="https://static.tacdn.com/img2/t4b/Stacked_TA_logo.png" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
</li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=cdsscrollingravewide&amp;uniq=403&amp;locationId=<?php echo $trip_id; ?>&amp;lang=en_AU&amp;border=true&amp;display_version=2"></script>
<?php
}
?>


<?php 
	
} //content if

?>