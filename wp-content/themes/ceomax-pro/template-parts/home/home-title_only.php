<?php
$switcher = _ceo('title_only');
if($switcher){
?>
<div class="ceo-phbf ceo-container ceo-margin-medium-top ceo-margin-bottom-40">
    <div class="ceo-title-row">
        <?php
        if ($switcher) {
        foreach ( $switcher as $key => $value) {
            if(!$value['id']){
                continue;
            }
        ?>
        <div class="m-home-ranking__content__item">
            <div class="ceo_title_only">
                <div class="item_title ceo-flex" style="background-image: url(<?php echo esc_url( $value['img'] ); ?>)">
                    <a href="<?php echo get_category_link( $value['id'] ); ?>" target="_blank" class="ceo-flex-1">
                    <?php echo get_cat_name($value['id']) ?></a>
                    <a href="<?php echo get_category_link( $value['id'] ); ?>" target="_blank" class=""><i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                </div>
                <div class="tab-content" style="">
                    <div class="tab-pane  fade in active" id="tolist1" style="overflow: hidden;">
                        <?php
                        ///////////start CACHE ////////////////
                        $args_c = ['cat' => $value['id'], 'showposts' => $value['num']];//args 查询参数
                        if (CeoCache::is()) {
                            $_the_cache_key  = 'home-title_only' . '-' . md5(json_encode($args_c));
                            $_the_cache_data = CeoCache::get($_the_cache_key);
                        } else {
    
                        }
                        ///////////end CACHE ////////////////
    
                        ?>
                        <?php
                            if ($_the_cache_data && is_string($_the_cache_data)) {
                                echo $_the_cache_data;
                            } else {
                            ob_start('ceocache_ob');
                                $i=0;
                            $wp_query2 = new WP_Query($args_c);
                                while ($wp_query2->have_posts()) : $wp_query2->the_post();
                                    $i++;
                        ?>
                        <div class="g_text">
                            <a target="_blank" href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>" alt="<?php echo get_the_title();?>"><span class="num num<?php echo $i;?>"><?php echo $i;?></span><?php echo get_the_title();?></a>
                        </div>
                        <?php endwhile; wp_reset_query();
                        if (CeoCache::is()) {
                            CeoCache::set($_the_cache_key, ob_get_contents());
                            ob_end_flush();
                        } } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } } ?>
    </div>
</div>
<?php }?>