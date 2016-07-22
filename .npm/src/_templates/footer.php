<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->
	<i id="contactans"></i>
	<footer id="footer" class="footer reverse" role="contentinfo">
		<div class="container">
			<div class="row">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contactans')) : ?>
				[ do default stuff if no widgets ]
				<?php endif; ?>
			</div>
		</div>
		<div class="wp-theme-credits">
			<p><a href="https://www.lamaquinadeturing.com">Tema de Wordpress dissenyat i desenvolupat per La Máquina de Turing</p></a>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
