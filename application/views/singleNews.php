<?php
	$locale = $this->lang->lang().'_'.($this->lang->lang()=='en'?'US':'FR');
?>
<section id="mainContent">
    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
	<div id="viewport" class="viewport">
		<div id="overview" class="overview">
            <h1><?=lang('contentTitle')?></h1>
            <header>
                <?=lang('description')?>
            </header>
            <article>
                <h2><?=$news->title?></h2>
                <span class="small" style="position:relative; top:-5px"><?=$news->date?></span>
                <iframe src="//www.facebook.com/plugins/like.php?href=<?=current_url()?>&amp;locale=<?=$locale?>&amp;send=false&amp;layout=button_count&amp;width=10&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=148100191935531" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?=$this->lang->lang()=='en'?'45px':'60px'?>; height:21px;" allowTransparency="true"></iframe>
            	<g:plusone size="medium" annotation="none" href="<?=current_url()?>"></g:plusone>
                <p>
					<?=$news->ishtml? $news->description: nl2br($news->description)?>
                	<br><a class="small" target="popup" href="<?=$news->related?>" title=""><?=$news->related?></a>
            	</p>
            </article>
        	<br>
		</div> <!-- overview -->
	</div> <!-- viewport -->
</section> <!-- mainContent -->

