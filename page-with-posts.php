<?php
/*
Template Name: PageWithPosts
*/
?>

<?php get_header(); ?>
  <div id="content" class="clearfix row-fluid">
    <div id="main" class="span12 clearfix" role="main">

      <?php
        $use_carousel = of_get_option('showhidden_slideroptions');
        if ($use_carousel) {
      ?>
        <?php get_template_part('carousel'); ?>
      <?php } // ends the if use carousel statement ?>

      <?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
          <header>
            <?php
              $post_thumbnail_id = get_post_thumbnail_id();
              $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'wpbs-featured-home' );
              // not sure why this isn't working yet
            ?>
            <div class="hero-unit" style="background-image: url('<?php echo $featured_src; ?>'); background-repeat: no-repeat; background-position: 0 0;">
              <?php the_post_thumbnail( 'wpbs-featured-home' ); ?>
              <h1><?php the_title(); ?></h1>
              <?php echo get_post_meta($post->ID, 'custom_tagline' , true);?>
            </div>
          </header>
          <section class="row-fluid post_content">
            <div class="span8">
              <?php the_content(); ?>
            </div>
            <?php get_sidebar('sidebar2'); // sidebar 2 ?>
          </section> <!-- end article header -->
          <footer>
            <p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","bonestheme") . ': ', ', ', '</span>'); ?></p>
          </footer> <!-- end article footer -->
        </article> <!-- end article -->
        <?php endwhile; ?>
      <?php else : ?>
        <article id="post-not-found">
            <header>
              <h1><?php _e("Not Found", "bonestheme"); ?></h1>
            </header>
            <section class="post_content">
              <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
            </section>
            <footer>
            </footer>
        </article>
      <?php endif; ?>
    </div> <!-- end #main -->
  <?php //get_sidebar(); // sidebar 1 ?>
  </div> <!-- end #content -->
<?php get_footer(); ?>