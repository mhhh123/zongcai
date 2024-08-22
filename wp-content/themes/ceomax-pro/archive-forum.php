<?php
pure_highlightjs_assets_add();
get_header();
wp_enqueue_script('questionjs',get_template_directory_uri().'/static/js/question.js');

if (_ceo('verify_forum_new') == true && _ceo('verify_forum_new_type') == '1') {
    echo tencent_captcha_load();
    echo '<script>var verify_forum_new = true</script>';
} else {
    echo '<script>var verify_forum_new = false</script>';
}

if (_ceo('verify_forum_new') == true && _ceo('verify_forum_new_type') == '2') {
?>
    <script src="https://v-cn.vaptcha.com/v3.js"></script>
    <script>
        window.vaptcha_obj = vaptcha({
            vid: '<?php echo _ceo('vaptcha_vid');?>',
            mode: 'invisible',
            scene: 0,
            area: 'auto',
        })
    </script>
<?php
}


$title    = _ceo('forum-title');
$subtitle = _ceo('forum-subtitle');
$bg       = _ceo('forum-bg');
$fd       = _ceo('forum_desc_sz');
$action   = (isset($_GET['type'])) ? strtolower($_GET['type']) : 'date' ;
$termObj  = get_queried_object();
$taxonomy = (!empty($termObj) && !empty($termObj->taxonomy)) ? $termObj->taxonomy : '';

$_args = array(
    'post_type' => 'forum',
    'paged'     => get_query_var('paged', 1),
);

if ( isset($_GET['search']) ) {
	$_args['s'] = $_GET['search'];
}

if ( !empty($taxonomy) ) {
	$_args['tax_query'] = array(
		array(
            'taxonomy' => $taxonomy,
            'terms'    => $termObj->term_id
        )
    );
}

switch ($action) {
	case 'hot':
	$_args['meta_key'] = 'views';
	$_args['order']    = 'DESC';
	$_args['orderby']  = 'meta_value_num';
	break;
	case 'uncomment':
	$_args['order']    = 'ASC';
	$_args['orderby']  = 'comment_count';
	break;
	case 'comment':
	$_args['order']    = 'DESC';
	$_args['orderby']  = 'comment_count';
	break;
	default:
	break;
}

$postlist = new WP_Query( $_args );
?>
<div class="ceo-community-bg ceo-background-cover" style="background-image: url(<?php echo $bg; ?>);margin-bottom: 30px">
    <div class="ceo-container">
        <div class="ceo-community-bgleft ceo-pages-forum-title">
            <h3 class="ceo-hs"><?php echo $title; ?><em>·</em><span><?php echo $subtitle; ?></span></h3>
            <ul class="ceo-visible@s">
                <?php
        		if ($fd) {
        			foreach ( $fd as $key => $value) {
        		?>
                <li><i class="ceofont <?php echo $fd[$key]['icon']; ?>"></i><?php echo $fd[$key]['title']; ?></li>
                <?php } } ?>
            </ul>
        </div>
    </div>
</div>
<div class="ceo-container">
	<div class="ceo-grid-ceosmls" ceo-grid>
		<div class="ceo-width-1-1 ceo-width-auto@s">
	        <div class="ajaxMain wp">

                <?php if ($action=='ask') :?>
                <div class="forum-box-content-mk b-a b-r-4 ceo-background-default ceo-margin-bottom">
                    <form id="j-form-forum" method="post" class="ceo-form">
                        <label class="forum-text-small">标题</label>
                        <br>
                        <div class="ceo-grid-small" ceo-grid>
                            <div class="ceo-width-expand">
                                <input type="text" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" id="forum_title" name="forum_title" placeholder="输入帖子标题（至少5个字）" value="" autocomplete="off">
                                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ceo-click-' . $current_user->ID);?>">
                                <input type="hidden" name="action" value="forum_add_frontend">
                            </div>

                            <div class="ceo-width-auto">
                                <div class="ceo-margin-small-top">
                                    <?php wp_dropdown_categories( array(
                                        'hide_empty'        => 0,
                                        'orderby'           => 'name',
                                        'name'              => 'forum_cat',
                                        'hierarchical'      => true,
                                        'id'                => 'forum_cat',
                                        'class'             => 'ceo-select b-r-4 ceo-text-small',
                                        'taxonomy'          => 'forum_cat',
                                        'option_none_value' => '',
                                        'show_option_none'  => esc_html__('选择分类')
                                    ) );?>
                                </div>
                            </div>
                        </div>

                        <div class="ceo-margin-small-top">
                            <label class="forum-text-small">内容：</label>
                            <div class="ceo-margin-small-top">
                                <?php wp_editor(
                                    '',
                                    'forum_content',
                                    array(
                                        'textarea_rows' => 15,
                                    )
                                );?>
                            </div>
                        </div>

                        <div class="ceo-margin-small-top">
                            <label class="forum-text-small">标签：</label>
                            <input type="text" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" name="forum_tag" placeholder="输入帖子标签（选填）" value="">
                        </div>
                        <button type="submit" class="ceo-button b-r-4 ceo-margin-top forum-tj">发布帖子</button>
                        <a class="return" href="javascript:history.go(-1);" ceo-tooltip="返回上一页"><i class="ceofont ceoicon-arrow-go-back-line"></i></a>
                    </form>
                    <ul class="ceo-question-tips">
                        <span><i class="ceofont ceoicon-information-line"></i><?php echo _ceo('question_ts_title'); ?></span>
                        <?php echo _ceo('question_ts_text'); ?>
                    </ul>
				</div>
				</div>
                <?php else: ?>

	            <!--论坛统计-->
                <?php
                if ( ! empty(get_queried_object_id()) || !empty($_GET['search'])) {
                    $hiden_style= 'display:none;';
                    $hiden_style_search= 'display:none;';
                }
                ?>
	            <div class="ceo-forum-statistics b-a b-r-4 ceo-background-default" style="<?php echo $hiden_style;?>">
	                <div class="ceo-flex">
	                    <div class="ceo-forum-z ceo-flex-1">
	                        <span>今日帖数：<p><?php echo get_posts_count_from_today('forum');?></p> </span>
	                        <span>昨日帖数：<?php echo get_posts_count_from_yesterday('forum');?></span>
	                        <span>全部帖数：<?php ceo_forum_home_tj(); ?></span>
	                        <span>论坛互动：<?php echo get_all_comments_of_post_type("forum"); ?></span>
	                    </div>
	                    <div class="ceo-forum-y">
	                        <?php if( is_user_logged_in() ){ ?>
            				<a class="ask" href="/forum?type=ask"><i class="ceofont ceoicon-add-line"></i>快速发帖</a>
            				<?php }else{ ?>
            				<a class="ask" href="#modal-login" ceo-toggle><i class="ceofont ceoicon-add-line"></i>登录后发帖</a>
            				<?php } ?>
                        </div>
	                </div>
	            </div>
	            <!--论坛统计 END-->

	            <?php
				$q_categories = get_terms('forum_cat', array('hide_empty' => 0));
				if (!empty($q_categories)) {
				  echo '<div class="forum-box-cat b-a b-r-4 ceo-background-default ceo-cet-forum-box" style="'.$hiden_style.'">';
				      echo '<div class="ceo-grid-ceosmls" ceo-grid>';
    				  ceo_forum_home();
				      echo '</div>';
				  echo '</div>';
				}
				?>
                <?php if(!empty(get_queried_object_id()) || ! empty($_GET['search'])){?>

                <!--论坛信息-->
                <div class="ceo-forum-catx b-a b-r-4 ceo-background-default">
                    <div class="ceo-grid-ceosmls" ceo-grid>
                        <div class="ceo-width-1-1 ceo-width-expand@s">
                            <div class="ceo-grid-ceosmls" ceo-grid>
                                <div class="ceo-width-auto">
                                    <?php ceo_forum_cat_tb(); ?>
                                </div>
                                <div class="ceo-width-expand">
                                    <?php
                                    $item_current=get_term(get_queried_object_id());
                                    ?>
                                    <h2 class="ceo-text-truncate"><?php echo $item_current->name;?></h2>
                                    <span>帖数：<?php echo $item_current->count;?></span><span>互动：<?php echo get_comments_count_by_cat($item_current->term_id);?></span>
                                    <p class="ceo-text-truncate"><?php echo $item_current->description;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="ceo-width-1-1 ceo-width-auto@s">
                            <div class="ceo-forum-catxy">
                                <a class="return" href="javascript:history.go(-1);" ceo-tooltip="返回上一页"><i class="ceofont ceoicon-arrow-go-back-line"></i></a>
                				<?php
                                if( is_user_logged_in() ){
                                ?>
                				<a class="ask" href="/forum?type=ask"><i class="ceofont ceoicon-add-line"></i>快速发帖</a>
                				<?php }else{ ?>
                				<a class="ask" href="#modal-login" ceo-toggle><i class="ceofont ceoicon-add-line"></i>登录后发帖</a>
                				<?php } ?>
            				</div>
        				</div>
    				</div>
                </div>
                <!--论坛信息 END-->
                <div class="b-r-4 b-a ceo-background-default ceo-cet-forum-box">
                    <div class="ceo-flex forum-box-tab">
        				<?php
        				$nav_tabs = array(
        					'date'      => esc_html__('最新帖子'),
        					'hot'       => esc_html__('人气帖子'),
        					'comment'   => esc_html__('热门帖子'),
        					'uncomment' => esc_html__('等你回帖'),
        				);

        				echo '<ul class="ceo-flex-1">';
        				foreach ($nav_tabs as $key=>$name) {
        					$is_active = ($action==$key) ? ' xz' : '';
        					echo '<a class="cd'.$is_active.'" href="'.add_query_arg("type",$key).'">'.$name.'</a>';
        				}
        				echo '</ul>';

        				?>
    				</div>

    				<div class="forum-box-content">
    					<?php if ($action=='ask') :?>
    					<div class="forum-box-content-mk">
    						<form id="j-form-forum" method="post" class="ceo-form">
    						    <label class="forum-text-small">标题</label>
						        <br>
    						    <div class="ceo-grid-small" ceo-grid>
        							<div class="ceo-width-expand">
        							    <input type="text" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" id="forum_title" name="forum_title" placeholder="输入帖子标题（至少5个字）" value="" autocomplete="off">
        							    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ceo-click-' . $current_user->ID);?>">
        							    <input type="hidden" name="action" value="forum_add_frontend">
        							</div>

        							<div class="ceo-width-auto">
        							    <div class="ceo-margin-small-top">
            								<?php wp_dropdown_categories( array(
            								'hide_empty'        => 0,
            								'orderby'           => 'name',
            								'name'              => 'forum_cat',
            								'hierarchical'      => true,
            								'id'                => 'forum_cat',
            								'class'             => 'ceo-select b-r-4',
            								'taxonomy'          => 'forum_cat',
                                            'option_none_value' => '',
            								'show_option_none'  => esc_html__('选择分类')
            								) );?>
        								</div>
        							</div>
    							</div>

    						    <div class="ceo-margin-small-top">
    						    	<label class="forum-text-small">内容：</label>
    						    	<div class="ceo-margin-small-top">
    						    	<?php wp_editor(
    									'',
    									'forum_content',
    									array(
    										'textarea_rows' => 5,
    									)
    								);?>
    								</div>
    						    </div>

								<div class="ceo-margin-small-top">
								    <label class="forum-text-small">标签：</label>
								    <input type="text" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" name="forum_tag" placeholder="输入帖子标签（选填）" value="">
								</div>

    						    <button type="submit" class="ceo-button b-r-4 ceo-margin-top forum-tj">发布帖子</button>
    						</form>
    						<ul class="ceo-forum-tips">
    						    <span><i class="ceofont ceoicon-information-line"></i><?php echo _ceo('forum_ts_title'); ?></span>
    					        <?php echo _ceo('forum_ts_text'); ?>
    					    </ul>
    					<?php else: ?>

    					<div class="forum-box-list">
    						<?php if ( $postlist->have_posts() ) { ?>
    						<?php while ( $postlist->have_posts() ) : $postlist->the_post(); ?>
    						    <?php get_template_part( 'template-parts/loop/loop', 'forum' ); ?>
    						<?php endwhile;
                            }else{
    					    echo '当前分类没有内容~';
                            }; ?>
        					<?php endif; wp_reset_query(); ?>
    					</div>
    				</div>
                    <div class="fenye ceo-text-center ceo-text-small ceo-margin-medium-top">
                    	<?php fenye(); ?>
                    </div>
				</div>
			</div>
	        <?php }else{?>
                </div>
            <?php }?>
            <?php endif; ?>
            </div>
		<?php get_template_part( 'sidebar', 'forum' ); ?>
	</div>
</div>
<?php //wp_enqueue_script('tougaojs',get_template_directory_uri().'/static/js/tougao.js'); ?>
<?php get_footer(); ?>
