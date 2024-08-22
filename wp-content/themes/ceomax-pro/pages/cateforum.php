<?php
/*
Template Name: 全站资源
*/
?>
<?php get_header(); ?>
<script>
    function toggle_collapse(idselect) {
        $('#' + idselect).toggle()
        var img = $('#' + idselect + '_img');
        img.attr('src',img.attr('src').indexOf('_yes.gif') == -1 ? img.attr('src').replace(/_no\.gif/, '_yes\.gif') : img.attr('src').replace(/_yes\.gif/, '_no\.gif'))
        return false;
    }
</script>


<?php
$top_arrs = get_categories(array(
    'parent'     => 0,
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC',
    'meta_query' => [
        [
            'key'  => 'cate_forum_sort',
            'type' => 'NUMERIC',
        ]
    ],
));

?>
<?php if ( _ceo('ceo_ziyuan') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('ziyuan_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('ziyuan_title'); ?>
	</div>
</section>
<?php endif; ?>
<?php if(_ceo('ceo_bolang') == true ): ?>
<div class="ceo-meihua-boo">
	<svg class="ceo-meihua-boo-waves" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
		<defs>
			<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
		</defs>
		<g class="ceo-meihua-boo-parallax">
			<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
			<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
			<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
			<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
		</g>
	</svg>
</div>
<?php endif; ?>

<div class="ceo-container">
    <div class="ceo-ziyuan" style="margin: 0 auto;float:none">
        <div class="ceo-ziyuan-mk">
            <?php foreach ($top_arrs as $v){
                $term_id = $v->term_id;
                if (!get_term_meta($term_id,'cate_forum_enable',1)) {
                    continue;
                }

                $sub_arrs_ori = get_categories(array(
                    'parent' => $term_id,
                ));
                $sub_arrs=[];
                if($sub_arrs_ori){
                    foreach ($sub_arrs_ori as $v){
                        $sub_arrs[]=$v;
                    }
                }
                ?>
            <div class="ceo-ziyuan-bk" >
                <div class="ceo-ziyuan-bk-title">
                    <span class="o">
                        <img id="category_<?php echo $v->term_id; ?>>_img" src="/wp-content/themes/ceomax-pro/static/images/ceo-ziyuan-no.gif" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_<?php echo $v->term_id; ?>');">
                    </span>
                    <h4><a href="<?php echo get_category_link($v); ?>" target="_blank"><?php echo get_cat_name($v->term_id); ?></a></h4>
                </div>
                <div id="category_<?php echo $v->term_id; ?>" class="ceo-ziyuan-bk-c">
                    <table cellspacing="0" cellpadding="0" class="fl_tb">
                        <tbody>
                        <tr>
                        <?php $kk=0; foreach ($sub_arrs as $kk=>$vv){ $num=$kk+1; ?>
                            <td class="fl_g" width="19.9%">
                                <dl>
                                    <dt>
                                        <a href="<?php echo get_category_link($vv); ?>" target="_blank"><?php echo get_cat_name($vv->term_id); ?>
                                        </a>
                                        <em>资源总数: <?php echo $wt_get_category_count=get_term_post_count( 'category', $vv->term_id ); ?></em>
                                    </dt>
                                </dl>
                            </td>
                        <?php if ($num % 5 == 0) { echo ' </tr> <tr class="fl_row"> '; } }?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php phpversion(); ?>
<?php get_footer(); ?>