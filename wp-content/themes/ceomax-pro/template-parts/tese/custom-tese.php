<?php
$tag_custom = get_post_meta(get_the_ID(), 'ceo-tese-tag-custom', true);
if(!empty($tag_custom)){ ?>
    <div class="ceo-tese-jingpin"><span class="i">#</span><?php echo $tag_custom;?></div>
<?php } ?>