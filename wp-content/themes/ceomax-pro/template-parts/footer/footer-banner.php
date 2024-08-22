<?php if (_ceo('ceo_footer_display')!='index' || (is_home() && _ceo('ceo_footer_display')=='index') ) { ?>
<?php if(_ceo('ceo_footer') == true ): ?>
<div class="cloud-banner ceo-background-cover" style="background-image: url(<?php if(_ceo('ceo_footer_sz'))echo _ceo('ceo_footer_sz')['ceo_footer_img']; ?>);">
    <div class="cloud-bubble-one"></div>
    <div class="cloud-bubble-two"></div>
    <div class="cloud-bubble-three"></div>

    <div class="product-number-info" id="productNumber">
        <div class="ceo-container">
            <ul class="ceo-clearfix-t">
                <li class="li-3">
                    <b>
                        <i id="productNumber_3" data-sum="<?php echo all_view(); ?>">0</i>
                        <sup>+</sup>
                    </b>
                    <p><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_view_count_title']; ?></p>
                </li>
                <li class="li-2">
                    <b>
                        <i id="productNumber_2" data-sum="<?php echo all_users_count(); ?>">0</i>
                        <sup>+</sup>
                    </b>
                    <p><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_huiyuan_count_title']; ?></p>
                </li>
                <li class="li-1">
                    <b>
                        <i id="productNumber_1" data-sum="<?php echo all_posts_count();?>">0</i>
                        <sup>+</sup>
                    </b>
                    <p><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_site_count_title']; ?></p>
                </li>
                <li class="li-4">
                    <b>
                        <i id="productNumber_4" data-sum="<?php echo DayUpdate()?>">0</i>
                        <sup>+</sup>
                    </b>
                    <p><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_jinri_count_title']; ?></p>
                </li>
                <li class="li-4">
                    <b>
                        <i id="productNumber_6" data-sum="<?php echo get_week_post_count(); ?>">0</i>
                        <sup>+</sup>
                    </b>
                    <p><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_benzhou_count_title']; ?></p>
                </li>
                <li class="li-5">
                    <b>
                        <i id="productNumber_5" data-sum="<?php echo floor((time()-strtotime(_ceo('all_yunxing_count',"2011-11-11")))/86400); ?>">0</i>
                        <sup>+</sup>
                    </b>
                    <p><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_yunxing_count_title']; ?></p>
                </li>
            </ul>
        </div>
    </div>
    <div style="height:1px;"></div>

    <div class="cloud-bubble-text"><?php if(_ceo('ceo_footer_sz'))echo _ceo('ceo_footer_sz')['ceo_footer_title']; ?></div>
    <div class="cloud-bubble-link">
        <a href="<?php if(_ceo('ceo_footer_sz'))echo _ceo('ceo_footer_sz')['ceo_footer_link']; ?>" target="_blank"><?php if(_ceo('ceo_footer_sz'))echo _ceo('ceo_footer_sz')['ceo_footer_an']; ?></a>
    </div>
</div>
<?php endif; ?>
<?php } ?>
