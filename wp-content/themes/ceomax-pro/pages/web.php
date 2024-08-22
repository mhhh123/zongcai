<?php
/**
 * Template name: 建站服务
 */
$web_gz_sz = _ceo('web_gz_sz');
$web_yw_sz = _ceo('web_yw_sz');
$web_qa_sz = _ceo('web_qa_sz');
get_header();
?>
<div class="ceo-pages-web-bg ceo-background-cover" style="background-image: url(<?php echo _ceo('web_top_img'); ?>);">
    <div class="ceo-pages-web-bg-max ceo-container">
		<span><?php if(_ceo('web_top_max'))echo _ceo('web_top_max')['web_top_max_title']; ?></span>
		<p><?php if(_ceo('web_top_max'))echo _ceo('web_top_max')['web_top_max_subtitle']; ?></p>
		<a href="<?php if(_ceo('web_top_max'))echo _ceo('web_top_max')['web_top_max_an_link']; ?>" target="_blank"><?php if(_ceo('web_top_max'))echo _ceo('web_top_max')['web_top_max_an_title']; ?></a>
	</div>
</div>

<div class="ceo-pages-web-gz ceo-background-default">
    <div class="ceo-container">
        <div class="web-gz-box-title">
            <span><?php echo _ceo('web_gz_title'); ?></span>
            <p><?php echo _ceo('web_gz_subtitle'); ?></p>
        </div>
        <div class="ceo-pages-web-gzbox" ceo-grid>
            <?php
			if ($web_gz_sz) {
				foreach ( $web_gz_sz as $key => $value) {
			?>
            <div class="ceo-width-1-1@s ceo-width-1-2@m ceo-width-1-2@l ceo-width-1-4@xl">
                <div class="ceo-pages-web-gzbox-yw">
                    <div class="web-gzbox-yw-border" style="background: url(<?php echo $web_gz_sz[$key]['img']; ?>) no-repeat center -30px;">
                        <img src="<?php echo $web_gz_sz[$key]['imgs']; ?>">
                        <div class="price"><em>￥</em><?php echo $web_gz_sz[$key]['price']; ?></div>
                        <span><?php echo $web_gz_sz[$key]['title']; ?></span>
                    </div>
                    <div class="web-gzbox-yw-item-bottom">
                        <?php echo $web_gz_sz[$key]['privilege']; ?>
                        <a href="<?php echo $web_gz_sz[$key]['anlink']; ?>" target="_blank"><?php echo $web_gz_sz[$key]['antitle']; ?><i class="anim"></i></a>
                    </div>
                </div>
            </div>
            <?php } } ?>
            
        </div>
    </div>
</div>

<div class="ceo-pages-web-tem ceo-background-cover" style="background-image: url(<?php if(_ceo('web_tem_max'))echo _ceo('web_tem_max')['web_tem_max_img']; ?>);">
    <div class="ceo-pages-web-tem-zz"></div>
    <div class="ceo-pages-web-tem-choice">
        <span><?php if(_ceo('web_tem_max'))echo _ceo('web_tem_max')['web_tem_max_title']; ?></span>
        <p><?php if(_ceo('web_tem_max'))echo _ceo('web_tem_max')['web_tem_max_subtitle']; ?></p>
        <a href="<?php if(_ceo('web_tem_max'))echo _ceo('web_tem_max')['web_tem_max_anlink']; ?>" target="_blank" class="web-yw-box-an"><?php if(_ceo('web_tem_max'))echo _ceo('web_tem_max')['web_tem_max_antitle']; ?><i class="anim"></i></a>
    </div>
</div>

<div class="ceo-pages-web-yw-box ceo-background-default">
    <div class="ceo-container">
        <div class="web-yw-box-title">
            <span><?php echo _ceo('web_yw_title'); ?></span>
            <p><?php echo _ceo('web_yw_subtitle'); ?></p>
        </div>
        <div class="web-yw-box-con" ceo-grid>
            <?php
			if ($web_yw_sz) {
				foreach ( $web_yw_sz as $key => $value) {
			?>
            <div class="ceo-width-1-2 ceo-width-1-4@l ceo-width-1-6@xl">
                <div class="web-yw-box-con-li ceo-dongtai">
                    <span><img src="<?php echo $web_yw_sz[$key]['img']; ?>"></span>
                    <p><?php echo $web_yw_sz[$key]['title']; ?></p>
                    <em><?php echo $web_yw_sz[$key]['describe']; ?></em>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>

<div class="ceo-pages-web-qa ceo-background-default">
    <div class="ceo-container">
        <div class="ceo-pages-web-qatitle">
            <span><?php echo _ceo('web_qa_title'); ?></span>
            <p><?php echo _ceo('web_qa_subtitle'); ?></p>
        </div>
        <div class="ceo-pages-web-qa-box" ceo-grid>
            <?php
			if ($web_qa_sz) {
				foreach ( $web_qa_sz as $key => $value) {
			?>
            <div class="ceo-pages-web-qa-boxfl ceo-width-1-1@s ceo-width-1-1 ceo-width-1-2@l ceo-width-1-2@xl">
                <div class="ceo-pages-web-qa-box-each">
                    <div class="ceo-pages-web-qa-box-t">
                        <p><?php echo $web_qa_sz[$key]['title']; ?></p>
                    </div>
                    <div class="ceo-pages-web-qa-box-each-detail">
                        <ul class="qa-box-each-detail-con" style="overflow-wrap: break-word;">
                            <li><?php echo $web_qa_sz[$key]['answer']; ?></li>
                        </ul>
                        <img src="/wp-content/themes/ceomax-pro/static/images/ceo-qa-x.png" alt="">
                        <a class="qa-box-each-detail-link" href="<?php echo $web_qa_sz[$key]['link']; ?>" target="_blank">查看详情</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>

<div class="ceo-pages-web-bottom ceo-background-cover" style="background-image: url(<?php if(_ceo('web_bottom_max'))echo _ceo('web_bottom_max')['web_bottom_max_img']; ?>);">
    <p class="ceo-pages-web-bottom-text"><?php if(_ceo('web_bottom_max'))echo _ceo('web_bottom_max')['web_bottom_max_title']; ?></p>
    <div class="ceo-pages-web-bottom-btn">
        <a href="<?php if(_ceo('web_bottom_max'))echo _ceo('web_bottom_max')['web_bottom_max_anlink']; ?>" target="_blank"><?php if(_ceo('web_bottom_max'))echo _ceo('web_bottom_max')['web_bottom_max_antitle']; ?></a>
    </div>
</div>
<?php get_footer();?>