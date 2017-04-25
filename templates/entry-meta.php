<?php
$source = get_post_meta( get_the_ID(), 'source', true );
$host = get_post_meta( get_the_ID(), 'host', true );
$favicon ='';
$favicon1 = get_post_meta( get_the_ID(), 'favicon', true );
$favicon2 = 'http://www.google.com/s2/favicons?domain='.$host;

if(!empty($favicon1)) {
    $favicon = $favicon1;
} else {
    $favicon = $favicon2;
}

$categories = get_the_category();
?>
<div class="byline">
    <?php if(!empty($host)): ?>
        <div class="source meta">
            <a href="<?php echo 'http://'.$host?>" title="<?php echo $source?>">
                <?php if(!empty($favicon)): ?>
                    <img src="<?php echo $favicon;?>" class="favicon"/>
                <?php endif; ?>
                <span><?php echo $source;?></span>
            </a>
        </div>
    <?php endif;?>
    <?php if(!empty($categories)): ?>
        - 
        <div class="category meta">
            <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) );?>"><?php echo esc_html( $categories[0]->name );?></a>
        </div>
    <?php endif;?>
</div>