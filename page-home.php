<?php
/**
 * Template name: Homepage
 *
 * The template for the homepage
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
                            <div class="title"><?php esc_html_e('Latest Posts','corona');?></div>
                            <?php 

                                if ( get_query_var('paged') ) {
                                    $paged = get_query_var('paged');
                                } elseif ( get_query_var('page') ) {
                                    $paged = get_query_var('page');
                                } else {
                                    $paged = 1;
                                }

                                $query = array (
                                            'post_type'              => array( 'post' ),
                                            'post_status'            => array( 'publish' ),
                                            'posts_per_page'         => get_theme_mod( "corona_config_homepageArticleCount"),
                                            'paged' 				 => $paged,
                                            'cache_results'          => false,
                                            'update_post_meta_cache' => true,
                                            'update_post_term_cache' => true,
                                        );

                                $latest = new WP_Query($query);

                                // The Loop
                                if ( $latest->have_posts() ):
                                    while ( $latest->have_posts() ):
                                        $latest->the_post(); ?>
                                        <?php get_template_part( 'inc/modules/article', 'loop' ); ?>
                                    <?php endwhile; 
                                    
                                    if ($latest->max_num_pages > 1) { ?>
                                        <nav class="corona-loop-nav">
                                            <div class="btn-left"><?php echo get_next_posts_link( 'Older Articles', $latest->max_num_pages ); // display older posts link ?></div>
                                            <div class="btn-right"><?php echo get_previous_posts_link( 'Newer Articles'); // display newer posts link ?></div>
                                        </nav>
                                    <?php } ?>

                                <?php 
                                else:
                                    get_template_part( 'inc/modules/article', 'missing' ); 	
                                endif;
                                // Restore original Post Data
                                wp_reset_postdata();
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