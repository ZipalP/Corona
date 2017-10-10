<article <?php post_class(); ?>>  
   

    <div class="inner">
        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
           <?php the_post_thumbnail('medium'); ?>
        </a>

        <div class="meta">
            <div class="sub">
                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                <p class="info"><?php esc_html_e('by ','corona');?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> <?php the_time( get_option( 'date_format' ) ); ?></p>
            </div>
            <p><?php corona_excerpt(200); ?></p>
        </div>
    </div>
</article>