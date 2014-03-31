<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>


	<div class="col-lg-12 breadcrumbs">
		<?php do_action('woo_custom_breadcrumb'); ?>
	</div>

	<div class="clear"></div>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );


	?>

	<div class="col-sm-5  entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
	<?php

		do_action( 'woo_tabs' );
		echo do_shortcode('[social_share/]');
	?>


	</div><!-- .summary -->
	<div class="col-sm-2 previously-viewed">
		<?php the_widget( 'WC_Widget_Recently_Viewed','title=Recently Viewed&number=3', '' ); ?>
	</div>
<div class="clear"></div>
<div class="prod-upsell">
	<?php
		/**
		 * woo related hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 20
		 */
		do_action('woo_related');
	?>
	</div><!-- end of product upsell area -->



	<meta itemprop="url" content="<?php the_permalink(); ?>" />





</div><!-- #product-<?php the_ID(); ?> -->


<div class="clear"></div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
