<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo">

<div id="footer-widget-area">
<div class="container">
<div class="row">

  <div class="footer-widget-spot">
    <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
       <?php dynamic_sidebar( 'footer-widget-1' ); ?>
     <?php endif; ?>
  </div>
  <div class="footer-widget-spot">
    <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
       <?php dynamic_sidebar( 'footer-widget-2' ); ?>
     <?php endif; ?>
  </div>
  <div class="footer-widget-spot">
    <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
       <?php dynamic_sidebar( 'footer-widget-3' ); ?>
     <?php endif; ?>
  </div>
  <div class="footer-widget-spot">
    <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
       <?php dynamic_sidebar( 'footer-widget-4' ); ?>
     <?php endif; ?>
  </div>

</div>
</div>
</div>

  <div id="footer-bottom" class="text-center">
    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    <span class="copyright">Copyright &copy; <?php echo date('Y') ?> <?php bloginfo('name'); ?>.</span>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
