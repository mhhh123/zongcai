<?php 
/* Template Name: 存档页面 */ 
get_header(); 
?>
<?php if ( _ceo('ceo_archives') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('archives_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('archives_title'); ?>
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

<div class="ceo-archives-div ceo-container ceo-margin-top-20 ceo-margin-bottom-30">
    <div class="ceo-grid ceo-margin-top-20" ceo-grid="" style="transform: none;">
        <div class="ceo-archives single ceo-width-auto ceo-first-column">
            <main class="archives-main">
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post archives' ); ?>>
                  <div class="ceo-archives-container">
                   <?php
                    $previous_year = $year = 0;
                    $previous_month = $month = 0;
                    $ul_open = false;
                    $numberposts = _ceo('archives_postnum','99');
                    $myposts = get_posts('numberposts='.$numberposts.'&orderby=post_date&order=DESC');
                    foreach($myposts as $post) :
                        setup_postdata($post);
                        $year = mysql2date('Y', $post->post_date);
                        $month = mysql2date('n', $post->post_date);
                        $day = mysql2date('j', $post->post_date);
                        if($year != $previous_year || $month != $previous_month) :
                            if($ul_open == true) : 
                                echo '</ul></div>';
                            endif;
                     
                            echo '<div class="ceo-archives-item"><h3>'; echo the_time('F Y'); echo '</h3>';
                            echo '<ul class="ceo-archives-list">';
                            $ul_open = true;
                        endif;
                        $previous_year = $year; $previous_month = $month;

                    ?>
                        <li>
                            <time><?php the_time('j'); ?>日</time>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
                            <span class="text-muted"><?php comments_number('', '1评论', '%评论'); ?></span>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                  </div>
                </article>
            </main>
        </div>
        
        <?php if(true){?>
		<div class="ceo-width-expand sidebar-column">
			<?php get_sidebar(); ?>
		</div>
        <?php }?>
        
    </div>
</div>

<?php get_footer(); ?>