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
 									
									 <article>  
                                            <?php 
                                                $perma = get_permalink();
                                                $title = get_the_title();
                                                $author = get_the_author();
                                                $authorURL = get_author_posts_url( get_the_author_meta( 'ID' ));
                                                $thumb = get_the_post_thumbnail_url($medium);
                                                if(!$thumb){
                                                    $thumb = get_template_directory_uri() . '/inc/assets/missing.png';
                                                }
                                            ?>

                                            <div class="inner">
                                                <a title="<?php echo $title; ?>" href="<?php echo $perma; ?>">
                                                    <div class="thumb" style="background-image: url('<?php echo $thumb; ?>');">
                                                    </div>
                                                </a>

                                                <div class="meta">
                                                    <div class="sub">
                                                        <a title="<?php echo $title; ?>" href="<?php echo $perma; ?>"><h2><?php echo $title; ?></h2></a>
                                                        <p class="info"><a title="<?php echo 'Read other articles by ' . $author; ?>" href="<?php echo $authorURL ?>">by <?php echo $author; ?></a>, <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago</p>
                                                    </div>
                                                    <p><?php echo corona_excerpt(200); ?></p>
                                                </div>
                                            </div>
                                        </article>
								<?php endwhile; ?>
										<nav class="corona-loop-nav">
                                            <div class="btn-left"><?php echo get_next_posts_link( 'Older Articles', $latest->max_num_pages ); // display older posts link ?></div>
                                            <div class="btn-right"><?php echo get_previous_posts_link( 'Newer Articles'); // display newer posts link ?></div>
                                        </nav>
								<?php else :

									get_template_part( 'template-parts/content', 'none' );

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
