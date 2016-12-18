<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corona
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="theme-dark site-footer" role="contentinfo">
		<div class="container">
			<p>© <?php echo date("Y") . ' ' . get_bloginfo("name"); ?></p>
			<a href="https://twitter.com/MehediH_" rel="designer">Designed and developed by Mehedi Hassan</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div class="overlay"></div>
</body>
</html>
