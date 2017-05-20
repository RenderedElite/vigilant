<footer class="entry-footer">
<span class="cat-links"><i class="fa fa-folder-open"></i> <?php _e( 'Categories: ', 'vigilant' ); ?><?php the_category( ', ' ); ?></span>   
<span class="tag-links">  <i class=" fa fa-tag"></i> <?php the_tags(); ?></span>
<?php if ( comments_open() ) { 
echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'vigilant' ) ) . '</a></span>';
} ?>
</footer> 
