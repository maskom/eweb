<?php $tags = get_the_tags($post->ID);  ?>
<?php if(!empty($tags)): ?>
    <ul class="cloudTags">
        <?php foreach($tags as $tag) :  ?>
            <li>
                <a class="btn btn-warning btn-tag"
                   href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug);?>">
                    <?php print_r($tag->name); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>