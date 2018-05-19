<article>
    <h2><?=anchor(site_url($currentSection.'/contact-us'), lang('contactusTitle'))?></h2>
    <?=$this->load->view('social', array('size' => 32))?>
    <?=lang('contactusContent')?>
</article>