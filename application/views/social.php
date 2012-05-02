<?php
	if ( isset($vertical) )
	{
		$prefix = '<div style="margin-bottom:4px;">';
		$suffix = '</div>';
	}
	else
	{
		$prefix = '';
		$suffix = '';
	}
?>
<p>
	<?=$prefix?><a title="Google +" href="https://plus.google.com/101385065988399549342" target="googleplus"><img alt="Google +" src="<?=base_url()?>inc/img/google_plus_<?=$size?>.png" /></a><?=$suffix?>
    <?=$prefix?><a title="Facebook" href="https://www.facebook.com/MontrealZombieWalk" target="facebook"><img alt="Facebook" src="<?=base_url()?>inc/img/facebook_<?=$size?>.png" /></a><?=$suffix?>
    <?=$prefix?><a title="Twitter" href="https://twitter.com/MtlZombieWalk" target="twitter"><img alt="Twitter" src="<?=base_url()?>inc/img/twitter_<?=$size?>.png" /></a><?=$suffix?>
    <?=$prefix?><a title="LinkedIn" href="http://www.linkedin.com/company/montreal-zombie-walk" target="linkedin"><img alt="LinkeIn" src="<?=base_url()?>inc/img/linkedin_<?=$size?>.png" /></a><?=$suffix?>
    <?=$prefix?><a title="Youtube" href="http://www.youtube.com/MontrealZombieWalk" target="youtube"><img alt="Youtube" src="<?=base_url()?>inc/img/youtube_<?=$size?>.png" /></a><?=$suffix?>
    <?=$prefix?><a title="Vimeo" href="http://www.vimeo.com/montrealzombiewalk" target="vimeo"><img alt="Vimeo" src="<?=base_url()?>inc/img/vimeo_<?=$size?>.png" /></a><?=$suffix?>
    <?=$prefix?><a title="RSS" href="<?=base_url()?>rss.xml" target="RSS"><img alt="RSS" src="<?=base_url()?>inc/img/rss_<?=$size?>.png" /></a><?=$suffix?>
</p>