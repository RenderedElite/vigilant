<?php get_header(); ?>
<div class="container">
<div class="row">
<section id="content" role="main" class="col-lg-8">
<header class="header">
<h1 class="entry-title cat-title"><?php _e( 'Category Archives: ', 'vigilant' ); ?><?php single_cat_title(); ?></h1>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
