<?php
/**
 * Template Name: 激活码
 */

get_header();
?>
<?php if ( _ceo('ceo_apply') == true): ?>
    <section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('apply_bg'); ?>);">
        <div class="ceo-overlay-primary ceo-position-cover"></div>
        <div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
            <h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
            <?php echo _ceo('apply_title'); ?>
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


    <form style="display: grid; justify-content: center;text-align: center;">
        <div class="form-box">
            <h2>请输入设备</h2>
            <input type="text" placeholder="请输入设备">
            <button id="onclick">获取激活码</button>
            <p>您的激活码是：<span class="activation-code">0000</span></p>
        </div>
    </form>
    <div id="light" class="white_content"></div>

<?php get_footer(); ?>
<script>
    function validateInput(input) {
        input.value = input.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
        document.getElementById('hidden-device-input').value = input.value;
    }
</script>
<style>
    .white_content{
        display: none;
        position: absolute;
        top: 20%;
        border: 1px solid #bbbbbb;
        border-radius: 20px;
        background-color: white;
        z-index: 1002;
        overflow: auto;
    }
</style>