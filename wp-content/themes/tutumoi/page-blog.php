<?php
/**
 * Template Name: Custom Blog
 *
 * A custom Home Page Template
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 */
get_header(); ?>

<div class="col-lg-9 page">
	<div class="breadcrumbs"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>

			<div class="post-entry">
				<?php the_excerpt(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	<?php endwhile; endif; ?>
</div>

<div class="col-lg-3">
<?php get_sidebar('page'); ?>
</div>



<?php get_footer(); ?>
