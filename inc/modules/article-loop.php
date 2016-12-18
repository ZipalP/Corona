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