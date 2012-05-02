<section id="mainContent"><?php  ?>
    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
	<div class="viewport">
		<div class="overview">
            <h1><?=lang('contentTitle')?></h1>
            <header>
                <?=lang('description')?>
            </header>
<?php 
	foreach ($subviewsToLoad as $view)
	{
		echo '<hr />';
		$this->load->view('subsections/'.$view);
	}
?>
			<br />
		</div> <!-- overview -->
	</div> <!-- viewport -->
</section> <!-- mainContent -->