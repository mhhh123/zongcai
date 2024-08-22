<?php
$action = get_query_var('action') ?: 'settings';
$user_id        = get_current_user_id();
$action_file = get_template_directory().'/user/action/'.$action.'.php';
get_header();
?>
<section class="user-main">
    <div class="ceo-container">
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-expand@s sidebar-column">
                <div class="theiaStickySidebar">
                    <div class="user-display b-r-4 ceo-background-default">
                        <div class="ceo-position-relative">
                            <div class="ceo-profile-cover user-mainembox">
                                <em>UID：<?php echo get_the_author_meta('ID',$user_id); ?></em>
                                <img class="j-lazy" src="<?php
                        		if(!get_user_meta( $user_id , 'userbg' , true )){
                        		    echo  _ceo('user_default_thum');
                        		}else {
                        		echo get_user_meta( $user_id , 'userbg' , true );
                        		}
                        		?>" style="display: block;">
                            </div>
    	                	<div class="ceo-text-center ceo-profile-adminimg">
                                <div class="ceo-author-imgs">
                                    <?php echo get_avatar( $user_id,'100' ); ?>
                                    <?php if(user_can($user_id,'author') || user_can($user_id,'editor') || user_can($user_id,'administrator')){ ?>
                                        <i ceo-tooltip="认证作者"></i>
                                    <?php }?>
                                </div>
    	                	</div>
                    	    <div class="ceo-text-center ceo-sidebar-author-text">
                    		    <p class="ceo-text-bolder ceo-h4 ceo-admin-author"><a href="<?php echo get_author_posts_url( $user_id, get_userdata($user_id)->user_nicename ); ?>"><?php echo $current_user->display_name; ?></a></p>
    	                	    <p class="roles-admin ceo-display-inline-block ceo-admin-author-p2"><?php check_user_role(); ?></p>
    	                	    <p class="ceo-text-small ceo-text-muted ceo-author-codes">
    	                	    <?php
                                    if(!get_the_author_meta('user_description', $user_id)){
                                        echo '这家伙很懒，只想把你留下。';
                                    }else {
                                        echo the_author_meta('user_description', $user_id);
                                    }
                            	?>
    	                	    </p>
    	                	    <?php if(_ceo('ceo_author_ank') == true ): ?>
    	                	    <div class="ceo-grid-small" ceo-grid>
                                    <div class="ceo-width-1-2">
            	                	    <a href="<?php if(_ceo('ceo_author_ank_sz'))echo _ceo('ceo_author_ank_sz')['author_ank_link1']; ?>" class="user-tougao">
                    						<i class="ceofont <?php if(_ceo('ceo_author_ank_sz'))echo _ceo('ceo_author_ank_sz')['author_ank_icon1']; ?>"></i> <?php if(_ceo('ceo_author_ank_sz'))echo _ceo('ceo_author_ank_sz')['author_ank_title1']; ?>
                    					</a>
                					</div>
                					<div class="ceo-width-1-2">
                    					<a href="<?php if(_ceo('ceo_author_ank_sz'))echo _ceo('ceo_author_ank_sz')['author_ank_link2']; ?>" class="user-shopan">
                						    <i class="ceofont <?php if(_ceo('ceo_author_ank_sz'))echo _ceo('ceo_author_ank_sz')['author_ank_icon2']; ?>"></i> <?php if(_ceo('ceo_author_ank_sz'))echo _ceo('ceo_author_ank_sz')['author_ank_title2']; ?>
                					    </a>
                					</div>
                				</div>
                				<?php endif; ?>
    	                    </div>
    	                </div>
                    </div>
                    <div class="user-data ceo-background-default b-r-4 ceo-margin-bottom">
                        <ul class="user-nav">
                            <?php if(_ceo('ceo_author_cd1') == true ): ?>
                        	<li class="<?php if($action == '' || $action == 'mypost') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/mypost')); ?>">
                		            我的发布
                				</a>
            				</li>
            				<?php endif; ?>
            				<?php if(_ceo('ceo_author_cd2') == true ): ?>
            				<li class="<?php if($action == '' || $action == 'collection') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/collection')); ?>">
                		            我的收藏
                				</a>
            				</li>
            				<?php endif; ?>
            				<?php if(_ceo('ceo_author_cd3') == true ): ?>
                            <li class="<?php if($action == '' || $action == 'follows') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/follows')); ?>">
                		            我的关注
                				</a>
            				</li>
            				<?php endif; ?>
            				<?php if(_ceo('ceo_author_cd4') == true ): ?>
                            <li class="<?php if($action == '' || $action == 'message') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/message')); ?>">
                		            我的私信
                				</a>
            				</li>
            				<?php endif; ?>
            				<?php if(_ceo('ceo_author_cd5') == true ): ?>
            				<li class="<?php if($action == 'forum') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/forum')); ?>">
                		            我的帖子
                				</a>
            				</li>
            				<?php endif; ?>
            				<?php if(_ceo('ceo_author_cd6') == true ): ?>
            				<li class="<?php if($action == 'question') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/question')); ?>">
                		            我的提问
                				</a>
            				</li>
            				<?php endif; ?>
            				<?php if(_ceo('ceo_author_cd7') == true ): ?>
            				<li class="<?php if($action == 'comment') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/comment')); ?>">
                		            我的评论
                				</a>
            				</li>
            				<?php endif; ?>
            				<?php if(_ceo('ceo_author_cd8') == true ): ?>
            				<li class="<?php if($action == 'site') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/site')); ?>">
                		            网站收录
                				</a>
            				</li>
            				<?php endif; ?>
                            <li class="<?php if($action == 'settings') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/settings')); ?>">
                		            个人资料
                				</a>
            				</li>
    
            				<li class="<?php if($action == 'security') echo 'active';?>">
                				<a href="<?php echo home_url(user_trailingslashit('/user/security')); ?>">
                		            账号安全
                				</a>
            				</li>
            				<li>
            				    <a href="<?php echo wp_logout_url( home_url() ); ?>" class="ceo-display-inline-block">退出登录</a>
            				</li>
            			</ul>
        			</div>
    			</div>
            </div>
            <div class="ceo-width-1-1 ceo-width-auto@s">
    			<div class="wp">
        			<div class="user-content b-r-4 ceo-background-default ceo-margin-bottom">
        				<?php
            				if(!is_file($action_file)){
            				    include(get_template_directory().'/user/action/settings.php'); //用户中心默认页面
            				}else{
            					include($action_file);
            				}
        				?>
            		</div>
        		</div>
            </div>
        </div>
    </div>
</section>
<style>
.navBar_03 {
    background: #fff;
    margin-bottom: 0px;
}
.navBar_03 .nav>ul>li>a,.navBar_03 .header-info .navbar_03_an
{
    color: #505050!important;
}

.navBar_03 .header-info em {
    background: #505050;
}
.header_3_nav .ceo-navbar-s {
	color:#505050
}
</style>
<?php get_footer(); ?>