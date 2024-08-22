<script>
    //用户模块
    $(".upload-userbg-button").on("click", function () {
        $("#upload-userbg").trigger("click");
    });
    $("#upload-userbg").on("change",function () {
        var file_data = $('#upload-userbg').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'upload_image_userbg');
        form_data.append('upload_nonce', '<?php echo wp_create_nonce('upload_nonce') ?>');
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                if (data.code == 1) {
                    $("#userbg").val(data.data.url);
                }
                if(data.msg){
                    alert(data.msg)
                }
            }
        });
    })
    //用户主页
    $(".upload-userhomebg-button").on("click", function () {
        $("#upload-userhomebg").trigger("click");
    });
    $("#upload-userhomebg").on("change",function () {
        var file_data = $('#upload-userhomebg').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'upload_image_userhomebg');
        form_data.append('upload_nonce', '<?php echo wp_create_nonce('upload_nonce') ?>');
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                if (data.code == 1) {
                    $("#userhomebg").val(data.data.url);
                }
                if(data.msg){
                    alert(data.msg)
                }
            }
        });
    })
    //微信二维码
    $(".upload-weixin-button").on("click", function () {
        $("#upload-weixin").trigger("click");
    });
    $("#upload-weixin").on("change",function () {
        var file_data = $('#upload-weixin').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'upload_image_userbg');
        form_data.append('divid', 'upload-weixin');
        form_data.append('upload_nonce', '<?php echo wp_create_nonce('upload_nonce') ?>');
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                if (data.code == 1) {
                    $("#weixin").val(data.data.url);
                }
                if(data.msg){
                    alert(data.msg)
                }
            }
        });
    })
    //用户头像
    $("#addPic").on("change",function () {
        var file_data = $('#addPic').prop('files')[0];
        var form_data = new FormData();
        form_data.append('addPic', file_data);
        form_data.append('upload_nonce', '<?php echo wp_create_nonce('upload_nonce') ?>');
        $.ajax({
            url: '<?php echo get_template_directory_uri(); ?>/user/action/avatar.php',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                if (data == 1) {
                    alert("上传成功");
                }else{
                    alert("error");
                }
                location.reload()
            }
        });
    })
</script>
<style>
.ceo-user-id{
    display: flex;
    flex-wrap: wrap;
    margin-left: -15px;
}
@media (min-width: 800px){
    .ceo-user-id .ceo-user-is{
        flex: 0 0 50%;
        max-width: 50%;
    }
}
.ceo-user-id .ceo-user-is{
    min-height: 1px;
    box-sizing: border-box;
    padding-left: 15px;
    position: relative;
    width: 100%;
}

.form-control[disabled], fieldset[disabled] .form-control {
    cursor: not-allowed;
}
.form-control[disabled]{
    background-color: #eee;
    opacity: 1;
}
.night .form-control[disabled]{
    background-color: #111;
}
</style>