<div id="header-search" ceo-modal>
    <div class="ceo-tan ceo-modal-dialog ceo-modal-body home-modal ceo-padding-remove ceo-margin-auto-vertical">
        <button class="ceo-modal-close-default" type="button" ceo-close></button>
        <div class="b-r-12 ceo-background-default ceo-overflow-hidden ceo-position-relative ceo-padding-30px">
            <h3>搜索</h3>
    		<div class="search search-navbar">
    			<form method="get" class="b-r-4 b-a ceo-form ceo-flex ceo-overflow-hidden search-form" action="<?php echo home_url();?>">
    				<input type="search" placeholder="输入关键字搜索" autocomplete="off" value="" name="s" required="required" class="ceo-input ceo-flex-1 ceo-text-small">
    				<button type="submit"><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></button>
    			</form>
    		</div>
            <div class="header-btn-search">
                <div class="header-btn-search-s ceo-dt change-color btn-search-all">搜索全站</div>
                <?php if(is_category()){?>
                <div class="header-btn-search-s ceo-dt change-color btn-search-category">搜索当前分类</div>
                <?php }?>
            </div>
    		<div class="tags-item ceo-margin-top">
    			<p class="ceo-margin-small-bottom ceo-text-small">热门标签：</p>
    			<?php wp_tag_cloud('number=9&orderby=count&order=DESC&smallest=12&largest=12&unit=px'); ?>
    		</div>
		</div>
    	<div class="home-modal-bottom">
    	    <ul>
    	        <li></li>
    	        <li></li>
    	    </ul>
    	</div>
	</div>
</div>
<script>
    $(".btn-search-all").on("click",function () {
        $(".search .search-form button").trigger('click')
    })
    $(".btn-search-category").on("click",function (event) {
        event.preventDefault()
        let search_s=$(".search-navbar input[name=s]").val();
        if(!search_s){
            return false;
        }
        let category_search_url='/?s='+search_s+"&cat=<?php echo get_queried_object_id(); ?>"
        console.log(category_search_url)
        location.href=category_search_url
    })
</script>