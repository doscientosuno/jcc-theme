<?php
/**
 * The begining of the document, the header and the main nav
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container-fluid">
	<a class="sr-only" href="#content"><?php _e( 'Skip to content', 'jcc-theme' ); ?></a>

	<nav class="navbar navbar-fixed-top navbar-dark bg-primary">
		<div class="navbar-brand">
			<?php jcc_theme_the_custom_logo(); ?>
      <a class="navbar-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php	bloginfo( 'name' ); ?>
			</a>
			<button class="navbar-toggler hidden-lg-up pull-right btn-primary" type="button" data-toggle="collapse" data-target="#mainMenu">
	      &#9776;
				<span class="sr-only"><?php _e( 'Menu and widgets', 'jcc-theme' ); ?></span>
	    </button>
    </div>

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div class="collapse navbar-toggleable-lg" id="mainMenu" role="navigation">
        <h2 class="sr-only"><?php _e( 'Primary Menu', 'jcc-theme' ) ?></h2>
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav navbar-nav',
						'theme_location' => 'primary',
						'container'			 => 'false',
						'walker'				 => new primary_walker
					) );
				?>
			</nav>
		<?php endif; ?>
	</nav>
</div>
<div id="content">
