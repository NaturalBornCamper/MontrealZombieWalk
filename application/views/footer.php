<?php
	$locale = $this->lang->lang().'_'.($this->lang->lang()=='en'?'US':'FR');
?>
        <footer id="footer">
            <nav id="#footerMenu">
                <h2 class="hidden">Footer Menu</h2>
                <?=getMenuItem($currentSection, 'infos', lang('infos'), $this->lang->lang())?>&nbsp;|&nbsp;
                <?=getMenuItem($currentSection, 'news', lang('news'), $this->lang->lang())?>&nbsp;|&nbsp;
                <?=getMenuItem($currentSection, 'media', lang('media'), $this->lang->lang())?>&nbsp;|&nbsp;
                <?=getMenuItem($currentSection, 'help', lang('help'), $this->lang->lang())?>&nbsp;|&nbsp;
                <?=getMenuItem($currentSection, 'links', lang('links'), $this->lang->lang())?>&nbsp;|&nbsp;
                <?=getMenuItem($currentSection, 'contact', lang('contact'), $this->lang->lang())?>&nbsp;|&nbsp;
<!--                <?php //getMenuItem($currentSection, 'sitemap', lang('sitemap'), $this->lang->lang())?>&nbsp;|&nbsp;-->
                <a title="<?=lang('press')?>" href="<?=site_url('press')?>"><?=lang('press')?></a>&nbsp;|&nbsp;
                <a title="<?=lang('switchLang')?>" href="<?=site_url($this->lang->switch_uri(lang('switchLangAbbr')))?>"><?=lang('switchLang')?></a>
            </nav> <!-- footer -->
        </footer> <!-- footerMenu -->
        <div id="likeFollowPlus">
        <?php // sans nombre de personnes qui aiment: 'en'?'45px':'60px'?>
        	<iframe src="//www.facebook.com/plugins/like.php?href=<?=base_url()?>&amp;locale=<?=$locale?>&amp;send=false&amp;layout=button_count&amp;width=10&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=148100191935531" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?=$this->lang->lang()=='en'?'100px':'100'?>; height:21px;" allowTransparency="true"></iframe>
            <br><br><a href="https://twitter.com/MontrealZomWalk" class="twitter-follow-button" data-button="grey" data-text-color="#FFFFFF" data-link-color="#00AEFF" data-show-count="false" data-lang="<?=$this->lang->lang()?>"></a>
            <br><br><g:plusone size="medium" annotation="none" href="<?=base_url()?>"></g:plusone>
        </div>
        <div id="socialNetworking">
    		<?=$this->load->view('social', array('size' => 16, 'vertical' => true))?>
		</div> <!-- socialNetworking -->
        <a target="spasm" title="SPASM Festival" href="http://www.spasm.ca">
  	      <img id="logoSPASM" alt="Logo SPASM" src="<?=base_url()?>inc/img/spasm100w.png" />
        </a>
        <a title="<?=lang('partners')?>" href="<?=site_url('links/partners')?>">
  	      <img id="logosPartners" alt="<?=lang('partners')?>" src="<?=base_url()?>inc/img/partners.png" />
        </a>
    </section> <!-- content -->
</section> <!-- wrapper -->

<!-- Fade in sign if coming from home page -->
<?php
	if ( $this->session->userdata('fadein') && !isSpider() )
		{
			$this->session->unset_userdata('fadein');
?>
	<style>
		#wrapper #sign { display:none; }
		#wrapper #content { display:none; }
	</style>
	<script type="text/javascript">
		$(function()
		{
			$('#wrapper #sign').fadeIn(1500, activateScrolling);
			$('#wrapper #content').fadeIn(1500);
		});
    </script>
<?php } ?>

<!-- Google Analytics -->
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-24679804-1']);
	_gaq.push(['_trackPageview']);
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<!-- Twitter Follow Button -->
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
<!-- +1 Button -->
<script type="text/javascript">
	window.___gcfg = {lang: '<?=$this->lang->lang()?>'};
	(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
</script>
<div class="preloadedImages">
<?php if ( $this->session->userdata('fadein') ){?>
   <img src="<?=base_url()?>inc/img/<?=$skin?>.jpg" width="1" height="1" alt="background" onload="swapToHighRes(this, '#background')" />
<?php } ?>
   <img src="<?=base_url()?>inc/img/<?=$skin?>_sign.jpg" width="1" height="1" alt="background_sign" onload="swapToHighRes(this, '#sign')" />
</div>
</body>
</html>