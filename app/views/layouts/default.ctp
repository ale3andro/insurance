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
							<?php 
									if (Configure::read("COMPANY_TITLE")!=null)
										echo "<p style=\"text-align:center\">" . Configure::read("COMPANY_TITLE") . "</p>";
									if (Configure::read("COMPANY_ADDRESS")!=null)
										echo "<p style=\"text-align:center\">" . Configure::read("COMPANY_ADDRESS") . "</p>";
									if (Configure::read("COMPANY_POSTAL_CODE")!=null)
										echo "<p style=\"text-align:center\">" . Configure::read("COMPANY_POSTAL_CODE") . "</p>";
									if (Configure::read("COMPANY_AREA")!=null)
										echo "<p style=\"text-align:center\">" . Configure::read("COMPANY_AREA") . "</p>";
									if (Configure::read("COMPANY_TELEPHONE")!=null)
										echo "<p style=\"text-align:center\">" . Configure::read("COMPANY_TELEPHONE") . "</p>";
									if (Configure::read("COMPANY_FAX")!=null)
										echo "<p style=\"text-align:center\">" . Configure::read("COMPANY_FAX") . "</p>";
									if (Configure::read("COMPANY_WEB_ADDRESS")!=null)
										echo "<p style=\"text-align:center\"><a target=\"_blank\" href=\"" .Configure::read("COMPANY_WEB_ADDRESS") . "\">" . Configure::read("COMPANY_WEB_ADDRESS") . "</a></p>";
									if (Configure::read("COMPANY_EMAIL")!=null)
										echo "<p style=\"text-align:center\"><a href=\"mailto:" . Configure::read("COMPANY_EMAIL") . "\">" . Configure::read("COMPANY_EMAIL") . "</a></p>";
							?>
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
						<li><?php echo $html->link("Οχήματα χωρίς Ασφάλεια", "/vehicles/withoutInsurance"); ?></li>
						<li><?php echo $html->link("Οχήματα χωρίς Οδική Βοήθεια", "/vehicles/withoutOdiki"); ?></li>
						<li><?php echo $html->link("Συνολικά Στατιστικά", "/vehicles/statistics"); ?></li>
						<li><?php echo $html->link("Έλεγχος Πίνακα Οχημάτων", "/vehicles/checkTable"); ?></li>
					</ul>

				</div>
			</div>

			<div class="col3mid left">
				<div class="col3_content">

					<h4>Συμβ. Ασφάλειας</h4>
					<ul>
						<li><?php echo $html->link("Όλα", "/vehicles/getFromInsuranceCompanyId"); ?></li>
						<li><?php echo $html->link("Απλήρωτα", "/vehicles/getInsuranceContractsIsPaid/no"); ?></li>
						<li><?php echo $html->link("Πληρωμένα", "/vehicles/getInsuranceContractsIsPaid/yes"); ?></li>
						<li><?php echo $html->link("Λήγουν την επόμενη εβδομάδα", "/vehicles/getInsuranceContractsDue/7"); ?></li>
						<li><?php echo $html->link("Λήγουν τον επόμενο μήνα", "/vehicles/getInsuranceContractsDue/30"); ?></li>
						<li><?php echo $html->link("Ανά Εταιρία", "/insuranceCompanies"); ?></li>
						<li><?php echo $html->link("Συνολικά Στατιστικά", "/insuranceContracts/statistics"); ?></li>
						<li><?php echo $html->link("Έλεγχος Πίνακα Συμβ. Ασφάλειας", "/insuranceContracts/checkTable"); ?></li>
					</ul>

				</div>
			</div>

			<div class="col3 right">
				<div class="col3_content">

					<h4>Συμβ. Οδ. Βοήθειας</h4>
					<ul>
						<li><?php echo $html->link("Όλα", "/vehicles/getFromOdikiCompanyId"); ?></li>
						<li><?php echo $html->link("Απλήρωτα", "/vehicles/getOdikiContractsIsPaid/no"); ?></li>
						<li><?php echo $html->link("Πληρωμένα", "/vehicles/getOdikiContractsIsPaid/yes"); ?></li>
						<li><?php echo $html->link("Λήγουν την επόμενη εβδομάδα", "/vehicles/getOdikiContractsDue/7"); ?></li>
						<li><?php echo $html->link("Λήγουν τον επόμενο μήνα", "/vehicles/getOdikiContractsDue/30"); ?></li>
						<li><?php echo $html->link("Ανά Εταιρία", "/odikiCompanies"); ?></li>
						<li><?php echo $html->link("Συνολικά Στατιστικά", "/odikiContracts/statistics"); ?></li>
						<li><?php echo $html->link("Έλεγχος Πίνακα Συμβ. Οδικής", "/odikiContracts/checkTable"); ?></li>
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
			<a href="http://creativecommons.org">cc</a> 10/2012 <a href="http://ale3andro.gr">Αλέξανδρος Μοσκοφίδης</a>
		</div>
		<div class="right">
			<a href="http://templates.arcsin.se/">Website template</a> by <a href="http://arcsin.se/">Arcsin</a> 
		</div>
		
		<div class="clearer">&nbsp;</div>

	</div>
</div>

</body>
</html>
