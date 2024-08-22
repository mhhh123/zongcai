<?php
	$search_tag_num = _ceo('search_tag_num');
    $search_title = _ceo('search_title');
    $search_slide = _ceo('search_slide');
    $search_3_tag = _ceo('search_3_tag');
	if(!$search_slide){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>幻灯模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<section class="slide_03 ceo-position-relative ceo-overflow-hidden">
	<img src="<?php echo $search_slide; ?>" class="ceo-position-center">
	<div class="search ceo-position-center ceo-margin-top">
		<div class="slide_text"><?php echo $search_title; ?></div>
		<form method="get" class="ceo-form ceo-flex ceo-flex-middle" action="/">
			<input type="search" placeholder="输入关键字搜索" autocomplete="off" value="" name="s" required="required" class="b-r-4 ceo-input ceo-flex-1 ceo-background-default">
			<button type="submit" class="b-r-4"><i class="ceofont ceoicon-search-2-line"></i>搜索</button>
		</form>
		<?php if(_ceo('search_3_tag_sz') == true ): ?>
		<div class="search_tags ceo-flex ceo-flex-middle">
			<div class="ceo-light ceo-text-small ceo-text-truncate"><i class="ceofont ceoicon-fire-fill"></i>热门搜索：</div>
			<div class="ceo-light ceo-text-small ceo-text-truncate">
			    <?php 
    			if ($search_3_tag) { 
    				foreach ( $search_3_tag as $key => $value) {
    			?>
				<a href="/?s=<?php echo $value['tag']; ?>" class="tag-cloud-link tag-link-128 tag-link-position-1"><?php echo $value['tag']; ?></a>
				<?php } } ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<style>.fastlink {padding-bottom: 30px;margin-top: 20px!important;}</style>
<?php } ?>