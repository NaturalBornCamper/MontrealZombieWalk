<article>
    <h2><?=anchor(site_url($currentSection.'/costumes'), lang('costumesTitle'))?></h2>
    <p><?=lang('costumesContent')?></p>
    <?php // echo '<pre>'.print_r($links, true).'</pre>'?>
<?php
	$counter = 1;
	foreach ($links as $currentLink)
	{
		if ($currentLink->type != 'costumes') continue;
?>		
		<section>
				<h3><?=$counter?> - <?=$currentLink->description?></h3>
            	<a title="<?=$currentLink->type?>" href="<?=$currentLink->link?>" target="popup"><?=$currentLink->link?></a>
                <br><span class="small" style="position:relative; top:-5px"><?=$currentLink->date?></span>
		</section>
        <br>
<?php
		$counter++;
	}
?>
</article>