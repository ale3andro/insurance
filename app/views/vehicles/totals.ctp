<!-- file /app/views/contracts/totals.ctp -->
<?php echo $this->element("header", array( "activeTab" => -1) ); ?>
<div class="post">
	<div class="post_title"><h2>Συνολικά Στατιστικά Συμβολαίων</h2></div>
	<div class="post_body">
		<?php
			echo $this->element("tableStatistics", array ("contracts" => $contracts) );	
		?>		
	</div>
</div>
