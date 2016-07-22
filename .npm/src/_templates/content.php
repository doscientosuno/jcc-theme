<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<div class="container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="m-t-3">
			<div class="post-date"><?php the_date(); ?></div>
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="text-xs-left">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
				edit_post_link( __( 'Edit' ) );
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s' ),
					the_title( '<span class="sr-only">', '</span>', false )
				) );

				// Post thumbnail.
				the_post_thumbnail();

				/*wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="sr-only">' . __( 'Page' ) . ' </span>%',
					'separator'   => '<span class="sr-only">, </span>',
				) );*/
			?>
		</div><!-- .entry-content -->

		<?php
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>

	</article><!-- #post-## -->
</div>
