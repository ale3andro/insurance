<div id="header">
	<div class="center_wrapper">
		
		<div id="toplinks">
			<div id="toplinks_inner">
				<a href="<?php echo $html->webroot ?>">Αρχική</a> | 
				<?php echo $html->link("Συν. Στατιστικά", "/statistics"); ?> | 
				<?php echo $html->link("Backup", "/vehicles/backup"); ?>
			</div>
		</div>
		<div class="clearer">&nbsp;</div>

		<div id="site_title">
			<h1>
				<?php echo "<a href=\"" . $html->webroot . "\">" . Configure::read("COMPANY_TITLE") . "</a>"; ?>
			</h1>
				<p>Διαχείριση Ασφαλιστικών Συμβολαίων</p>
		</div>

	</div>
</div>

<div id="navigation">
	<div class="center_wrapper">
	
		<ul>
			<li <?php echo ($activeTab==0?"class=\"current_page_item\"":""); ?>><a href="<?php echo $html->webroot ?>">Αρχική</a></li>
			<li <?php echo ($activeTab==1?"class=\"current_page_item\"":""); ?>><?php echo $html->link("Όλα", "/vehicles"); ?></li>
			<li <?php echo ($activeTab==2?"class=\"current_page_item\"":""); ?>><?php echo $html->link("Απλήρωτα", "/notPaid"); ?></li>
			<li <?php echo ($activeTab==3?"class=\"current_page_item\"":""); ?>><?php echo $html->link("Προσθήκη", "/vehicles/add"); ?></li>
			<li <?php echo ($activeTab==4?"class=\"current_page_item\"":""); ?>><?php echo $html->link("Ανά Εταιρία", "/perCompany"); ?></li>
			<li <?php echo ($activeTab==5?"class=\"current_page_item\"":""); ?>><?php echo $html->link("Αναζήτηση", "/vehicles/search"); ?></li>
			<li <?php echo ($activeTab==6?"class=\"current_page_item\"":""); ?>>
				<?php 
					if (ENABLE_USERS==1)
					{
						if (!isset($username))
							echo $html->link("Είσοδος", "/users/login"); 
						else
							echo $html->link("Έξοδος", "/users/logout");
					}
				?>
			</li>
		</ul>
		<div class="clearer">&nbsp;</div>
		<?php 
			if (isset($username))
				echo "Συνδεδεμένος ως " . $username;
		?>
	</div>
</div>
<div id="main_wrapper_outer">
	<div id="main_wrapper_inner">
		<div class="center_wrapper">

			<div class="left" id="main">
				<div id="main_content">
