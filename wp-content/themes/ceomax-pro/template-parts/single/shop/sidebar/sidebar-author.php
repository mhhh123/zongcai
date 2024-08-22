<?php
$user_id = get_the_author_meta('ID');
$author = get_the_author_meta( 'ID' );
?>
<div class="ceoshop-sall">
    <div class="custom">
        <?php if(_ceo('ceoshop_shangjia_switch') == true): ?>
        <?php if(get_the_author_meta( 'weixin',$user_id)){?>
        <div class="ceo-weixin-author">
            <div class="wximg ceo-background-default">
                <img src="<?php echo get_user_meta( $user_id , 'weixin' , true ); ?>" alt="<?php if(_ceo('ceoshop_shangjia_qqwxsz'))echo _ceo('ceoshop_shangjia_qqwxsz')['ceoshop_shangjia_wx']; ?>">
                <span><i class="ceofont  <?php if(_ceo('ceoshop_shangjia_qqwxsz'))echo _ceo('ceoshop_shangjia_qqwxsz')['ceoshop_shangjia_wxtb']; ?>"></i><?php if(_ceo('ceoshop_shangjia_qqwxsz'))echo _ceo('ceoshop_shangjia_qqwxsz')['ceoshop_shangjia_wx']; ?></span>
            </div>
        </div>
        <?php }?>
        <?php endif; ?>
        <div class="cusomPic">
            <a href="javascript:;"></a>
            <a href="#"><?php echo get_avatar( get_the_author_meta( 'ID' ),'100' ); ?></a>
        </div>
        <?php ?>
        <div class="main-icon-admin">
            <p class="main_info_icon"></p>
            <p class="main_info_admin"> <?php the_author_posts_link(); ?></p>
        </div>
        <?php if(_ceo('ceoshop_shangjia_dianhua') == true): ?>
        <div class="ceo-text-center ceo-author-a-admin">
            <?php if(get_the_author_meta( 'shouji',$user_id)){?>
            <p class="sj">联系电话：<?php echo get_the_author_meta('shouji',$user_id); ?></p>
            <?php }?>
        </div>
        <?php endif; ?>

        <?php if ( _ceo('ceoshop_shangjia_gzsx') == true): ?>
        <div class="ceo-gzsxbtn-box">
            <div class="ceo-grid-small btn-follow-div" ceo-grid>
                <?php do_action('ceo_profile_after_description', $author);?>
                <div class="ceo-width-1-3">
                    <a href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo get_the_author_meta('qq',$user_id); ?>&amp;site=qq&amp;menu=yes" target="_blank" class="ceo-zybtn" rel="noreferrer nofollow"><i class="ceofont ceoicon-qq-fill"></i>联系Ta</a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <a href="<?php echo get_author_posts_url( $user_id, get_userdata($user_id)->user_nicename ); ?>" class="customdp"><i class="ceofont <?php if(_ceo('ceoshop_shangjia_ansz'))echo _ceo('ceoshop_shangjia_ansz')['ceoshop_shangjia_antb']; ?>"></i> <?php if(_ceo('ceoshop_shangjia_ansz'))echo _ceo('ceoshop_shangjia_ansz')['ceoshop_shangjia_anbt']; ?>
        </a>
        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php if(_ceo('ceoshop_shangjia_kf'))echo _ceo('ceoshop_shangjia_kf')['ceoshop_single_kf_qq']; ?>&amp;site=qq&amp;menu=yes" class="kefu customgf" rel="noreferrer nofollow"><i class="ceofont <?php if(_ceo('ceoshop_shangjia_kf'))echo _ceo('ceoshop_shangjia_kf')['ceoshop_single_kf_ico']; ?>"></i> <?php if(_ceo('ceoshop_shangjia_kf'))echo _ceo('ceoshop_shangjia_kf')['ceoshop_single_kf_title']; ?>
        </a>
    </div>
</div>