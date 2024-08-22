<?php
    $down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
?>

<?php if(_ceo('ceoshop_7_shangjia') == true): ?>
<section class="ceo-sidebar-shop sidebar-shop-box b-r-4 ceo-background-default ceo-overflow-hidden ceo-margin-bottom">
    <?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'author' ); ?>
</section>
<?php endif; ?>

<section class="ceo-sidebar-shop b-a b-r-4 ceo-background-default ceo-margin-bottom">
    <!--信息属性-->
    <ul>
        <?php if(!empty($down_info_arr)){?>
            <?php
            if(!empty($down_info_arr)){
                foreach ($down_info_arr as $k=>$v){
                    $number=$k+1;
                    echo '<li><span class="ceo-sidebar-shop-title">'.$v['title'].'：</span>'.'<span class="ceo-sidebar-shop-content">'.$v['desc'].'</span>';
                    if($number%3==0){
                        echo '</li>';
                    }
                }
            }
            ?>
        <?php } ?>
        <?php if(_ceo('ceoshop_7_shuxing_bh') == true): ?>
        <li>
            <span class="ceo-sidebar-shop-title"><?php echo _ceo('ceoshop_7_shuxing_bhbt'); ?>： </span>
            <span class="ceo-sidebar-shop-content"><?php echo get_the_ID(); ?></span>
        </li>
        <?php endif; ?>
        <?php if(_ceo('ceoshop_7_shuxing_gx') == true): ?>
        <li>
            <span class="ceo-sidebar-shop-title"><?php echo _ceo('ceoshop_7_shuxing_gxbt'); ?>： </span>
            <span class="ceo-sidebar-shop-content"><?php echo date("Y-m-d",strtotime($post->post_modified));?></span>
        </li>
        <?php endif; ?>
    </ul>
    <!--信息属性-->
    <?php if(_ceo('ceoshop_7_shuxing_lx') == true): ?>
    <div class="ceo-sidebar-shop-WP ceo-flex">
        <div class="ceo-flex-1">
            <div class="ceo-sidebar-shop-L"><?php if(_ceo('ceoshop_7_shuxing_lx_sz'))echo _ceo('ceoshop_7_shuxing_lx_sz')['ceoshop_7_shuxing_lx_zbt']; ?>
            </div>
            <div class="ceo-sidebar-shop-C"><a target="_blank" href="<?php if(_ceo('ceoshop_7_shuxing_lx_sz'))echo _ceo('ceoshop_7_shuxing_lx_sz')['ceoshop_7_shuxing_lx_anlj']; ?>"><i class="ceofont <?php if(_ceo('ceoshop_7_shuxing_lx_sz'))echo _ceo('ceoshop_7_shuxing_lx_sz')['ceoshop_7_shuxing_lx_antb']; ?>"></i><?php if(_ceo('ceoshop_7_shuxing_lx_sz'))echo _ceo('ceoshop_7_shuxing_lx_sz')['ceoshop_7_shuxing_lx_anbt']; ?></a>
            </div>
        </div>
        <div class="ceo-sidebar-shop-R">
            <span class="sy-hover-box"><i class="ceofont <?php if(_ceo('ceoshop_7_shuxing_lx_sz'))echo _ceo('ceoshop_7_shuxing_lx_sz')['ceoshop_7_shuxing_lx_xztb']; ?>"></i><?php if(_ceo('ceoshop_7_shuxing_lx_sz'))echo _ceo('ceoshop_7_shuxing_lx_sz')['ceoshop_7_shuxing_lx_xzxz']; ?>
            </span>
            <div class="sy-hover"><span><?php if(_ceo('ceoshop_7_shuxing_lx_sz'))echo _ceo('ceoshop_7_shuxing_lx_sz')['ceoshop_7_shuxing_lx_xznr']; ?></span>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'shouquan' ); ?>
<style>.sidebar .user-info{display: none}</style>