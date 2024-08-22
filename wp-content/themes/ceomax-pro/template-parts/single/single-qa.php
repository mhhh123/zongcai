<?php 
    $single_qa_sz = _ceo('single_qa_sz'); 
?>
<div id="ceoqa" class="ceo-qa ceo-background-default b-b ceo-margin-bottom ceo-single-foos b-r-4">
    <div class="ceo-qa-commont">
      <span class="ceo-qa-turn"><i class="ceofont ceoicon-question-line"></i> <?php echo _ceo('single_qa_title'); ?></span>
    </div>
    <div class="ceo-qa-problems ceo-qa-clearfix ceo-grid-ceosmls" ceo-grid>
        <?php 
		if ($single_qa_sz) { 
			foreach ( $single_qa_sz as $key => $value) {
		?>
        <div class="ceo-qa-fl ceo-width-1-1@s ceo-width-1-1 ceo-width-1-2@l ceo-width-1-2@xl">
            <div class="ceo-qa-problems_each">
                <div class="ceo-qa-problems_each_t">
                    <p title="<?php echo $value['single_qa_bt']; ?>" class="dot" style="overflow-wrap: break-word; white-space: normal;"><a href="<?php echo $value['single_qa_lj']; ?>" target="_blank"><?php echo $value['single_qa_bt']; ?></a>
                    </p>
                </div>
                <div class="ceo-qa-problems_each_detail">
                    <ul class="problems_each_detail_con dot is-truncated" style="overflow-wrap: break-word;"><li><?php echo $value['single_qa_nr']; ?></li> </ul>
                    <img src="/wp-content/themes/ceomax-pro/static/images/ceo-qa-x.png" alt="">
                    <a class="problems_each_detail_link" href="<?php echo $value['single_qa_lj']; ?>" target="_blank">查看详情</a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>