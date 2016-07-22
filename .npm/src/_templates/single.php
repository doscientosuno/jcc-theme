<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div class="row">
		<main id="main" class="col-xs-12" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Previous/next post navigation.
			the_post_navigation( array(
				'prev_text' => '<span class="btn" aria-hidden="true">' .
					'<span class="fa fa-angle-left"></span> ' .
					'<span class="sr-only">' . __( 'Previous post:' ) . '</span> ' .
					'<span class="post-title">%title</span></span>',
				'next_text' => '<span class="btn" aria-hidden="true">' .
					'<span class="sr-only">' . __( 'Next post:' ) . '</span> %title' .
					'<span class="post-title"></span> ' .
					'<span class="fa fa-angle-right"></span></span>'
			) );

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
