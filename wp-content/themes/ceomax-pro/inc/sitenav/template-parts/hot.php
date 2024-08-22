<div class="ceo-margin-top">
	<div class="site-main ceo-margin-small-top">
		<ul class="cat-switcher switcher-title b-b ceo-padding-remove-left ceo-margin-medium-bottom" ceo-switcher>
			<li class="ceo-display-inline-block ceo-position-relative ceo-margin-right ceo-active" aria-expanded="true">
				<h3 class="ceo-margin-remove-bottom"><a class="ceo-text-bolder">最新网站</a></h3>
			</li>
			<li class="ceo-display-inline-block ceo-position-relative" aria-expanded="false">
				<h3 class="ceo-margin-remove-bottom"><a class="ceo-text-bolder">随机网址</a></h3>
			</li>
		</ul>
		<ul id="site" class="ceo-switcher">
			<div class="ceo-animation-slide-left-small">
				<div class="ceo-grid-ceosmls" ceo-grid>
					<?php
					$args = array( 'post_type' => 'site', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					?>

					<div class="ceo-width-1-2 ceo-width-1-5@m ceo-width-1-5@l ceo-width-1-5@xl">
						<?php include(TEMPLATEPATH . '/inc/sitenav/loop/card.php'); ?>

					</div>
					<?php endwhile; ?>

				</div>
			</div>
			<div class="ceo-animation-slide-left-small">
				<div class="ceo-grid-ceosmls" ceo-grid>
					<?php
					$args = array( 
						'post_type' => 'site', 
						'posts_per_page' => 10,
						'orderby' => 'rand',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					?>

					<div class="ceo-width-1-2 ceo-width-1-5@m ceo-width-1-5@l ceo-width-1-5@xl">
						<?php include(TEMPLATEPATH . '/inc/sitenav/loop/card.php'); ?>

					</div>
					<?php endwhile; ?>

				</div>
			</div>
		</ul>
	</div>
</div>
