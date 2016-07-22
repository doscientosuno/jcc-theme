<?php get_header(); ?>

<main id="main" role="main">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Front page')) : ?>
	[ do default stuff if no widgets ]
	<?php endif; ?>
	<!-- Formaciò -->
	<section id="formacio" class="front-formacio">
		<div class="parallax-window parallax-window-40" data-parallax="scroll" data-image-src="http://jcc.cat/wp-content/themes/jcc/images/bg_formacio.jpg">
			<div class="parallax-window-content">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<h2 class="front-formacio-title text-uppercase">Formaciò</h2>
						</div>
						<?php
							wp_nav_menu( array(
								'menu_class'     => 'col-xs-12 col-md-4 front-formacio-links',
								'theme_location' => 'links',
								'container'			 => 'false'
							) );
							wp_nav_menu( array(
								'menu_class'     => 'col-xs-12 col-md-4 front-formacio-documents',
								'theme_location' => 'documents',
								'container'			 => 'false'
							) );
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Formaciò! -->
	<!-- Bloc -->
	<section class="front-bloc container">
		<?php query_posts('category_name=bloc&posts_per_page=2'); ?>
		<h2 class="text-uppercase text-xs-center m-t-3 m-b-3"><?php single_cat_title(); ?></h2>
		<div class="post-date m-b-3"><?php echo category_description(91); ?></div>
		<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="col-xs-12 col-md-6 m-b-1">
				<a class="front-bloc-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'bloc' ); ?>
					<div class="front-bloc-info">
						<h3 class="front-bloc-title"><?php the_title(); ?></h3>
					</div>
				</a>
			</article>
		<?php endwhile; endif; ?>
		</div>
		<a href="categorie/bloc" class="btn btn-lg text-xs-center m-t-3">Veure totes</a>
	</section>
	<!-- /Bloc -->
</main><!-- .site-main -->

<?php get_footer(); ?>
