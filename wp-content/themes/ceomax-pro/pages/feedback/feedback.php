<?php
global $current_user;
$wp_create_nonce = wp_create_nonce('caoclick-' . $current_user->ID);
?>
<style type="text/css"></style>
<?php
global $wp_query;
$args_where=array(
    'post_type'      => 'feedback',
    'post_status'    => 'publish',
    'author'    => get_current_user_id(),
    'posts_per_page' => 99,
);
if(!empty($_GET['id'])){
    $where_post_id=intval($_GET['id']);
    $args_where['post__in']=[$where_post_id];
}else{
    $where_post_id='';
}

$feedback_status = 0;
if ( ! empty($_GET['status'])) {
    $feedback_status = intval($_GET['status']);
    if ($feedback_status == 2) {
        $args_where['meta_key']   = 'feedback_status';
        $args_where['meta_value'] = $feedback_status;
    } elseif ($feedback_status == 1) {
        $args_where['meta_query'] = $meta_query_args = array(
            'relation' => 'OR',
            array(
                'key'     => 'feedback_status',
                'value'   => '2',
                'compare' => '!='
            )
        );;
    }
}

$wp_query = new WP_Query( $args_where );

?>
<div class="feedback ceo-background-default">
    <div class="feedback-title">
        <div class="feedback-mwz">
            <li class="feedback-cur">我的工单</li>
            <li class="feedback-prompt">总计 <span class="orange total"><?php echo $wp_query->post_count; ?></span> 个工单</li>
        </div>
    </div>

    <form method="get" action="/users">
        <input type="hidden" name="pd" value="feedback">
        <input type="hidden" name="action" value="feedback">
        <input type="hidden" name="page" value="">
        <div class="mso buy">
            <ul class="">
                <div class="div_search">
                    <div>
                        <label>工单ID：</label>
                        <input name="id" placeholder="请输入工单ID" style="width:120px;" value="<?php echo $where_post_id; ?>" type="text">
                    </div>
                </div>
                <div class="div_search div_search_n">
                    <label>工单状态：</label>
                    <select name="status">
                        <option value="0">全部工单</option>
                        <option value="1">进行工单</option>
                        <option value="2" <?php if($feedback_status==2)echo 'selected'; ?>>结束工单</option>
                    </select>
                </div>
                <div class="div_search div_search-s">
                    <input type="submit" class="search-btn div_search_n" style="background-color: #265892;line-height: initial;padding:0 38px" value="搜索">
                    <a class="search-btn" style="margin-left:8px;" href="/member/add_feedback">创建工单</a>
                </div>
            </ul>
        </div>
        <table class="table-feedback">
            <thead>
            <tr>
                <th class="text-center">工单ID</th>
                <th class="text-center">工单标题</th>
                <th class="text-center">问题分类</th>
                <th class="text-center">提交时间</th>
                <th class="text-center">状态</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // 循环
            while (have_posts()) : the_post();
                ?>
                <tr>
                    <td class="text-center"><?php echo get_the_ID(); ?></td>
                    <td class="text-center" style="max-width: 500px;overflow: hidden;"><?php the_title(); ?></td>
                    <td class="text-center"><?php
                        $arr = get_the_terms(get_post(), 'feedback-cat');
                        if($arr){
                            echo $arr[0]->name;
                        }

                        ?></td>
                    <td class="text-center"><?php the_date(); ?></td>
                    <td class="text-center">
                        <?php
                        $feedback_status = get_post_meta(get_the_ID(), 'feedback_status', true);
                        if($feedback_status==0){
                            echo '<span class="feedback_start">处理中</span>';
                        }elseif($feedback_status==1){
                            echo '<span class="feedback_reply_status">已回复</span>';
                        }elseif($feedback_status==2){
                            echo '<span class="feedback_end_status">已结束</span>';
                        }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                        $feedback_status = get_post_meta(get_the_ID(), 'feedback_status', true);
                        if ($feedback_status == 0) {
                            ?>
                            <span class="feedback_reply" data-id="<?php echo get_the_ID(); ?>">回复</span>
                            <span class="feedback_end" data-id="<?php echo get_the_ID(); ?>">结束</span>
                            <?php
                        } elseif ($feedback_status == 1) {
                            ?>
                            <span class="feedback_reply" data-id="<?php echo get_the_ID(); ?>">回复</span>
                            <span class="feedback_end" data-id="<?php echo get_the_ID(); ?>">结束</span>
                            <?php
                        } elseif ($feedback_status == 2) {
                            ?>
                            <span class="feedback_delete" data-id="<?php echo get_the_ID(); ?>">删除</span>
                            <?php
                        }
                        ?>


                    </td>
                </tr>
            <?php
            endwhile;

            ?>
            <?php if(empty($wp_query->post_count)){ ?>
            <tr>
                <td colspan="12" align="center"><strong>没有数据</strong></td>
            </tr>
            <?php }
            // 重置查询
            wp_reset_query();
            ?>
            </tbody>
        </table>
    </form>
</div>
<?php wp_enqueue_script('feedbackjs',get_template_directory_uri().'/static/js/feedback.js?vv=0.02'); ?>

<style>
#backGround {
	display:none;
	position:absolute;
	top:0%;
	left:0%;
	width:100%;
	height:100%;
	background-color:black;
	z-index:1;
	-moz-opacity:0.8;
	opacity:.80;
	filter:alpha(opacity=88);
}
.feedback{
    padding: 30px;
    border-radius: 4px;
    min-height: 814px;
}
.feedback-title{
    margin-bottom: 20px;
}
.feedback-mwz{
    display: block;
    width: 100%;
    border-bottom: #f8f8f8 1px solid;
    height: 45px;
    line-height: 31px;
}
.feedback-cur{
    display: inline-block;
    border-bottom: #036eff 2px solid;
    height: 43px;
    color: #036eff;
}
.feedback-prompt{
    float: right;
    color: #999;
    font-size: 14px;
}
.feedback-prompt span{
    color: #026eff;
    font-weight: 900;
}
.feedback .mwz {
	display: block;
	width: 100%;
    background: #fff;
    border-bottom: #e5e5e5 1px solid;
    height: 45px;
    line-height: 45px;
}
.feedback  .mwz li.cur {
    display: inline-block;
    color: #333;
    border-bottom: var(--primary-color) 1px solid;
    margin-bottom: -3px;
    height: 45px;
    color: var(--primary-color);
}
.feedback  .mwz .prompt.r {
    float: right;
}
.mso.buy {
	background: #f4f9ff;
}
.div_search {
	display: inline-block;
}
.div_search select {
	width: 115px;
}
.feedback li{
    list-style-type:none;
}
.search-btn {
	display: inline-block;
    height: 32px;
    line-height: 32px;
    padding: 0 24px;
    color: #fff!important;
    white-space: nowrap;
    text-align: center;
    border: none;
    font-size: 13px;
    border-radius: 2px;
    cursor: pointer;
    background-image: linear-gradient(90deg, #006eff, #13adff);
    font-weight: 400;
    max-width:100px;
}
.mso {
    background: #fff;
    padding: 30px 0 18px 0;
    display: block;
    text-align: center;
    border-bottom: 0;
}
.mso ul {
    display: inline-block;
    margin: 0 auto;
    padding: 0;
    zoom: 1;
}
.feedback_start{
    background: #04BE02;
    padding: 2px 12px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 12px;
}
.feedback_reply{
    background: #0089ff;
    padding: 2px 12px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
}
.feedback_reply_status{
    background: #337AB7;
    padding: 2px 12px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 12px;
}
.feedback_end{
    background: #ff0000;
    padding: 2px 12px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
}
.feedback_end_status{
    background: #BF2828;
    padding: 2px 4px;
    color: #ffffff;
    font-weight: bold;
}
.feedback_delete{
    background: red;
    padding: 2px 12px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
}
input[type="text"], input[type="password"], input[type="email"], input[type="search"], input[type="number"], input[type="tel"], textarea {
    border: 0;
    border-radius: 0;
    font-family: Lato,sans-serif;
    line-height: 32px;
    margin-bottom: 10px;
    padding: 0 12px;
    transition: border-color cubic-bezier(0.77,0,0.175,1);
    width: 100%;
    border: 1px solid #f1f1f1;
}
select {
    border: 1px solid #ddd;
}
select{
   height: 32px;
    font-family: 'Poppins',sans-serif;
    background-color: #fff;
    border: 1px solid #eeeeee;
    font-size: 14px;
    color: #aaaaaa;
    line-height: 42px;
    margin-bottom: 0;
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    padding: 0 18px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.div_search_n{
    margin-left: 30px;
}
.table-feedback{
    width: 100%;
    border: 1px solid #eee!important;
    border-radius: 2px;
    border-left: 0!important;
    margin-bottom: 1.6rem;
    border-spacing: 0!important;
    border-collapse: separate;
    background-color: transparent;
    empty-cells: show;
    word-wrap: break-word;
    overflow: hidden;
}
.table-feedback thead{
    background-color: #f5f5f5;
}
.table-feedback thead tr th {
    color: #555;
    padding: 1rem!important;
    line-height: 1.6;
    vertical-align: top;
    text-align: center;
    border-left: 1px solid #eee!important;
    border-bottom: 1px solid #eee !important;
    font-size: 14px;
    font-weight: 400 !important;
}
.table-feedback tbody tr td {
    padding: 1rem !important;
    line-height: 1.6;
    vertical-align: top;
    text-align: center;
    border-left: 1px solid #eee !important;
    border-bottom: 1px solid #eee !important;
    font-size: 14px;
    font-weight: 400 !important;
}
.night .feedback .mwz {
    background: #151617;
    border-bottom: #111111 1px solid;
}
.night .mso.buy {
    background: #111111;
}
.night select {
    background-color: #151617;
    border: 1px solid #151617;
}
.night .table-feedback tbody tr {
    background-color: #151617;
}
.night .table-feedback tbody tr td {
    border-top: 1px solid #151617;
}
.night .feedback-mwz {
    border-bottom: #191f28 1px solid;
}
.night .table-feedback thead {
    background-color: #191f28;
}
.night .table-feedback {
    border: 1px solid #0e1319!important;
}
.night .table-feedback thead tr th {
    color: #999;
    border-left: 1px solid #0e131a!important;
    border-bottom: 1px solid #0e131a !important;
}
.night .table-feedback tbody tr td {
    border-left: 1px solid #0e131a !important;
    border-bottom: 1px solid #0e131a !important;
}
@media (max-width: 800px) {
    .feedback{
        font-size: 12px;
        padding: 0!important;
    }
    .div_search_n{
        margin-left: 0px;
    }
    .div_search-s{
        margin-top: 20px;
    }
}
</style>