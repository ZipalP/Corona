<?php
/**
 * Template name: Homepage
 *
 * The template for the homepage
 *
 * @package Cascade
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!--Featured Section-->
			
	
			<!--Main Block-->
			<div class="cascade-latest">
    <div class="container">
        <div class="cascade-new col-md-16">

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
							'posts_per_page'         => 20,
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
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
                            <?php 
                                $perma = get_permalink();
                                $title = get_the_title();
                                $author = get_the_author();
                                $authorURL = get_author_posts_url( get_the_author_meta( 'ID' ));
                                $thumb = get_the_post_thumbnail_url($medium);
                                if(!$thumb){
                                    $thumb = get_template_directory_uri() . '/inc/assets/missing.png';
                                }

                                if(is_sticky()){$stick=" sticked";}
                            ?>

                            <div class="inner">
                                <a title="<?php echo $title; ?>" href="<?php echo $perma; ?>">
                                    <div class="thumb" style="background-image: url('<?php echo $thumb; ?>');">
                                        <img src="<?php echo $thumb; ?>"/>
                                        <div class="layer"></div>
                                    </div>
                                </a>

                                <div class="meta<?php echo $stick; ?>">
                                    <div class="sub">
                                        <a title="<?php echo $title; ?>" href="<?php echo $perma; ?>"><h2><?php echo $title; ?></h2></a>
                                        <p class="info"><a title="<?php echo 'Read more articles by ' . $author; ?>" href="<?php echo $authorURL ?>">by <?php echo $author; ?></a><span class="time">, <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago</span></p>
                                        <a title="Join the discussion" href="<?php echo $perma . "#comments"; ?>"><span class="comment"><i class="arpha arpha-comment"></i><span class="disqus-comment-count" data-disqus-url="<?php echo $perma; ?>">0</span></span></a>
                                    </div>
                                    <p><?php echo corona_excerpt(320); ?></p>
                                </div>
                            </div>
                            ?>
                    </article>
					<?php endwhile; 
					
					if ($latest->max_num_pages > 1) { ?>
						<nav class="cascade-loop-nav">
							<span class="btn-left"><?php echo get_next_posts_link( ' <i class="arpha arpha-left"></i> Older Articles', $latest->max_num_pages ); // display older posts link ?></span>
							<span class="btn-right"><?php echo get_previous_posts_link( 'Newer Articles <i class="arpha arpha-right"></i>'); // display newer posts link ?></span>
						</nav>
					<?php } ?>

				<?php 
				else:
					echo "No more articles";	
				endif;
				// Restore original Post Data
				wp_reset_postdata();
            ?>

             <div class="load-instant-articles"></div>
             <div class="cascade-new-instant-tip"></div>
        </div>
        <div class="cascade-sidebar col-md-8">
            <div class="cascade-secondary">
                <?php 
                    title("Trending Articles");
                    cascade_trending_posts(3);
                ?>
            </div>
        </div>
    </div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();