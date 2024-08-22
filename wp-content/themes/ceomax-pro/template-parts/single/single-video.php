<?php
get_header();
$video = get_post_meta( $post->ID, 'post_video_url', true );
?>
<?php
if( $video!='' ){ ?>
    <div class="ceo-single-video-article">
        <iframe src="<?php echo get_post_meta( get_the_ID(), 'post_video_url', true );?>" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"> </iframe>
    </div>
<?php } ?>