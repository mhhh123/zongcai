<?php 
$search_tag_num = _ceo('search_tag_num'); 
$search_title = _ceo('search_title');
$search_slide = _ceo('search_slide'); 
?>
<section class="slide_03 ceo-position-relative ceo-overflow-hidden">
	<img src="<?php echo $search_slide; ?>" class="ceo-position-center">
	<div class="search ceo-position-center ceo-margin-top">
		<div class="slide_text"><?php echo $search_title; ?></div>
		<form method="get" class="ceo-form ceo-flex ceo-flex-middle" action="/">
			<input type="search" placeholder="输入关键字搜索" autocomplete="off" value="" name="s" required="required" class="b-r-4 ceo-input ceo-flex-1 ceo-background-default">
			<button type="submit" class="b-r-4"><i class="ceofont ceoicon-search-2-line"></i>搜索</button>
		</form>
		<div class="search_tags ceo-flex ceo-flex-middle">
			<div class="ceo-light ceo-text-small ceo-text-truncate"><i class="ceofont ceoicon-fire-fill"></i>热门搜索：</div>
			<div class="ceo-light ceo-text-small ceo-text-truncate">
				<?php wp_tag_cloud('number='.$search_tag_num.'&orderby=count&order=DESC&smallest=12&largest=12&unit=px'); ?>
			</div>
		</div>
	</div>
</section>
<style>.fastlink {padding-bottom: 30px;}</style>