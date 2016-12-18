<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Corona
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!--Main Block-->
			<div class="corona-main single-post-block">
                <div class="container">
                    <div class="col-md-16">
                        <?php
							while ( have_posts() ) : the_post(); ?>
								<article>
									<header>
										<?php
											$author = get_the_author();
                                            $authorURL = get_author_posts_url( get_the_author_meta( 'ID' ));
										?>

										<h1><?php echo get_the_title(); ?></h1>
										<p><a title="<?php echo 'Read other articles by ' . $author; ?>" href="<?php echo $authorURL ?>">by <?php echo $author; ?></a><span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago</span></p>
									</header>
									<div class="post-container"><?php the_content(); ?></div>
								</article>


							<?php 

								if(get_theme_mod("corona_config_comments")){ ?>
									<div id="comments" class="comments-area">
										<div class="title">Comments</div>
										<?php if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif; ?>
									</div>
								<?php } else{
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								}
								
							endwhile; // End of the loop.
						?>

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