<?php
/**
 * Template Name: Custom Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
$args = array(
    'post_type'         => 'post',
    'post_status'      => 'publish',
    'posts_per_page'    => 10,
    //'orderby'           => 'rand',
    'meta_key'          => 'share_fb',
    'meta_value'        => 'no',
    'meta_compare'      => '=='
);
$posts = new WP_Query( $args );
if ( $posts->have_posts() ) {
  while ( $posts->have_posts() ) {$posts->the_post();
    $ID = get_the_ID();
    $title = get_the_title();
    $source_title = get_post_meta( $ID, 'source_title', true );
    $link = get_post_meta( $ID, 'news_url', true );
    $source = get_post_meta( $ID, 'source', true );
    $picture = get_post_meta( $ID, 'news_image', true );
    //$desc = wp_trim_words( get_the_content(), 15, '...' );
    $desc = get_the_content();
    $short_link = wp_get_shortlink($ID);
    $home_short_link = 'http://bit.ly/2owOlKe';

    $wordlist = array(
        "Kompas.com",
        "Tribun Jogja",
        "TribunStyle.com",
        "Jelas Berita",
        "Surya Malang",
        "Serambi Indonesia",
        "Pos Belitung",
        "TribunnewsBogor.com",
        "Goal.com",
        "Tribunnews.com",
        "indopos.co.id",
        "Tribun Bali",
        "Tribun Medan",
        "Wartakota",

    );

    /*foreach ($wordlist as &$word) {
      $word = '/\b' . preg_quote($word, '/') . '\b/';
    }
    $title = preg_replace($wordlist, '', $title);
    var_dump($title);*/

    $source_title = html_entity_decode($title, ENT_COMPAT, "UTF-8");
    echo $source_title;
  }
}

?>