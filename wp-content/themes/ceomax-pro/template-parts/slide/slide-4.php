<?php
    $search_4_tag = _ceo('search_4_tag');
?>
<section class="slide_04 ceo-position-relative ceo-overflow-hidden">
    <div class="ceo-slide-4-banner">
        <div class="ceo-slide-4-banner-top"style="background: url(<?php if(_ceo('sucai_beijing'))echo _ceo('sucai_beijing')['sucai_slide_y']; ?>) calc(78% + 1px) 40% no-repeat, url(<?php if(_ceo('sucai_beijing'))echo _ceo('sucai_beijing')['sucai_slide']; ?>) 17% 10% no-repeat, linear-gradient(0deg, <?php if(_ceo('sucai_beijing'))echo _ceo('sucai_beijing')['sucai_yanse2']; ?>, <?php if(_ceo('sucai_beijing'))echo _ceo('sucai_beijing')['sucai_yanse1']; ?>) 0% 10% no-repeat;
    ">
        </div>
    </div>
    
    <div class="ceo_search_4_title ceo-position-center">
        <p class="big_title slide_text"></p>
		<script type="text/javascript">
            var jump_pram = "eyJyb3V0ZV9pZCI6IjE2MDUyNjA0OTU0MzA5Iiwicm91dGUiOiIzLDEsIiwiYWZ0ZXJfcm91dGUiOiIzLDEiLCJyZWZlcmVyIjoiJTJGJTNGcm91dGVfaWQlM0QxNjA1MjYwNDk1NDMwOSUyNnJvdXRlJTNEMyUyQzElMkMlMjZhZnRlcl9yb3V0ZSUzRDMlMkMxIn0=";
            var isGuest = '1';
            var is_login = "";
            var phoneBind = "";
            var origin = "index_recommend";
            var index_player = "";
            var invite_user = "";
            var invite_uid = "";
            var is_new_user = "";
            var templ_count = "792,291";
            var isClientSide = "";
            var templ_num = "792,291";
            setInterval(function() {
                if ($('.ceo_search_4_title .big_title').text() == "<?php echo _ceo('sucai_title1');?>") {
                     $('.ceo_search_4_title .big_title').text('<?php echo _ceo('sucai_title2');?>')
                } else if ($('.ceo_search_4_title .big_title').text() == "<?php echo _ceo('sucai_title2');?>") {
                    $('.ceo_search_4_title .big_title').text('<?php echo _ceo('sucai_title3');?>')
                } else {
                    $('.ceo_search_4_title .big_title').text('<?php echo _ceo('sucai_title1');?>')
                }
            }, 2000);
        </script>
    </div>

	<div class="search ceo-position-center ceo-margin-top">
        <div class="slide_04_search">
    		<form method="get" class="ceo-form ceo-flex ceo-flex-middle" action="/">
    			<input type="search" placeholder="输入关键字搜索" autocomplete="off" value="" name="s" required="required" class="ceo-input ceo-flex-1 ceo-background-default">
    			<button type="submit"><i class="ceofont ceoicon-search-2-line"></i>搜索</button>
    		</form>
    		<div class="ceo_slide04_top_or">或</div>
    		<div class="ceo_slide04_top_btn">
                <a href="<?php if(_ceo('sucai_sosuo'))echo _ceo('sucai_sosuo')['sucai_anniu_link']; ?>" target="_blank"><?php if(_ceo('sucai_sosuo'))echo _ceo('sucai_sosuo')['sucai_anniu']; ?></a>
            </div>
        </div>
        <?php if(_ceo('search_4_tag_sz') == true ): ?>
		<div class="search_tags ceo-flex ceo-flex-middle">
			<div class="ceo-light ceo-text-small ceo-text-truncate"><i class="ceofont ceoicon-fire-fill"></i>热门搜索：</div>
			<div class="ceo-light ceo-text-small ceo-text-truncate">
			    <?php 
    			if ($search_4_tag) { 
    				foreach ( $search_4_tag as $key => $value) {
    			?>
				<a href="/?s=<?php echo $value['tag']; ?>" class="tag-cloud-link tag-link-128 tag-link-position-1"><?php echo $value['tag']; ?></a>
				<?php } } ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php if(_ceo('sucai_tupian') == true ): ?>
<div class="ceo-slide-4-control-box">
	<ul>
		<li class="ceo-slide-4-prev"><i class="ceofont ceoicon-arrow-left-s-line"></i></li>
		<li class="ceo-slide-4-next"><i class="ceofont ceoicon-arrow-right-s-line"></i></li>
	</ul>
	<div class="ceo-slide-4-bigbox">
		<div id="ceo-slide-4-switcher">
			<div class="ceo_slide_4_content_1">
    				<div class="ceo_slide_4_box ceo_slide_4_item" style="background-image: url(<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu1']; ?>">
        				<a href="<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu1_link']; ?>" target="_blank"></a>
    				</div>
    				<div class="ceo_slide_4_box ceo_slide_4_item" style="background-image: url(<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu2']; ?>">
    				    <a href="<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu2_link']; ?>" target="_blank"></a>
    				</div>
    				<div class="ceo_slide_4_box ceo_slide_4_item" style="background-image: url(<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu3']; ?>">
    				    <a href="<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu3_link']; ?>" target="_blank"></a>
    				</div>
    				<div class="ceo_slide_4_box ceo_slide_4_item" style="background-image: url(<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu4']; ?>">
    				    <a href="<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu4_link']; ?>" target="_blank"></a>
    				</div>
    				<div class="ceo_slide_4_box ceo_slide_4_item" style="background-image: url(<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu5']; ?>">
    				    <a href="<?php if(_ceo('sucia_tu'))echo _ceo('sucia_tu')['sucia_tu5_link']; ?>" target="_blank"></a>
    				</div>
			</div>
			<div class="ceo_slide_4_content_2"></div>
		</div>
	</div>
</div>
<?php endif; ?>

<style>.fastlink {padding-bottom: 30px;margin-top: 20px!important;}</style>