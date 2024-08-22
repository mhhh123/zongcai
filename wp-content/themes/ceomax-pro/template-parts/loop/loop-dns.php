<?php
$post_id =  get_the_ID();
$down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
?>
<div class="ajax-item ceo-width-1-1">
	<div class="side-item b-a ceo-background-default ceo-overflow-hidden b-r-4">
		<div class="ceo-grid-collapse" ceo-grid>
			<div class="ceo-width-1-1@s ceo-width-expand">
				<div class="blog-item-content">
				    <div class="ceo-dns ceo-web">
						<h3 class="ceo-text-truncate"><a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="title ceo-h4">
						    <?php if(_ceo('ceo_cat_tese') == true ): ?>
    	    			    <?php
                            $tese_arr = get_post_meta( get_the_ID(), 'ceo-tese-tag', true );
                            if(!empty($tese_arr)){
                                $ymetaValue = $tese_arr;
                            }else{
                                $ymetaValue='';
                            }
                            
                            if ($ymetaValue == 'default') {
                                $ymetaValue = _ceo('test_tag_default_use');
                            }
                            
                            if (($ymetaValue=="remen")) {
                                echo '<div class="ceo-tese-remen"><span class="i">#</span>热门</div>';
                            }

                            elseif (($ymetaValue=="dujia")) {
                                echo '<div class="ceo-tese-dujia"><span class="i">#</span>独家</div>';
                            }

                            elseif (($ymetaValue=="zuixin")) {
                                echo '<div class="ceo-tese-zuixin"><span class="i">#</span>最新</div>';
                            }

                            elseif (($ymetaValue=="tuijian")) {
                                echo '<div class="ceo-tese-tuijian"><span class="i">#</span>推荐</div>';
                            }

                            elseif (($ymetaValue=="jingpin")) {
                                echo '<div class="ceo-tese-jingpin"><span class="i">#</span>精品</div>';
                            }

                        		elseif (($ymetaValue=="buxuanze")) {
                           	 echo '';
                           	 }

                            ?>
                            <?php endif; ?>
    					    <?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line" style="font-size: 22px;"></i><?php endif; ?><?php the_title(); ?>
        				</a></h3>
        				<div class="ceo-web-list ceo-flex">
            				<p class="ceo-flex-1"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?> 人关注</p>
        				</div>
        				<ul>
					        <?php if(!empty($down_info_arr)){?>
                                <?php
                                if(!empty($down_info_arr)){
                                    foreach ($down_info_arr as $k=>$v){
                                        $number=$k+1;
                                        echo '<li><p class="ceo-web-info-pf">'.$v['title'].'：'.$v['desc'].'</b></p>';
                                    }
                                }
                                ?>
                            <?php } ?>
			            </ul>
			            <div class="ceo-dns-contact">
			                <?php if (_ceo('ceo_cat_jiage') == true && _ceo('ceo_shop_whole')) : ?>
                            <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
                            <?php echo CeoShopCoreProduct::getPriceFormat($post_id, true, true, 1) ?>
                            <?php endif; ?>
                            <?php endif; ?>
			                <a class="ceo-dns-ys" href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" rel="noreferrer nofollow" target="_blank">域名预览</a>
			                <a class="ceo-dns-gm" href="<?php the_permalink(); ?>" <?php echo _target_blank();?>>立即购买</a>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>