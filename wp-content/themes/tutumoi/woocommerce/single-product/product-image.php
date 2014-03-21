<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="col-sm-5 images row">
	<ul class="bxslider">

	<?php
		if ( has_post_thumbnail() ) {

			$attachment_ids 	= $product->get_gallery_attachment_ids();
			$attachment_count	= count($attachment_ids);

			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title,
				'class'	=> "img-responsive"
				) );
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li>%s</li>',$image ), $post->ID );

			if ( $attachment_count > 0 ) {
				foreach ( $attachment_ids as $attachment_id ) {
					$image_link 	= wp_get_attachment_url( $attachment_id );
					$image_title 	= esc_attr( get_the_title( $attachment_id ) );
					$image       	= wp_get_attachment_image( $attachment_id,  apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
						'title' => $image_title,
						'class'	=> "img-responsive"
						) );
					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li>%s</li>', $image ), $post->ID );
				}
			}

		}
		else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>
	</ul>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
