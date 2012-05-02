<!DOCTYPE html>
<html lang="<?=$this->lang->lang()?>"><head>
<meta charset="utf-8">
<meta name="description" content="<?=isset($pageDescription)?$pageDescription:lang('description')?>" />
<meta name="keywords" content="<?=lang('keywords')?>" />
<meta name="author" content="NaturalBornCamper" />
<!-- <meta name="revised" content="NaturalBornCamper, <?php // echo strftime('%F', strtotime('last monday'))?>" /> -->
<meta name="geo.region" content="CA-QC" />
<meta name="geo.placename" content="Montr&eacute;al" />
<meta name="geo.position" content="45.5;-73.6" />
<meta name="ICBM" content="45.5, -73.6" />
<meta property="og:url" content="<?=current_url()?>" />
<meta property="og:title" content="<?=isset($pageTitle)?$pageTitle:lang('title')?>" />
<meta property="og:image" content="<?=base_url()?>inc/img/og<?=rand(1, 3)?>.jpg" />
<meta property="og:locale" content="<?=$this->lang->lang()?>_<?=$this->lang->lang()=='en'?'US':'CA'?>" />

<link rel="stylesheet" href="<?=implode(',', $css)?>">
<script src="<?=implode(',', $js)?>" type="text/javascript"></script>

<title><?=isset($pageTitle)?$pageTitle:lang('title')?></title>
</head>

<body>
<h1 class="hidden">Montreal Zombie Walk</h1>
<section id="wrapper">
    <h1 class="hidden">Wrapper</h1>
<?php if ( $this->session->userdata('fadein') ){?>
	<img id="background" alt="Background" src="<?=base_url()?>inc/img/<?=$skin?>_low.jpg" />
<?php } ?>
	<img id="sign" alt="" src="<?=base_url()?>inc/img/<?=$skin?>_sign_low.jpg" />
    <section id="content">
    	<h2 class="hidden">Content</h2>
        <nav id="menu">
            <h2 class="hidden">Menu</h2>
            <ul>
            	<li><?=getMenuItem($currentSection, 'infos', lang('infos'), $this->lang->lang())?></li>
            	<li><?=getMenuItem($currentSection, 'news', lang('news'), $this->lang->lang())?></li>
            	<li><?=getMenuItem($currentSection, 'media', lang('media'), $this->lang->lang())?></li>
            	<li><?=getMenuItem($currentSection, 'help', lang('help'), $this->lang->lang())?></li>
            	<li><?=getMenuItem($currentSection, 'links', lang('links'), $this->lang->lang())?></li>
            	<li><?=getMenuItem($currentSection, 'contact', lang('contact'), $this->lang->lang())?></li>
            </ul>
        </nav> <!-- menu -->
        <nav id="scrollArrows">
        	<h2 class="hidden">Scroll</h2>
        	<div id="upArrow">/|\</div>
        	<div id="downArrow">\|/</div>
        </nav> <!-- scrollArrows -->