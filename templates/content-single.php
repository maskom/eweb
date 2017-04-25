<?php while (have_posts()) : the_post(); ?>
  <?php
  $picture = get_post_meta( get_the_ID(), 'news_image', true );
  $news_url = get_post_meta( get_the_ID(), 'news_url', true );
  ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card card-list-article">
        <a href="<?php echo $news_url;?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php echo $picture;?>" class="card-image-top img-fluid" alt="<?php the_title(); ?>"/></a>
        <div class="card-block">
          <article <?php post_class(); ?>>
            <h5 class="entry-title card-title"><a href="<?php echo $news_url;?>" target="_blank"><?php the_title(); ?></a></h5>
            <div class="entry-summary card-text">
              <?php the_content() ?>
              <p class="card-text"><a href="<?php echo $news_url;?>" target="_blank">Selengkapnya</a></p>
              <?php get_template_part('templates/tags'); ?>
            </div>
          </article>
        </div>
        <div class="card-footer">
          <div class="wrap_tags float-left">
            <?php get_template_part('templates/entry-meta'); ?>
          </div>
          <div class="wrap_btn float-right">
            <a href="<?php echo $news_url;?>" class="btn btn-primary btn-view-source" target="_blank" >Baca</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>

<div id="related__post">
  <div class="alert alert-danger" role="alert">
    <strong>Artikel Lainnya:</strong>
  </div>
  <div class="card-columns">
    <?php
      $args = array(
          'post_type'         => 'post',
          'post_status'      => 'publish',
          'posts_per_page'    => 20,
          'orderby'           => 'rand',
      );
      $my_query = new WP_Query($args);
      if( $my_query->have_posts() ) {
        while ($my_query->have_posts()) : $my_query->the_post(); ?>
          <?php
          $picture = get_post_meta( get_the_ID(), 'news_image', true );
          $news_url = get_post_meta( get_the_ID(), 'news_url', true );
          ?>
          <div class="card card-small ">
            <a href="<?php the_permalink()?>" title="<?php the_title(); ?>"><img src="<?php echo $picture;?>" class="card-image-top img-fluid" alt="<?php the_title(); ?>"/></a>
            <div class="card-block">
              <h6 class="card-title">
                <a href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
              </h6>
            </div>
            <div class="card-footer">
              <div class="wrap_tags">
                <?php get_template_part('templates/entry-meta'); ?>
              </div>
            </div>
          </div>
          <?php
        endwhile;
      }
      wp_reset_query();
    ?>
  </div>
</div>