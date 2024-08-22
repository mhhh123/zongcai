<div class="ceo-grid-collapse ceo-margin-small-top" ceo-grid ceo-sticky="animation: ceo-animation-slide-top;">
	<div class="ceo-width-1-1@s ceo-width-5-6@m ceo-width-5-6@l ceo-width-5-6@xl">
		<div class="sitenav b-a ceo-margin-bottom ceo-background-default" >
			<div class="ceo-grid-collapse ceo-flex ceo-flex-middle" ceo-grid>
				<div class="ceo-width-auto">
					<li class="ceo-text-bolder ceo-display-inline-block ceo-text-small"><b class="ceo-display-block">直达</br>导航</b></li>
				</div>
				<ul class="ceo-width-expand ceo-padding-small ceo-text-truncate ceo-overflow-auto">
					<?php
					$args=array(
					'taxonomy' => 'sitecat',
					'hide_empty'=>'0',
					'hierarchical'=>1,
					'parent'=>'0',
					);
					$categories=get_categories($args);
					foreach($categories as $category){
					$cat_id = $category->term_id;
					?>
					<li class="ceo-display-inline-block"><a href="#site<?php echo $category->term_id;?>" class="ceo-display-block" ceo-scroll><i class="ceofont ceoicon-arrow-right-s-line"></i><?php echo $category->name;?></a></li>
					<?php }?>	
				</ul>
			</div>
		</div>
	</div>
	<div class="ceo-width-1-6 ceo-visible@s">
		<div class="ceo-light">
			<a href="/sitesubmit" target="_blank" class="change-color btn b-r-4 site-submit ceo-width-1-1 ceo-display-inline-block ceo-text-center">发布站点</a>
		</div>
	</div>
</div>
