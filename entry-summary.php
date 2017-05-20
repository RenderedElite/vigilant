<section class="entry-summary">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'featured-blog-img'));  } ?>
<?php the_excerpt(); ?>
<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
</section>
