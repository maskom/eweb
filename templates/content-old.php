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

    <div class="card-block">
      <article <?php post_class(); ?>>
        <div class="row">
          <div class="col-sm-12 hidden-sm-down">
            <h5 class="entry-title card-title ">
              <a href="<?php the_permalink(); ?>" target="_blank"><?php echo $source_title;?></a>
            </h5>
            <?php get_template_part('templates/entry-meta'); ?>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3 col-4">
            <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>" class="img-wrap"><img src="<?php echo $picture;?>" class="card-image-top img-fluid" alt="<?php the_title(); ?>"/></a>
          </div>
          <div class="col-sm-9 col-8">
            <div class="entry-summary card-text">
              <div class="hidden-sm-down">
                <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
                <?php get_template_part('templates/tags'); ?>
              </div>
              <div class="hidden-md-up">
                <h6><a href="<?php the_permalink(); ?>" target="_blank"><?php echo $source_title;?></a></h6>
                <?php get_template_part('templates/entry-meta'); ?>
              </div>


            </div>
          </div>
        </div>


      </article>
    </div>
    <div class="card-footer">
      <div class="wrap_tags float-left">
        <?php
        $categories = get_the_category();
        if(!empty($categories)): ?>
          <div class="category meta">
            Category: <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) );?>"><?php echo esc_html( $categories[0]->name );?></a>
          </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

