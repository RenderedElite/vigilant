<?php
add_action( 'after_setup_theme', 'vigilant_setup' );
function vigilant_setup()
{
load_theme_textdomain( 'vigilant', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'vigilant' ) )
);
register_nav_menus(
array( 'footer-menu' => __( 'Footer Menu', 'vigilant'))
);
}
add_action( 'wp_enqueue_scripts', 'vigilant_load_scripts' );
function vigilant_load_scripts()
{
wp_enqueue_script( 'jquery' );
wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri().'/js/bootstrap.min.js', array('jquery'), NULL, true);
wp_enqueue_script('viewportchecker-js', get_stylesheet_directory_uri().'/js/jquery.viewportchecker.min.js', array('jquery'), NULL, true);
wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/js/vigilantscripts.js', array('jquery'), NULL, true);
wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri().'/css/bootstrap.min.css', false, NULL, 'all');
wp_enqueue_style('fontawesome-css', get_stylesheet_directory_uri().'/font-awesome/css/font-awesome.min.css', false, NULL, 'all');
wp_enqueue_style('animate-css', get_stylesheet_directory_uri().'/css/animate.css', false, NULL, 'all');
wp_enqueue_style('vigilant-css', get_stylesheet_directory_uri().'/css/vigilant.css', false, NULL, 'all');
}
add_action( 'comment_form_before', 'vigilant_enqueue_comment_reply_script' );
function vigilant_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'vigilant_title' );
function vigilant_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'vigilant_filter_wp_title' );
function vigilant_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'vigilant_widgets_init' );
function vigilant_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'vigilant' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Home 1', 'vigilant' ),
'id' => 'home-widget-1',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Home 2', 'vigilant' ),
'id' => 'home-widget-2',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Home 3', 'vigilant' ),
'id' => 'home-widget-3',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Home 4', 'vigilant' ),
'id' => 'home-widget-4',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Footer 1', 'vigilant' ),
'id' => 'footer-widget-1',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Footer 2', 'vigilant' ),
'id' => 'footer-widget-2',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Footer 3', 'vigilant' ),
'id' => 'footer-widget-3',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => __( 'Footer 4', 'vigilant' ),
'id' => 'footer-widget-4',
'before_widget' => '<li id="%1$s" class="widget-container %2$s col-md-6 col-lg-3">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function vigilant_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'vigilant_comments_number' );
function vigilant_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

function vigilant_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'vigilant_logo',
        'sanitize_callback' == 'esc_url_raw'
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'vigilant_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'vigilant' ),
        'section'  => 'title_tagline',
        'settings' => 'vigilant_logo',
        'sanitize_callback' => 'esc_url_raw'
    ) ) );
}
add_action( 'customize_register', 'vigilant_customize_register' );

function vigilant_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 */
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon'
	);
	// Return an array with file extension and mime_type.
	$file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
	return ( $file['ext'] ? $image : $setting->default );
}

function customizer_textarea_sanitizer( $text )
{
  return esc_textarea( $text );
}

function vigilant_register_theme_customizer( $wp_customize ){

	/*
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
  /* Add 'Home Top' Section.
	 */
	$wp_customize->add_section(
		// $id
		'vigilant_section_home',
		// $args
		array(
			'title'			=> __( 'Home', 'vigilant' ),
			'priority' => 20,
		)
	);

  $wp_customize->add_section('theme_colors', array(
		'title' => __('Theme Colors', 'vigilant'),
		'priority' => 30,
	));

	$wp_customize->add_setting(
      'primary_color',
      array(
        'default' => '#d64937',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );

    $wp_customize->add_control(
      new \WP_Customize_Color_Control(
        $wp_customize,
        'primary_color',
        array(
          'label' => __('Primary Color', 'vigilant'),
          'section' => 'colors',
          'settings' => 'primary_color'
        )
      )
    );

	$wp_customize->add_setting(
		// $id
		'vigilant_hero_home',
		// $args
		array(
			'default'		=> get_stylesheet_directory_uri() . '/images/default-hero.jpeg',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'refresh'
		)
	);

  $wp_customize->add_control(
		new \WP_Customize_Image_Control(
			// $wp_customize object
			$wp_customize,
			// $id
			'vigilant_hero_home',
			// $args
			array(
				'settings'		=> 'vigilant_hero_home',
				'section'		=> 'vigilant_section_home',
				'label'			=> __( 'Home Background Image', 'vigilant' ),
				'description'	=> __( 'Select the image to be used for the Header.', 'vigilant' )
			)
		)
	);

  $wp_customize->add_setting('welcome_text', array(
        'default'        => 'Welcome to Vigilant WordPress',
        'sanitize_callback' => 'customizer_textarea_sanitizer'
    ));

	 $wp_customize->add_control('welcome_text_control', array(
    	'label'   => 'Welcome Text',
    	'section' => 'vigilant_section_home',
    	'type'    => 'textarea',
    	'settings' => 'welcome_text'
    ));


}

// Settings API options initilization and validation.
add_action( 'customize_register', 'vigilant_register_theme_customizer' );

function vigilant_customizer_css() {
?>
	 <style type="text/css">

/* ------------Primary Colors ----------- */


			#home-hero {background-image: url('<?php echo get_theme_mod('vigilant_hero_home');?>') ;}

      a, .widget-title, .navbar-default .navbar-nav>li>a, .navbar-default .navbar-brand:hover {color: <?php echo get_theme_mod('primary_color'); ?>}

      input[type=submit], .hero-h2, .post-edit-link, .dropdown-menu, .btn-primary  {
        background: <?php echo get_theme_mod('primary_color'); ?>
      }

      #home-widgets .widget-title {
	border-bottom: 4px solid <?php echo get_theme_mod	('primary_color'); ?>;
}

.post {
	border-left: 4px solid <?php echo get_theme_mod	('primary_color'); ?>;
}

.widget-container {
	border-top: 5px solid <?php echo get_theme_mod	('primary_color'); ?>;
}

.page-template-default #content {
	border-left: 5px double <?php echo get_theme_mod	('primary_color'); ?>;
}

li.comment {
border: 1px solid <?php echo get_theme_mod	('primary_color'); ?>;
}

.footer-widget-spot .widget-title {
	border-bottom: 4px solid <?php echo get_theme_mod	('primary_color'); ?>;
}
</style>

<?php
} // end vigilant_customizer_css
add_action( 'wp_head', 'vigilant_customizer_css');

/**
 * Registers the Theme Customizer Preview with WordPress.
 *
 * @package		 vigilant
 */
function vigilant_customizer_live_preview() {
	wp_enqueue_script(
		'vigilant-theme-customizer',
		get_stylesheet_directory_uri() . '/js/theme-customizer.js',
		array( 'jQuery','customize-preview' ),
		'0.3.0',
		true
	);
} // end vigilant_customizer_live_preview

add_action( 'customize_preview_init', 'vigilant_customizer_live_preview' );
add_theme_support( 'post-formats' );
$vigilant_bg = array(
	'default-color'          => 'dedede',
	'wp-head-callback'       => '_custom_background_cb',
);
add_theme_support( 'custom-background', $vigilant_bg );
