<?php

	// Add RSS links to <head> section
	automatic_feed_links();

	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}

	add_theme_support( 'woocommerce' );
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	//Adding image support for category images

	add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );

	function woocommerce_category_image() {
        if ( is_product_category() ){
    	    global $wp_query;
    	    $cat = $wp_query->get_queried_object();
    	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
    	    $image = wp_get_attachment_url( $thumbnail_id );
    	    if ( $image ) {
    		    echo '<div class="cat-banner"><img src="' . $image . '" alt="" class="img-responsive" /></div>';
    		}
    	}
    }

	//Removing Breadcrumbs to reposition them
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	add_action( 'woo_custom_breadcrumb', 'woocommerce_breadcrumb' );

	add_theme_support('post-thumbnails');
	add_post_type_support( 'page', 'excerpt' );

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

     if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Page Sidebar',
    		'id'   => 'page-sidebar',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

     if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Blog Sidebar',
    		'id'   => 'blog-sidebar',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

    register_nav_menus( array(
        'main' => 'Main nav'

        ) );

    function woocommerce_remove_product_thumbnail(){
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
    }

    add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_remove_product_thumbnail');

    function woocommerce_custom_product_category(){
        global $post;
        global $product;

        $size = 'shop_catalog';
        $opening_container = '<div class="overlay">';
        $attachment_ids = $product->get_gallery_attachment_ids();
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size);

        if(has_post_thumbnail() && ($attachment_ids)){
            $attrs = array(
                'id'    => 'product_category_image_0',
                'src'   => $src[0],
                'class' => "img-responsive attachment-$size",
                'alt'   => trim(strip_tags( $attachment->post_excerpt )),
                'title' => trim(strip_tags( $attachment->post_title )),
            );
            $img_tags = (get_the_post_thumbnail( $post->ID, $size, $attrs));
        }

        if($attachment_ids){
            for($i=0; $i<=0;$i++){
                $image_link = wp_get_attachment_url( $attachment_ids[$i] );
                $image_metadata = wp_get_attachment_metadata( $attachment_ids[$i]);
                if(isset($image_metadata['sizes'])){
                    $image_size = $image_metadata['sizes'][$size];
                }

                $img_tags .= '<img id="product_category_image_'. ($i+1) .'" src="' . $image_link . '" width="'. $image_size['width'] .'" height="'. $image_size['height'] .'"  />';
            }
            $closing_container = '</div>';
            $images = $opening_container . $img_tags . $closing_container;
            echo($images);

        }elseif(has_post_thumbnail()){
             $attrs = array(
                'id'    => 'product_category_image_0',
                'src'   => $src[0],
                'class' => "img-responsive attachment-$size",
                'alt'   => trim(strip_tags( $attachment->post_excerpt )),
                'title' => trim(strip_tags( $attachment->post_title )),
            );
            echo (get_the_post_thumbnail( $post->ID, $size, $attrs));
        }
        elseif ( wc_placeholder_img_src() )
            echo (wc_placeholder_img( $size ));
    }

    add_action( 'woo_custom_product_category', 'woocommerce_custom_product_category' );


// ************************************************************************************************************************

    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
    function woocommerce_custom_price_loop(){
        global $product;

        if ( $price_html = $product->get_price_html() ) :
            echo('<div class="prod-price">'.$price_html .'</div>');
        endif;
    }
    add_action( 'woo_custom_price_loop', 'woocommerce_custom_price_loop' );

// ************************************************************************************************************************
    // function woo_custom_product_loop_start(){
    //     echo('<div class="col-sm-4">');
    // }
    // function woo_custom_product_loop_end(){
    //     echo('</div>');
    // }

?>