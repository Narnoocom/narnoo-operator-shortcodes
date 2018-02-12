<?php
?>
<div class="wrap">
	<h2><?php _e( 'Narnoo Shortcode Information', NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN ) ?></h2>
	<hr/>
	<p>
		The following is information related to the Narnoo shortcodes found in this plugin.
	</p>
	<h3>Narnoo Gallery</h3>
	<p>Display a gallery of one of your Narnoo albums</p>
	<p>shortcode: <strong>[narnoo_gallery album=""]</strong>
	<h4>Options:</h4>
		<strong>album:</strong> The album name or id<br/>
		<strong>width:</strong> The gallery width in pixels - <em>Default: 200px</em><br/>
		<strong>height:</strong> The gallery height in pixels - <em>Default: 150px</em><br/>	
		<strong>speed:</strong> The gallery speed in micro secounds - <em>Default: 5000</em><br/>	
	</p>
	<!-- Noo Gallery -->
	<h3>Narnoo Slider</h3>
	<p>Display a sliding carousel gallery of one of your Narnoo albums.</p>
	<p>shortcode: <strong>[narnoo_gallery_slider album=""]</strong>
	<h4>Options:</h4>
		<strong>album:</strong> The album name or id<br/>
		<strong>height:</strong> The gallery height in pixels - <em>Default: 400px</em><br/>	
		<strong>speed:</strong> The gallery speed in micro secounds - <em>Default: 5000</em><br/>	
	</p>
	<!-- Noo Slider -->
	<h3>Narnoo Single Image Gallery</h3>
	<p>Display a Narnoo gallery using a single image to open the gallery in a lightbox.</p>
	<p>shortcode: <strong>[narnoo_single_gallery album=""]</strong>
	<h4>Options:</h4>
		<strong>album:</strong> The album name - <em>Can be found in your Narnoo.com account</em><br/>
		<strong>width:</strong> The opening thumbnail image width in pixels - <em>Default: 200px</em><br/>
		<strong>height:</strong> The opening thumbnail image height in pixels - <em>Default: 150px</em><br/>
		<strong>thumb:</strong> Choose which image size acts as the single thumb - <em>Default: preview</em><br/>
		<em>Thumb Options:</em><br/>
		<ul>
			<li>thumb</li>
			<li>preview - default</li>
			<li>large</li>
			<li>xlarge</li>
			<li>xxlarge</li>
			<li>200 - 200px X 150px</li>
			<li>400 - 400px X 300px</li>
			<li>800 - 800px X 600px</li>
		</ul>	
	</p>
	<!-- Noo Single Image Gallery -->
	<h3>Narnoo Video Player</h3>
	<p>Display a Narnoo video player showing one your Narnoo videos</p>
	<p>shortcode: <strong>[narnoo_video_player video=""]</strong>
	<h4>Options:</h4>
		<strong>video:</strong> The video share id - <em>Can be found in your Narnoo.com account</em><br/>
		<strong>width:</strong> The player width in pixels - <em>Default: 400px</em><br/>
		<strong>height:</strong> The player height in pixels - <em>Default: 315px</em><br/>	
		<strong>autoplay:</strong> Whether the video is autoplayed - <em>Default: true</em><br/>	
	</p>
	<!-- Noo Video -->
	<h3>Narnoo PDF Flip Book</h3>
	<p>Display a flip book in a lightbox containing one your uploaded print materials in Narnoo</p>
	<p>shortcode: <strong>[narnoo_flip_book brochure=""]</strong>
	<h4>Options:</h4>
		<strong>brochure:</strong> The brochure id<br/>
		<strong>thumb:</strong> Size of button to display flip book - <em>Default: thumb || option: preview</em><br/>	
	</p>
	<!-- Noo flip book -->
	<h3>Narnoo Products</h3>
	<p>Displays a box of your imported Narnoo products</p>
	<p>shortcode: <strong>[narnoo_products]</strong>
	<h4>Options:</h4>
		<strong>display:</strong> How to display the product list - <em>Default: thumb || option: list</em><br/>	
		<strong>columns:</strong> How many products to display in a row - <em>Default: 3 || options: 1,2,3,4,6</em><br/>
	</p>
	<!-- Noo products -->
	<h3>Trip Advisor</h3>
	<p>Displays a trip advisor widget on the page. You will need the TripAdvisor© url to display the widget. This needs to go between the shortcode tags.</p>
	<p>shortcode: <strong>[narnoo_tripadvisor]{{tripadvisor_url}}[/narnoo_tripadvisor]</strong>
	<h4>Options:</h4>
		<strong>type:</strong> What type of TripAdvisor© widget to display - <em>Default: rating || options: reviews, scrolling</em><br/>	
		<strong>size:</strong> Size of the TripAdvisor© widget - <em>Default: narrow || options: wide</em><br/>
	</p>
	<!-- Noo products -->
</div>