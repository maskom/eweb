<?php while (have_posts()) : the_post(); ?>
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


  <div class="row">
    <div class="col-md-12">
      <div class="card card-list-article">
        <div class="card-block">
          <article <?php post_class(); ?>>
            <div class="entry-summary card-text">
              <p class="text-center">Anda sedang diarahan ke halaman:</p>
              
              <h5 class="entry-title card-title text-center"><a href="<?php echo $news_url;?>"><?php echo $source_title; ?></a></h5>
              <p class="text-center">
                <img src=" <?php echo get_template_directory_uri() . '/dist/images/loading.gif'; ?>" class="img-fluid" />
              </p>
              <p class="card-text text-center">Jika halaman ini tidak ditampilkan selama lebih dari 5 detik, <a href="<?php echo $news_url;?>" target="_blank">klik disini</a></p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>

