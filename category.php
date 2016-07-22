<?php get_header(); ?>
<div class="container">
	<main id="main" role="main">

	<?php if ( have_posts() ) : ?>
			<header>
				<h1 class="text-uppercase text-xs-center m-t-3 m-b-3"><?php single_cat_title(); ?></h1>
			</header>
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
		?>
			<article class="row">
				<div class="col-xs-12 col-md-6 m-b-1">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'bloc' ); ?>
					</a>
				</div>
				<div class="col-xs-12 col-md-6 m-b-1">
					<div class="post-date"><?php the_date(); ?></div>
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php the_excerpt(); ?>
				</div>
			</article>
			<br><br>
			 <?php
			//get_template_part( 'content', get_post_format() );

		// End the loop.
		endwhile;

		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page' ),
			'next_text'          => __( 'Next page' ),
			'before_page_number' => '<span class="sr-only">' . __( 'Page' ) . ' </span>',
		) );

	// If no content, include the "No posts found" template.
	else :
		get_template_part( 'content', 'none' );

	endif;
	?>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
