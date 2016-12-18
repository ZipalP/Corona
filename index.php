<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corona
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!--Main Block-->
			<div class="corona-main latest-block">
                <div class="container">
                    <div class="corona-latest col-md-16">
                        <!--Featured Section-->
                        <?php
                            if(get_theme_mod( "corona_config_featured")){
                                echo corona_featured_section();
                            }
                        ?>

                        <div class="corona-article-list">
                            <?php
								if ( have_posts() ) : ?>
									<?php echo '<div class="title">Latest Posts</div>'; ?>

									<?php while ( have_posts() ) : the_post(); ?>
 									<?php get_template_part( 'inc/modules/article', 'loop' ); ?>
								<?php endwhile; ?>
										<nav class="corona-loop-nav">
                                            <div class="btn-left"><?php echo get_next_posts_link( 'Older Articles', $latest->max_num_pages ); // display older posts link ?></div>
                                            <div class="btn-right"><?php echo get_previous_posts_link( 'Newer Articles'); // display newer posts link ?></div>
                                        </nav>
								<?php else :

									get_template_part( 'inc/modules/article', 'missing' ); 	

								endif; 
							?>

                        </div>
                    </div>
                    <div class="corona-sidebar col-md-8">
                        <?php echo get_sidebar(); ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
