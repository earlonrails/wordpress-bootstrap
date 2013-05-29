<div id="myCarousel" class="carousel">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <?php
      global $post;
      $tmp_post = $post;
      $show_posts = of_get_option('slider_options');
      $args = array( 'numberposts' => $show_posts ); // set this to how many posts you want in the carousel
      $myposts = get_posts( $args );
      $post_num = 0;
      foreach( $myposts as $post ) :  setup_postdata($post);
        $post_num++;
        $post_thumbnail_id = get_post_thumbnail_id();
        $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'wpbs-featured-carousel' );
    ?>
      <div class="<?php if($post_num == 1){ echo 'active'; } ?> item">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpbs-featured-carousel' ); ?></a>
      </div>
    <?php endforeach; ?>
    <?php $post = $tmp_post; ?>
  </div>
  <div class="carousel-logo">
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>