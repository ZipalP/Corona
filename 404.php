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
				<h1><?php esc_html_e('It looks like you hit a 404!', 'corona'); ?></h1>
				<p><?php esc_html_e('Would you like help?','corona');?></p>
				<ul>
					<li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go to the homepage','corona'); ?></a></li>
					<li><a href="<?php echo esc_url(admin_url('/')); ?>"><?php esc_html_e('Login', 'corona'); ?></a></li>
				</ul>
			</div>
			<img src="<?php echo get_template_directory_uri() . '/inc/assets/clippy.gif'; ?>"/>
		</main><!-- #main -->
	</div><!-- #primary -->

