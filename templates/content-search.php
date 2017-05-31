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
  <div class="card card-list-article">
    <a href="<?php the_permalink(); ?>" title="<?php echo $source_title; ?>"><img src="<?php echo $picture;?>" class="card-image-top img-fluid" alt="<?php echo $source_title; ?>"/></a>
    <div class="card-block">
      <article <?php post_class(); ?>>
        <h5 class="entry-title card-title"><a href="<?php the_permalink(); ?>"><?php echo $source_title; ?></a></h5>
        <div class="entry-summary card-text">
          <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
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

