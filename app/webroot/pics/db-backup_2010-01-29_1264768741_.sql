DROP TABLE IF EXISTS images;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='the images attached to the vehicles';

INSERT INTO images VALUES("2","114","pics/IBA1189_1264755544_.png","Άδεια κυκλοφορίας");



DROP TABLE IF EXISTS insurance_companies;

CREATE TABLE `insurance_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(80) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO insurance_companies VALUES("1","Interlife","2394024433");
INSERT INTO insurance_companies VALUES("2","Ασφάλειαι Μινέττα","");
INSERT INTO insurance_companies VALUES("3","Eurostar","");
INSERT INTO insurance_companies VALUES("4","Commercial Value","2310566859");
INSERT INTO insurance_companies VALUES("5","Infotrust","");
INSERT INTO insurance_companies VALUES("6","QIS","");
INSERT INTO insurance_companies VALUES("8","Εθνική Ασφαλιστική","2310902904");
INSERT INTO insurance_companies VALUES("9","Ιντερσαλόνικα","2310933147");
INSERT INTO insurance_companies VALUES("11","XBN","123");



DROP TABLE IF EXISTS insurance_contracts;

CREATE TABLE `insurance_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `amount` float NOT NULL,
  `company_id` int(11) NOT NULL,
  `is_paid` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COMMENT='Sumbolaia Odiki Boh8eias';

INSERT INTO insurance_contracts VALUES("1","2020-06-09","2020-12-09","220.19","2","1");
INSERT INTO insurance_contracts VALUES("2","2020-06-09","2020-12-09","215.12","2","1");
INSERT INTO insurance_contracts VALUES("3","2012-07-09","2012-01-10","225.77","2","1");
INSERT INTO insurance_contracts VALUES("4","2013-06-09","2013-12-09","212.99","2","1");
INSERT INTO insurance_contracts VALUES("5","2007-05-09","2007-11-09","64.12","3","0");
INSERT INTO insurance_contracts VALUES("6","2015-06-09","2015-12-09","188.29","3","1");
INSERT INTO insurance_contracts VALUES("7","2017-06-09","2017-12-09","215.12","2","0");
INSERT INTO insurance_contracts VALUES("8","2022-07-09","2022-01-10","182.82","2","1");
INSERT INTO insurance_contracts VALUES("9","2026-07-09","2026-01-10","186.37","2","0");
INSERT INTO insurance_contracts VALUES("10","2017-07-09","2017-01-10","143.68","2","1");
INSERT INTO insurance_contracts VALUES("11","2012-07-09","2012-01-10","225.77","2","1");
INSERT INTO insurance_contracts VALUES("12","2020-06-09","2020-12-09","157.35","2","0");
INSERT INTO insurance_contracts VALUES("13","2020-06-09","2020-12-09","175.78","2","1");
INSERT INTO insurance_contracts VALUES("14","2015-06-09","2015-06-10","104.79","1","1");
INSERT INTO insurance_contracts VALUES("15","2018-06-09","2018-12-09","182.84","1","1");
INSERT INTO insurance_contracts VALUES("16","2025-06-09","2025-12-09","48.05","1","1");
INSERT INTO insurance_contracts VALUES("17","2014-06-09","2014-12-09","141.23","1","1");
INSERT INTO insurance_contracts VALUES("18","2023-06-09","2023-12-09","182.84","1","0");
INSERT INTO insurance_contracts VALUES("19","2019-06-09","2019-06-10","214.01","1","0");
INSERT INTO insurance_contracts VALUES("20","2021-06-09","2021-12-09","162.45","1","1");
INSERT INTO insurance_contracts VALUES("21","2021-06-09","2021-12-09","180.06","1","0");
INSERT INTO insurance_contracts VALUES("22","2028-06-09","2028-12-09","167.06","1","0");
INSERT INTO insurance_contracts VALUES("23","2002-06-09","2002-06-10","110.03","1","0");
INSERT INTO insurance_contracts VALUES("24","2013-04-09","2013-04-10","104.05","1","0");
INSERT INTO insurance_contracts VALUES("25","2020-06-09","2020-12-09","169.35","2","1");
INSERT INTO insurance_contracts VALUES("26","2009-05-09","2009-05-10","90.1","1","0");
INSERT INTO insurance_contracts VALUES("27","2021-07-09","2021-01-10","177.25","1","1");
INSERT INTO insurance_contracts VALUES("28","2021-07-09","2021-01-10","177.25","1","0");
INSERT INTO insurance_contracts VALUES("29","2021-07-09","2021-01-10","141.23","1","1");
INSERT INTO insurance_contracts VALUES("30","2003-07-09","2003-01-10","195.37","1","1");
INSERT INTO insurance_contracts VALUES("31","2009-07-09","2009-01-10","189.76","1","0");
INSERT INTO insurance_contracts VALUES("32","2025-07-09","2025-01-10","48.05","1","1");
INSERT INTO insurance_contracts VALUES("33","2027-07-09","2027-01-10","276.52","1","1");
INSERT INTO insurance_contracts VALUES("34","2021-07-09","2021-01-10","174.08","1","0");
INSERT INTO insurance_contracts VALUES("35","2027-07-09","2027-01-09","180.06","1","1");
INSERT INTO insurance_contracts VALUES("36","2001-07-09","2001-01-10","153.74","1","1");
INSERT INTO insurance_contracts VALUES("37","2015-07-09","2015-01-10","235.39","1","1");
INSERT INTO insurance_contracts VALUES("38","2026-07-09","2026-01-09","180.06","1","1");
INSERT INTO insurance_contracts VALUES("39","2029-07-09","2029-01-10","433.96","1","1");
INSERT INTO insurance_contracts VALUES("40","2025-07-09","2025-01-10","174.08","1","0");
INSERT INTO insurance_contracts VALUES("42","2018-07-09","2018-07-10","104.79","1","1");
INSERT INTO insurance_contracts VALUES("43","2015-07-09","2015-07-10","110.03","1","0");
INSERT INTO insurance_contracts VALUES("44","2028-07-09","2028-07-10","101.47","1","0");
INSERT INTO insurance_contracts VALUES("45","2010-07-09","2024-01-10","334.53","1","0");
INSERT INTO insurance_contracts VALUES("46","2027-07-09","2027-01-10","144.16","2","0");
INSERT INTO insurance_contracts VALUES("47","2023-07-09","2023-01-10","260","1","0");
INSERT INTO insurance_contracts VALUES("48","2017-07-09","2017-01-10","189","1","1");
INSERT INTO insurance_contracts VALUES("49","2008-07-09","2008-01-10","189","1","0");
INSERT INTO insurance_contracts VALUES("50","2017-07-09","2017-01-10","467","1","0");
INSERT INTO insurance_contracts VALUES("51","2002-07-09","2002-01-10","180","1","1");
INSERT INTO insurance_contracts VALUES("52","2023-07-09","2023-01-10","260","1","0");
INSERT INTO insurance_contracts VALUES("53","2010-01-25","2011-01-25","56.77","11","0");
INSERT INTO insurance_contracts VALUES("54","2025-08-09","2025-02-09","370","1","0");
INSERT INTO insurance_contracts VALUES("55","2001-08-09","2001-02-09","159","1","1");
INSERT INTO insurance_contracts VALUES("56","2007-08-09","2007-02-09","220","1","1");
INSERT INTO insurance_contracts VALUES("57","2019-08-09","2019-02-09","189","1","0");
INSERT INTO insurance_contracts VALUES("58","2028-08-09","2028-02-09","53","1","1");
INSERT INTO insurance_contracts VALUES("59","2018-08-09","2018-02-09","329","1","1");
INSERT INTO insurance_contracts VALUES("60","2002-08-09","2002-02-09","170","1","0");
INSERT INTO insurance_contracts VALUES("61","2010-08-09","2009-11-09","94","1","0");
INSERT INTO insurance_contracts VALUES("62","2015-08-09","2015-02-09","153","1","0");
INSERT INTO insurance_contracts VALUES("63","2021-08-09","2021-02-09","210","1","1");
INSERT INTO insurance_contracts VALUES("64","2006-08-09","2006-02-09","220","1","0");
INSERT INTO insurance_contracts VALUES("66","2025-08-09","2025-02-09","203","1","0");
INSERT INTO insurance_contracts VALUES("67","2028-08-09","2028-02-10","43","3","0");
INSERT INTO insurance_contracts VALUES("68","2017-08-09","2017-02-09","261","3","1");
INSERT INTO insurance_contracts VALUES("69","2028-07-09","2028-01-09","232","1","0");
INSERT INTO insurance_contracts VALUES("70","2016-07-09","2016-01-09","174","3","1");
INSERT INTO insurance_contracts VALUES("71","2014-07-09","2014-01-09","252","3","1");
INSERT INTO insurance_contracts VALUES("72","2010-07-09","2009-01-09","206","3","1");
INSERT INTO insurance_contracts VALUES("73","2001-07-09","2001-01-09","256","3","1");
INSERT INTO insurance_contracts VALUES("74","2026-08-09","2026-02-10","48","1","1");
INSERT INTO insurance_contracts VALUES("75","2028-06-09","2028-12-09","-22","5","0");
INSERT INTO insurance_contracts VALUES("76","2018-08-09","2018-02-09","200","5","0");
INSERT INTO insurance_contracts VALUES("77","2006-08-09","2006-02-10","235","5","1");
INSERT INTO insurance_contracts VALUES("78","2026-09-09","2023-03-09","180","1","1");
INSERT INTO insurance_contracts VALUES("79","2017-09-09","2017-09-10","447","2","0");
INSERT INTO insurance_contracts VALUES("80","2014-09-09","2014-03-10","270","1","0");
INSERT INTO insurance_contracts VALUES("81","2010-09-09","2010-09-10","61","2","0");
INSERT INTO insurance_contracts VALUES("82","2009-09-09","2009-09-10","61","2","0");
INSERT INTO insurance_contracts VALUES("83","2025-09-09","2025-09-10","200","2","0");
INSERT INTO insurance_contracts VALUES("84","2011-09-09","2011-03-10","209","2","1");
INSERT INTO insurance_contracts VALUES("85","2019-09-09","2019-03-10","369","2","0");
INSERT INTO insurance_contracts VALUES("86","2013-08-09","2013-02-10","287","1","0");
INSERT INTO insurance_contracts VALUES("87","2019-09-09","2019-03-09","174","1","0");
INSERT INTO insurance_contracts VALUES("88","2018-09-09","2018-03-10","187","1","0");
INSERT INTO insurance_contracts VALUES("89","2012-09-09","2012-03-10","291","1","0");
INSERT INTO insurance_contracts VALUES("90","2021-09-09","2021-03-10","174","1","0");
INSERT INTO insurance_contracts VALUES("91","2021-09-09","2021-03-10","175","1","0");
INSERT INTO insurance_contracts VALUES("92","2012-09-09","2012-03-09","170","1","0");
INSERT INTO insurance_contracts VALUES("93","2012-09-09","2012-03-10","141","1","0");
INSERT INTO insurance_contracts VALUES("94","2021-09-09","2021-03-10","137","1","0");
INSERT INTO insurance_contracts VALUES("95","2026-09-09","2026-03-10","504","1","0");
INSERT INTO insurance_contracts VALUES("96","2021-09-09","2021-03-10","249","1","0");
INSERT INTO insurance_contracts VALUES("97","2021-09-09","2021-09-10","249","1","0");
INSERT INTO insurance_contracts VALUES("98","2019-09-09","2019-03-10","153","1","1");
INSERT INTO insurance_contracts VALUES("99","2021-09-09","2021-03-10","263","1","0");
INSERT INTO insurance_contracts VALUES("100","2012-09-09","2012-03-10","189","1","0");
INSERT INTO insurance_contracts VALUES("101","2020-09-09","2020-03-10","189","1","0");
INSERT INTO insurance_contracts VALUES("102","2006-09-09","2006-03-10","153","1","0");
INSERT INTO insurance_contracts VALUES("103","2021-09-09","2021-03-10","180","1","1");
INSERT INTO insurance_contracts VALUES("104","2021-09-09","2021-03-10","174","1","0");
INSERT INTO insurance_contracts VALUES("105","2026-09-09","2026-03-10","164","1","0");
INSERT INTO insurance_contracts VALUES("106","2021-09-09","2021-03-10","180","1","0");
INSERT INTO insurance_contracts VALUES("107","2015-09-09","2015-03-10","196","1","0");
INSERT INTO insurance_contracts VALUES("109","2010-09-09","2010-09-10","436","1","0");
INSERT INTO insurance_contracts VALUES("110","2022-09-09","2022-03-10","150","3","1");
INSERT INTO insurance_contracts VALUES("111","2006-09-09","2006-03-10","146","3","0");
INSERT INTO insurance_contracts VALUES("112","2017-09-09","2017-03-10","75","3","0");
INSERT INTO insurance_contracts VALUES("113","2018-09-09","2018-03-10","129","3","0");
INSERT INTO insurance_contracts VALUES("114","2007-09-09","2007-03-10","192","3","0");
INSERT INTO insurance_contracts VALUES("115","2004-09-09","2004-03-10","192","3","1");
INSERT INTO insurance_contracts VALUES("116","2004-09-09","2004-03-10","43","3","0");
INSERT INTO insurance_contracts VALUES("117","2004-09-09","2004-03-10","150","3","0");
INSERT INTO insurance_contracts VALUES("118","2004-09-09","2004-03-10","156","3","0");
INSERT INTO insurance_contracts VALUES("119","2008-09-09","2008-03-10","64","3","0");
INSERT INTO insurance_contracts VALUES("120","2010-01-25","2011-01-25","566.89","11","0");
INSERT INTO insurance_contracts VALUES("121","2016-09-09","2016-03-10","172","3","0");
INSERT INTO insurance_contracts VALUES("122","2015-09-09","2015-09-10","384","3","1");
INSERT INTO insurance_contracts VALUES("123","2006-10-09","2006-04-10","173","1","0");
INSERT INTO insurance_contracts VALUES("124","2016-10-09","2016-04-10","190","2","0");
INSERT INTO insurance_contracts VALUES("125","2013-10-09","2013-04-10","253","2","0");
INSERT INTO insurance_contracts VALUES("126","2022-10-09","2022-10-10","68","1","0");
INSERT INTO insurance_contracts VALUES("127","2018-09-09","2018-09-10","95","1","0");
INSERT INTO insurance_contracts VALUES("128","2010-10-09","2010-04-10","174","1","0");
INSERT INTO insurance_contracts VALUES("129","2030-10-09","2030-04-10","182","1","0");
INSERT INTO insurance_contracts VALUES("130","2011-10-09","2011-04-10","270","1","0");
INSERT INTO insurance_contracts VALUES("131","2024-10-09","2024-04-10","180","1","0");
INSERT INTO insurance_contracts VALUES("132","2006-10-09","2006-04-10","192","1","0");
INSERT INTO insurance_contracts VALUES("133","2004-10-09","2004-04-10","220","1","0");
INSERT INTO insurance_contracts VALUES("134","2013-10-09","2013-04-10","280","1","0");
INSERT INTO insurance_contracts VALUES("135","2017-10-09","2017-04-10","252","1","0");
INSERT INTO insurance_contracts VALUES("136","2025-10-09","2025-04-10","48","1","0");
INSERT INTO insurance_contracts VALUES("137","2024-10-09","2024-04-10","189","1","0");
INSERT INTO insurance_contracts VALUES("138","2004-10-09","2004-04-10","177","1","0");
INSERT INTO insurance_contracts VALUES("139","2029-09-09","2029-03-10","162","6","0");
INSERT INTO insurance_contracts VALUES("140","2013-09-09","2013-03-10","162","6","0");
INSERT INTO insurance_contracts VALUES("141","2004-10-09","2004-04-10","177","1","0");
INSERT INTO insurance_contracts VALUES("142","2004-10-09","2004-04-10","170","1","0");
INSERT INTO insurance_contracts VALUES("143","2004-10-09","2004-04-10","167","1","0");
INSERT INTO insurance_contracts VALUES("144","2003-10-09","2003-04-09","200","1","0");
INSERT INTO insurance_contracts VALUES("145","2013-10-09","2013-10-10","434","1","0");
INSERT INTO insurance_contracts VALUES("146","2011-10-09","2011-10-10","95","1","1");
INSERT INTO insurance_contracts VALUES("147","2018-10-09","2018-10-10","68","1","0");
INSERT INTO insurance_contracts VALUES("148","2017-10-09","2017-10-10","95","1","0");
INSERT INTO insurance_contracts VALUES("149","2012-10-09","2012-10-09","68","1","0");
INSERT INTO insurance_contracts VALUES("150","2012-10-09","2012-10-10","95","1","0");



DROP TABLE IF EXISTS odiki_companies;

CREATE TABLE `odiki_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='etairies_odikis';

INSERT INTO odiki_companies VALUES("1","ΕΛΠΑ","1232");
INSERT INTO odiki_companies VALUES("2","Esos","2310474474");
INSERT INTO odiki_companies VALUES("3","Eurosos","2344");



DROP TABLE IF EXISTS odiki_contracts;

CREATE TABLE `odiki_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `amount` float NOT NULL,
  `company_id` int(11) NOT NULL,
  `is_paid` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Sumbolaia Odiki Boh8eias';

INSERT INTO odiki_contracts VALUES("15","2010-01-29","2010-01-29","34","1","0");
INSERT INTO odiki_contracts VALUES("12","2009-01-05","2010-01-05","70","2","1");
INSERT INTO odiki_contracts VALUES("9","2009-11-23","2010-12-25","155.98","3","1");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='user authentication';

INSERT INTO users VALUES("1","ale3andro","049ce2f96f3574d1ebc447d99c3f24ce");



DROP TABLE IF EXISTS vehicles;

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `plate` varchar(7) NOT NULL,
  `insurance_contract_id` int(11) NOT NULL,
  `odiki_contract_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=175 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO vehicles VALUES("21","ΚΩΝ/ΝΟΣ","ΤΣΟΥΡΜΑΣ","","ΝΗΖ7592","1","0");
INSERT INTO vehicles VALUES("22","ΚΩΝ/ΝΟΣ","ΤΣΟΥΡΜΑΣ","","ΝΖΟ5179","2","0");
INSERT INTO vehicles VALUES("16","ΓΕΩΡΓΙΟΣ","ΓΡΙΒΑΣ","","","3","0");
INSERT INTO vehicles VALUES("17","ΓΕΩΡΓΙΟΣ","ΜΑΝΘΟΥ","ΧΑΡΑΛΑΜΠΟΣ","ΝΖΑ3069","4","0");
INSERT INTO vehicles VALUES("18","ΘΕΟΦΙΛΟΣ","ΣΠΥΡΙΔΩΝΙΔΗΣ","ΠΕΡΙΚΛΗΣ","ΝΖΗ154","5","0");
INSERT INTO vehicles VALUES("19","ΣΤΥΛΙΑΝΟΣ","ΣΠΥΡΙΔΩΝΙΔΗΣ","ΠΕΡΙΚΛΗΣ","ΝΑΤ6157","6","0");
INSERT INTO vehicles VALUES("20","ΘΕΟΦΙΛΟΣ","ΣΠΥΡΙΔΩΝΙΔΗΣ","ΠΕΡΙΚΛΗΣ","ΝΗΟ1875","7","0");
INSERT INTO vehicles VALUES("12","BAΣΙΛΙΚΗ","ΑΛΕΤΡΑ","","ΝΕΖ1839","8","0");
INSERT INTO vehicles VALUES("13","ΘΩΜΑΣ","ΚΑΡΚΑΝΙΑΣ","","ΝΒΙ7370","9","0");
INSERT INTO vehicles VALUES("14","ΑΘΑΝΑΣΙΟΣ","ΡΕΣΤΕΜΗΣ","","ΝΕΚ9025","10","0");
INSERT INTO vehicles VALUES("15","ΓΕΩΡΓΙΟΣ","ΓΡΙΒΑΣ","","ΝΖΡ2647","11","0");
INSERT INTO vehicles VALUES("23","ΑΓΑΠΗ","ΣΟΛΑΝΑΚΗ","","ΝΖΑ8799","12","0");
INSERT INTO vehicles VALUES("24","ΠΑΣΧΑΛΗΣ","ΚΑΛΚΑΣΙΝΑΣ","","ΥΚΤ8189","13","0");
INSERT INTO vehicles VALUES("25","ΓΕΩΡΓΙΟΣ","ΚΑΖΑΝΤΖΙΔΗΣ","","ΝΜΡ592","14","0");
INSERT INTO vehicles VALUES("26","ΓΕΩΡΓΙΑ","ΚΟΨΑΧΕΙΛΗ","","ΝΒΤ5940","15","0");
INSERT INTO vehicles VALUES("27","ΑΘΑΝΑΣΙΟΣ","ΧΑΛΑΤΖΟΓΛΟΥ","","ΝΗΗ156","16","0");
INSERT INTO vehicles VALUES("28","","ΘΑΛΑΣΣΑ ΚΑΙ ΗΛΙΟΣ Α.Ε","","ΖΗΝ4544","17","0");
INSERT INTO vehicles VALUES("29","ΝΙΚΟΛΑΟΣ","ΤΣΙΑΛΤΑΣ","","ΝΗΕ1451","18","0");
INSERT INTO vehicles VALUES("30","ΠΑΝΑΓΙΩΤΗΣ","ΣΥΡΑΚΗΣ","","ΝΚΟ864","19","0");
INSERT INTO vehicles VALUES("31","ΜΑΡΙΑ","ΑΛΕΤΡΑ","","ΧΚΗ6806","20","0");
INSERT INTO vehicles VALUES("32","ΜΑΡΙΑ","ΤΣΟΥΡΜΑ","","ΝΖΗ1709","21","0");
INSERT INTO vehicles VALUES("33","ΝΙΚΟΛΑΟΣ","ΓΚΑΖΕΠΗΣ","","ΧΙΒ8560","22","0");
INSERT INTO vehicles VALUES("34","ΔΗΜΗΤΡΙΟΣ","ΔΗΜΟΚΙΔΗΣ","","ΝΕΒ946","23","0");
INSERT INTO vehicles VALUES("35","ΝΙΚΟΛΑΟΣ","ΣΥΡΑΚΗΣ","","ΝΜΝ483","24","0");
INSERT INTO vehicles VALUES("36","ΜΠΙΟΥ","ΕΥΔΟΚΙΑ","","ΝΖΑ8738","25","0");
INSERT INTO vehicles VALUES("37","ΘΕΟΔΩΡΟΣ","ΜΑΝΑΣΗΣ","","ΝΕΙ518","26","0");
INSERT INTO vehicles VALUES("38","ΣΙΑΚΚΑΣ","ΧΡΙΣΤΟΦΟΡΟΣ","","ΝΒΖ5848","27","0");
INSERT INTO vehicles VALUES("39","ΚΑΡΑΠΙΠΕΡΗΣ","ΔΗΜΗΤΡΙΟΣ","","ΖΗΖ5790","28","0");
INSERT INTO vehicles VALUES("40","ΔΕΣΠΟΙΝΑ","ΚΑΛΚΑΣΙΝΑ","","ΝΑΒ4619","29","0");
INSERT INTO vehicles VALUES("41","ΖΑΦΕΙΡΩ","ΟΙΚΟΝΟΜΟΥ","","ΝΖΕ2078","30","0");
INSERT INTO vehicles VALUES("42","ΘΕΟΔΩΡΟΣ","ΜΑΝΑΣΗΣ","","ΝΑΝ3343","31","0");
INSERT INTO vehicles VALUES("43","ΘΩΜΑΣ","ΤΕΡΖΟΠΟΥΛΟΣ","","ΗΜΤ444","32","0");
INSERT INTO vehicles VALUES("44","ΙΩΑΝΝΗΣ","ΔΗΜΗΤΡΙΟΥ","","ΝΗΡ8677","33","0");
INSERT INTO vehicles VALUES("45","ΧΡΗΣΤΟΣ","ΛΑΖΑΡΙΔΗΣ","","ΝΖΒ1092","34","0");
INSERT INTO vehicles VALUES("46","ΠΑΝΑΓΙΩΤΑ","ΤΟΥΠΛΙΚΙΩΤΗ","","ΝΗΝ4972","35","0");
INSERT INTO vehicles VALUES("47","ΣΤΕΦΑΝΟΣ","ΧΑΡΑΚΟΠΟΣ","","ΝΗΑ3681","36","0");
INSERT INTO vehicles VALUES("49","ΑΠΟΣΤΟΛΟΣ","ΚΑΜΠΟΥΡΙΔΗΣ","","ΝΗΤ2797","37","0");
INSERT INTO vehicles VALUES("50","ΥΠΕΡΜΑΧΙΑ","ΚΕΣΚΙΛΙΔΟΥ","","ΚΖΚ9766","38","0");
INSERT INTO vehicles VALUES("51","ΧΑΤΖΗΘΕΟΧΑΡΗΣ Π. ΚΑΙ ΥΙΟΣ ΟΕ","","","ΝΖΥ4724","39","0");
INSERT INTO vehicles VALUES("52","ΙΩΑΚΕΙΜ","ΣΜΥΡΛΗΣ","","ΝΗΟ5824","40","0");
INSERT INTO vehicles VALUES("53","ΑΘΑΝΑΣΙΟΣ","ΔΕΛΙΑΛΗΣ","","ΙΟΜ8903","53","9");
INSERT INTO vehicles VALUES("54","ΝΙΚΟΛΑΟΣ","ΠΑΠΑΧΡΗΣΤΟΥ","","ΝΜΖ374","42","0");
INSERT INTO vehicles VALUES("55","ΧΡΗΣΤΟΣ","ΛΑΖΑΡΙΔΗΣ","","110.03","43","0");
INSERT INTO vehicles VALUES("56","ΧΑΡΑΛΑΜΠΟΣ","ΜΑΝΘΟΣ","","ΕΡΧ175","44","0");
INSERT INTO vehicles VALUES("57","ΚΩΤΤΗΣ ΓΕΩΡ.-ΔΗΜ.ΜΑΛΑΜΑΤΑ Ο.Ε.","","","ΝΑΕ8309","45","0");
INSERT INTO vehicles VALUES("58","ΜΙΧΑΗΛ","ΛΑΜΠΡΙΑΚΟΣ","","ΝΖΗ3288","46","0");
INSERT INTO vehicles VALUES("59","ΔΗΜΗΤΡΗΣ","ΞΥΡΙΧΗΣ","ΧΡΗΣΤΟΣ","ΝΗΟ4491","47","0");
INSERT INTO vehicles VALUES("60","ΛΑΖΑΡΟΣ","ΣΙΔΕΡΑΣ","","ΝΒΝ4688","48","0");
INSERT INTO vehicles VALUES("61","ΙΩΣΗΦ","ΦΩΤΟΓΛΟΥ","","ΝΕΒ7859","49","0");
INSERT INTO vehicles VALUES("62","ΑΝΔΡΕΑΣ","ΚΑΡΑΓΙΑΝΝΙΔΗΣ","ΔΗΜΗΤΡΙΟΣ","ΝΗΜ3313","50","0");
INSERT INTO vehicles VALUES("63","ΚΑΛΛΙΟΠΗ","ΤΣΟΛΑΚΙΔΟΥ","","ΚΖΜ3730","51","0");
INSERT INTO vehicles VALUES("64","ΔΗΜΗΤΡΙΟΣ","ΞΥΡΙΧΗΣ","ΧΡΗΣΤΟΣ","","52","0");
INSERT INTO vehicles VALUES("65","ΧΡΥΣΟΥΛΑ","ΤΣΑΚΜΑΚΙΔΟΥ","ΒΡΕΤΟΣ","ΝΗΖ7713","0","0");
INSERT INTO vehicles VALUES("66","ΣΑΡΙΚΟΣ Ε.","ΠΑΝΤΕΛΙΔΗΣ Β.","","ΝΗΤ5794","54","0");
INSERT INTO vehicles VALUES("67","ΚΕΣΚΙΛΙΔΗΣ","ΚΟΣΜΑΣ","","ΗΚΕ3975","55","0");
INSERT INTO vehicles VALUES("68","ΧΡΗΣΤΟΣ","ΡΙΖΟΠΟΥΛΟΣ","ΚΥΡΙΑΚΟΣ","ΝΗΥ3781","56","0");
INSERT INTO vehicles VALUES("69","ΓΙΩΡΓΟΣ","ΛΥΚΕΣΑΣ","","ΝΕΖ5145","57","0");
INSERT INTO vehicles VALUES("70","ΑΛΕΞΑΝΔΡΟΣ","ΜΟΣΚΟΦΙΔΗΣ","ΓΕΩΡΓΙΟΣ","ΚΖΜ809","58","0");
INSERT INTO vehicles VALUES("71","ΒΑΙΑ","ΝΤΑΛΑΜΠΥΡΑ","","ΠΙΙ7704","59","0");
INSERT INTO vehicles VALUES("72","ΒΑΣΙΛΕΙΟΣ","ΑΠΟΣΤΟΛΟΥ","","ΝΕΖ9349","60","0");
INSERT INTO vehicles VALUES("73","ΓΡΗΓΟΡΙΟΣ","ΛΑΖΑΡΙΔΗΣ","ΧΡΗΣΤΟΣ","","61","0");
INSERT INTO vehicles VALUES("74","ΑΙΚΑΤΕΡΙΝΗ","ΛΙΤΑ","","ΝΗΙ6101","62","0");
INSERT INTO vehicles VALUES("75","ΖΑΦΕΙΡΑ","ΑΛΒΑΝΟΥ","","ΚΟΗ3029","63","0");
INSERT INTO vehicles VALUES("76","ΣΤΥΛΙΑΝΟΣ","ΓΙΟΦΤΣΗΣ","","ΝΗΜ5606","64","0");
INSERT INTO vehicles VALUES("77","ΣΑΡΙΚΟΣ Ε.","ΠΑΝΤΕΛΙΔΗΣ Β.","","ΓΕΝ.ΑΣΤ","0","0");
INSERT INTO vehicles VALUES("78","ΣΑΡΙΚΟΣ Ε.","ΠΑΝΤΕΛΙΔΗΣ Β.","","ΤΕΧΝ.ΑΣ","66","0");
INSERT INTO vehicles VALUES("79","ΓΡΗΓΟΡΗΣ","ΧΑΤΖΗΚΩΝΣΤΑΝΤΕΛΗΣ","","ΝΙΥ595","67","0");
INSERT INTO vehicles VALUES("80","ΙΩΑΝΝΗΣ","ΔΗΜΗΤΡΙΟΥ","ΚΩΝ/ΝΟΣ","ΚΟΗ2402","68","0");
INSERT INTO vehicles VALUES("81","ΑΝΝΑ","ΓΚΑΖΕΠΗ","ΧΡΗΣΤΟΣ","","69","0");
INSERT INTO vehicles VALUES("82","ΘΕΟΔΩΡΟΣ&ΑΝΑΣΤΑΣΙΑ","ΚΟΥΡΠΑΛΙΔΗΣ","ΜΥΡΩΔΗΣ","ΝΖΗ6340","70","0");
INSERT INTO vehicles VALUES("83","ΑΘΑΝΑΣΙΑ","ΑΛΒΑΝΟΥ ΑΧΠΑΡΑΚΗ","","ΝΗΒ4633","71","0");
INSERT INTO vehicles VALUES("84","ΚΩΝ/ΝΟΣ","ΚΑΡΚΑΝΙΑΣ","","ΝΕΗ6658","72","0");
INSERT INTO vehicles VALUES("85","ΣΤΥΛΙΑΝΟΣ","ΣΠΥΡΙΔΩΝΙΔΗΣ","ΠΕΡΙΚΛΗΣ","ΝΖΙ4578","73","0");
INSERT INTO vehicles VALUES("86","ΑΝΤΩΝΙΟΣ","ΣΠΑΝΟΣ","ΓΕΩΡΓΙΟΣ","ΙΝΑ267","74","0");
INSERT INTO vehicles VALUES("87","ΑΝΤΩΝΙΟΣ","ΣΠΑΝΟΣ","ΓΕΩΡΓΙΟΣ","","75","0");
INSERT INTO vehicles VALUES("88","ΘΩΜΑΣ","ΣΠΑΝΟΣ","ΓΕΩΡΓΙΟΣ","ΝΑΜ5518","76","0");
INSERT INTO vehicles VALUES("89","ΓΕΩΡΓΙΟΣ","ΡΙΖΟΠΟΥΛΟΣ","ΚΥΡΙΑΚΟΣ","ΝΖΙ1282","77","0");
INSERT INTO vehicles VALUES("90","ΚΥΡΙΑΚΟΣ","ΡΙΖΟΠΟΥΛΟΣ","","ΝΕΒ5726","78","0");
INSERT INTO vehicles VALUES("91","ΧΡΗΣΤΟΣ","ΜΑΝΘΟΣ","ΧΑΡΑΛΑΜΠΟΣ","ΕΡΖ7510","79","0");
INSERT INTO vehicles VALUES("92","ΔΗΜΗΤΡΙΟΣ","ΛΑΡΕΖΟΣ","","ΝΗΒ2237","80","0");
INSERT INTO vehicles VALUES("93","ΔΗΜ.ΚΑΡΑΓΙΝΝΙΔΗΣ &ΥΙΟΙ ΟΕ","","","ΝΙΕ247","81","0");
INSERT INTO vehicles VALUES("94","ΔΗΜ.ΚΑΡΑΓΙΝΝΙΔΗΣ &ΥΙΟΙ ΟΕ","","","ΧΚΗ559","82","0");
INSERT INTO vehicles VALUES("95","ΠΑΝΑΓΙΩΤΗΣ","ΠΑΠΑΔΑΚΗΣ","","ΝΕΥ3576","83","0");
INSERT INTO vehicles VALUES("96","ΑΘΑΝΑΣΙΟΣ","ΡΕΣΤΕΜΗΣ","","ΝΕΙ9933","84","0");
INSERT INTO vehicles VALUES("97","ΣΤΥΛΙΑΝΟΣ & ΕΛΕΝΗ","ΓΙΟΦΤΣΗΣ","","ΝΙΙ5478","85","0");
INSERT INTO vehicles VALUES("98","ΙΩΑΝΝΑ","ΚΑΡΚΑΝΙΑ","ΘΩΜΑΣ","ΝΙΜ9640","86","0");
INSERT INTO vehicles VALUES("99","ΙΩΑΚΕΙΜ","ΣΜΥΡΛΗΣ","","ΝΖΒ2285","87","0");
INSERT INTO vehicles VALUES("100","ΙΩΑΝΝΗΣ","ΚΡΗΤΙΚΟΣ","","ΝΗΕ1595","88","0");
INSERT INTO vehicles VALUES("101","ΘΕΟΔΩΡΟΣ","ΠΟΡΤΙΚΑΣ","","ΝΙΙ5087","89","0");
INSERT INTO vehicles VALUES("102","ΔΗΜ.ΚΑΡΑΓΙΝΝΙΔΗΣ &ΥΙΟΙ ΟΕ","","","ΝΗΖ5104","90","15");
INSERT INTO vehicles VALUES("103","ΔΗΜ.ΚΑΡΑΓΙΝΝΙΔΗΣ &ΥΙΟΙ ΟΕ","","","ΝΗΖ5105","91","0");
INSERT INTO vehicles VALUES("104","ΙΩΑΝΝΗΣ","ΠΟΙΜΕΝΙΔΗΣ","","ΝΕΙ5148","92","0");
INSERT INTO vehicles VALUES("105","ΕΛΙΣΑΒΕΤ","ΠΟΙΜΕΝΙΔΟΥ","","ΥΗΑ5606","93","0");
INSERT INTO vehicles VALUES("106","ΣΠΥΡΙΔΩΝ","ΖΑΖΟΠΟΥΛΟΣ","","ΝΑΚ3436","94","0");
INSERT INTO vehicles VALUES("107","ΜΙΧΑΗΛ","ΛΑΜΠΡΙΑΚΟΣ","","ΖΚΧ6371","95","0");
INSERT INTO vehicles VALUES("108","ΜΙΧΑΗΛ","ΛΑΜΠΡΙΑΚΟΣ","ΣΤΑΥΡΟΣ","ΝΗΕ5436","96","0");
INSERT INTO vehicles VALUES("109","ΜΙΧΑΗΛ","ΛΑΜΠΡΙΑΚΟΣ","ΣΤΑΥΡΟΣ","ΝΗΕ5436","97","0");
INSERT INTO vehicles VALUES("110","ΑΦΡΟΔΙΤΗ","ΑΙΒΑΤΙΑΔΟΥ","","ΝΙΙ5465","98","0");
INSERT INTO vehicles VALUES("111","ΛΑΜΠΡΙΑΚΟΥ ΑΦΟΙ & ΣΙΑ ΟΕ","","","ΝΖΕ5553","99","0");
INSERT INTO vehicles VALUES("112","ΧΡΗΣΤΟΣ","ΓΚΑΖΕΠΗΣ","","ΝΖΤ1374","100","0");
INSERT INTO vehicles VALUES("113","ΛΑΜΠΡΙΝΗ","ΒΑΣΙΛΕΙΟΥ","","ΝΒΤ4188","101","0");
INSERT INTO vehicles VALUES("114","ΟΛΓΑ","ΜΟΣΚΟΦΙΔΟΥ","ΓΕΩΡΓΙΟΣ","ΙΒΑ1189","102","0");
INSERT INTO vehicles VALUES("115","ΣΟΦΙΑ","ΓΑΛΗΝΟΥ","","ΚΟΚ2566","103","0");
INSERT INTO vehicles VALUES("116","ΜΑΡΙΑ","ΤΣΙΑΒΤΑΡΗ","","ΝΕΑ1352","104","0");
INSERT INTO vehicles VALUES("117","ΔΗΜΗΤΡΗΣ","ΜΑΝΘΟΣ","ΧΡΗΣΤΟΣ","ΕΡΜ5486","105","0");
INSERT INTO vehicles VALUES("118","ΔΗΜΗΤΡΗΣ","ΚΟΣΠΑΝΟΣ","","ΝΒΥ3165","106","0");
INSERT INTO vehicles VALUES("119","ΧΑΡΑΛΑΜΠΟΣ","ΜΟΣΚΟΦΙΔΗΣ","ΓΕΩΡΓΙΟΣ","ΕΒΗ4482","107","0");
INSERT INTO vehicles VALUES("120","ΑΛΕΞΑΝΔΡΟΣ","ΜΟΣΚΟΦΙΔΗΣ","ΓΕΩΡΓΙΟΣ","ΑΗΖ9550","0","12");
INSERT INTO vehicles VALUES("121","ΓΡΗΓΟΡΗΣ","ΣΩΣΗΣ","","ΝΒΤ9388","109","0");
INSERT INTO vehicles VALUES("122","ΣΟΦΙΑ","ΓΑΛΗΝΟΥ","","ΝΖΤ1227","110","0");
INSERT INTO vehicles VALUES("123","ΠΑΝ.ΧΑΤΖΗΘΕΟΧΑΡΗΣ & ΥΙΟΣ ΟΕ","","","ΝΖΖ2795","111","0");
INSERT INTO vehicles VALUES("124","ΓΡΗΓΟΡΗΣ","ΧΑΤΖΗΚΩΝΣΤΑΝΤΕΛΗΣ","","ΚΖΜ176","112","0");
INSERT INTO vehicles VALUES("125","ΖΗΝΟΒΙΑ","ΣΥΡΑΚΗ","","ΝΑΥ7772","113","0");
INSERT INTO vehicles VALUES("126","ΛΑΜΠΡΙΑΚΟΥ ΑΦΟΙ & ΣΙΑ ΟΕ","","","ΝΖΗ4871","114","0");
INSERT INTO vehicles VALUES("127","ΑΡΓΥΡΗΣ","ΚΑΚΑΒΑΝΟΣ","","ΝΗΒ4032","115","0");
INSERT INTO vehicles VALUES("128","ΔΗΜΗΤΡΗΣ","ΚΑΡΑΓΙΑΝΝΙΔΗΣ","","ΝΖΧ392","116","0");
INSERT INTO vehicles VALUES("129","ΕΥΣΤΡΑΤΙΟΣ","ΚΟΥΡΒΑΖΕΛΗΣ","","ΝΕΖ8855","117","0");
INSERT INTO vehicles VALUES("130","ΠΑΝΑΓΙΩΤΗΣ","ΣΥΡΑΚΗΣ","ΣΟΦΟΚΛΗΣ","ΚΟΗ6699","118","0");
INSERT INTO vehicles VALUES("131","ΧΡΗΣΤΟΣ","ΛΑΖΑΡΙΔΗΣ","","ΝΗΕ670","119","0");
INSERT INTO vehicles VALUES("132","ΤΑΤΙΑΝΑ","ΝΙΚΗΤΙΔΟΥ","","ΝΖΟ2305","120","0");
INSERT INTO vehicles VALUES("133","ΧΑΡΑΛΑΜΠΟΣ","ΝΤΑΡΕΤΖΗΣ","","ΑΗΑ2307","121","0");
INSERT INTO vehicles VALUES("134","ΔΗΜΗΤΡΗΣ","ΓΑΛΗΝΟΣ","ΑΘΑΝΑΣΙΟΣ","ΝΗΚ7756","122","0");
INSERT INTO vehicles VALUES("135","ΜΙΧΑΗΛ","ΛΑΜΠΡΙΑΚΟΣ","","ΝΕΝ3778","123","0");
INSERT INTO vehicles VALUES("136","ΣΤΥΛΙΑΝΟΣ","ΣΑΜΑΡΑΣ","","ΝΑΤ9555","124","0");
INSERT INTO vehicles VALUES("137","ΜΙΧΑΗΛ","ΛΑΜΠΡΙΑΚΟΣ","","ΚΟΗ9644","125","0");
INSERT INTO vehicles VALUES("138","AΡΙΣΤΕΙΔΗΣ","ΧΑΤΖΗΣΤΕΦΑΝΟΥ","","ΡΒ9718","126","0");
INSERT INTO vehicles VALUES("139","ΘΕΟΔΩΡΟΣ","ΓΙΟΦΤΣΗΣ","","ΝΙΙ612","127","0");
INSERT INTO vehicles VALUES("140","ΙΩΑΚΕΙΜ","ΣΜΥΡΛΗΣ","","ΝΗΗ3720","128","0");
INSERT INTO vehicles VALUES("141","ΕΛΕΝΗ","ΣΙΑΚΑ","","ΖΚΕ7376","129","0");
INSERT INTO vehicles VALUES("142","ΝΙΚΟΛΑΟΣ","ΣΥΡΑΚΗΣ","ΣΟΦΟΚΛΗΣ","","130","0");
INSERT INTO vehicles VALUES("143","ΔΕΣΠΟΙΝΑ","ΤΟΚΑΤΛΙΔΟΥ","","ΝΖΚ4869","131","0");
INSERT INTO vehicles VALUES("144","ΑΓΑΠΗ","ΣΟΛΑΝΑΚΗ","","ΝΖΤ2134","132","0");
INSERT INTO vehicles VALUES("145","ΜΙΧΑΗΛ","ΛΑΜΠΡΙΑΚΟΣ","","ΝΗΝ7134","133","0");
INSERT INTO vehicles VALUES("146","ΣΩΤΗΡΙΟΣ","ΣΙΑΚΑΣ","ΧΡΙΣΤΟΦΟΡΟΣ","ΖΚΟ8692","134","0");
INSERT INTO vehicles VALUES("147","ΑΘΑΝΑΣΙΟΣ","ΝΙΚΟΛΑΚΑΚΗΣ","","ΝΗΚ3649","135","0");
INSERT INTO vehicles VALUES("148","ΔΗΜΗΤΡΙΟΣ","ΚΟΣΠΑΝΟΣ","","ΝΒΚ579","136","0");
INSERT INTO vehicles VALUES("149","ΚΩΝ/ΝΟΣ","ΣΩΣΗΣ","ΓΡΗΓΟΡΗΣ","ΝΒΗ7532","137","0");
INSERT INTO vehicles VALUES("150","ΔΗΜΗΤΡΗΣ","ΚΑΡΑΓΙΑΝΝΙΔΗΣ","","ΝΕΖ7884","138","0");
INSERT INTO vehicles VALUES("151","ΓΕΩΡΓΙΟΣ","ΜΙΧΑΗΛΙΔΗΣ","","ΚΙΕ4022","139","0");
INSERT INTO vehicles VALUES("152","ΓΕΩΡΓΙΟΣ","ΜΙΧΑΗΛΙΔΗΣ","","ΥΕΖ9667","140","0");
INSERT INTO vehicles VALUES("153","ΚΕΡΑΣΑ","ΙΝΤΖΕ","","ΝΒΝ8594","141","0");
INSERT INTO vehicles VALUES("154","ΚΩΝ/ΝΟΣ","ΤΣΟΥΡΜΑΣ","","ΝΒΡ8802","142","0");
INSERT INTO vehicles VALUES("155","ΟΛΥΜΠΙΑ","ΛΑΡΕΖΟΥ","","ΝΖΕ8523","143","0");
INSERT INTO vehicles VALUES("156","ΣΩΤΗΡΗΣ","ΓΚΟΥΛΙΑΜΑΚΗΣ","","ΝΒΧ9377","144","0");
INSERT INTO vehicles VALUES("157","ΒΑΡΒΑΡΑ","ΤΕΤΗ","","ΝΗΒ4367","145","0");
INSERT INTO vehicles VALUES("158","ΦΙΛΙΠΠΟΣ","ΤΣΙΚΟΥΛΗΣ","","ΝΚΥ170","146","0");
INSERT INTO vehicles VALUES("159","ΘΩΜΑΣ","ΣΠΑΝΟΣ","","ΒΑΕ4524","147","0");
INSERT INTO vehicles VALUES("160","ΠΑΝ.ΧΑΤΖΗΘΕΟΧΑΡΗΣ & ΥΙΟΣ ΟΕ","","","ΝΙΚ756","148","0");
INSERT INTO vehicles VALUES("161","ΠΑΝ.ΧΑΤΖΗΘΕΟΧΑΡΗΣ & ΥΙΟΣ ΟΕ","","","ΒΑΕ6822","149","0");
INSERT INTO vehicles VALUES("162","ΠΑΝ.ΧΑΤΖΗΘΕΟΧΑΡΗΣ & ΥΙΟΣ ΟΕ","","","ΝΙΚ757","150","0");



