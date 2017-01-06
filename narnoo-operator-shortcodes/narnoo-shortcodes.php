<?php
/*
Plugin Name: Narnoo Shortcodes
Plugin URI: http://narnoo.com/
Description: Allows Wordpress users to display their Narnoo media on their Wordpress site. You will need the Narnoo Operator Plugin to activate this plugin.
Version: 2.0.0
Author: Narnoo Wordpress developer
Author URI: http://www.narnoo.com/
License: GPL2 or later
*/

/*  Copyright 2016  Narnoo.com  (email : info@narnoo.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// plugin definitions
define( 'NARNOO_OPERATOR_SHORTCODE_PLUGIN_NAME', 'Narnoo Shortcodes' );
define( 'NARNOO_OPERATOR_SHORTCODE_CURRENT_VERSION', '1.0.0' );
define( 'NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN', 'narnoo-shortcodes' );

define( 'NARNOO_OPERATOR_SHORTCODE_URL', plugin_dir_url( __FILE__ ) );
define( 'NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );



// begin!
new Narnoo_Shortcodes();

class Narnoo_Shortcodes {

	/**
	 * Plugin's main entry point.
	 **/
	function __construct() {
		if ( is_admin() ) {

			add_action( 'admin_menu', array( &$this, 'create_menu' ) );

		}else{
		
			add_shortcode( 'narnoo_gallery', 			array( &$this, 'narnoo_operator_gallery_shortcode' ) );
			add_shortcode( 'narnoo_gallery_slider', 	array( &$this, 'narnoo_operator_slider_shortcode' ) );
			add_shortcode( 'narnoo_single_gallery', 	array( &$this, 'narnoo_single_gallery_shortcode' ) );
			add_shortcode( 'narnoo_flip_book', 			array( &$this, 'narnoo_flip_book_shortcode' ) );
			add_shortcode( 'narnoo_video_player', 		array( &$this, 'narnoo_video_player_shortcode' ) );
			add_shortcode( 'narnoo_products', 			array( &$this, 'narnoo_products_shortcode' ) );
			add_shortcode( 'narnoo_tripadvisor', 		array( &$this, 'narnoo_tripadvisor_shortcode' ) );
			
			add_filter( 'widget_text', 'do_shortcode' );

		}
		
		
	}

	/**
	*	Create the shortcode help menu
	**/
	function create_menu(){	

		add_menu_page( 
			__('Narnoo ShortCode Information', 	NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN), 
			__('ShortCodes', 			NARNOO_OPERATOR_SHORTCODE_I18N_DOMAIN),  
			'manage_options', 
			'narnoo_shortcode_info', 
			array( &$this, 'narnoo_shortcode_info' ), 
			NARNOO_OPERATOR_SHORTCODE_URL . 'images/icon-16.png'
			);
	}

	/*
	*
	*	title: Narnoo page to display help information
	*	date created: 15-09-16
	*/
	function narnoo_shortcode_info(){
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/html/help_info_tpl.php' );
		echo ob_get_clean();
	}


	/**
	 * Display specified brochure with thumbnail or preview image, link to PDF file and caption.
	 **/
	function narnoo_operator_gallery_shortcode( $atts ) {
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/narnoo_gallery/gallery.php' );
		return ob_get_clean();
	}
	/*
	 * Loads Javascript files for tiles gallery shortcode.
	 */
	static function load_scripts_for_image_gallery() {
		// register custom names and dependencies for the common scripts which are to be loaded only once per page with shortcode(s)
		wp_register_script( 'narnoo.jquery.lightslidermaster', plugins_url( 'libs/narnoo_gallery/js/lightslider.min.js', __FILE__ ), array( 'jquery' ) );
		wp_register_style( 'narnoo.css.lightslidermaster', plugins_url( 'libs/narnoo_gallery/css/lightslider.min.css', __FILE__ ));
		
		// load the common scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'narnoo.jquery.lightslidermaster' );
		wp_enqueue_style( 'narnoo.css.lightslidermaster' );

		
	}

	/**
	 * Display specified brochure with thumbnail or preview image, link to PDF file and caption.
	 **/
	function narnoo_operator_slider_shortcode( $atts ) {
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/narnoo_slider/slider.php' );
		return ob_get_clean();
	}
	/*
	 * Loads Javascript files for tiles gallery shortcode.
	 */
	static function load_scripts_for_slider_gallery() {
		// register custom names and dependencies for the common scripts which are to be loaded only once per page with shortcode(s)
		wp_register_script( 'narnoo.jquery.cycle', plugins_url( 'libs/narnoo_slider/js/jquery.cycle.min.js', __FILE__ ), array( 'jquery' ) );
		wp_register_script( 'narnoo.jquery.center', plugins_url( 'libs/narnoo_slider/js/jquery.center.min.js', __FILE__ ), array( 'jquery','narnoo.jquery.cycle' ) );
		wp_register_style( 'narnoo.css.slider', plugins_url( 'libs/narnoo_slider/css/slider.min.css', __FILE__ ));
		
		// load the common scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'narnoo.jquery.cycle' );
		wp_enqueue_script( 'narnoo.jquery.center' );
		wp_enqueue_style( 'narnoo.css.slider' );

		
	}

	/**
	 * Display specified brochure with thumbnail or preview image, link to PDF file and caption.
	 **/
	function narnoo_single_gallery_shortcode( $atts ) {
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/narnoo_single_gallery/single_gallery.php' );
		return ob_get_clean();
	}
	/*
	 * Loads Javascript files for tiles gallery shortcode.
	 */
	static function load_scripts_for_single_gallery() {
		// register custom names and dependencies for the common scripts which are to be loaded only once per page with shortcode(s)
		wp_register_script( 'narnoo.js.single', plugins_url( 'libs/narnoo_single_gallery/imagebox/imagebox.min.js', __FILE__ ), array( 'jquery' ) );
		wp_register_script( 'narnoo.js.script', plugins_url( 'libs/narnoo_single_gallery/imagebox/script.js', __FILE__ ), array( 'jquery','narnoo.js.single' ));
		wp_register_style( 'narnoo.css.single', plugins_url( 'libs/narnoo_single_gallery/imagebox/imagebox.min.css', __FILE__ ));
		
		// load the common scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'narnoo.js.single' );
		wp_enqueue_style( 'narnoo.css.single' );

		
	}

	/**
	 * Display specified brochure with thumbnail or preview image, link to PDF file and caption.
	 **/
	function narnoo_flip_book_shortcode( $atts ) {
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/narnoo_flip_book/flipbook.php' );
		return ob_get_clean();
	}
	/*
	 * Loads Javascript files for tiles gallery shortcode.
	 */
	static function load_scripts_for_flip_book() {
		// register custom names and dependencies for the common scripts which are to be loaded only once per page with shortcode(s)
		wp_register_script( 'narnoo.js.noconflict', plugins_url( 'libs/narnoo_flip_book/js/jquery_no_conflict.js', __FILE__ ), array( 'jquery' ) );
		wp_register_script( 'narnoo.js.turn', plugins_url( 'libs/narnoo_flip_book/js/turn.js', __FILE__ ), array( 'jquery','narnoo.js.noconflict' ));
		wp_register_script( 'narnoo.js.wait', plugins_url( 'libs/narnoo_flip_book/js/wait.js', __FILE__ ), array( 'jquery','narnoo.js.noconflict','narnoo.js.turn' ));
		wp_register_script( 'narnoo.js.fullscreen', plugins_url( 'libs/narnoo_flip_book/js/jquery.fullscreen.js', __FILE__ ), array( 'jquery','narnoo.js.noconflict','narnoo.js.turn','narnoo.js.wait' ));
		wp_register_script( 'narnoo.js.address', plugins_url( 'libs/narnoo_flip_book/js/jquery.address-1.6.min.js', __FILE__ ), array( 'jquery','narnoo.js.noconflict','narnoo.js.turn','narnoo.js.wait','narnoo.js.fullscreen' ));
		wp_register_script( 'narnoo.js.campatible', plugins_url( 'libs/narnoo_flip_book/js/compatibility.js', __FILE__ ), array( 'jquery','narnoo.js.noconflict','narnoo.js.turn','narnoo.js.wait','narnoo.js.fullscreen','narnoo.js.address' ));
		wp_register_script( 'narnoo.js.pdf', plugins_url( 'libs/narnoo_flip_book/js/pdf.js', __FILE__ ), array( 'jquery','narnoo.js.noconflict','narnoo.js.turn','narnoo.js.wait','narnoo.js.fullscreen','narnoo.js.address','narnoo.js.campatible' ));
		wp_register_script( 'narnoo.js.onload', plugins_url( 'libs/narnoo_flip_book/js/onload.js', __FILE__ ), array( 'jquery','narnoo.js.noconflict','narnoo.js.turn','narnoo.js.wait','narnoo.js.fullscreen','narnoo.js.address','narnoo.js.campatible','narnoo.js.pdf' ));
		
		wp_register_style( 'narnoo.css.style', plugins_url( 'libs/narnoo_flip_book/css/style.css', __FILE__ ));
		wp_register_style( 'narnoo.css.font', plugins_url( 'libs/narnoo_flip_book/css/font-awesome.min.css', __FILE__ ));
		wp_register_style( 'narnoo.css.google', '//fonts.googleapis.com/css?family=Play:400,700');
		
		// load the common scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'narnoo.js.noconflict' );
		wp_enqueue_script( 'narnoo.js.turn' );
		wp_enqueue_script( 'narnoo.js.wait' );
		wp_enqueue_script( 'narnoo.js.fullscreen' );
		wp_enqueue_script( 'narnoo.js.address' );
		wp_enqueue_script( 'narnoo.js.campatible' );
		wp_enqueue_script( 'narnoo.js.pdf' );
		wp_enqueue_script( 'narnoo.js.onload' );
		wp_enqueue_style( 'narnoo.css.style' );
		wp_enqueue_style( 'narnoo.css.font' );
		wp_enqueue_style( 'narnoo.css.google' );

		
	}

	/**
	 * Display specified video player.
	 **/
	function narnoo_video_player_shortcode( $atts ) {
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/narnoo_video_player/player.php' );
		return ob_get_clean();
	}

	/**
	 * Display specified narnoo imported products.
	 **/
	function narnoo_products_shortcode( $atts ) {
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/narnoo_products/display.php' );
		return ob_get_clean();
	}
	/*
	 * Loads Javascript files for tiles gallery shortcode.
	 */
	static function load_scripts_for_narnoo_products() {
		// register custom names and dependencies for the common scripts which are to be loaded only once per page with shortcode(s)
		wp_register_style( 'product.css.min', plugins_url( 'libs/narnoo_products/css/style.min.css', __FILE__ ));
		
		// load the common scripts
		wp_enqueue_style( 'product.css.min' );

		
	}

	/**
	 * Display specified narnoo imported products.
	 **/
	function narnoo_tripadvisor_shortcode( $atts,$content=null ) {
		ob_start();
		require( NARNOO_OPERATOR_SHORTCODE_PLUGIN_PATH . 'libs/narnoo_tripadvisor/tripadvisor.php' );
		return ob_get_clean();
	}

	

	


}
