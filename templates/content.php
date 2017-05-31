<?php
$picture = get_post_meta( get_the_ID(), 'news_image', true );
$news_url = get_post_meta( get_the_ID(), 'news_url', true );
$source_title1 = get_the_title( get_the_ID());
$source_title2 = get_post_meta( get_the_ID(), 'source_title', true );
$source_title =  '';
if(!empty($source_title2)) {
  $source_title = $source_title2;
} else{
  $source_title = $source_title1;
}
?>
<div class="col-md-12">
  <article <?php post_class(' card-list-article list-article'); ?>>
    <div class="row">
      <div class="col-sm-4 col-4">
        <div class="news__img">
          <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>" class="img-wrap"><img src="<?php echo $picture;?>" class="card-image-top img-fluid" alt="<?php the_title(); ?>"/></a>
        </div>
      </div>
      <div class="col-sm-8 col-8">
        <div class="news__desc">
          <div class="hidden-sm-down">
            <?php get_template_part('templates/entry-meta'); ?>
          </div>
          <h4 ><a href="<?php the_permalink(); ?>" target="_blank"  title="<?php the_title(); ?>"><?php echo $source_title;?></a></h4>
          <div class="news__summary hidden-sm-down">
            <p ><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
            <p><a href="<?php the_permalink(); ?>" target="_blank"  title="<?php the_title(); ?>">Selengkapnya</a></p>
            <?php get_template_part('templates/cat-meta'); ?>
          </div>
          <div class="hidden-md-up">
            <div class="row">
              <div class="col-12"><?php get_template_part('templates/entry-meta'); ?></div>
              <div class="col-12"><?php get_template_part('templates/cat-meta'); ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </article>
</div>


