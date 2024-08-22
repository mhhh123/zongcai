<?php 
/*
*Template Name: 帮助中心
*/ 
$help_top_sz = _ceo('help_top_sz');
$help_qa_sz = _ceo('help_qa_sz');
$help_privilege_sz = _ceo('help_privilege_sz');
get_header();
?>

<div class="ceo-help ceo-background-cover" style="background-image: url(<?php echo _ceo('help_top_img'); ?>);">
    <div class="ceo-container" id="page-content">
        <div class="ceo-help-box">
            <div class="ceo-help-title">
                <h1><?php echo _ceo('help_top_title'); ?></h1>
                <p><?php echo _ceo('help_top_subtitle'); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="ceo-help-max">
    <div class="ceo-container">
        <div class="ceo-help-box-s ceo-background-default">
            <div class="ceo-help-box-service">
                <ul class="ceo-help-box-service-bost" ceo-grid>
                    <?php
        			if ($help_top_sz) {
        				foreach ( $help_top_sz as $key => $value) {
        			?>
                    <li class="ceo-width-1-1@s ceo-width-1-2@m ceo-width-1-2@l ceo-width-1-4@xl">
                        <div class="ceo-grid-collapse" ceo-grid>
                            <div class="ceo-help-service-img ceo-width-auto ceo-first-column"><img src="<?php echo $help_top_sz[$key]['img']; ?>"></div>
                            <div class="ceo-help-service-wen ceo-width-expand ceo-margin-small-left">
                                <div class="ceo-help-service-h"><a href="<?php echo $help_top_sz[$key]['link']; ?>" target="_blank"><?php echo $help_top_sz[$key]['title']; ?></a></div>
                                <div class="ceo-help-service-p"><?php echo $help_top_sz[$key]['subtitle']; ?></div>
                            </div>
                        </div>
                    </li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="ceo-help-problem-boxs">
    <div class="ceo-help-problem">
        <div class="ceo-container">
            <div class="ceo-help-boxs-title">
                <span><?php echo _ceo('help_qa_title'); ?></span>
                <p><?php echo _ceo('help_qa_subtitle'); ?></p>
            </div>
            <ul class="ceo-help-problem-box" ceo-accordion>
                <?php
    			if ($help_qa_sz) {
    				foreach ( $help_qa_sz as $key => $value) {
    			?>
                <li>
                    <a class="ceo-accordion-title" href="#"><?php echo $help_qa_sz[$key]['title']; ?></a>
                    <div class="ceo-accordion-content">
                        <p><?php echo $help_qa_sz[$key]['content']; ?></p>
                    </div>
                </li>
                <?php } } ?>
            </ul>
        </div>
    </div>
</div>

<div class="ceo-help-footer ceo-background-default">
	<div class="ceo-container">
		<ul class="ceo-help-footer-tel" ceo-grid>
		    <?php
			if ($help_privilege_sz) {
				foreach ( $help_privilege_sz as $key => $value) {
			?>
		    <li class="ceo-width-1-1@s ceo-width-1-3@xl">
		        <div class="ceo-grid-collapse" ceo-grid>
        			<div class="ceo-help-footer-i ceo-width-auto ceo-first-column"><i class="ceofont <?php echo $help_privilege_sz[$key]['ico']; ?>"></i></div>
        			<div class="ceo-help-footer-wen ceo-width-expand">
        				<h3><?php echo $help_privilege_sz[$key]['title']; ?></h3>
        				<p><?php echo $help_privilege_sz[$key]['subtitle1']; ?></p>
        				<p><?php echo $help_privilege_sz[$key]['subtitle2']; ?></p>
        				<a href="<?php echo $help_privilege_sz[$key]['anlink']; ?>" target="_blank"><?php echo $help_privilege_sz[$key]['antitle']; ?></a>
        			</div>
    			</div>
		    </li>
		    <?php } } ?>
    	</ul>
	</div>
</div>
<?php get_footer();?>