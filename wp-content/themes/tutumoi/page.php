<?php get_header(); ?>

<div class="container">

<div class="col-sm-3">
<?php get_sidebar('page'); ?>
</div>

<div class="col-sm-9 page">
	<div class="breadcrumbs"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h2><?php the_title(); ?></h2>

			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	<?php endwhile; endif; ?>
</div>

</div>
<?php get_footer(); ?>
