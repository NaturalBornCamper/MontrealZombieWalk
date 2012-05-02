<?php
	$locale = $this->lang->lang().'_'.($this->lang->lang()=='en'?'US':'FR');
?>
<!DOCTYPE html>
<html lang="<?=$this->lang->lang()?>">
<head>
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

<link href="<?=base_url().'inc/css/@reset.css,galleria.classic.css,slideshow.css'?>" rel="stylesheet">
<script language="javascript" src="<?=base_url().'inc/js/@jquery-1.6.2.js,galleria-1.2.5.min.js'?>"></script>
<title><?=$photos->title?></title>
</head>

<body style="background-color:#000;">
<?php
/*
	echo '<pre>';
	var_dump($photos);
	echo '</pre>';
*/
?>
    <div id="gallery"></div>
    <div id="source" style="display:none">
<?php
		$dir = 'medias/photos/'.$photos->data.'/';
		$handle = opendir($dir);
		while ( false !== ($file = readdir($handle)) )
		{
			if ( is_file($dir.$file) )
			{
?>
       		 <a href="<?=base_url().$dir.$file?>"><img alt="<?=$photos->description?>" src="<?=base_url().$dir.'small/'.$file?>"></a>
<?php
			}
		}
		closedir($handle);
?>
    </div> <!-- source -->
    <div id="slideshowLikeButton">
    	<iframe src="//www.facebook.com/plugins/like.php?href=<?=current_url()?>&amp;locale=<?=$locale?>&amp;send=false&amp;layout=button_count&amp;width=10&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=148100191935531" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100; height:21px;" allowTransparency="true"></iframe>
    </div>
	<script>
        Galleria.loadTheme('<?=base_url().'inc/js/@galleria.classic.min.js'?>');
        $("#gallery").galleria({
			dataSource: "#source", // fetch images from "#source"
   			keepSource: false, // this prevents galleria from clearing the data source container
            width: $(window).width()-25,
            height: $(window).height()-25,
			imageTimeout: 180000,
			transition: 'pulse',
			autoplay: 4000,
			transitionSpeed: 200,
			clicknext: true
        });
    </script>
        
</body>
</html>