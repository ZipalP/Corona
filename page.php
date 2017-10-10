<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corona
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!--Main Block-->
			<div class="corona-main">
                <div class="container">
                    <div class="corona-latest col-md-16">
                        <div class="corona-normal-page">
                            <?php
								while ( have_posts() ) : the_post();
									echo '<div class="title">' . get_the_title() . '</div>'; ?>
									<div class="inner"><?php the_content(); ?></div>
								<?php endwhile; // End of the loop.
							?>
                        </div>
                    </div>
                    <div class="corona-sidebar col-md-8">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();