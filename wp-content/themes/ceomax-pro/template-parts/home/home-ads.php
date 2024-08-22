<?php 
	$ceo_ads_sz = _ceo('ceo_ads_sz');
	$ceo_adsw_sz = _ceo('ceo_adsw_sz');
?>
<div class="ceo-container">
    <!--多图广告-->
    <?php if ( _ceo('ceo_ads') == true): ?>
    <div class="ceo_ads">
        <?php
    		if ($ceo_ads_sz) {
    			foreach ( $ceo_ads_sz as $key => $value) {
    	?>
        <li>
    	    <a href="<?php echo $ceo_ads_sz[$key]['link']; ?>" target="_blank"><img src="<?php echo $ceo_ads_sz[$key]['img']; ?>" alt="<?php echo $ceo_ads_sz[$key]['title']; ?> 到期时间：<?php echo $ceo_ads_sz[$key]['date']; ?>"></a>
    	</li>
    	<?php } } ?>
	</div>
	<?php endif;  ?>
	
	<!--文字广告-->
	<?php if ( _ceo('ceo_adsw') == true): ?>
    <div class="ceo_adsw">
         <?php
    		if ($ceo_adsw_sz) {
    			foreach ( $ceo_adsw_sz as $k => $v) {
    	?>
        <li>
            <a href="<?php echo $ceo_adsw_sz[$k]['link']; ?>" target="_blank" alt="<?php echo $ceo_adsw_sz[$k]['title']; ?> 到期时间：<?php echo $ceo_adsw_sz[$k]['date']; ?>" ><span style="color:<?php echo $ceo_adsw_sz[$k]['color']; ?>;"><?php echo $ceo_adsw_sz[$k]['title']; ?></span></a>
        </li>
        <?php } } ?>
    </div>
    <?php endif;  ?>
</div>

<?php if ( _ceo('ceo_ads_spp') == true): ?>
<style>
@media screen and (max-width: 800px) {
    .ceo_ads{
        display:none;
    }
}
</style>
<?php endif;  ?>

<?php if ( _ceo('ceo_adsw_app') == true): ?>
<style>
@media screen and (max-width: 800px) {
    .ceo_adsw{
        display:none;
    }
}
</style>
<?php endif;  ?>