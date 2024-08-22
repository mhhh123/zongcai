<!--弹窗绑定邮箱-->
<div id="modal-bindemail" ceo-modal <?php if(date("Ymd")>20220402)echo 'bg-close="false"'; ?>>
    <div class="ceo-modal-dialog ceo-modal-body ceo-login-h b-r-12">
        <div class="ceo-bindemail-title">
            <h4 class="ceo-text-align">为了您的账户安全，请绑定邮箱</h4>
        </div>

        <div class="b-b">
            <div class="zongcai-tips"></div>
            <form class="ceo-margin-top-20" action="" method="POST" id="bindemail-form">
                <div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                    <span class="ceo-form-icon"><i class="ceofont ceoicon-mail-line"></i></span>
                    <input type="email" name="bindemail_address" id="bindemail_address" placeholder="输入邮箱" class="b-r-4 ceo-input ceo-text-small" required="required">
                </div>
                <div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                    <span class="ceo-form-icon"><i class="ceofont ceoicon-pages-line"></i></span>
                    <input type="text" name="verify_code" id="verify_code" placeholder="验证码" class="b-r-4 ceo-input ceo-text-small" required="required">
                    <button class="bindemail-verify-code">获取验证码</button>
                </div>
                <div class="ceo-flex ceo-flex-middle">
                    <input type="hidden" name="action" value="zongcai_bindemail">
                    <button class="submit change-color b-r-4 button mid dark ceo-button ceo-width-1-1">绑定</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        var modal = UIkit.modal("#modal-bindemail");
        modal.show();
    });
</script>
<script>
    $(function () {
        $('.bindemail-verify-code').on('click', function(event){
            event.preventDefault();
            let bindemail_address = $("#bindemail_address").val()
            if (!ValidateEmail(bindemail_address)) {
                alert("请输入正确邮箱")
                return false
            }

            var $this= $(this);
            let s60 = 60;
            let text=''

            let form_data={
                action:'send_email_verify_code',
                email:bindemail_address
            }
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: form_data,
                type: 'post',
                success: function (data) {
                    if (data.success) {
                        alert(data.data.msg)

                        const inval = setInterval(() => {
                            if (s60 === 0) {
                                clearInterval(inval)
                                $this.attr('disabled', false);
                                $this.text('发送验证码')
                                return
                            } else {

                            }
                            s60 = s60 - 1
                            text = s60 + 's'
                            $this.disabled = true
                            $this.attr('disabled', true);
                            $this.text('')
                            $this.text(text);
                        }, 1000)
                    } else {
                        alert(data.data.msg)
                    }
                }
            })
            return false;
        });
    });

    //绑定邮箱
    $('#bindemail-form').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: zongcai.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: $('#bindemail-form').serializeArray(),
        })
            .done(function (data) {
                if (data.success==true) {
                    alert(data.data.msg)
                    location.reload()
                } else if (data.data.msg) {
                    alert(data.data.msg)
                } else {
                    alert('error！');
                }
            })
            .fail(function () {
                alert('网络错误！');
            });

    });
</script>
