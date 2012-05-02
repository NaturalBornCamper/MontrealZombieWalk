<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News Manager</title>

<link rel="stylesheet" href="<?=implode(',', $css)?>">
<script src="<?=implode(',', $js)?>" type="text/javascript"></script>
</head>

<body>
<div id="wrapper">
News manager yo
	<div id="newsList">
<?php
foreach ($news as $currentNews)
{
?>
        <div class="row">
            <div class="newsTitle"><?=$currentNews->title_en?><br><?=$currentNews->title_fr?></div>
            <div class="newsDescription"><?=substr($currentNews->description_fr, 0, 40)?>...</div>
            <div class="newsDate"><?=$currentNews->date?></div>
        </div>
<?php
}
?>
	</div> <!-- newsList -->
    <br>
	<hr />
    <div id="newsAdd">
    	<?=form_open('')?>
    	<div id="title">
    		<?=form_input('title_en', $_POST?$this->input->post('title_en'):'Titre anglais')?>
    		<br><?=form_input('title_fr', $_POST?$this->input->post('title_fr'):'Titre francais')?>
		</div>
    	<div id="description">
    		<?=form_textarea('description_en', $_POST?$this->input->post('description_en'):'Description anglais')?>
    		<br><?=form_textarea('description_fr', $_POST?$this->input->post('description_fr'):'Description francais')?>
		</div>
    	<div id="related">
    		<?=form_textarea('related_en', $_POST?$this->input->post('related_en'):'Related links anglais, un par ligne')?>
    		<br><?=form_textarea('related_fr', $_POST?$this->input->post('related_fr'):'Related links francais, un par ligne')?>
		</div>
    	<div id="title">
    		<?=form_input('bob', 'Mot de passe ici')?>
		</div>
    	<?=form_submit('submit', 'Ajouter')?>
    	<?=form_close()?>
    </div>
</div> <!-- wrapper -->

</body>
</html>