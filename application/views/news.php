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
<?php foreach ($news as $currentNews) { ?>
            <article>
                <h2><a title="<?=$currentNews->title?>" href="<?=current_url().'/'.$currentNews->url?>"><?=$currentNews->title?></a></h2>
                <span class="small" style="position:relative; top:-5px"><?=$currentNews->date?></span>
                <iframe src="//www.facebook.com/plugins/like.php?href=<?=current_url().'/'.$currentNews->url?>&amp;locale=<?=$locale?>&amp;send=false&amp;layout=button_count&amp;width=10&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=148100191935531" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?=$this->lang->lang()=='en'?'45px':'60px'?>; height:21px;" allowTransparency="true"></iframe>
            	<g:plusone size="medium" annotation="none" href="<?=current_url().'/'.$currentNews->url?>"></g:plusone>
                <p>
					<?=$currentNews->ishtml? $currentNews->description: nl2br($currentNews->description)?>
                	<br><a class="small" target="popup" href="<?=$currentNews->related?>" title=""><?=$currentNews->related?></a>
            	</p>
            </article>
            <br>
<?php } ?>
        	<br>
		</div> <!-- overview -->
	</div> <!-- viewport -->
</section> <!-- mainContent -->













