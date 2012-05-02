<?php
	$locale = $this->lang->lang().'_'.($this->lang->lang()=='en'?'US':'FR');
?>
<section>
    <h2><?=anchor(site_url($currentSection.'/photos'), lang('photosTitle'))?></h2>
    <p><?=lang('photosContent')?></p>
    <?php // echo '<pre>'.print_r($medias, true).'</pre>'?>
<?php
	$invalidFiles = array('.', '..');
	foreach ($medias as $currentMedia)
	{
		if ($currentMedia->type != 'photos') continue;
?>		
		<article><h3><a href="<?=site_url('media/'.$currentMedia->type.'/'.$currentMedia->url)?>" title="<?=$currentMedia->title?>"><?=$currentMedia->title?></a></h3>
		<span class="small" style="position:relative; top:-5px;"><?=$currentMedia->date?></span>
		<iframe src="//www.facebook.com/plugins/like.php?href=<?=site_url('media/'.$currentMedia->type.'/'.$currentMedia->url)?>&amp;locale=<?=$locale?>&amp;send=false&amp;layout=button_count&amp;width=10&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=148100191935531" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?=$this->lang->lang()=='en'?'45px':'60px'?>; height:21px;" allowTransparency="true"></iframe>
        <g:plusone size="medium" annotation="none" href="<?=site_url('media/'.$currentMedia->type.'/'.$currentMedia->url)?>"></g:plusone>
        <a class="small" style="position:relative; top:-5px;" target="<?=$currentMedia->title?>" href="<?=site_url('slideshow/'.$currentMedia->data)?>" title=""><?=lang('viewSlideshow')?></a>
		<?=$currentMedia->description?'<br>'.$currentMedia->description.'<br>':''?>
<?php
		echo '<br>';
		$dir = './medias/photos/'.$currentMedia->data;
		$handle = opendir($dir.'/small/');
		$counter = 1;
		$maxPhotos = 4;
		while ( false !== ($file = readdir($handle)) )
		if ( !in_array($file, $invalidFiles) && $counter <= $maxPhotos )
		{
?>
            <a href="<?=base_url().$dir.'/'.$file?>" title="<?=$file?>" target="popup"><img alt="zoom" src="<?=base_url().$dir.'/small/'.$file?>" /></a>
<?php
			$counter++;
		}
		closedir($handle);
		if ($counter >= $maxPhotos)
			echo '<a class="small" href="'.site_url('media/'.$currentMedia->type.'/'.$currentMedia->url).'" title="'.lang('more').'">...'.lang('viewAll').'</a>';
		if ($currentMedia->related)
			echo '<br /><a class="small" href="'.$currentMedia->related.'" title="'.$currentMedia->related.'" target="popup">'.$currentMedia->related.'</a>';
		echo '</article>';
	}
?>
</section>