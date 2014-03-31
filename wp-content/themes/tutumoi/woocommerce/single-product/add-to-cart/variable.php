<?php
/**
 * Variable product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product, $post;
?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo $post->ID; ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
	<?php if ( ! empty( $available_variations ) ) : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php $loop = 0; foreach ( $attributes as $name => $options ) : $loop++;?>
					<tr>
						<td class="label"><label for="<?php echo sanitize_title($name); ?>"><?php echo wc_attribute_label( $name ); ?></label></td>
						<td class="value">
							
								<?php if ($name == 'pa_color'){?>
									 <div id="leaves_container" name="attribute_<?php echo sanitize_title( $name ); ?>">
									
									<?php }else{?>
								
									<select id="<?php echo esc_attr( sanitize_title( $name ) ); ?>" name="attribute_<?php echo sanitize_title( $name ); ?>">
										<option value=""><?php echo __( 'Choose an option', 'woocommerce' ) ?>&hellip;</option>
							<?php }?>
							
							<?php

								if ( is_array( $options ) ) {

									if ( isset( $_REQUEST[ 'attribute_' . sanitize_title( $name ) ] ) ) {
										$selected_value = $_REQUEST[ 'attribute_' . sanitize_title( $name ) ];
									} elseif ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) {
										$selected_value = $selected_attributes[ sanitize_title( $name ) ];
									} else {
										$selected_value = '';
									}

									// Get terms if this is a taxonomy - ordered
									if ( taxonomy_exists( $name ) ) {

										$orderby = wc_attribute_orderby( $name );

										switch ( $orderby ) {
											case 'name' :
												$args = array( 'orderby' => 'name', 'hide_empty' => false, 'menu_order' => false );
											break;
											case 'id' :
												$args = array( 'orderby' => 'id', 'order' => 'ASC', 'menu_order' => false, 'hide_empty' => false );
											break;
											case 'menu_order' :
												$args = array( 'menu_order' => 'ASC', 'hide_empty' => false );
											break;
										}

										$terms = get_terms( $name, $args );

										foreach ( $terms as $term ) {
											if ( ! in_array( $term->slug, $options ) )
												continue;

											if($name == 'pa_color'){
												// echo '<button type="button" class="color_leaves" style="background-color:' . esc_attr( $term->slug ) . ' " value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</button>';
												echo '<button type="button" class="color_leaves" style="background-image: url(\'../../../wp-content/themes/tutumoi/images/' . esc_attr( $term->slug ) . '.png\') " value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '></button>';
												
											}else{
												echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
											}
										}
									} else {

										foreach ( $options as $option ) {
											echo '<option value="' . esc_attr( sanitize_title( $option ) ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
										}

									}
								}
							?>
						<?php
							if($name == 'pa_color'){
								echo '</div>';
							}else{
								echo '</select>';
							}

							if ( sizeof($attributes) == $loop )
								echo '<a class="reset_variations" href="#reset">' . __( 'Clear selection', 'woocommerce' ) . '</a>';
						?></td>
					</tr>
		        <?php endforeach;?>
			</tbody>
		</table>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap" style="display:none;">
			<?php do_action( 'woocommerce_before_single_variation' ); ?>

			<div class="single_variation"></div>

			<div class="variations_button">
				<?php woocommerce_quantity_input(); ?>
				<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>
			</div>

			<input type="hidden" name="add-to-cart" value="<?php echo $product->id; ?>" />
			<input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
			<input type="hidden" name="variation_id" value="" />

			<?php do_action( 'woocommerce_after_single_variation' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php else : ?>

		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>

	<?php endif; ?>

</form>
<script>
(function(){
	$('.color_leaves').on('click', function(){
    		var content;
    		$leaves = $(this);
    		$leaves.css("border","1px solid black").siblings().css("border","");
    		content = '<select style="display:none" id="pa_color" name="attribute_pa_color"><option value="' + $leaves.val() + '" selected="selected">' + $leaves.val() + '</option></select>';
    		$leaves.append(content);
    		$leaves.siblings().find('select').remove();
    		$leaves.find('select').siblings('select[name=attribute_pa_color]').remove();

    	});	
})();

</script>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
