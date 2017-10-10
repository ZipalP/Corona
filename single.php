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
								<article <?php post_class(); ?>>
									<header>
										

										<h1><?php echo get_the_title(); ?></h1>
										<p><?php esc_html_e('by ','corona');?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a><span><?php the_time( get_option( 'date_format' ) ); ?></span></p>
									</header>
									<div class="post-container">
									
										<?php the_content(); ?>
										<?php wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corona' ),
											'after'  => '</div>',
										) );
										?>
										<?php
											if(has_tag()) { ?> 
												<p class="post-tags">			
											
												<?php the_tags('<span>'.('Tags:').'</span> ','','</p>'); ?> <br>
												
										<?php } ?>
									</div>
								</article>


							<?php 

								if(get_theme_mod("corona_config_comments")){ ?>
									<div id="comments" class="comments-area">
										<div class="title"><?php esc_html_e('Comments','corona');?></div>
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
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();