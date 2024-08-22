<?php
wp_enqueue_script('audiojs',get_template_directory_uri().'/static/js/audio.js');
echo '<script>var video_allow_play = ' . (_ceo('yinyue_unlogin_allow_play') ? 1: (is_user_logged_in() ? 1 : 0)) . '</script>';

$audio_url = get_post_meta(get_the_ID(), 'audio_url', 1);

global $wpdb;
$attach_id = get_attach_id_by_url($audio_url);
$row_mp3=[];
if($attach_id){
    $row_mp3[] = get_post($attach_id);
}

?>

<?php
foreach ($row_mp3 as $music) {
?>
<div class="audio-wrapper">
    <audio id="player-<?php echo $music->ID;?>" class="audio-play" preload="none" src="<?php echo $audio_url; ?>"></audio>
    <div class="audio-info">
        <div class="audio-left">
            <img id="audioPlayer" class="play-icon" src="<?php echo get_template_directory_uri();?>/static/images/play.png">
            <div class="cover-bg"></div>
        </div>
        <div class="audio-right">
            <h1><?php echo $music->post_title; ?></h1>
            <div class="poster-footer">
                <a><time datetime="<?php echo get_the_time('Y-m-d', $post->ID); ?>"><i class="ceofont ceoicon-time-line"></i> <?php echo get_the_time('Y-m-d', $post->ID); ?></time></a>
                <a><span><i class="ceofont ceoicon-eye-line"></i> <?php echo _get_post_views() ;?></span></a>
            </div>
            <div class="progress-bar-bg" id="progressBarBg">
                <div class="progress-yinfu"></div>
                <span id="progressDot"></span>
                <div class="progress-bar" id="progressBar"></div>
            </div>
            <div class="audio-time">
                <span class="audio-length-current" id="audioCurTime">00:00</span>
                <span class="audio-length-total"><?php
                    $mp3_duration=get_transient('duration_'.md5($music->guid));
                    if($mp3_duration){
                        echo $mp3_duration;
                    }else{echo '00:00';}?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php
$list_audio=get_post_meta(get_the_ID(),'list_audio',1);
foreach ($list_audio as $k=>$v) {
    $music_id = md5($v['link'].$k);
    ?>
    <div class="audio-wrapper">
        <audio id="<?php echo $music_id;?>" class="audio-play audio-play-list" preload="none" src="<?php echo $v['link']; ?>"></audio>
        <div class="audio-info">
            <div class="audio-left">
                <img id="audioPlayer-<?php echo $music_id;?>" class="play-icon audioPlayerList" src="<?php echo get_template_directory_uri();?>/static/images/play.png">
                <div class="cover-bg"></div>
            </div>
            <div class="audio-right">
                <h1><?php echo $v['title']; ?></h1>
                <div class="poster-footer">
                    <!--                    <a><time datetime="--><?php //echo get_the_time('Y-m-d', $post->ID); ?><!--"><i class="fa fa-clock-o"></i> --><?php //echo get_the_time('Y-m-d', $post->ID); ?><!--</time></a>-->
                    <!--                    <a><span><i class="fa fa-eye"></i> --><?php //echo _get_post_views() ;?><!--</span></a>-->
                </div>
                <div class="progress-bar-bg" id="progressBarBg-<?php echo $music_id;?>" data-id="<?php echo $music_id;?>">
                    <div class="progress-yinfu"></div>
                    <span id="progressDot-<?php echo $music_id;?>"></span>
                    <div class="progress-bar" id="progressBar-<?php echo $music_id;?>"></div>
                </div>
                <div class="audio-time">
                    <span class="audio-length-current" id="audioCurTime-<?php echo $music_id;?>">00:00</span>
                    <span class="audio-length-total"><?php
                        $mp3_duration=get_transient('duration_'.md5($music_id));
                        if($mp3_duration){
                            echo $mp3_duration;
                        }else{echo '00:00';}?>
                </span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>