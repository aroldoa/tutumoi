<?php
/**
 * Template Name: Full Width
 *
 * A custom Home Page Template
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 */
get_header(); ?>

<div class="col-lg-12">
	<div class="breadcrumbs"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h2><span><?php the_title(); ?></span></h2>

			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		<?php endwhile; endif; ?>
</div>


<?php get_footer(); ?>
