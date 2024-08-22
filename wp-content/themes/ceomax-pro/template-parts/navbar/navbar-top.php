<?php 
    $ceo_top_y_sz = _ceo('ceo_top_y_sz'); 
    $ceo_top_x_xl = _ceo('ceo_top_x_xl'); 
?>
<nav class="ceo-top-navbar">
    <ul class="ceo-top-nav navbar-left">
    	<li>
    		<a href="<?php if(_ceo('ceo_top_z_sz'))echo _ceo('ceo_top_z_sz')['ceo_top_z_lj']; ?>" style="color:<?php if(_ceo('ceo_top_z_sz'))echo _ceo('ceo_top_z_sz')['ceo_top_ztcolor']; ?>" target="_blank"><i class="ceofont <?php if(_ceo('ceo_top_z_sz'))echo _ceo('ceo_top_z_sz')['ceo_top_z_ico']; ?>"></i> <?php if(_ceo('ceo_top_z_sz'))echo _ceo('ceo_top_z_sz')['ceo_top_z_bt']; ?></a>
    	</li>
    </ul>
    <ul class="ceo-top-nav navbar-right ceo-nav-top-app">
        <?php 
    	if ($ceo_top_y_sz) { 
    		foreach ( $ceo_top_y_sz as $key => $value) {
    	?>
    	<li>
    		<a href="<?php echo $value['ceo_top_y_lj']; ?>" style="color:<?php echo $value['ceo_top_y_ys']; ?>" target="_blank"><i class="ceofont <?php echo $value['ceo_top_y_tb']; ?>"></i> <?php echo $value['ceo_top_y_bt']; ?></a>
    	</li>
    	<?php } } ?>
    	<?php if(_ceo('ceo_top_x') == true): ?>
    	<li class="lang-style" style="color: #fff;">
    		<ul class="ceo-top-nav">
    			<li class="dropdown language-btn">
    				<span class="dropdown-toggle m-t-0 " data-toggle="dropdown">
                		<i class="ceofont <?php echo _ceo('ceo_top_x_tb'); ?>"></i> <?php echo _ceo('ceo_top_x_bt'); ?>
                		<b class="caret"></b>
                	</span>
    				<ul class="dropdown-menu language-select" style="display: none;">
    					<b class="caret caret1"></b>
    					<?php 
            			if ($ceo_top_x_xl) { 
            				foreach ( $ceo_top_x_xl as $key => $value) {
            			?>
    					<li>
    						<a href="<?php echo $value['ceo_top_x_xl_lj']; ?>" target="_blank"><?php echo $value['ceo_top_x_xl_bt']; ?></a>
    					</li>
    					<?php } } ?>
    				</ul>
    			</li>
    		</ul>
    	</li>
    	<?php endif; ?>
    </ul>
</nav>