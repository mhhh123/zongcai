<div class="ceo-cat-password">
    <div class="box ceo-background-default ceo-text-center">
        <form id="access_password" method="post">
            <div class="ceo-margin-bottom">
                <i class="ceofont ceoicon-information-line"></i>
                <label for="category_password_access">请输入访问密码</label>
                <input type="password" autocapitalize="off" id="category_password_access" name="category_password_access" placeholder="请输入访问密码..." required="required" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
                <div class="ceo-text-small ceo-text-muted" style="display: none;"></div>
            </div>
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('category_password_access');?>">
            <input type="hidden" name="action" value="category_password_access">
            <button class="ceo-button" id="category_password_access" type="submit">确认</button>
        </form>
    </div>
</div>
