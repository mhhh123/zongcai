<?php  
$relevant = _ceo('single_article_relevant_sz');
?>
<div class="ceo-single-foorelevant">
    <div class="ceo-container">
        <div class="ceo-single-foorelevant-ins ceo-grid-ceosmls" ceo-grid>
            <?php
			if ($relevant) {
				foreach ( $relevant as $key => $value) {
			?>
            <div class="ceo-width-1-1@s ceo-width-1-2 ceo-width-1-4@xl">
                <div class="ceo-single-foorelevant-box ceo-background-default ceo-dongtai">
                    <div class="ceo-single-foorelevant-box-img">
                        <span><?php echo $relevant[$key]['tag']; ?></span>
                        <a href="<?php echo $relevant[$key]['anlink']; ?>" target="_blank">
                            <img src="<?php echo $relevant[$key]['img']; ?>">
                        </a>
                    </div>
                    <a href="<?php echo $relevant[$key]['anlink']; ?>" target="_blank" class="foorelevant-box-a"><i class="ceofont <?php echo $relevant[$key]['ico']; ?>"></i><?php echo $relevant[$key]['title']; ?></a>
                    <p class="ceo-single-foorelevant-box-nav"><?php echo $relevant[$key]['describe']; ?></p>
                    <span class="ceo-single-foorelevant-box-an">
                        <a href="<?php echo $relevant[$key]['anlink']; ?>" target="_blank" class=""><?php echo $relevant[$key]['antitle']; ?></a>
                    </span>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>