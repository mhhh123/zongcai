<?php if(_ceo('ceoshop_shouquan_mk') == true): ?>
<section class="ceo-sidebar-shop b-a b-r-4 ceo-background-default ceo-margin-bottom">
    <div class="ceo-sidebar-shop-copyright">
        <a rel="nofollow" class="getcompay" href="<?php if(_ceo('ceoshop_shouquan_ansz'))echo _ceo('ceoshop_shouquan_ansz')['ceoshop_shouquan_anlj']; ?>" target="_blank"><i class="ceofont <?php if(_ceo('ceoshop_shouquan_ansz'))echo _ceo('ceoshop_shouquan_ansz')['ceoshop_shouquan_antb']; ?>"></i><?php if(_ceo('ceoshop_shouquan_ansz'))echo _ceo('ceoshop_shouquan_ansz')['ceoshop_shouquan_anbt']; ?>
        </a>
        
        <ul>
            <?php if(_ceo('ceoshop_shouquan_sy') == true): ?>
            <li>
                <span class="m-l2"><?php if(_ceo('ceoshop_shouquan_sysz'))echo _ceo('ceoshop_shouquan_sysz')['ceoshop_shouquan_sybt']; ?> </span>
                <span class="m-r2"><?php if(_ceo('ceoshop_shouquan_sysz'))echo _ceo('ceoshop_shouquan_sysz')['ceoshop_shouquan_synr']; ?></span>
            </li>
            <?php endif; ?>
            
            <?php if(_ceo('ceoshop_shouquan_sm') == true): ?>
            <li class="chose">
                <span class="m-l2"><?php if(_ceo('ceoshop_shouquan_smsz'))echo _ceo('ceoshop_shouquan_smsz')['ceoshop_shouquan_smbt']; ?></span>
                <span class="m-r2"><?php if(_ceo('ceoshop_shouquan_smsz'))echo _ceo('ceoshop_shouquan_smsz')['ceoshop_shouquan_smnr']; ?>
                    <em>i 
                        <div>
                            <div class="say" style="top:-125px;">
                            <div class="s-tt">
                                <?php if(_ceo('ceoshop_shouquan_smsz'))echo _ceo('ceoshop_shouquan_smsz')['ceoshop_shouquan_smsm']; ?>
                            </div>
                            <p>
                                <?php if(_ceo('ceoshop_shouquan_smsz'))echo _ceo('ceoshop_shouquan_smsz')['ceoshop_shouquan_smtc']; ?>
                            </p>
                            </div>
                        </div>
                    </em>
                </span>
            </li>
            <?php endif; ?>
            
            <?php if(_ceo('ceoshop_shouquan_zdy') == true): ?>
            <?php 
                $ceoshop_shouquan_zdy_sz = _ceo('ceoshop_shouquan_zdy_sz'); 
            ?>
                <?php 
            	if ($ceoshop_shouquan_zdy_sz) { 
            		foreach ( $ceoshop_shouquan_zdy_sz as $key => $value) {
            	?>
                <li>
                    <span class="m-l2"><?php echo $value['ceoshop_shouquan_zdy_bt']; ?> </span>
                    <a rel="nofollow" href="<?php echo $value['ceoshop_shouquan_zdy_lj']; ?>" target="_blank" class="m-r2 m-bo"><i class="ceofont <?php echo $value['ceoshop_shouquan_zdy_tb']; ?>"></i><?php echo $value['ceoshop_shouquan_zdy_nr']; ?></a>
                </li>
                <?php } } ?>
            <?php endif; ?>
        </ul>
        
        <?php if(_ceo('ceoshop_shouquan_gg') == true): ?>
        <a rel="nofollow" href="<?php if(_ceo('ceoshop_shouquan_ggsz'))echo _ceo('ceoshop_shouquan_ggsz')['ceoshop_shouquan_gg_lj']; ?>" target="_blank" class="dzweb dz-ppt">
            <i class="ceofont <?php if(_ceo('ceoshop_shouquan_ggsz'))echo _ceo('ceoshop_shouquan_ggsz')['ceoshop_shouquan_gg_tb']; ?>"></i> <?php if(_ceo('ceoshop_shouquan_ggsz'))echo _ceo('ceoshop_shouquan_ggsz')['ceoshop_shouquan_zdy_nr']; ?> <i class="ceofont ceoicon-arrow-right-s-line dz-ppts"></i>
        </a>
        <?php endif; ?>
        
        <?php if(_ceo('ceoshop_shouquan_ggtp') == true): ?>
        <a class="adpdf" href="<?php echo _ceo('ceoshop_shouquan_ggtp_lj'); ?>" target="_blank" rel="nofollow">
            <img src="<?php echo _ceo('ceoshop_shouquan_ggtp_k'); ?>">
        </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>  