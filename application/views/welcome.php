<!DOCTYPE html>
<html lang="<?=$this->lang->lang()?>">
<head>
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
<meta charset="utf-8">
<meta name="description" content="<?=lang('description')?>" />
<meta name="keywords" content="<?=lang('keywords')?>" />
<meta name="author" content="NaturalBornCamper" />
<meta name="revised" content="NaturalBornCamper, <?=strftime('%F', strtotime('last monday'))?>" />
<meta name="geo.region" content="CA-QC" />
<meta name="geo.placename" content="Montréal" />
<meta name="geo.position" content="45.5;-73.6" />
<meta name="ICBM" content="45.5, -73.6" />
<meta property="og:url" content="<?=base_url()?>" />
<meta property="og:title" content="<?=isset($pageTitle)?$pageTitle:lang('title')?>" />
<meta property="og:image" content="<?=base_url()?>inc/img/og<?=rand(1, 3)?>.jpg" />
<meta property="og:locale" content="<?=$this->lang->lang()?>_<?=$this->lang->lang()=='en'?'US':'CA'?>" />

<link rel="stylesheet" href="<?=implode(',', $css)?>">
<script src="<?=implode(',', $js)?>" type="text/javascript"></script>

<title><?=lang('title')?></title>
</head>
<body>
<div class="preloadedImages">
   <img src="<?=base_url()?>inc/img/<?=$skin?>.jpg" width="1" height="1" alt="background" onload="swapToHighRes(this, '#background')" />
   <img src="<?=base_url()?>inc/img/<?=$skin?>_sign.jpg" width="1" height="1" alt="background_sign" />
</div>
<section id="wrapper">
	<img id="background" alt="Background" src="<?=base_url()?>inc/img/<?=$skin?>_low.jpg" />
    <h1 class="hidden">Wrapper</h1>
    <section id="websiteTitle">
    	MONTREAL ZOMBIE WALK
    </section> <!-- websiteTitle -->
    <section id="languageSelection">
<?php
	if ( !browserIsCompatible() )
	{
		$browser = getBrowser();
		if ($browser['id'] == 'MSIE')
		{
?>
			<p class="bold"><?=lang('html5')?></p>
			<p><?=lang('ie')?></p>
			<p><?=lang('continue')?></p>
<?php
		}
		else
		{
?>
			<p class="bold italic"><?=lang('html5')?></p>
			<p><?=lang('incompatible1').$browser['version'].lang('incompatible2').$browser['name'].lang('incompatible3')?></p>
			<p><?=lang('continue')?></p>
<?php
		}
	}
?>
		<span class="font2">
			<?=lang('language')?><br>
            <a title="ENGLISH ZOMBIE" href="<?=base_url()?>en/infos">ENGLISH</a> -
            <a title="ZOMBIE FRANÇAIS" href="<?=base_url()?>fr/infos">FRANÇAIS</a>
        </span>
    </section> <!-- languageSelection -->
    <section id="spasmLogo">
    	<img src="<?=base_url()?>inc/img/spasm200b.png" alt="SPASM">
    </section> <!-- spasmLogo -->
</section> <!-- wrapper -->
</body>
</html>