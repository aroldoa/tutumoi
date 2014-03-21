<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs">
		<ul class="tabs">
			<?php foreach ( $tabs as $key => $tab ) :
				if(!empty($tab['callback'])){?>
					<li class="<?php echo $key ?>_tab">
						<div class="title"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></div>
						<div class="panel entry-content" id="tab-<?php echo $key ?>">
							<?php call_user_func( $tab['callback'], $key, $tab ) ?>
						</div>
					</li>
				<?php } ?>

			<?php endforeach; ?>
		</ul>
	</div>

<?php endif; ?>