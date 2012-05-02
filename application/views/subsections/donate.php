<article>
    <h2><?=anchor(site_url($currentSection.'/donate'), lang('donateTitle'))?></h2>
    <?=lang('donateContent')?>
    <div class="center">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="CR9Z2NHPKCQKN">
        <input type="image" src="https://www.paypalobjects.com/<?=$this->lang->lang()=='fr'?'fr_FR':'en_US'?>/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/<?=$this->lang->lang()=='fr'?'fr_FR':'en_US'?>/i/scr/pixel.gif" width="1" height="1">
        </form>
	</div>
</article>