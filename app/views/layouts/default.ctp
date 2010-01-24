<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<?php echo $html->css("../app/webroot/css/style.css"); ?>
	<title><?php echo $title_for_layout ?></title>
</head>

<body>
	<?php echo $content_for_layout ?>
	</div>
			</div>

			<div class="right" id="sidebar">

				<div id="sidebar_content">
				
					<div class="box">

						<div class="box_title">Σχετικά</div>

						<div class="box_content">
							<p style="text-align:center">Λογιστικό - Ασφαλιστικό Γραφείο Γ. Μάνθου</p>
							<p style="text-align:center">Π. Καρολίδου 25</p>
							<p style="text-align:center">Τ.Κ. 54453</p>
							<p style="text-align:center">Κ. Τούμπα - Θεσσαλονίκη</p>
							<p style="text-align:center">Τηλ. 2310.902904</p>
							<p style="text-align:center">Fax. 2310.</p>
							<p style="text-align:center"><a href="http://manthu.gr">http://manthu.gr</a></p>
							<p style="text-align:center"><a href="mailto:manthu@otenet.gr">manthu@otenet.gr</a></p>
						</div>

					</div>
				</div>

			</div>
			
			<div class="clearer">&nbsp;</div>

		</div>
	</div>
</div>

<div id="dashboard">
	<div id="dashboard_content">
		<div class="center_wrapper">

			<div class="col3 left">
				<div class="col3_content">

					<h4>Οχήματα</h4>
					<ul>
						<li><?php echo $html->link("Όλα τα οχήματα", "/vehicles"); ?></li>
						<li><?php echo $html->link("Προσθήκη οχήματος", "/vehicles/add"); ?></li>
						<li><?php echo $html->link("Αναζήτηση οχήματος", "/vehicles/search"); ?></li>
						<li><?php echo $html->link("Συνολικά Στατιστικά", "/vehicles/statistics"); ?></li>
					</ul>

				</div>
			</div>

			<div class="col3mid left">
				<div class="col3_content">

					<h4>Συμβ. Ασφάλειας</h4>
					<ul>
						<li><?php echo $html->link("Όλα", "/vehicles/getFromInsuranceCompanyId"); ?></li>
						<li><?php echo $html->link("Απλήρωτα", "/insuranceContracts/isPaid/no"); ?></li>
						<li><?php echo $html->link("Πληρωμένα", "/insuranceContracts/isPaid/yes"); ?></li>
						<li><?php echo $html->link("Λήγουν την επόμενη εβδομάδα", "/vehicles/getInsuranceContractsDue/7"); ?></li>
						<li><?php echo $html->link("Λήγουν τον επόμενο μήνα", "/vehicles/getInsuranceContractsDue/30"); ?></li>
						<li><?php echo $html->link("Ανά Εταιρία", "/insuranceCompanies"); ?></li>
						<li><?php echo $html->link("Συνολικά Στατιστικά", "/insuranceContracts/statistics"); ?></li>
					</ul>

				</div>
			</div>

			<div class="col3 right">
				<div class="col3_content">

					<h4>Συμβ. Οδ. Βοήθειας</h4>
					<ul>
						<li><?php echo $html->link("Όλα", "/vehicles/getFromOdikiCompanyId"); ?></li>
						<li><?php echo $html->link("Απλήρωτα", "/odikiContracts/isPaid/no"); ?></li>
						<li><?php echo $html->link("Πληρωμένα", "/odikiContracts/isPaid/yes"); ?></li>
						<li><?php echo $html->link("Λήγουν την επόμενη εβδομάδα", "/vehicles/getOdikiContractsDue/7"); ?></li>
						<li><?php echo $html->link("Λήγουν τον επόμενο μήνα", "/vehicles/getOdikiContractsDue/30"); ?></li>
						<li><?php echo $html->link("Ανά Εταιρία", "/odikiCompanies"); ?></li>
						<li><?php echo $html->link("Συνολικά Στατιστικά", "/odikiContracts/statistics"); ?></li>
					</ul>

				</div>
			</div>

			<div class="clearer">&nbsp;</div>

		</div>
	</div>
</div>

<div id="footer">
	<div class="center_wrapper">

		<div class="left">
			<a href="http://creativecommons.org">cc</a> 2009 <a href="http://ale3andro.gr">ale3andro</a> για το <a href="http://manthu.gr">Λογιστικό - Ασφαλιστικό Γραφείο Γ. Μάνθου</a>
		</div>
		<div class="right">
			<a href="http://templates.arcsin.se/">Website template</a> by <a href="http://arcsin.se/">Arcsin</a> 
		</div>
		
		<div class="clearer">&nbsp;</div>

	</div>
</div>

</body>
</html>
