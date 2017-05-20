<?php
/* Template Name: Homepage */
?>
<?php get_header(); ?>

<section id="home-hero">
  <div class="container">
    <div class="row">
      <h2 class="hero-h2"><?php echo get_theme_mod('welcome_text');?></h2>
    </div>
  </div>
</section>

<section id="home-widgets">
  <div class="container">
  <div class="row">
    <div class="home-widget">
      <?php if ( is_active_sidebar( 'home-widget-1' ) ) : ?>
         <?php dynamic_sidebar( 'home-widget-1' ); ?>
       <?php endif; ?>
    </div>
    <div class="home-widget">
      <?php if ( is_active_sidebar( 'home-widget-2' ) ) : ?>
         <?php dynamic_sidebar( 'home-widget-2' ); ?>
       <?php endif; ?>
    </div>
    <div class="home-widget">
      <?php if ( is_active_sidebar( 'home-widget-3' ) ) : ?>
         <?php dynamic_sidebar( 'home-widget-3' ); ?>
       <?php endif; ?>
    </div>
    <div class="home-widget">
      <?php if ( is_active_sidebar( 'home-widget-4' ) ) : ?>
         <?php dynamic_sidebar( 'home-widget-4' ); ?>
       <?php endif; ?>
    </div>
  </div>
  </div>
</section>

<section id="home-blog">
<div class="container">
<div class="row">
<section id="content" role="main" class="col-lg-8">
  <?php
	   $args = array( 'post_type' => 'post', 'posts_per_page' => 4 );
	   $loop = new WP_Query( $args );
       while ( $loop->have_posts() ) : $loop->the_post();?>
       <?php get_template_part( 'entry' ); ?>
       <?php endwhile;?>
</section>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer(); ?>
