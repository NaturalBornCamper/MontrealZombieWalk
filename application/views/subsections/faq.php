<article>
    <h2><?=anchor(site_url($currentSection.'/faq'), lang('faqTitle'))?></h2>
    <p><?=lang('faqContent')?></p>
<?php
	foreach ($faqs as $currentFaq)
	{
?>		
		<section>
				<h3><span style="color:#600">Q: </span><?=$currentFaq->question?></h3>
                <span style="color:#006"><?=nl2br(lang('answer'))?>: </span><?=$currentFaq->answer?>
            	<?=$currentFaq->related?'<br><a title="" href="'.$currentFaq->related.'">'.$currentFaq->related.'</a>':''?>
                <br><span class="small" style="position:relative; top:-5px"><?=$currentFaq->date?></span>
		</section>
        <br>
<?php
	}
?>
</article>