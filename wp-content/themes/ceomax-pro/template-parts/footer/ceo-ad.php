<?php if(_ceo('ceo-gg') == true): ?>
<div class="ceo-huodong ceo-adgg">
    <a href="<?php if(_ceo('ceo-gg-sz'))echo _ceo('ceo-gg-sz')['ceo-gg-lj']; ?>" target="_blank">
        <img class="girl" src="<?php if(_ceo('ceo-gg-sz'))echo _ceo('ceo-gg-sz')['ceo-gg-img']; ?>">
        <div class="hd-livechat-hint hd-rd-notice-tooltip hd-rd-notice-type-success gg-rd-notice-position-left gg-show_hint ad-show_hint">
            <div class="gg-rd-notice-content"><?php if(_ceo('ceo-gg-sz'))echo _ceo('ceo-gg-sz')['ceo-gg-bt']; ?></div>
        </div>
        <div class="ceo-adgg-circles">
            <div class="circle c-1"></div>
            <div class="circle c-2"></div>
            <div class="circle c-3"></div>
        </div>
    </a>
</div>
<?php endif; ?>