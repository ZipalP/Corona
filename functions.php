<?php
/**
 * Corona functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Corona
 */

if ( ! function_exists( 'corona_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function corona_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Corona, use a find and replace
	 * to change 'corona' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'corona', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'corona' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'corona_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'corona_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'corona_content_width', 640 );
}
add_action( 'after_setup_theme', 'corona_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corona_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Corona Sidebar', 'corona' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'corona_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function corona_scripts() {
	wp_enqueue_style( 'corona-style', get_stylesheet_uri(), true, '1.0', 'all');

	wp_enqueue_style( 'corona-base-css', get_template_directory_uri() . '/inc/css/winstrap.css', true, '1.0', 'all' );

	wp_enqueue_script( 'corona-main', get_template_directory_uri() . '/inc/js/app.js', array( 'jquery' ), true );

	wp_enqueue_script( 'corona-base-js', get_template_directory_uri() . '/inc/js/winstrap.js', array( 'jquery' ), true );
	
}

add_action( 'wp_enqueue_scripts', 'corona_scripts' );


function corona_excerpt($limit) {
    $excerpt = get_the_excerpt($post->ID);
    if(strlen($excerpt) > $limit) {
        $excerpt = substr($excerpt, 0, $limit) . '...';
    }

    echo $excerpt;
}

//navigation
function corona_get_nav( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
         
        $menu_list  = '<nav class="navbar navbar-fixed-top navbar-default">' ."\n";
		$menu_list .= '<div class="navbar-local color-accent theme-dark">' ."\n";
        $menu_list .= '<div class="container">' ."\n";
        $menu_list .= '<div class="navbar-header">' ."\n";
        $menu_list .= '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#corona-nav" aria-expanded="false">' ."\n";
        $menu_list .= '<span class="sr-only">Toggle navigation</span>' ."\n";
        $menu_list .= '<span class="icon-bar"></span>' ."\n";
        $menu_list .= '<span class="icon-bar"></span>' ."\n";
        $menu_list .= '<span class="icon-bar"></span>' ."\n";
        $menu_list .= '</button>' ."\n";

		if(get_theme_mod( "corona_site_logo")){
			$menu_list .= '<a class="navbar-brand" href="' . home_url() . '"><img class="logo" src="' . get_theme_mod( "corona_site_logo") . '"/><span>'.get_bloginfo( 'name' ).'</span></a>';
		} else{
			$menu_list .= '<a class="navbar-brand" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>';
		}
        
        $menu_list .= '</div>' ."\n";
                 
         
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
 
        $menu_list .= '<div class="collapse navbar-collapse" id="corona-nav">' ."\n";
        $menu_list .= '<ul class="nav navbar-nav navbar-right">' ."\n";
          
        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                 
                $parent = $menu_item->ID;
                 
                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<li><a href="' . $submenu->url . '">' . $submenu->title . '</a></li>' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {
                     
                    $menu_list .= '<li class="dropdown">' ."\n";
                    $menu_list .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . ' <span class="caret"></span></a>' ."\n";
                     
                    $menu_list .= '<ul class="dropdown-menu">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</ul>' ."\n";
                     
                } else {
                     
                    $menu_list .= '<li>' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                }
                 
            }
             
            // end <li>
            $menu_list .= '</li>' ."\n";
        }

        if( current_user_can('editor') || current_user_can('administrator') ) {
            $menu_list .=  "<li><a href='" . admin_url() . "'>Admin Panel</a></li>";
        } 
          
        $menu_list .= '</ul>' ."\n";
        $menu_list .= '</div>' ."\n";
        $menu_list .= '</div><!-- /.container-fluid -->' ."\n";
        $menu_list .= '</nav>' ."\n";
  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}


//disable admin bar
show_admin_bar(false);

new theme_customizer();

class theme_customizer
{
    public function __construct()
    {
        add_action ('admin_menu', array(&$this, 'customizer_admin'));
        add_action( 'customize_register', array(&$this, 'customize_manager_demo' ));
    }

    /**
     * Add the Customize link to the admin menu
     * @return void
     */
    public function customizer_admin() {
        add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
    }

    /**
     * Customizer manager 
     * @param  WP_Customizer_Manager $wp_manager
     * @return void
     */
    public function customize_manager_demo( $wp_manager )
    {
        $this->corona_customize_section( $wp_manager );
    }

    public function corona_customize_section( $wp_manager )
    {
        $wp_manager->add_section( 'corona_custmzr_section', array(
            'title'          => 'Corona Settings',
            'priority'       => 1,
        ) );


		// Corona site logo
        $wp_manager->add_setting( 'corona_site_logo', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'corona_site_logo', array(
            'label'   => 'Site logo',
            'section' => 'corona_custmzr_section',
            'settings'   => 'corona_site_logo',
            'priority' => 1
        ) ) );

		
        // Homepage Article Count
        $wp_manager->add_setting( 'corona_config_homepageArticleCount', array(
            'default'        => '16',
        ) );

        $wp_manager->add_control( 'corona_config_homepageArticleCount', array(
            'label'   => 'Amount of articles to display on homepage',
            'section' => 'corona_custmzr_section',
            'type'    => 'text',
            'priority' => 2
        ) );

		// Featured section
        $wp_manager->add_setting( 'corona_config_featured', array(
            'default'        => '1',
        ) );

        $wp_manager->add_control( 'corona_config_featured', array(
            'label'   => 'Enable featured section on homepage?',
            'section' => 'corona_custmzr_section',
            'type'    => 'checkbox',
            'priority' => 3
        ) );

		// Featured article categories
        $wp_manager->add_setting( 'corona_config_featcat', array(
            'default'        => '1',
        ) );

		$categories = get_categories();
		$output = array();
 
		foreach ( $categories as $category ) { $output[] =  $category->name; }

        $wp_manager->add_control( 'corona_config_featcat', array(
            'label'   => 'Featured Articles Category',
            'section' => 'corona_custmzr_section',
            'type'    => 'select',
            'choices' => $output,
            'priority' => 4
        ) );
    }

}

function corona_featured_section(){
	$output = array();
	$categories = get_categories();
	foreach ( $categories as $category ) { $output[] =  $category->name; }
	
	// WP_Query arguments
	$args = array(
		'category_name'          => $output[get_theme_mod( "corona_config_featcat")],
		'posts_per_page'			 => 1
	);

	// The Query
	$query = new WP_Query( $args );

	echo "<div class='corona-featured'>";

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post(); ?>
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

				<a title="<?php echo $title; ?>" href="<?php echo $perma; ?>">
					<div class="thumb" style="background-image: url('<?php echo $thumb; ?>');"></div>
					<div class="meta">
						<h2><?php echo $title; ?></h2>
						<p class="info">by <?php echo $author; ?>, <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago</p>
					</div>
					<div class="layer"></div>
				</a>
			</article>
		<?php }
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();

	echo "</div>";
}

function corona_comments( $comment, $args, $depth ){
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : 
        break;

        default : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <article <?php comment_class(); ?> class="comment">
                    <div class="comment-body">
                        <div class="author">
                            <?php echo get_avatar( $comment, 72 ); ?>
                            
                            <div class="comment-meta">
                                <span><?php comment_author(); ?>
                                    <div class="reply">
                                        <?php 
                                            comment_reply_link( array_merge( $args, array( 
                                            'reply_text' => 'Reply',
                                            'depth' => $depth,
                                            'max_depth' => $args['max_depth'] 
                                            ) ) );
                                        ?>
                                    </div>
                                </span>
                                <time <?php comment_time( 'c' ); ?>>Posted on <?php comment_date(); ?> at <?php comment_time(); ?></time>
                            </div>
                        </div>
                        <?php comment_text(); ?>
                    </div>  
                </article>
            </li>
        <?php 
        break;
    endswitch;
}