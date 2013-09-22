<?php
/*
Template Name: PageWithCustomSideBar
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

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
          <section class="row-fluid post_content">
            <div class="span8">
              <?php the_content(); ?>
            </div>
            <?php //get_sidebar('sidebar2'); // sidebar 2 ?>
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
    <ul>
      <li class="page_item current_page_item">
          <a href="http://thewholebeast.com/dev/about">Whole Animal Cooking</a>
      </li>
      <ul class="children">
          <li class="page_item">
              <a href="http://thewholebeast.com/dev/about/philosophy">Philosophy</a>
          </li>
          <li class="page_item">
              <a href="http://thewholebeast.com/dev/about/the-chef">The Chef</a>
          </li>
          <li class="page_item">
              <a href="http://thewholebeast.com/dev/about/the-team">The Team</a>
          </li>
          <li class="page_item">
              <a href="http://thewholebeast.com/dev/about/tools">Tools</a>
          </li>
      </ul>
    </ul>
  </div> <!-- end #content -->
<?php get_footer(); ?>