<header class="header ceo-background-default">
    <div class="navbar ceo-position-relative">
    	<div class="ceo-container ceo-flex ceo-flex-middle ceo-position-relative ceo-logo-shou">
    		<a href="http://www.ivipic.com" class="logo ceo-logo ceo-display-inline-block" alt="微图库测试">
    		    <div class="ceo-logo-nav-night ceo-visible@m" style="background: url(http://www.ivipic.com/wp-content/themes/ceomax-pro/static/images/logo.png) no-repeat;background-size: 150px auto;"></div>
    		        		    <div class="ceo-app-logo" style="background: url(http://www.ivipic.com/wp-content/uploads/2024/08/2024081509035715.png) no-repeat;background-size: 38px auto;"></div>
                    		        		</a>
    		
    		
    		<div class="header-info ceo-flex ceo-flex-middle">
    		        			<a href="#header-search" class="header-search ceo-navbar-s" ceo-toggle=""><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></a>
    			    			    			<a href="javascript:switchNightMode()" class="header-search ceo-navbar-s" ceo-tooltip="开启/关闭夜间模式" title="" aria-expanded="false"><i class="ceofont ceoicon-moon-clear-line ceo-text-bolder to-night"></i></a>
    			    			    			    			<a class="ceo-navbar-s"><i ceo-toggle="target: #home-modal" class="ceofont ceoicon-notification-3-line ceo-text-bold"></i></a>
    			    			        		<div id="header-search" ceo-modal="" class="ceo-modal">
    <div class="ceo-tan ceo-modal-dialog ceo-modal-body home-modal ceo-padding-remove ceo-margin-auto-vertical">
        <button class="ceo-modal-close-default ceo-icon ceo-close" type="button" ceo-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>
        <div class="b-r-12 ceo-background-default ceo-overflow-hidden ceo-position-relative ceo-padding-30px">
            <h3>搜索</h3>
    		<div class="search search-navbar">
    			<form method="get" class="b-r-4 b-a ceo-form ceo-flex ceo-overflow-hidden search-form" action="http://www.ivipic.com">
    				<input type="search" placeholder="输入关键字搜索" autocomplete="off" value="" name="s" required="required" class="ceo-input ceo-flex-1 ceo-text-small">
    				<button type="submit"><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></button>
    			</form>
    		</div>
            <div class="header-btn-search">
                <div class="header-btn-search-s ceo-dt change-color btn-search-all">搜索全站</div>
                            </div>
    		<div class="tags-item ceo-margin-top">
    			<p class="ceo-margin-small-bottom ceo-text-small">热门标签：</p>
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
        let category_search_url='/?s='+search_s+"&cat=0"
        console.log(category_search_url)
        location.href=category_search_url
    })
</script>        		
        		<div id="nav_user" style="display: contents"><em class="ceo-display-inline-block"></em>
        <div class="head-avatar">
        <a href="#" class="avatar ceo-display-inline-block"><img alt="" src="//www.ivipic.com/wp-content/themes/ceomax-pro/static/images/avatar.png" class="avatar avatar-36 photo" data-id="1" height="36" width="36"></a>
        <div class="user-down ceo-position-top-right ceo-margin-medium-right ceo-animation-slide-top-small">
            <div class="user-down-main b-r-4 ceo-overflow-hidden ceo-background-default">
                <div class="user-info ceo-position-relative">
                    
                    <div class="user-down-info ceo-grid-small ceo-position-relative ceo-position-z-index ceo-grid ceo-grid-stack" ceo-grid="">
                        <div class="ceo-width-auto">
                            <div class="avatar">
                                <img alt="" src="//www.ivipic.com/wp-content/themes/ceomax-pro/static/images/avatar.png" class="avatar avatar-50 photo" data-id="1" height="50" width="50">                            </div>
                        </div>
                        <div class="ceo-width-expand ceo-padding-top-4">
                            <ul>
                                <h4 class="ceo-text-bolder">miao_3013</h4><i>体验VIP会员</i>
                            </ul>
                            <p class="ceo-text-small ceo-text-muted ceo-margin-remove ceo-text-truncate" style="font-size: 0.675rem;"></p>
                        </div>
                    </div>
                    <div>
                        <li class="first">
                                                            <div class="user-money clearfix">
                                    <div class="money-left">余额：1.0E+32<span>积分：0</span></div>
                                </div>
                            
                                                            <div class="user-vip clearfix">
                                    <div class="vip-left">
                                        <span>体验VIP会员</span>
                                        <v onclick="javascript:location.href='/member/center/';">升级VIP</v>
                                        <div class="down-left">升级VIP尊享全站海量下载！</div>
                                    </div>
                                </div>
                                                    </li>
                    </div>
                    <div class="ceo-usertc">
                        <ul class="ceo-czgr">
                            <li class="ceo-users-z">
                                <a class="ceo-cz" href="/tougao">
                                    <i class="ceofont ceoicon-edit-2-line"></i> 创作中心</a>
                            </li>
                            <li class="ceo-users-z">
                                <a class="ceo-gr" href="/user/settings/">
                                    <i class="ceofont ceoicon-user-line"></i> 个人中心                                </a>
                            </li>
                        </ul>
                        <span class="ceo-users-s">
                        <a href="/member/center/"> 商城中心</a>
                    </span>
                    </div>
                    <div class="ceo-user-t user-info-menu ceo-padding-small ceo-background-default ceo-margin-top ceo-position-relative ceo-position-z-index">
                        <div class="ceo-grid-small ceo-grid ceo-grid-stack" ceo-grid="">
                            <div class="ceo-width-1-4 ceo-text-center">
                                <a href="http://www.ivipic.com/index.php/author/miao_3013/" class="ceo-display-block ceo-text-small ceo-text-muted">主页</a>
                            </div>
                            <div class="ceo-width-1-4 ceo-text-center">
                                <a href="http://www.ivipic.com/user/settings/" class="ceo-display-block ceo-text-small ceo-text-muted">资料</a>
                            </div>
                            
                                <div class="ceo-width-1-4 ceo-text-center">
                                    <a href="http://www.ivipic.com/wp-admin/" target="_blank" class="ceo-display-block ceo-text-small ceo-text-muted">后台</a>
                                </div>

                                                        <div class="ceo-width-1-4 ceo-text-center">
                                <a href="http://www.ivipic.com/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Fwww.ivipic.com&amp;_wpnonce=4cbb7f5b9a" class="ceo-display-block ceo-text-small ceo-text-muted">退出</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    (function($){
        $.ajax({
            url:"//www.ivipic.com/wp-content/themes/ceomax-pro/nav_user.php",
            success:function(res){
                if(res.indexOf(res,'display')!='-1'){
                    $("#nav_user").html(res)
                }
            }
        })
    })(jQuery)
</script>    		</div>
    	</div>
    </div>
</header>