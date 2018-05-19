<div class="preloadedImages">
   <img id="mapImgLarge" src="<?=base_url()?>inc/img/map.png" width="1" height="1" alt="Map Large" />
</div>
<article>
    <h2><?=anchor(site_url('infos/about'), lang('aboutTitle'))?></h2>
    <?=hotlink(lang('aboutContent'), $this->lang->lang())?>
    <br>
    <!--<div id="map">
    	<img id="mapImg" alt="Map" width="540" height="413" src="<?=base_url()?>inc/img/map.jpg" />
    </div>-->
</article>