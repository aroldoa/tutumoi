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
		<div class="col-sm-4">
			<img class="img-responsive" src="<?php bloginfo( 'template_directory' ); ?>/images/featured1.jpg"/>
			<img class="img-responsive" src="<?php bloginfo( 'template_directory' ); ?>/images/featured2.jpg"/>
		</div>
		<div class="col-sm-4">
			<img class="img-responsive" src="<?php bloginfo( 'template_directory' ); ?>/images/featured3.jpg"/>
		</div>
		<div class="col-sm-4">
			<img class="img-responsive" src="<?php bloginfo( 'template_directory' ); ?>/images/featured4.jpg"/>
			<img class="img-responsive" src="<?php bloginfo( 'template_directory' ); ?>/images/featured5.jpg"/>
		</div>
	</div>
</div>
<?php get_footer(); ?>
