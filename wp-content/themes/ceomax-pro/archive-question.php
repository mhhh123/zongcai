<?php
pure_highlightjs_assets_add();
get_header();

if (_ceo('verify_question_new') == true && _ceo('verify_question_new_type') == '1') {
    echo tencent_captcha_load();
    echo '<script>var verify_question_new = true</script>';
} else {
    echo '<script>var verify_question_new = false</script>';
}

if (_ceo('verify_question_new') == true && _ceo('verify_question_new_type') == '2') {
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


$title    = _ceo('question-title');
$subtitle = _ceo('question-subtitle');
$bg       = _ceo('question-bg');
$qd       = _ceo('question_desc_sz');
$action   = (isset($_GET['type'])) ? strtolower($_GET['type']) : 'date' ;
$termObj  = get_queried_object();
$taxonomy = (!empty($termObj) && !empty($termObj->taxonomy)) ? $termObj->taxonomy : '';

$_args = array(
    'post_type' => 'question',
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
    case 'reward':
	$_args['meta_query']    =  array(
        'relation' => 'AND',
        array(
            'key'     => 'question_money',
            'value' => '0',
            'compare' => '>',
        ),
    );
	break;
	default:
	break;
}

$postlist = new WP_Query( $_args );

wp_enqueue_script('questionjs',get_template_directory_uri().'/static/js/question.js');
?>
<div class="ceo-community-bg ceo-background-cover" style="background-image: url(<?php echo $bg; ?>);margin-bottom: 30px">
    <div class="ceo-container">
        <div class="ceo-community-bgleft ceo-pages-question-title">
            <h3 class="ceo-hs"><?php echo $title; ?><em>·</em><?php echo $subtitle; ?></h3>
            <ul class="ceo-visible@s">
                <?php
        		if ($qd) {
        			foreach ( $qd as $key => $value) {
        		?>
                <li><i class="ceofont <?php echo $qd[$key]['icon']; ?>"></i><?php echo $qd[$key]['title']; ?></li>
                <?php } } ?>
            </ul>
        </div>
    </div>
</div>
<div class="ceo-container">
	<div class="ceo-grid-ceosmls" ceo-grid>
		<div class="ceo-width-1-1 ceo-width-auto@s">
	        <div class="ajaxMain wp">
	            <?php
				$q_categories = get_terms('question_cat', array('hide_empty' => 0));
				if (!empty($q_categories)) {
				  echo '<div class="question-box-cat b-r-4 b-a ceo-background-default ceo-cet-question-box">';
				  $is_all_current = (empty($termObj->term_id)) ? ' class="current"' : '' ;
				  echo '<a href="'.get_post_type_archive_link( 'question' ).'">全部问题</a>';
				  foreach ($q_categories as $item) {
				      $is_current = (!empty($termObj->term_id) && $termObj->term_id == $item->term_id) ? ' class="current"' : '' ;
				      echo '<a'.$is_current.' href="'.get_category_link($item->term_id).'">'.$item->name.'</a>';
				  }
				  echo '</div>';
				} ?>
                <div class="b-r-4 b-a ceo-background-default ceo-cet-question-box">
                    <div class="ceo-flex question-box-tab">
        				<?php
        				$nav_tabs = array(
        					'date'      => esc_html__('最新问题'),
        					'hot'       => esc_html__('人气问题'),
        					'uncomment' => esc_html__('等你来答'),
        					'comment'   => esc_html__('已有回答'),
        					'reward'    => esc_html__('悬赏问题'),
        				);

        				echo '<ul class="ceo-flex-1">';
        				foreach ($nav_tabs as $key=>$name) {
        					$is_active = ($action==$key) ? ' xz' : '';
        					echo '<a class="cd'.$is_active.'" href="'.add_query_arg("type",$key).'">'.$name.'</a>';
        				}
        				echo '</ul>';

        				?>
        				<?php if( is_user_logged_in() ){ ?>
        				<a class="ask" href="/question?type=ask"><i class="ceofont ceoicon-add-line"></i>快速提问</a>
        				<?php }else{ ?>
        				<a class="ask" href="#modal-login" ceo-toggle><i class="ceofont ceoicon-add-line"></i>登录后提问</a>
        				<?php } ?>
    				</div>

    				<div class="question-box-content">
    					<?php if ($action=='ask') :?>
    					<div class="question-box-content-mk">
    						<form id="j-form-question" method="post" class="ceo-form">

                                <?php if(_ceo('answer_question_money')){?>
                                <ul class="ceo-question-money ceo-flex">
                                    <div class="ceo-flex-1">
                                        <span class="ceo-question-span">悬赏金额</span>
                                        <?php
										$currencyName = ceo_shop_get_balance_name();
                                        $arrs_money = ['1'.$currencyName, '3'.$currencyName, '5'.$currencyName, '10'.$currencyName,'自定义','input'];
                                        foreach ($arrs_money as $v){
                                            if($v=='input'){
                                                echo '<input type="text" class="b-r-4 ceo-input ceo-question-money-input"  value="" name="question-money" >'.$currencyName;
                                            }else{
                                                echo '<a href="javascript:void(0)" data-v="'.intval(str_replace($currencyName,'',$v)).'" class="question-money-v">'.$v.'</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <a ceo-toggle="target: #modal-reward" class="uebtn">悬赏规则</a>
                                    <div id="modal-reward" class="ceo-flex-top" ceo-modal>
                                        <div class="ceo-modal-dialog ceo-modal-body ceo-margin-auto-vertical">
                                            <button class="ceo-modal-close-default" type="button" ceo-close></button>
                                            <span>悬赏规则</span>
                                            <li>1.悬赏者自己可以选择最佳答案</li>
                                            <li>2.如果问题没有人回答，过期将返还悬赏额</li>
                                        </div>
                                    </div>
                                </ul>
                                <?php }?>

    						    <label class="question-text-small">标题</label>
						        <br>
    						    <div class="ceo-grid-small" ceo-grid>
        							<div class="ceo-width-expand">
        							    <input type="text" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" id="question_title" name="question_title" placeholder="输入问题标题（至少5个字）" value="" autocomplete="off">
        							    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ceo-click-' . $current_user->ID);?>">
        							    <input type="hidden" name="action" value="question_add_frontend">
        							</div>

        							<div class="ceo-width-auto">
        							    <div class="ceo-margin-small-top">
            								<?php wp_dropdown_categories( array(
            								'hide_empty'        => 0,
            								'orderby'           => 'name',
            								'name'              => 'question_cat',
            								'hierarchical'      => true,
            								'id'                => 'question_cat',
            								'class'             => 'ceo-select b-r-4 ceo-text-small',
            								'taxonomy'          => 'question_cat',
                                            'option_none_value' => '',
            								'show_option_none'  => esc_html__('选择分类')
            								) );?>
        								</div>
        							</div>
    							</div>

    						    <div class="ceo-margin-small-top">
    						    	<label class="question-text-small">内容：</label>
    						    	<div class="ceo-margin-small-top">
    						    	<?php wp_editor(
    									'',
    									'question_content',
    									array(
    										'textarea_rows' => 10,
    									)
    								);?>
    								</div>
    						    </div>

								<div class="ceo-margin-small-top">
								    <label class="question-text-small">标签：</label>
								    <input type="text" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" name="question_tag" placeholder="输入问题标签（选填）" value="">
								</div>

    						    <button type="submit" class="ceo-button b-r-4 ceo-margin-top question-tj">发布问题</button>
    						</form>
    						<ul class="ceo-question-tips">
    						    <span><i class="ceofont ceoicon-information-line"></i><?php echo _ceo('question_ts_title'); ?></span>
    					        <?php echo _ceo('question_ts_text'); ?>
    					    </ul>
    					<?php else: ?>

    					<div class="question-box-list">
    						<?php if ( $postlist->have_posts() ) { ?>
    						<?php while ( $postlist->have_posts() ) : $postlist->the_post(); ?>
    						    <?php get_template_part( 'template-parts/loop/loop', 'question' ); ?>
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
		</div>
		<?php get_template_part( 'sidebar', 'question' ); ?>
	</div>
</div>
<script type="text/javascript">

</script>

<?php wp_enqueue_script('tougaojs',get_template_directory_uri().'/static/js/tougao.js'); ?>
<?php get_footer(); ?>