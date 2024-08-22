<?php 
/* Template Name: 主题介绍 */ 
?>
<?php get_header(); ?>
<style>
	.theme-top {
		height: 400px;
		position: relative;
	}
	
	@media screen and (max-width: 600px) {
		.theme-top {
			margin-top: 0px;
		}
		.ceo-theme-img{
		    height: 290px;
		}
	}
	.theme-top-cover {
		background: rgba(44, 99, 255, 0.7);
	}
	.theme-prototype {
		margin-top: -160px
	}
	.theme-title {
		padding-bottom: 10px;
	}
	.theme-title:after {
		content: '';
		display: block;
		width: 100%;
		left: 0;
		right: 0;
		height: 4px;
		position: absolute;
		bottom: 0;
		background: #2c63ff;
		z-index: 10;
		box-shadow: 0px -1px 7px -1px #2c63ff;
		border-radius: 8px;
	}
	.theme-conntent {}
	.theme-conntent p {
		font-size: 16px;
		line-height: 28px;
		font-family: 'arial';
		margin: 0
	}
	.theme-item {
		float: left;
		margin-left: -1px;
		margin-bottom: -1px;
		transition: all .3s;
		cursor: pointer;
	}
	.theme-item:hover {
		background: #2c63ff;
		box-shadow: 0px -1px 7px -1px #2c63ff;
		transform: translateY(-5px);
	}
	.theme-item:hover p {
		color:#fff
	}
	.theme-item:hover span {
		color:#ddd!important
	}
	.theme-btn {
		padding: 10px 30px;
	}
	.theme-bottom {
		height: 280px;
		position: relative;
	}
	.theme-show {
		max-height: 450px;
	}
</style>
<main class="main ceo-background-default">
    <section class="theme-top b-b ceo-overflow-hidden ceo-background-cover" style="background-image: url(https://www.ceotheme.com/wp-content/themes/ceomax-chlid/static/images/ceo_theme_2.jpg);">
		<div class="theme-top-cover ceo-position-cover"></div>
		<div class="ceo-overlay ceo-position-top-center ceo-dark">
			<div class="ceo-container ceo-light">
				<h1 class="page-title ceo-margin-large-top">CeoMax-Pro主题</h1>
			</div>	
		</div>
	</section>
	<section class="theme-prototype ceo-text-center ceo-position-relative ceo-position-z-index">
		<img src="https://www.ceotheme.com/wp-content/themes/ceomax-chlid/static/images/ceotheme_ceomax.png" alt="总裁主题">
	</section>
	<section class="ceo-container ceo-text-center">
		<div class="ceo-text-center ceo-padding">
			<div class="theme-title ceo-h2 ceo-text-bolder ceo-display-inline-block ceo-position-relative">主题简介</div>
		</div>
		<div class="theme-conntent ceo-background-muted ceo-padding">
			<p>CeoMax-Pro主题是一款界面简洁、美观的WordPress主题，Ta 为资源站、下载站、交易站、素材站、源码站、课程站、CMS等站点而生，Ta 更为追求极致的你而生。</p>
			<p>当然也不局限于以上类型站点使用。</p>
			<p>CeoMax-Pro主题后台有着丰富主题设置，让WordPress新手也能得心应手得使用该主题。</p>
			<p>CeoMax-Pro主题 Ta千姿百态 Ta无所不能 Ta能满足您所有付费资源下载的业务需求</p>
		</div>
	</section>
	
    <section class="theme-bottom ceo-overflow-hidden ceo-background-cover ceo-margin-large-top" style="background-image: url(https://www.ceotheme.com/wp-content/themes/ceomax-chlid/static/images/ceo_theme_2.jpg);">
		<div class="ceo-overlay-primary ceo-position-cover"></div>
		<div class="ceo-overlay ceo-position-top-center ceo-dark">
			<div class="ceo-container ceo-light ceo-text-center">
				<div class="ceo-padding">
					<p class="page-title ceo-h2 ceo-margin-large-bottom">CeoMax-Pro主题演示站</p>
					<a href="http://ceomax-pro.ceotheme.com" target="_blank" class="btn-on theme-btn b-r-4 ceo-margin-right">查看主题</a>
					<a href="<?php echo _ceo('ceo-theme');?>" target="_blank" class="change-color theme-btn b-r-4" alt="CeoMax-Pro主题">购买主题</a>
				</div>
			</div>	
		</div>
	</section>
	
	<section class="ceo-container ceo-margin-large-top">
		<div class="ceo-text-center ceo-padding ceo-padding-remove-top">
			<div class="theme-title ceo-h2 ceo-text-bolder ceo-display-inline-block ceo-position-relative">意见建议</div>
		</div>
		<div class="ceo-margin-large-bottom">
			<?php if ( comments_open() || get_comments_number() ) : ?>
			<?php comments_template( '', true ); ?>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>