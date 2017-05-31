<?php
$categories = get_the_category();
if(!empty($categories)): ?>
    <div class="category meta">
        <span><a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) );?>"><?php echo esc_html( $categories[0]->name );?></a></span>
    </div>
<?php endif;?>