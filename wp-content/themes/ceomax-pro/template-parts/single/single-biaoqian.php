<?php
$tese_arr = get_post_meta( get_the_ID(), 'ceo-shang-tag', true );
if(!empty($tese_arr)){
    $ymetaValue = $tese_arr;
}else{
    $ymetaValue='';
}

 if (($ymetaValue=="yes_shang")) {
    echo '<div class="ceo-single-shang"></div>';
	}
?>

<?php
$tese_arr = get_post_meta( get_the_ID(), 'ceo-vip-tag', true );
if(!empty($tese_arr)){
    $ymetaValue = $tese_arr;
}else{
    $ymetaValue='';
}

 if (($ymetaValue=="yes_vip")) {
    echo '<div class="ceo-single-vip"></div>';
	}
?>

<div class="ceo-single-tese">
    <?php
	$tese_arr = get_post_meta( get_the_ID(), 'ceo-tese-tag', true );
	if(!empty($tese_arr)){
	    $ymetaValue = $tese_arr;
	}else{
	    $ymetaValue='';
	}

    if ($ymetaValue == 'default') {
        $ymetaValue = _ceo('test_tag_default_use');
    }
    
	 if (($ymetaValue=="remen")) {
   	 echo '<div class="ceo-tese-remen"><span class="i">#</span>热门</div>';
		}

		elseif (($ymetaValue=="dujia")) {
   	 echo '<div class="ceo-tese-dujia"><span class="i">#</span>独家</div>';
   	}

   	    elseif (($ymetaValue=="zuixin")) {
   	 echo '<div class="ceo-tese-zuixin"><span class="i">#</span>最新</div>';
   	 }

   	    elseif (($ymetaValue=="tuijian")) {
   	 echo '<div class="ceo-tese-tuijian"><span class="i">#</span>推荐</div>';
		}

		elseif (($ymetaValue=="jingpin")) {
   	 echo '<div class="ceo-tese-jingpin"><span class="i">#</span>精品</div>';
   	 }

		elseif (($ymetaValue=="buxuanze")) {
   	 echo '';
   	 }

	?>
</div>