<!--当前位置-->
<div class="ceo-flex ceo-weizhi">
    <?php if(_ceo('single_mbx_mianbaoxie') == true): ?>
        <div class="crumb ceo-flex-1 ceo-text-small">
            <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
        </div>
    <?php endif; ?>
    <?php if(_ceo('single_tg') == true): ?>
        <div class="crumb ceo-crumb-tg ceo-text-small">
            <a href="<?php echo _ceo('single_tg_link'); ?>" target="_blank"> <i class="ceofont ceoicon-edit-2-line"></i> <?php echo _ceo('single_tg_title'); ?></a>
        </div>
    <?php endif; ?>
</div>
<!--当前位置-->