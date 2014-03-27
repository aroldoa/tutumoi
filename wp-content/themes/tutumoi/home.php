<?php
/**
 * Template Name: Custom Home Page
 *
 * A custom Home Page Template
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 */
get_header(); ?>

<div class="slideshow">
	<div class="col-lg-12">
		<?php putRevSlider("home") ?>
	</div>
</div><!-- end of slideshow -->
<div class="clear"></div>
<div class="featured-products">
	<div class="col-lg-12">
		
			<!-- <h2><span>Featured Products</span></h2> -->
			<?php  
			    $args = array( 'post_type' => 'product', 'posts_per_page' => 10,'meta_key' => '_featured',  'meta_value' => 'yes' );

			    $loop = new WP_Query( $args );

			    $i = 1;
			    while ( $loop->have_posts() ) : $loop->the_post(); 
				    global $product; 
				    global $jckqv;

				    

				    if( ($i % 5) == 3 ){
						echo '<div class="col-sm-4">';
						echo '<a href="'.get_permalink().'">' . woocommerce_custom_featured();
						if(!empty($jckqv)){
			                echo($jckqv->displayBtn($post->ID));
			            }
			            echo '</a>';
						echo '</div>';
				    }
				    //positions 1 and 3
				    elseif((($i % 5) == 1) || (($i % 5) == 4)){
				    	echo '<div class="col-sm-4">';
				    	echo '<a href="'.get_permalink().'">' . woocommerce_custom_featured();
				    	if(!empty($jckqv)){
			                echo($jckqv->displayBtn($post->ID));
			            }
			            echo '</a>';
				    }
				    //positions 2 and 5
				    elseif((($i % 5) == 2) || (($i % 5) == 0)){
				    	echo '<a href="'.get_permalink().'">' . woocommerce_custom_featured();
				    	if(!empty($jckqv)){
			                echo($jckqv->displayBtn($post->ID));
			            }
			            echo '</a>';
				    	echo '</div>';

				    }
				    
				    $i++;
			    endwhile; 

			    wp_reset_query(); 

			?>
		
	</div>
</div>
<?php get_footer(); ?>
