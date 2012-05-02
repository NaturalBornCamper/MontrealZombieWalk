<?php
	$locale = $this->lang->lang().'_'.($this->lang->lang()=='en'?'US':'FR');
?>
<article>
    <h2><?=anchor(site_url($currentSection.'/photos'), lang('photosTitle'))?></h2>
    <?php // echo '<pre>'.print_r($medias, true).'</pre>'?>
<?php
	$invalidFiles = array('.', '..');
?>		
    <section><h3><?=$medias->title?></h3>
    <span class="small" style="position:relative; top:-5px;"><?=$medias->date?></span>
    <iframe src="//www.facebook.com/plugins/like.php?href=<?=current_url()?>&amp;locale=<?=$locale?>&amp;send=false&amp;layout=button_count&amp;width=10&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=148100191935531" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?=$this->lang->lang()=='en'?'45px':'60px'?>; height:21px;" allowTransparency="true"></iframe>
    <g:plusone size="medium" annotation="none" href="<?=current_url()?>"></g:plusone>
    <a style="position:relative; top:-5px;" target="<?=$medias->title?>" href="<?=site_url('slideshow/'.$medias->data)?>" title=""><?=lang('viewSlideshow')?></a>
    <?=$medias->description?'<br>'.$medias->description.'<br>':''?>
<?php
    echo '<br>';
    $dir = './medias/photos/'.$medias->data;
    $handle = opendir($dir.'/small/');
    while ( false !== ($file = readdir($handle)) )
    if ( !in_array($file, $invalidFiles) )
    {
?>
        <a href="<?=base_url().$dir.'/'.$file?>" title="<?=$file?>" target="popup"><img alt="zoom" src="<?=base_url().$dir.'/small/'.$file?>" /></a>
<?php
    }
    closedir($handle);
	if ($medias->related)
		echo '<br /><a class="small" href="'.$medias->related.'" title="'.$medias->related.'" target="popup">'.$medias->related.'</a>';
    echo '</section>';
?>
</article>