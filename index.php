<?php get_header(); ?>
<div class="container">
<div class="row">
<section id="content" role="main" class="col-lg-8">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
