<?php
/*
Plugin Name: WooCommerce Quickview
Plugin URI: http://www.jckemp.com
Description: Quickview plugin for WooCommerce
Version: 3.0.2
Author: James Kemp
Author Email: support@jckemp.com  
*/

class jckqv {

/* 	=============================
   	// !Constants 
   	============================= */	
   	
   	public $name = 'WooCommerce Quickview';
   	public $shortname = 'Quickview';
	public $slug = 'jckqv';
    public $version = "3.0.2";
    public $plugin_path;
    public $plugin_url;
    public $settings;
	
/* 	=============================
   	// !Constructor 
   	============================= */
   	
	public function __construct() {
		
		$this->plugin_path = plugin_dir_path( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
		
		// register an activation hook for the plugin
		register_activation_hook( __FILE__, array( &$this, 'install' ) );

		// Hook up to the init action
		add_action( 'init', array( &$this, 'initiate' ) );
	}
  
/* 	=============================
   	// !Runs when the plugin is activated 
   	============================= */  
   	
	public function install() {
		// do not generate any output here
	}
  
/* 	=============================
   	// !Runs when the plugin is initialized 
   	============================= */
   	
	public function initiate() {
		// Setup localization
		load_plugin_textdomain( $this->slug, false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
		
	/* 	=============================
	   	// !Framework 
	   	============================= */
	   	
	   	require_once( $this->plugin_path .'/assets/options/jck-settings-framework/jck-settings-framework.php' );
        $this->settings = new JckSettingsFramework( $this->plugin_path .'/assets/options/jckqv_settings.php' );
        
        add_filter( 'jckqvsettings_settings_validate', array( &$this, 'sanitize_settings' ), 10, 1 );
		
	/* 	=============================
	   	// !Trigger Functions on Init 
	   	============================= */
	   	
		$this->register_scripts_and_styles();
	
		if ( is_admin() ) {
			//this will run when in the WordPress admin
		} else {
			//this will run when on the frontend
		}

	/* 	=============================
	   	// !Actions and Filters 
	   	============================= */
	   	
	   	$theSettings = $this->settings->__getSettings();
	   	
	   	// !Admin Actions
	   	add_action( 'admin_menu', array( &$this, 'admin_page' ) );  
	   	
	   	// !Frontend Actions
	   	
	   	/* Show Button */
	   	if($theSettings['trigger_position_autoinsert'] == 1){
		   	if($theSettings['trigger_position_position'] == 'beforeitem'){
		   		add_action( 'woocommerce_before_shop_loop_item', array( &$this, 'displayBtn' ) );
		   	} elseif($theSettings['trigger_position_position'] == 'beforetitle') {
		   		add_action( 'woocommerce_before_shop_loop_item_title', array( &$this, 'displayBtn' ) );
		   	} elseif($theSettings['trigger_position_position'] == 'aftertitle') {
		   		add_action( 'woocommerce_after_shop_loop_item_title', array( &$this, 'displayBtn' ) );
		   	} elseif($theSettings['trigger_position_position'] == 'afteritem') {
		   		add_action( 'woocommerce_after_shop_loop_item', array( &$this, 'displayBtn' ) );
		   	}
	   	}
	   	
	   	/* Ajax */
	   	add_action( 'wp_ajax_jckqv', array( &$this, 'quickviewModal' ) );
	   	add_action( 'wp_ajax_nopriv_jckqv', array( &$this, 'quickviewModal' ) );
	   	
	   	/* Dynamic CSS */
	   	add_action( 'wp_ajax_jckqv_styles', array( &$this, 'jckqv_styles' ) );
	   	add_action( 'wp_ajax_nopriv_jckqv_styles', array( &$this, 'jckqv_styles' ) );
	}
	
	function sanitize_settings($settings){

		// Validate Margins
		$i = 0; foreach($settings['trigger_position_margins'] as $marVal){
    		$settings['trigger_position_margins'][$i] = ($marVal != "") ? preg_replace('/[^\d-]+/', '', $marVal) : 0;
		$i++; }
		
		return $settings;
	}

/* 	=============================
   	// !Action and Filter Functions
   	============================= */
   	
/* 	=== Admin Function ===  */
   	
   	// !Admin Page

	public function admin_page() {
		add_submenu_page( 'woocommerce', $this->name, $this->shortname, 'manage_options', $this->slug, array( &$this, 'admin_page_options' ) );
	}
	
	public function admin_page_options() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		echo '<div class="wrap">';
			$this->settings->displaySettings();
		echo '</div>';
	}

/* 	=== Frontend Function ===  */

	// !Display the Button

	public function displayBtn($prodId = false){
		global $post;
		$prodId = ($prodId) ? $prodId : $post->ID;
		
		$theSettings = $this->settings->__getSettings();
		
		if($prodId){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $prodId ), 'medium' );
			echo '<span data-jckqvpid="'.$prodId.'" class="'.$this->slug.'Btn">'.($theSettings['trigger_styling_icon'] != 'none' ? '<i class="jckqv-icon-'.$theSettings['trigger_styling_icon'].'"></i>' : '').' '.$theSettings['trigger_styling_text'].'</span>';
		}
	}	
	
	//! Modal Contents
	
	public function quickviewModal(){
		check_ajax_referer( 'jckqv', 'nonce' );
		
		global $post, $product, $woocommerce;
		
		$post = get_post($_REQUEST['pid']); setup_postdata($post);
		$product = get_product( $_REQUEST['pid'] );
		
		$theSettings = $this->settings->__getSettings();
		
		echo '<div id="'.$this->slug.'" class="cf">';
		
			include($this->plugin_path.'/inc/qv-images.php');
			
			echo '<div id="'.$this->slug.'_summary">';
			
				if($theSettings['popup_content_showbanner']) include($this->plugin_path.'/inc/qv-sale-flash.php');			
				if($theSettings['popup_content_showtitle']) include($this->plugin_path.'/inc/qv-title.php');		
				if($theSettings['popup_content_showrating']) include($this->plugin_path.'/inc/qv-rating.php');		
				if($theSettings['popup_content_showprice']) include($this->plugin_path.'/inc/qv-price.php');
				if($theSettings['popup_content_showdesc'] != 'no') include($this->plugin_path.'/inc/qv-desc.php');
				if($theSettings['popup_content_showatc']) include($this->plugin_path.'/inc/qv-add-to-cart.php');					
				if($theSettings['popup_content_showmeta']) include($this->plugin_path.'/inc/qv-meta.php');
			
			echo '</div>';
			
			echo '<button title="Close (Esc)" type="button" class="mfp-close">×</button>';
			
			echo '<div id="addingToCart"><div><i class="jckqv-icon-cw animate-spin"></i> <span>'.__('Adding to Cart....', $this->slug).'</span></div></div>';
		echo '</div>';
		
		wp_reset_postdata();
		
		die;
	}
  
/* 	=============================
   	// !Frontend Scripts and Styles 
   	============================= */
   	
	public function register_scripts_and_styles() {
		$theSettings = $this->settings->__getSettings();
		
		if ( is_admin() ) {

		} else {
			//$this->load_file( 'magnific-js', '/assets/frontend/js/jquery.magnific.min.js', true );
			//$this->load_file( 'royalslider', '/assets/frontend/js/royalslider/jquery.royalslider.js', true );
			$this->load_file( $this->slug . '-script', '/assets/frontend/js/jckqv-scripts.min.js', true );
			
			//$this->load_file( 'jckqv-jckqv-icon-animation', '/assets/frontend/css/animation.css' );
			//$this->load_file( 'jckqv-icons', '/assets/frontend/css/jckqv-icons.css' );			
			//$this->load_file( 'royalslider', '/assets/frontend/js/royalslider/royalslider.css' );
			//$this->load_file( 'royalslider-default-skin', '/assets/frontend/js/royalslider/skins/minimal-white/rs-minimal-white.css' );			
			//$this->load_file( 'magnific-css', '/assets/frontend/css/jquery.magnific.css' );
			$this->load_file( $this->slug . '-minstyles', '/assets/frontend/css/jckqv-styles.min.css' );
			wp_enqueue_style( $this->slug . '-styles', admin_url('admin-ajax.php').'?action=jckqv_styles' );
		} // end if/else
		
		$imgsizes = array();
		$imgsizes['catalog'] = get_option( 'shop_catalog_image_size' );
		$imgsizes['single'] = get_option( 'shop_single_image_size' );
		$imgsizes['thumbnail'] = get_option( 'shop_thumbnail_image_size' );
		
		$scriptVars = array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( "jckqv" ),
			'settings' => $theSettings,
			'imgsizes' => $imgsizes
		);
		wp_localize_script( $this->slug . '-script', $this->slug, $scriptVars );
	} // end register_scripts_and_styles
	
	function jckqv_styles() {
		$imgsizes = array();
		$imgsizes['catalog'] = get_option( 'shop_catalog_image_size' );
		$imgsizes['single'] = get_option( 'shop_single_image_size' );
		$imgsizes['thumbnail'] = get_option( 'shop_thumbnail_image_size' );
		$theSettings = $this->settings->__getSettings();
		include($this->plugin_path.'/assets/frontend/css/styles.css.php');
		exit;
	}
	
/* 	=============================
   	Helper function for registering and enqueueing scripts and styles.
   	@name: 			The ID to register with WordPress
   	@file_path: 	The path to the actual file
   	@is_script:		Optional argument for if the incoming file_path is a JavaScript source file.
   	@deps:			Array of dependancies
   	@inFooter:		Whther to load this script in the footer
   	============================= */
	
	private function load_file( $name, $file_path, $is_script = false, $deps = array('jquery'), $inFooter = true ) {

		$url = plugins_url($file_path, __FILE__);
		$file = plugin_dir_path(__FILE__) . $file_path;

		if( file_exists( $file ) ) {
			if( $is_script ) {
				wp_register_script( $name, $url, $deps, false, $inFooter ); //depends on jquery
				wp_enqueue_script( $name );
			} else {
				wp_register_style( $name, $url );
				wp_enqueue_style( $name );
			} // end if
		} // end if

	} // end load_file
  
} // end class

$jckqv = new jckqv();