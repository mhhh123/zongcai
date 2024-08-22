<div id="nav_user" style="display: contents"></div>
<script>
    (function($){
        $.ajax({
            url:"<?php echo preg_replace('#^http:|^https:#','',get_template_directory_uri()).'/nav_user.php' ?>",
            success:function(res){
                if(res.indexOf(res,'display')!='-1'){
                    $("#nav_user").html(res)
                }
            }
        })
    })(jQuery)
</script>