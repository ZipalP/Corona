<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Corona
 */

get_header('404'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="container site-main" role="main">
			<div class="info">
				<h1>It looks like you hit a 404!</h1>
				<p>Would you like help?</p>
				<ul>
					<li><a href="<?php echo get_home_url(); ?>">Go to the homepage</a></li>
					<li><a href="<?php echo admin_url(); ?>">Login</a></li>
				</ul>
			</div>
			<img src="<?php echo get_template_directory_uri() . '/inc/assets/clippy.gif'; ?>"/>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php