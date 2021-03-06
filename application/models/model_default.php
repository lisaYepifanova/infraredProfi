<?php

class Model_Default extends Model {
  public function get_data() {

    include 'application/connection.php';

    /*

        $query = $mysqli->query("DROP TABLE product_principle");
       $upd = $mysqli->query($query);

       $q = "CREATE TABLE IF NOT EXISTS `product_principle` (".
         "`id` int(11) NOT NULL,  `image` varchar(45) DEFAULT NULL,  `title` varchar(45) DEFAULT NULL,  `description` text,".
         "`product_id` varchar(45) DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

       $query = $mysqli->query($q);
       $upd = $mysqli->query($query);

       $query = $mysqli->query("INSERT INTO `product_principle` (`id`, `image`, `title`, `description`, `product_id`) VALUES".
         "(1, 'product-thermostat/item2.png', 'ZWEI RAUMHEIZPRINZIPIEN:', '- Infrarot W&auml;rmestrahlung <br>- Nat&uuml;rliche Konvektion\n', '1'),".
    "(2, 'product-thermostat/item_decken.png', 'RAUMHEIZPRINZIPIEN:', 'Infrarot W&auml;rmestrahlung', '2'),".
    "(3, 'product-thermostat/item2.png', 'ZWEI RAUMHEIZPRINZIPIEN:', '- Infrarot W&auml;rmestrahlung <br>- Nat&uuml;rliche Konvektion', '3'),".
    "(4, 'product-thermostat/item2.png', 'ZWEI RAUMHEIZPRINZIPIEN:', '- Infrarot W&auml;rmestrahlung <br>- Nat&uuml;rliche Konvektion', '4'),".
    "(5, 'product-thermostat/item3.png', 'DREI RAUMHEIZPRINZIPIEN:', '<p>- Infrarot W&auml;rmestrahlung<br><br>- Nat&uuml;rliche Konvektion<br><br>- W&auml;rmespeicher<br><br></p>', '5'),".
    "(6, 'product-thermostat/item2.png', 'ZWEI RAUMHEIZPRINZIPIEN:', '- Infrarot W&auml;rmestrahlung <br>- Nat&uuml;rliche Konvektion', '6'),".
    "(7, 'product-thermostat/item_decken.png', 'RAUMHEIZPRINZIPIEN:', 'Infrarot W&auml;rmestrahlung', '7'),".
    "(8, 'product-thermostat/item_decken.png', 'RAUMHEIZPRINZIPIEN:', 'Infrarot W&auml;rmestrahlung', '8')");
       $upd = $mysqli->query($query);




       ////////////////////////////////
           $query = $mysqli->query("DROP TABLE product_thermostat");
       $upd = $mysqli->query($query);

       $q = "CREATE TABLE IF NOT EXISTS `product_thermostat` (".
         "`id` int(11) NOT NULL, `image` varchar(45) DEFAULT NULL, `title` varchar(45) DEFAULT NULL,".
         " `description` text, PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

       $query = $mysqli->query($q);
       $upd = $mysqli->query($query);

       $query = $mysqli->query("INSERT INTO `product_thermostat` (`id`, `image`, `title`, `description`) VALUES "."
    (1, 'product-thermostat/item_thermostat.png', 'OPTIONAL:', 'Auch mit eingebautem programmierbarem Thermostat erh&auml;ltlich.<br>Damit  k&ouml;nnen Sie die W&auml;rme individuell regulieren und zeitlich programmieren.');");
       $upd = $mysqli->query($query);

        ////////////////////////////////
        /// PRODUCTS
        ///

               $query = $mysqli->query("DROP TABLE products");
       $upd = $mysqli->query($query);

       $q = "CREATE TABLE IF NOT EXISTS `products` (".
         " `id` int(11) NOT NULL, `name` varchar(45) DEFAULT NULL, `parent_id` varchar(45) DEFAULT NULL, ".
         " `image` text, `title` varchar(45) DEFAULT NULL, `description` text, `short_description` text, ".
         " `category_size_id` varchar(45) DEFAULT NULL, `has_thermostat` varchar(45) DEFAULT NULL, ".
         " `size_markup` longtext, `has_height` varchar(45) DEFAULT NULL, `ord` int(11) DEFAULT NULL, ".
         " `isInPriceList` int(11) DEFAULT '1', PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

       $query = $mysqli->query($q);
       $upd = $mysqli->query($query);

       $query = $mysqli->query("INSERT INTO `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `short_description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`) VALUES ".
         "(1, 'badheizungen', '0', 'products/bad/main.jpg', 'BADHEIZUNGEN', '<p>Mit der Infrarot Glaskeramik Handtuchtrockner <b>Modellreihe HGlass GHT</b> inklusive Raumheizung Funktion, bekommen Sie nicht nur angenehme W&auml;rme in Ihr Badezimmer, sondern auch ein vorgew&auml;rmtes Badehandtuch. Unsere Infrarot Handtuchtrockner bieten Wellness-W&auml;rme durch den Infrarot-Tiefenw&auml;rmeeffekt, au&szlig;erdem sind sie hervorragende W&auml;rmequellen f&uuml;r ein warmes Bad und warme Handt&uuml;cher nach dem Duschen und Baden oder in der K&uuml;che, wenn eine kleine Heizung f&uuml;r die Geschirrhandt&uuml;cher fehlt … Dank Schutzgrad IP44 ist der Glaskeramik Handtuchtrockner f&uuml;r Feuchtr&auml;ume und damit u.a. geeignet f&uuml;r einen Einsatz in Ihrem Badezimmer. Er kann in jedem Badezimmer an der Wand montiert werden.<br><br>Die Handtuchhalterungen bestehen aus geb&uuml;rsteten Edelstahl, dies verleiht der Heizung eine zeitlose und edle Optik. Alle Infrarot Handtuchtrockner sind mit einem Stecker versehen und somit universell einsetzbar. Bei Ihnen zu Hause angekommen, m&uuml;ssen Sie den Handtuchtrockner nur noch mit den mitgelieferten Halterungen an der Wand befestigen, am Strom anschlie&szlig;en und schon f&auml;ngt der Infrarot Handtuchtrockner an zu heizen. <br><br>Die Glaskeramik HGlass Infrarotheizung ist nur 8 mm flach wie bei modernen LCD-Fernseher und l&auml;sst sich mit wenigen Handgriffen schnell an der Wand montieren. Auch wenn er montiert ist, h&auml;ngt die Infrarotheizung nur ungef&auml;hr 4 cm von der Wand entfernt. Die Oberfl&auml;chentemperatur betr&auml;gt etwa 80-85&deg; C. Das Ber&uuml;hren der Oberfl&auml;che ist ohne weiteres m&ouml;glich. Ein Verbrennen ist ausgeschlossen, da die W&auml;rmeleitf&auml;higkeit von Glaskeramik wesentlich geringer ist. So ist das Ger&auml;t selbst f&uuml;r Kleinkinder und Tiere absolut ungef&auml;hrlich. <br><br>Die Infrarotheizung hat ein sehr edles Design und durch die qualitative Verarbeitung von hochwertigen Materialien hat sie h&ouml;chste Qualit&auml;t, was sich bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Glaskeramik Heizung ist nahezu unbegrenzt und die Heizelemente sind fast verschlei&szlig;frei. Eine besonders hohe Energieeffizienz von 98 % spart Ihnen wertvolle Energiekosten und macht die Infrarotheizung besonders widerstandsf&auml;hig und langlebig.<br><br>Die Glaskeramikfront ist in wei&szlig;, schwarz, Spiegel oder mit einem Motiv rahmenlos und mit einen hochwertigen Rundschliff (C-Schliff) versehen. Die Bilder auf den Ger&auml;ten sind besonders hochaufl&ouml;send und werden durch spezielle UV Druckverfahren auf die Infrarotheizungen bedruckt.<br><br>Durch den sog. „Crumble Effekt“ wird die Verletzungsgefahr bei Bruch der Glaskeramik verhindert.<br><br>Die Installation und Montage der Infrarotheizungen funktioniert kinderleicht. Einfach das Infrarotpaneel an der Wand befestigen, Netzstecker einstecken und schon heizt es.</p><br><br><br><br><p><b>Produktmerkmale:</b><br><br>- Frontfl&auml;che aus hochwertigem 6 mm Glaskeramik<br><br>- die Handtuchhalterungen aus geb&uuml;rsteten Edelstahl<br><br>- Rundschliff an den Kanten<br><br>- spezielles Heizelement mit beidseitiger Abstrahlung<br><br>- rahmenloses Design<br><br>- hoher Wirkungsgrad: 70-75 % Infrarotstrahlung, 25-30 % Konvektion<br>\n- lange Lebensdauer da keine beweglichen Teile<br><br>- elektrischer Anschluss: Das HGlass Heizpaneel ist mit einem Stecker ausgestattet<br><br>- auch mit programmierbaren Thermostat erh&auml;ltlich</p><br>\n<p>Das Einsparpotential bei Anschaffung einer Infrarotheizung gegen&uuml;ber zu &Ouml;l-, Gas-, Holzheizungen ist enorm, der laufende Energieverbrauch um ein Vielfaches geringer. Keine Entstehung von Feinstaub oder CO², keine Energieverluste, keine Schimmelgefahr, besserer D&auml;mmwert, keine st&ouml;rende Ger&auml;usche- oder Geruchsbel&auml;stigung.<br>\nIn R&auml;umen in denen es zu hoher Luftfeuchtigkeit kommt, wie z. Beispiel ein Badezimmer, dimensionieren Sie die Leistung doppelt. Sie erleben dadurch ein Badevergn&uuml;gen wie am Meer. Sie frieren trotz nasser Haut nicht. Das ist auch der Vorteil einer Infrarotheizung.</p>\n\n<p><i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glaskeramikheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i>\n</p>', '', 'bad_heizungen', '1', '<div class=\"rectangle-wrapper\" style=\"height: 240px\">    \n <div id=\"row1\" class=\"rectangle\"\n               style=\"width:120px;height:240px;bottom:0;left:0;\">\n            600x1200\n          </div>\n\n          <div id=\"row2\" class=\"rectangle\"\n               style=\"width:100px;height:200px;bottom:0;left:120px;\">\n               500x1000\n          </div>\n\n          <div id=\"row3\" class=\"rectangle\"\n               style=\"width:100px;height:140px;bottom:0;left:220px;\">\n            500x700\n          </div>\n</div>', '0', 4, 1),".
         "(2, 'deckenheizungen', '0', 'products/deckenheizungen/main.jpg', 'DECKENHEIZUNGEN', '<p>F&uuml;hlen Sie sich wie bei einem angenehmen Sonnenbad – die Infrarot-Heizung simuliert Sonnenw&auml;rme und heizt gezielt und schnell den Bereich, in dem Sie sich aufhalten. Die kompakte Deckenheizung ist mit 62 x 62 cm genau passend f&uuml;r die Montage in Raster- und Kassettendecken.<br>\nBei der Infrarot-Heizung muss nicht langwierig und ineffizient die gesamte Raumluft erw&auml;rmt werden, es werden nur die bestrahlten Objekte erw&auml;rmt. Ein weiterer Vorteil, besonders f&uuml;r Allergiker, ist die hier entfallende Luftumw&auml;lzung – so wird kein Staub in der umgew&auml;lzten Raumluft transportiert. <br>\nDie Infrarotheizungen sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, mit einer Effizienz von bis zu 99 %. Infrarotheizungen verbrauchen bis zu 25% weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotheizungen sehr viel sicherer als gasbetriebene Systeme. Durch die kleine Bauweise und das geringe Gewicht sind Infrarotpaneele die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden.<br>\nInfrarotheizungen sind im Betrieb absolut emissionsfrei und umweltfreundlich. Und sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie eine Heizung, die im Betrieb absolut kein CO2 ausst&ouml;&szlig;t und damit 100% klimaneutral arbeitet.<br>\nDie Heizung erw&auml;rmt durch Infrarotstrahlen in nur wenigen Minuten den ausgerichteten Bereich und ist dabei weder zu riechen, zu h&ouml;ren noch durch Licht zu sehen. Insbesondere der hohe Wirkungsgrad in Verbindung mit einem verh&auml;ltnism&auml;&szlig;ig geringen Stromverbrauch zeichnen unsere Infrarotheizungen aus. <br>\n<b>PRODUKTMERKMALE:</b><br>\n- angenehme, wohlige W&auml;rme<br>\n- hoher Wirkungsgrad (99 % !), kaum W&auml;rmeverlust<br>\n- vielseitig einsetzbar<br>\n- sicherer Aufbau mit D&auml;mmstoff und Reflektor-Lage<br>\n- sehr flache Bauform, passt auch in 62,5 cm Raster- und Kassettendecken mit Standard<br>\n- einfache Installation, sofort betriebsbereit, sehr schnelle W&auml;rmeerzeugung<br>\n- ideal als Voll oder Zonenheizung anwendbar<br>\n- integrierter &Uuml;berhitzungsschutz<br>\n- hohe Kosten- und Energieersparnis gegen&uuml;ber herk&ouml;mmlichen Elektroheizungen</p>\n\n<p>Die Deckenheizungen sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Wohnbereiche<br>\n- B&uuml;rogeb&auml;ude<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i>\n</p>', '', 'decken-heizungen', '0', '<div class=\"rectangle-wrapper\" style=\"height: 248px\">     \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:124px;height:124px;bottom:124px;left:0;\">\n            620x620\n          </div>\n\n          <div id=\"row2\" class=\"rectangle\"\n               style=\"width:248px;height:124px;bottom:0;left:0;\">\n               1240x620\n          </div>\n</div>', '0', 6, 1), ".
         "(3, 'transparente-glasheizungen', '0', 'products/glass/main.jpg', 'TRANSPARENTE GLASHEIZUNGEN', '<p><b>Glas Infrarotheizung P750G-Visio</b> ist die optimale L&ouml;sung f&uuml;r diejenigen, die Wert auf moderne High-Performance-Technologie, geringen Stromverbrauch und stilvolles Design legen. Das Glasinfrarotpaneel besteht aus sehr festem Sicherheitsglas mit einer St&auml;rke von 8 mm. Dies ist die einzige absolut transparente Infrarotheizung. Verchromte Endkappen und Abdeckleisten verleihen dem Ger&auml;t eine besondere Eleganz, sodass diese Infrarotheizung in jeden Raum passt: ein privates Haus oder eine Wohnung, B&uuml;ro, Shop, Studio, Restaurant, Hotel usw.<br>\nDie Infrarot Glasheizung P750G–VISIO hat neben dekorativen Eigenschaften auch hervorragende technische Eigenschaften. Auf das Glas wird eine spezielle transparente Beschichtung aufgetragen, w&auml;hrend durch sie elektrischer Strom flie&szlig;t entsteht eine W&auml;rmeenergie, die das Glaspaneel erw&auml;rmt, solange das Glas selbst Infrarotw&auml;rme abstrahlt. Und weil das Glas sich 2 — 3 mal langsamer abk&uuml;hlt als das Metall, wird eine komfortable effiziente Beheizung des Raumes und ein &auml;u&szlig;erst niedriger Stromverbrauch erreicht.<br>\nSie kann nicht nur als Komplett-Heizsystem bzw. Vollheizung eingesetzt werden, sondern auch als Zusatzheizung, Teilheizung oder &Uuml;bergangsheizung. Durch das Anwenden von Strahlungsw&auml;rme schonen Sie zudem auch Ihren Geldbeutel, denn Sie k&ouml;nnen hierdurch bis zu 65% an Stromkosten im Vergleich zu herk&ouml;mmlichen Heizsystemen sparen, da die Ger&auml;te eine sehr gute Energieeffizienz haben. <br>\nWir empfehlen die Infrarotheizungen mit einem Thermostat zu betreiben, um die maximale Energieeffizienz zu erreichen.<br>\nUnsere Infrarotheizungen werden komplett anschlussfertig mit einen ca. 1,5 m langem Anschlusskabel mit Stecker und Wandhalterungen ausgeliefert. <br>\n<b>Produktmerkmale:</b><br>\n— einzigartige patentierte Technologie<br>\n— Frontfl&auml;che aus hochwertigem transparentem Glas<br>\n— AESI Edelstahl<br>\n— spezielles Heizelement mit beidseitiger Abstrahlung<br>\n— rahmenloses Design<br>\n— Wandmontage<br>\n— hoher Wirkungsgrad: 70-75 % Infrarotstrahlung, 25-30 % Konvektion<br>\n--- lange Lebensdauer da keine beweglichen Teile<br>\n— elektrischer Anschluss: Das Glas Heizpaneel ist mit einem Stecker ausgestattet<br>\n— Wandabstand 40 mm</p>\n\n<p><b><u>Montagehinweis:</u><br>\nDie Paneele sind ausschlie&szlig;lich f&uuml;r die Wandmontage bestimmt.<br>\nEine Montage an der Decke ist nicht m&ouml;glich!</b><br>\nDer Abstand der Unterkante des Heizger&auml;tes vom Fu&szlig;boden muss 50 bis 150 mm betragen, es werden 100 mm empfohlen. Der Seitenabstand, z.B. von M&ouml;beln muss mindestens 100 mm betragen. In Badezimmern ist die Heizplatte in &Uuml;bereinstimmung mit der Norm VDE 100 / T701 zu installieren. Durch das geringe Gewicht ist die Montage einfach durchzuf&uuml;hren. Die Platte darf nicht direkt unter der Anschlussdose angebracht werden.<br>\nSetzen Sie gestalterische Akzente und erhalten Sie zudem eine h&ouml;chst effiziente und gesunde Heizung. Die Infrarotheizung ist wegen steigenden &Ouml;l und Gaspreisen und der vielf&auml;ltigen Einsatzm&ouml;glichkeiten, die wohl genialste und attraktivste L&ouml;sung f&uuml;r eine warme Umgebung. </p>\n\n<p><i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i></p>', '', 'glas-heizungen', '0', '<div class=\"rectangle-wrapper\" style=\"height: 120px\">     \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:180px;height:120px;bottom:0;left:0;\">\n            900x600\n          </div>\n</div>', '0', 2, 1),".
         "(4, 'glasheizungen', '0', 'products/glasskeramik/main.jpg', 'GLASHEIZUNGEN ', '<p>Hier verbindet sich Sparsamkeit und Glasdesign in einem Ger&auml;t. Die Infrarotheizungen der <b>Modellreihe HGlass</b> sind einzigartige Heizpaneele, energiesparend, g&uuml;nstig in der Anschaffung und zudem langlebige Infrarot Heizk&ouml;rper. Die modernen Glaskeramik Infrarotheizungen sind nicht nur ausgezeichnete W&auml;rmelieferanten, sondern auch ein toller Blickfang. Glaskeramikpaneele sind vor allem f&uuml;r die Beheizung von modernen Innenr&auml;umen (Wohn-, Kinder-, Schlafzimmer und B&uuml;ros) bestimmt, in denen sie nicht nur die Funktion eines Heizger&auml;ts erf&uuml;llen, sondern sie k&ouml;nnen auch zu einem bedeutenden Designelement werden. Mit der Schutzklasse IP 44 (Spritzwasser gesch&uuml;tzt) k&ouml;nnen die Paneele auch im Badezimmer eingesetzt werden. Die Glaskeramik Infrarotheizung HGlass ist 8 mm d&uuml;nn wie moderne LCD-Fernseher und l&auml;sst sich mit wenigen Handgriffen schnell an der Wand montieren. Auch wenn sie montiert ist, h&auml;ngt die Infrarotheizung nur ungef&auml;hr 4 cm von der Wand entfernt. Die Oberfl&auml;che besteht aus einer besonders robusten Glaskeramik und die Oberfl&auml;chentemperatur betr&auml;gt etwa 80-85&deg; C. Das Ber&uuml;hren der Oberfl&auml;che ist ohne weiteres m&ouml;glich. Ein Verbrennen ist ausgeschlossen, da die W&auml;rmeleitf&auml;higkeit von Glaskeramik wesentlich geringer ist. So ist das Ger&auml;t selbst f&uuml;r Kleinkinder und Tiere absolut ungef&auml;hrlich.<br>\nDie Infrarotheizung hat ein sehr edles Design, und durch die Verarbeitung von hochwertigen Materialien die h&ouml;chste Qualit&auml;t, was sich bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Glaskeramik Heizung ist nahezu unbegrenzt und die Heizelemente sind fast verschlei&szlig;frei. Eine besonders hohe Energieeffizienz von 98 % spart Ihnen wertvolle Energiekosten und macht die Infrarotheizung besonders widerstandsf&auml;hig und langlebig.<br>\nDie Glaskeramikfront ist in wei&szlig;, schwarz, als Spiegel oder mit einem Motiv rahmenlos und mit einem hochwertigem Rundschliff (C-Schliff) versehen. Die Bilder auf den Ger&auml;ten sind besonders hochaufl&ouml;send und werden durch spezielle UV Druckverfahren auf die Infrarotheizungen bedruckt.<br>\nDurch den sog. „Crumble Effekt“ wird die Verletzungsgefahr bei Bruch der Glaskeramik verhindert.<br>\nDie Installation und Montage der Infrarotheizungen funktioniert kinderleicht. Einfach Infrarotpaneel an der Wand befestigen, Netzstecker einstecken und losgeht es. <br>\n<b>Produktmerkmale:</b><br>\n- Vorderseite aus hochwertigem Glaskeramik<br>\n- Rundschliff an den Kanten<br>\n- spezielles Heizelement mit beidseitiger Abstrahlung<br>\n- rahmenloses Design<br>\n- hoher Wirkungsgrad dank zwei Heizprinzipien: 70-75 % Infrarotstrahlung, 25-30 % Konvektion<br>\n- lange Lebensdauer da keine beweglichen Teile<br>\n- elektrischer Anschluss: Das HGlass Heizpaneel ist mit einem Stecker ausgestattet<br>\n- vertikale und horizontale Montage m&ouml;glich</p>\n\n<p><i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glaskeramikheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter</i>\n</p>', '', 'glaskeramik-heizungen', '1', '<div class=\"rectangle-wrapper\" style=\"height: 317px\">  \n <div id=\"row7\" class=\"rectangle\"\n               style=\"width:83px;height:117px;bottom:200px;left:0;\">\n            500x700\n  </div>\n   <div id=\"row6\" class=\"rectangle\"\n               style=\"width:100px;height:100px;bottom:200px;left:83px;\">\n            600x600\n  </div>\n   <div id=\"row5\" class=\"rectangle\"\n               style=\"width:67px;height:134px;bottom:167px;left:183px;\">\n            400x800\n  </div>\n   <div id=\"row4\" class=\"rectangle\"\n               style=\"width:67px;height:167px;bottom:0;left:250px;\">\n            400x1000\n  </div>\n   <div id=\"row3\" class=\"rectangle\"\n               style=\"width:67px;height:200px;bottom:0;left:100px;\">\n            400x1200\n  </div>\n   <div id=\"row2\" class=\"rectangle\"\n               style=\"width:83px;height:167px;bottom:0;left:167px;\">\n            500x1000\n  </div>\n   <div id=\"row1\" class=\"rectangle\"\n               style=\"width:100px;height:200px;bottom:0;left:0;\">\n            600x1200\n  </div>\n  </div>', '0', 3, 1),".
         "(5, 'premium-hybrid-system', '0', 'products/premium/main.jpg', 'PREMIUM HYBRID SYSTEM', '<h4><i>Der Kauf einer Infrarotheizung von der Stange ist ein Kompromiss. Mal stimmt die Gr&ouml;&szlig;e, mal das Material, mal die Leistung. SO GUT WIE NIE STIMMT ALLES.</i></h4>\n<p>\nInfrarot Heizungssysteme gelten heute als wahre Alternative zu konventionellen, Wasserbasierten Heizsystemen.<br>\nDas neue <b>Premium Hybrid System</b> von INFRARED PROFI - eine echte Hybridheizung f&uuml;r ein Maximum an Energieeffizienz. Infrared Profi hat mit der neuen Hybridheizung ein ganz neues Produkt auf den Markt gebracht, welches es bislang weder als Infrarotheizung noch als Konvektionsheizung gab.<br>\nDie Infrarot-Hybridheizung von Infrared Profi ist der erste Mix aus mehreren Heizprinzipien: ( eine Kombination der besten Eigenschaften und Vorteilen einer Infrarotheizung, gepaart mit den besten Eigenschaften einer Konvektionsheizung und W&auml;rmespeicher aus Glaskeramik ): Den wirtschaftlichen Betrieb einer Infrarotheizung, die h&ouml;here Dynamik gegen&uuml;ber &Ouml;l-, Gas-, Holzheizungen, sowie die F&auml;higkeit die W&auml;rme zu speichern. <br>\nDas Einsparpotential bei der Anschaffung ist, im Gegensatz zu herk&ouml;mmlichen Heizsystemen, enorm und der laufende Energieverbrauch um ein Vielfaches geringer. <br>\nDenn nur moderne Hybrid Infrarotheizungen gelten, aufgrund ihres technischen Aufbaus und dem Einsatz von 15 mm Glaskeramik W&auml;rmespeicher, als vollwertige Raumheizung in Wohn- und Arbeitsr&auml;umen.<br>\nVorteile gegen konventionellen Heizsystemen und reine Elektroheizung: h&ouml;here Wirkungsgrad, Effizienz, wohlige W&auml;rme und das alles durch W&auml;rmespeicher Einsatz aus Glaskeramik.<br>\nPremium Hybrid Infrarotheizung &uuml;berzeugt durch einen vergleichsweise hohen Wirkungsgrad, geringen Platzbedarf und niedrige Anschaffungskosten. Eine Premium Hybrid Infrarotheizung erzeugt die W&auml;rme dort, wo Sie sie brauchen – also ohne Brennkessel im Keller und ohne Wasserleitungen in der Wand. Dazu kommt: F&uuml;r Allergiker und Asthmatiker sind Infrarotheizungen ideale W&auml;rmequellen. Es entsteht kein Feinstaub oder CO², keine Energieverluste, keine Schimmelgefahr, besserer D&auml;mmwert, keine st&ouml;rende Ger&auml;usche- oder Geruchsbel&auml;stigung. Die Luftfeuchtigkeit bleibt konstant erhalten. <br>\nAuch gro&szlig;e Unterschiede sind in der W&auml;rmeverteilung und in der Energieeffizienz. Infrarot Premium Hybrid Heizungssystem erzeugt eine gleichm&auml;&szlig;ige W&auml;rmeverteilung im Raum und die Oberfl&auml;che der Premium Hybrid Heizung bleibt angenehm warm, wird aber niemals w&auml;rmer als 85&deg; Grad, so dass bei einer Ber&uuml;hrung keiner Verletzungs- und Verbrennungsgefahr entsteht. Sie sind f&uuml;r alle Wohn- und Arbeitsr&auml;ume geeignet.<br>\nDass neue Premium Hybrid System von Infrared Profi hat lediglich eine Bautiefe von nur 4,5 cm und dies trotz der idealen Konvektionseigenschaften mit Kamineffekt. Das Gesamtgeh&auml;use der Infrarot-Hybridheizung ist hochwertig aus wei&szlig; oder schwarz pulverbeschichtetem Metall gefertigt. Die &Ouml;ffnungen an der Ober- und Unterseite, die an eine normale Heizung erinnern, sorgen hierbei f&uuml;r ideale Str&ouml;mungsbedingungen der Luft innerhalb der Hybridheizung, damit sich die Raumluft ideal erw&auml;rmen kann - trotzdem wird die Raumluft nicht trocken, wie bei einer normalen Konvektionsheizung.<br>\nHingegen einer normalen Infrarot-Fl&auml;chenheizung strahlt die im Inneren verbaute Infrarotheizung gegen die vordere Glaskeramik der Hybridheizung. Diese erw&auml;rmt sich und es kommt hierdurch zur Erw&auml;rmung der Luft im Str&ouml;mungskanal, was zu einer Konvektion f&uuml;hrt und deutlich den W&auml;rmegewinn im Raum erh&ouml;ht. Die vorhandene Raumluft erw&auml;rmt sich um ein Vielfaches schneller.<br>\nZudem erw&auml;rmt sich durch die zus&auml;tzlich entstehende Konvektionsw&auml;rme auch die Luft. Dies erlaubt sogar eine geringere Temperatursenkung im Raum, um Elektroenergie zu sparen.<br>\nDer wohl wichtigste Unterschied ist der Energieverbrauch: Elektroheizungen ziehen im eingeschalteten Zustand permanent Strom vom Netz, deshalb ist ihr Stromverbrauch sehr hoch. Unser Hybrid Premium System mit integriertem Glaskeramik Speicher verbraucht nur wenige Minuten Strom, um ihren Speicher aufzuheizen – und dann strahlt l&auml;ngere Zeit die W&auml;rme ab, ohne weiteren Stromverbrauch. So sparen Sie die Energie.<br>\nAuf lange Sicht sind moderne Hybrid Infrarotheizungen nicht nur eine wirtschaftlichere L&ouml;sung – sondern auch deutlich vielf&auml;ltiger einzusetzen.<br>\nPremium Hybrid Infrarotheizungen kommen in s&auml;mtlichen Arbeits- und Wohnbereichen zum Einsatz. Ob in Kitas, Schulen, Arztpraxen, Werkst&auml;tten oder Lagerhallen, in kleinen Einzelb&uuml;ros, gro&szlig;en Foyers oder kompletten B&uuml;rogeb&auml;uden – oder im privaten Zuhause. Sie sind eine wirtschaftliche Alternative zu konventionellen Heizsystemen wie &Ouml;l- oder Gasheizungen und k&ouml;nnen als Zusatzheizung in Hobbyr&auml;umen, Winterg&auml;rten oder Nebengeb&auml;uden genutzt werden.<br>\nHoher Wirkungsgrad dank mehreren Heizprinzipien: 65-70 % Infrarotstrahlung, 30-35 % Konvektionsw&auml;rme<br>\n<b>Die Vorteile</b> des neuen Premium Hybrid Systems von Infrared Profi:<br>\n- die neueste Hybridtechnologie = Infrarot + Konvektion + W&auml;rmespeicher<br>\n- W&auml;rmespeicher an der Vorderseite aus hochwertigem 15mm Glaskeramik<br>\n- lange Lebensdauer da keine beweglichen Teile<br>\n- eine sehr flache Bauweise - von nur 4,5 cm<br>\n- der Gesamtgeh&auml;use ist aus Metall<br>\n- eine hohe Energieeffizienz durch zus&auml;tzliche Konvektionstechnik und Akkumulation</p>\n\n<p><i>Erleben Sie mit der Infrarot-Hybridheizung von Infrared Profi eine echte Innovation im Heizungsbereich.</i></p>\n\n<p><i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glaskeramikheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter</i>\n</p>', NULL, 'premium-hybrid-system', '0', '   \n<div class=\"rectangle-wrapper\" style=\"height: 200px\">  \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:200px;height:200px;bottom:0;left:0;\">\n            600x600\n          </div>\n</div>', '0', 8, 1),".
         "(6, 'standart-heizungen', '0', 'products/steal/main.jpg', 'STANDARD HEIZUNGEN', '<p>Infrarot Standard Paneele der <b>Modellreihe HSteel</b> sind Energie- und Platz sparende Elektroheizungen. Sie eignen sich besonders gut als preiswerte Alternative zu veralteten Nachtspeicher Heizungen. Die Vorteile: Wartungsfrei, lautlos, sauber, zuverl&auml;ssig, dekorativ, g&uuml;nstig in der Anschaffung und im Stromverbrauch. Die Energie effizienten infrarot Heizk&ouml;rper sind nicht vergleichbar mit herk&ouml;mmlichen Elektroheizungen, denn diese zukunftsweisenden Infrarotheizungen erzeugen infrarot Strahlungsw&auml;rme nach dem Vorbild unserer Sonne!<br>\nSie empfinden an kalten Wintertagen die warmen Sonnenstrahlen als angenehm?<br>\nDann werden Sie unsere Infrarotheizungen lieben!<br>\nUnsere HSteel Standard Infrarotheizungen bestehen aus einem 0,8 mm starken speziellen Stahl. Die Geh&auml;usekanten sind von innen verschwei&szlig;t und von au&szlig;en geschliffen. Dadurch entsteht ein sehr stabiles, rundum geschlossenes und optisch ansprechendes pulverbeschichtetes Geh&auml;use. Die Infrarotheizungen verf&uuml;gen &uuml;ber ein sehr langlebiges und flexibles Heizelement mit vollfl&auml;chig eingearbeiteten flachen Heizdr&auml;hten. Die Heizleistung ist &auml;u&szlig;erst effizient.<br>\nHSteel Infrarotheizungen sind mit vielen Bildmotiven und verschiedenen Gr&ouml;&szlig;en erh&auml;ltlich. Bilder auf den Paneelen sind besonders hochaufl&ouml;send und werden durch speziellen UV Druckverfahren auf die Infrarotheizungen bedruckt.<br>\nWeitere Vorteile sind: <br>\n- bis zu 40 % Kostenersparnis gegen&uuml;ber konventionellen Heizmethoden<br>\n- schnelle Erw&auml;rmung der R&auml;ume<br>\n- geringe Anschaffungs- und Instandhaltungskosten<br>\n- es ist kein Umbau notwendig — einfach in die Steckdose einstecken und heizen<br>\n- einfache Installation</p>\n\n<p>Wir empfehlen die Infrarotheizungen mit einem Thermostat zu betreiben, um die maximale Energieeffizienz zu erreichen.<br>\nUnsere Infrarotheizungen werden komplett Anschlussfertig mit einen ca. 1,5 m langem Anschlusskabel mit Stecker und Wandhalterungen ausgeliefert.<br>\nGerne helfen wir Ihnen bei der Berechnung der richtigen Infrarotheizungsgr&ouml;&szlig;e und Heizleistung f&uuml;r Ihren Raum.</p>\n\n<p><i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i>\n</p>', NULL, 'standart-heizungen', '1', '<div class=\"rectangle-wrapper\" style=\"height: 224px\">   \n  <div id=\"row1\" class=\"rectangle\"\n               style=\"width:226px;height:112px;bottom:112px;left:0;\">\n           1130x560\n          </div>\n   <div id=\"row2\" class=\"rectangle\"\n               style=\"width:190px;height:112px;bottom:0;left:140px;\">\n           950x560\n          </div>\n   <div id=\"row3\" class=\"rectangle\"\n               style=\"width:140px;height:112px;bottom:0;left:0;\">\n           700x560\n          </div>\n   <div id=\"row4\" class=\"rectangle\"\n               style=\"width:80px;height:112px;bottom:112px;left:226px;\">\n           400x560\n          </div>\n</div>', '0', 5, 1),".
         "(7, 'infrarotstrahler-fur-industrie', '10', 'products/industrie/main.jpg', 'INFRAROTSTRAHLER F&Uuml;R INDUSTRIE', '<p>Die Infrarotstrahler Serie «P» eignen sich ideal f&uuml;r die Beheizung von Gesch&auml;ftsr&auml;umen, B&uuml;ros, &ouml;ffentliche Einrichtungen, Produktionsst&auml;tten / Hallen, Bauernh&ouml;fen, St&auml;llen und sonstigen industriellen und landwirtschaftlichen Gro&szlig;r&auml;umen, sowie ebenfalls f&uuml;r Turnhallen und Werkst&auml;tten, prinzipiell k&ouml;nnen die Infrarotstrahler &uuml;berall dort eingesetzt werden, wo eine hohe Decke gegeben ist.<br>\nDie gro&szlig;e Infrarotstrahler Serie „P“ sind nicht so leicht und kompakt, wie die Heizstrahler Serie „B“, aber haben eine unschlagbare Heizleistung. Die Infrarotstrahler Serie „P“ mit 2000, 3000 und 4000 Watt Leistung k&ouml;nnen Fl&auml;chen von bis zu 44 m² beheizen und sind damit bestens auch f&uuml;r gro&szlig;fl&auml;chigem Einsatz in Produktionshallen, Lagern und Industriellen Einrichtungen geeignet.<br>\nDie Infrarotstrahler haben sehr viele Vorteile, sie sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, die eine Effizienz von bis zu 99 % erm&ouml;glicht. Infrarot Heizstrahler verbrauchen bis zu 25 % weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotstrahler sehr viel sicherer als Gasbetriebene Systeme. Durch die kleine Bauweise und das geringe Gewicht sind Infrarotstrahler die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden. Noch nie war es so einfach, g&uuml;nstig und effektiv gro&szlig;e Fl&auml;chen zu beheizen.<br>\nInfrarotstrahler arbeiten absolut emissionsfrei und umweltfreundlich. Und sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie einen Infrarotstrahler, der im Betrieb absolut kein CO2 ausst&ouml;&szlig;t und damit 100 % klimaneutral arbeitet.<br>\nAlle Infrarotstrahler aus unserem Programm sind T&Uuml;V gepr&uuml;ft und erf&uuml;llen alle Sicherheitsanspr&uuml;che. Das hochwertige Metallgeh&auml;use ist wetterfest und der gesamte Heizstrahler ist auch vor Spritzwasser gesch&uuml;tzt.<br>\nDie Infrarot Heizstrahler k&ouml;nnen einfach an der Decke durch eine im Lieferumfang enthaltene Halterung in wenigen Minuten angebracht werden.<br>\nSie k&ouml;nnen auch mit einer Neigung an der Wand montiert werden, hierzu ben&ouml;tigen Sie die Winkelhalterung aus unserem Zubeh&ouml;r.<br>\nSollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben, wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter <br>\n<b>PRODUKTMERKMALE:</b><br>\nangenehme, wohlige W&auml;rme<br>\nerzeugt keine Treibgase<br>\nhoher Wirkungsgrad ( 99 % ! ), kaum W&auml;rmeverlust<br>\nvielseitig einsetzbar<br>\nIdeale Beheizung in R&auml;umen mit Deckenh&ouml;he ab 3 Metern ( Turnhallen, Industriehallen, Kirchen, Landwirtschaft, etc..)<br>\nLeichte Montage und Inbetriebnahme<br>\nIdeal als Voll oder Zonenheizung anwendbar<br>\nenergiesparend (25 % weniger Stromverbrauch als vergleichbare Ger&auml;te )<br>\nstabiles, optisch ansprechendes Stahlgeh&auml;use</p>\n\n<p>Die industrielle Infrarotstrahler sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br>\n- Garagen<br>\n- effiziente Beheizung von lokal begrenzten Zonen in gro&szlig;en R&auml;umen<br>\n- Werkst&auml;tten<br>\n- Industriehallen<br>\n- Landwirtschaft die Reduzierung von Feuchtigkeit und die Vermeidung von Schimmelbildung<br>\n- Einsatz in der Landwirtschaft f&uuml;r die Tieraufzucht und W&auml;rmehaltung von St&auml;llen<br>\n</p>', NULL, 'infrarotstrahler-fur-industrie', '0', '<div class=\"rectangle-wrapper\" style=\"height: 230px\">  \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:308px;height:54px;bottom:176px;left:0;\">\n            1540x270\n</div>\n\n<div id=\"row2\" class=\"rectangle\"\n               style=\"width:308px;height:88px;bottom:88px;left:0;\">\n            1540x436\n</div>\n\n<div id=\"row3\" class=\"rectangle\"\n               style=\"width:308px;height:88px;bottom:0;left:0;\">\n            1540x436\n</div>\n</div>', '1', 12, 1),".
         "(8, 'infrarotstrahler-fur-gewerbe', '10', 'products/haus/main.jpg', 'INFRAROTSTRAHLER F&Uuml;R GEWERBE', '<p>Die kleine Infrarotstrahler Serie „B“ zeichnet sich besonders durch ihre kompakte und leichte Bauweise aus. Damit sind die Infrarotstrahler f&uuml;r kleine Wohneinheiten, Kitas, Schulen oder B&uuml;ros und Gesch&auml;ftsr&auml;ume bestens geeignet.<br>\nDie Infrarotstrahler haben sehr viele Vorteile, sie sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, mit einer Effizienz von bis zu 99 %. Infrarot Heizstrahler verbrauchen bis zu 25% weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotstrahler sehr viel sicherer als Gasbetriebene Systeme. Durch die kleine Bauweise und das geringe Gewicht sind Infrarotstrahler die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden.<br>\nInfrarotstrahler sind im Betrieb absolut emissionsfrei und umweltfreundlich. Sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie einen Infrarotstrahler, der im Betrieb absolut kein CO2 ausst&ouml;&szlig;t und damit 100% klimaneutral arbeitet.<br>\nAlle Infrarotstrahler aus unserem Programm sind T&Uuml;V gepr&uuml;ft und erf&uuml;llen alle Sicherheitsanspr&uuml;che. Das Hochwertige Metallgeh&auml;use ist wetterfest und der gesamte Heizstrahler ist auch vor Spritzwasser sicher.<br>\nDer Heizstrahler erw&auml;rmt durch Infrarotstrahlen in nur wenigen Minuten den ausgerichteten Bereich und ist dabei weder zu riechen, zu h&ouml;ren oder durch Licht zu sehen. Insbesondere der hohe Wirkungsgrad in Verbindung mit einem verh&auml;ltnism&auml;&szlig;ig geringen Stromverbrauch zeichnen unsere Infrarotstrahler aus. </p>\nDie Infrarotstrahler sollen mit einem Mindestabstand von 2,2 m vom Boden montiert werden. Die angenehmen W&auml;rmestrahlen haben eine Wellenl&auml;nge zwischen 5,7 und 9,8 µm, die von den meisten Objekten sehr gut absorbiert werden. Ihre intensive Strahlenw&auml;rme im gesundheitsf&ouml;rderlichen IR-C Bereich erzeugt in k&uuml;rzester Zeit ein angenehmes W&auml;rmegef&uuml;hl. Die Heizelemente aus Aluminium sind in Alu oder schwarz eloxiert und haben eine sehr hohe Lebensdauer von &uuml;ber 60.000 Stunden.<br>\nDer Infrarot Heizstrahler kann einfach an der Decke durch eine im Lieferumfang enthaltene Halterung in wenigen Minuten angebracht werden.<br>\nEr kann auch mit einer Neigung an der Wand montiert werden, hierzu ben&ouml;tigen Sie die Winkelhalterung aus unserem Zubeh&ouml;r.<br>\nSollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter. <br>\nPRODUKTMERKMALE:<br>\nangenehme, wohlige W&auml;rme<br>\nerzeugt keine Treibhausgase<br>\nhoher Wirkungsgrad (99 % !), kaum W&auml;rmeverlust<br>\nvielseitig einsetzbar<br>\nIdeale Beheizung in R&auml;umen mit Deckenh&ouml;he ab 2,2 Metern (Turnhallen, Industriehallen, Kirchen, Landwirtschaft, etc...)<br>\nLeichte Montage und Inbetriebnahme<br>\nIdeal als Voll oder Zonenheizung anwendbar<br>\nenergiesparend (25 % weniger Stromverbrauch als vergleichbare Ger&auml;te)<br>\nstabiles, optisch ansprechendes Stahlgeh&auml;use</p>\n\n<p>Die Heizstrahler sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Wohnbereiche<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br>\n- Garagen<br>\n- effiziente Beheizung von lokal begrenzten Zonen in gro&szlig;en R&auml;umen<br>\n- Werkst&auml;tten<br>\n- Industriehallen<br>\n- Landwirtschaft die Reduzierung von Feuchtigkeit und die Vermeidung von Schimmelbildung<br>\n- Einsatz in der Landwirtschaft f&uuml;r die Tieraufzucht und W&auml;rmehaltung von St&auml;llen</p>', NULL, 'infrarotstrahler-fur-privathaushalt', '0', '<div class=\"rectangle-wrapper\" style=\"height: 96px\">  \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:200px;height:32px;bottom:64px;left:0;\">\n           1000x160\n</div>\n\n<div id=\"row2\" class=\"rectangle\"\n               style=\"width:300px;height:32px;bottom:32px;left:0;\">\n            1500x160\n</div>\n\n<div id=\"row3\" class=\"rectangle\"\n               style=\"width:300px;height:32px;bottom:0;left:0;\">\n            1500x160\n</div>\n</div>', '1', 11, 1)");
       $upd = $mysqli->query($query);

        ////////////////////////////////


          ////////////////////////////////
        /// termostats
        ///

               $query = $mysqli->query("DROP TABLE thermostat");
       $upd = $mysqli->query($query);

       $q = "CREATE TABLE IF NOT EXISTS `thermostat` (".
         " `id` int(11) NOT NULL, `name` varchar(45) DEFAULT NULL, `title` varchar(45) DEFAULT NULL, ".
         " `has_qualities` varchar(45) DEFAULT NULL, `has_similar_products` varchar(45) DEFAULT NULL, ".
         " `short_description` text, `image` varchar(45) DEFAULT NULL, `parent_id` varchar(45) DEFAULT NULL, ".
         " `description` text, `abmessungen` varchar(45) DEFAULT NULL, `sensortyp` varchar(45) DEFAULT NULL, ".
         " `installationstiefe` varchar(45) DEFAULT NULL, `displaygr&ouml;&szlig;e` varchar(45) DEFAULT NULL, ".
         " `schutzgrad` varchar(45) DEFAULT NULL, `garantie` varchar(45) DEFAULT NULL, `betriebsspannung` varchar(45) DEFAULT NULL,".
         " `max._geschaltete_last` varchar(45) DEFAULT NULL, `programmfunktion` varchar(45) DEFAULT NULL, ".
         " `pr&uuml;fzeichen` varchar(45) DEFAULT NULL, `ord` int(11) DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

       $query = $mysqli->query($q);
       $upd = $mysqli->query($query);

       $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `short_description`, `image`, `parent_id`, `description`, `abmessungen`, `sensortyp`, `installationstiefe`, `displaygr&ouml;&szlig;e`, `schutzgrad`, `garantie`, `betriebsspannung`, `max._geschaltete_last`, `programmfunktion`, `pr&uuml;fzeichen`, `ord`) VALUES
    (1, 'tempo-digital-thermostat', 'TEMPO&trade; DIGITAL THERMOSTAT', '1', '1', 'Das Tempo&trade; Digital-Thermostat l&auml;sst sich durch seine intuitive Bedienung &uuml;ber Drehknopf und Schieberegler\nschnell und in nur wenigen Schritten einstellen.', 'thermostats/tempo/1.jpeg', '7', 'Das Tempo&trade; Digital-Thermostat l&auml;sst sich durch seine intuitive Bedienung &uuml;ber Drehknopf und Schieberegler schnell und in nur wenigen Schritten einstellen. Zus&auml;tzlich zum Wochenprogramm ist der Funktionswechsel zu Frostschutz oder manueller Bedienung sehr einfach. Durch die pr&auml;zise Schaltung der Heizzeiten arbeitet das\nWarmup&reg; Tempo&trade; besonders zuverl&auml;ssig - so sparen Sie mehr Energie ein.\n\nEinfache Einstellung durch Schieberegler und Drehknopf Gro&szlig;es, klares, gut lesbares Display Programmmodus, Frostschutz oder manuelle Bedienung Erh&auml;ltlich in den Farben Wei&szlig;, Schwarz und Creme', '90 × 113 × 23 mm', 'NTC 10&deg;K (enthalten)', NULL, '45 x 50 mm', 'IP20', NULL, '240/230 V: 50Hz', '16A (Ohmsche Last), 1A (Induktive Last)', '4-Phasen/7-Tage-Programm', 'CE, ASTA BEAB', NULL),
    (2, '3ie-design-thermostat', '3IE DESIGN <br>THERMOSTAT', '1', '1', 'F&uuml;r das 3iE Design-Thermostat wurde eine ganz besondere Touchscreen-Oberfl&auml;che entwickelt - eingefasst in einen edlen Chromrand f&uuml;gt es sich nahtlos in die moderne Wohnumgebung ein. ', 'thermostats/3ie/1.jpg', '7', 'F&uuml;r das 3iE Design-Thermostat wurde eine ganz besondere Touchscreen-Oberfl&auml;che entwickelt - eingefasst in einen edlen Chromrand f&uuml;gt es sich nahtlos in die moderne Wohnumgebung ein. So sieht das 3iE nicht nur gut aus, es &uuml;berzeugt auch durch optimierte Leistung. Das Thermostat ist sehr einfach zu installieren.\n\nEs kann sowohl als Teil eines neuen Warmup&reg; Fu&szlig;boden-Heizsystems verwendet werden, als auch an ein bereits vorhandenes System angeschlossen werden. Das 3iE Design-Thermostat ist verschiedenen Farben erh&auml;ltlich und darf nur von einer zertifizierten Elektrofachkraft an das Stromnetz angeschlossen werden. Innovativ, interaktiv und intelligent - ein Energie-Profi f&uuml;r ihr Zuhause! </br></br> Das erste Thermostat mit einem 2,4'' Farbdisplay und integrierter Touchscreen-Technologie.</br> Besondere Selbstlerneigenschaften erm&ouml;glichen eine automatische Anpassung, vom &Ouml;ffnen eines Fensters bis hin zum Jahreszeitenwechsel. Das weltweit erste Thermostat mit dem einmaligen Active Energy Management&trade; so sparen Sie bis zu 10% auf ihrer Energiekosten-Abrechnung.', NULL, 'NTC 10&deg;K (enthalten)', NULL, '2,4&quot;', 'IP20', NULL, '240/230 V: 50 Hz', '16A (Ohmsche Last), 1A (Induktive Last)', '10-Phasen / 7-Tage-Programm', NULL, NULL),
    (3, '4ie-smart-thermostat', '4IE SMART <br>THERMOSTAT', '1', '1', 'Von einem Smartphone, Tablet oder Computer gesteuert, lernt das 4iE Smart Thermostat auf einzigartige Art und Weise auf Ihre Gewohnheiten zu reagieren. ', 'thermostats/4ie/1.jpg', '7', 'Von einem Smartphone, Tablet oder Computer gesteuert, lernt das 4iE Smart Thermostat auf einzigartige Art und Weise auf Ihre Gewohnheiten zu reagieren. Es bietet automatisch M&ouml;glichkeiten, Energie zu sparen, indem es Ihnen vorschl&auml;gt, welche Temperatur Sie zu welcher Zeit w&auml;hlen sollten oder wann sich das Heizsystem vorzeitig ausschalten sollte, z. B. bevor Sie t&auml;glich zu selben Zeit das Haus verlassen.</br></br>Mit der Funktion SmartGeo&trade; ist es angenehm warm, wenn Sie nach Hause kommen und es wird automatisch Energie eingespart, wenn Sie es nicht sind. Dabei werden die selben Ortungsdienste verwendet, die bereits in ihrem Smartphone integriert sind um so ihre Privatsph&auml;re optimal zu sch&uuml;tzen.</br></br>Smarter</br></br>Es kann nicht nur von Ã¼berall bedient werden, es lernt auch ihre Heizung zu bedienen und ihre Einstellungen zu optimieren.</br></br>Besser</br></br>Steuert schnell und einfach ihre Heizung, bietet einen EnergieMonitor, komplett mit grafischen Anzeigen zu Energieverbrauch, Temperaturen und Kosten, ist lernf&auml;hig und individuell zu personalisieren.</br></br>Effizienter</br></br>Verbessern Sie ihre Energiebilanz mit einer optimalen Kostenkontrolle und niedrigem Verbrauch.', '(H/B/T) 90 x 110 x 18 mm', 'Luft und Boden/Umgebungsf&uuml;hler NTC10K (-12 K ', 'Zur Installation empfehlen wir Hohlraumdosen ', '3,5&quote;, vollfarbiger Touch-Screen', 'IP33', '3 Jahre', NULL, NULL, NULL, NULL, NULL),
    (4, 'wandhalterung', 'WANDHALTERUNG', '0', '0', NULL, 'products/zubehor/1.jpg', '9', 'Diese Wandhalterung mit einstellbarem Winkel kann sowohl f&uuml;r Wand, als auch f&uuml;r eine Deckenmontage verwendet werden. So k&ouml;nnen Sie Ihr Heizger&uuml;t an beliebigen Orten anbringen und dabei den Neigungswinkel einstellen.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
    (5, 'untertischheizungen', 'UNTERTISCHHEIZUNGEN', '0', '1', NULL, 'products/sonstige/table/1.JPG', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
    (6, 'heizplate-fur-buro', 'HEIZPLATTE F&Uuml;R B&Uuml;RO', '0', '1', NULL, 'products/sonstige/floor/1.jpg', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
    (7, 'heizplate-fur-arbeitsplatz', 'HEIZPLATTE F&Uuml;R ARBEITSPLATZ', '0', '1', NULL, 'products/sonstige/metal/1.jpg', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");
       $upd = $mysqli->query($query);
    */
    /*
          ////////////////////////////////
        /// bundesland
           $query = $mysqli->query("DROP TABLE bundesland");
       $upd = $mysqli->query($query);

       $q = "CREATE TABLE IF NOT EXISTS `bundesland` (".
         "  `id` int(11) NOT NULL,   `name` varchar(45) DEFAULT NULL,   PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

       $query = $mysqli->query($q);
       $upd = $mysqli->query($query);

       $query = $mysqli->query("INSERT INTO `bundesland` (`id`, `name`) VALUES (1, 'Berlin'), (2, 'Brandenburg'), (3, 'Mecklenburg-Vorpommern'),".
         " (4, 'Sachsen'), (5, 'Schleswig-Holstein'), (6, 'Hamburg'), (7, 'Bremen'), (8, 'Niedersachsen'), (9, 'Sachen-Anhalt'), ".
         " (10, 'Hessen'), (11, 'Nordrhein-Westfalen'), (12, 'Rheinland-Pfalz'), (13, 'Saarland'), (14, 'Baden-W&uuml;rttemberg'), ".
         " (15, 'Bayern'), (16, 'Th&uuml;ringen')");
       $upd = $mysqli->query($query);

             ////////////////////////////////
        /// category
           $query = $mysqli->query("DROP TABLE categories");
       $upd = $mysqli->query($query);

       $q = "CREATE TABLE IF NOT EXISTS `categories` (".
         " `id` int(11) NOT NULL, `name` varchar(45) DEFAULT NULL, `parent_id` int(11) DEFAULT NULL,".
         " `image` varchar(45) DEFAULT NULL, `title` varchar(45) DEFAULT NULL, `short_description` text,".
         " `ord` int(11) DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

       $query = $mysqli->query($q);
       $upd = $mysqli->query($query);

       $query = $mysqli->query("INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `title`, `short_description`, `ord`) VALUES ".
         " (7, 'regeltechnik', 0, 'thermostats/main.jpg', 'REGELTECHNIK', NULL, 10),".
         " (8, 'sonstige-produkte', 0, 'products/sonstige/main.jpg', 'SONSTIGE PRODUKTE', NULL, 9), ".
         " (9, 'zubehor', 0, 'products/zubehor/main.jpg', 'ZUBEH&Ouml;R', NULL, 11), ".
         " (10, 'infrarotstrahler', 0, 'products/infrarotstrahler/main.jpg', 'INFRAROTSTRAHLER', NULL, 7)");
       $upd = $mysqli->query($query);

    */

    ////////////////////////////////
    /*
    $query = $mysqli->query("INSERT INTO `footer_links` (`id`, `title`, `link`) VALUES ('1','KONTAKT', '/kontakt')");
    $upd = $mysqli->query($query);


        $query = $mysqli->query("CREATE TABLE `header_links` (`id` INT NOT NULL AUTO_INCREMENT, `title` TEXT NULL, `link` TEXT NULL, PRIMARY KEY (`id`))");
        $upd = $mysqli->query($query);

    $query = $mysqli->query("INSERT INTO `header_links` (`id`, `title`, `link`) VALUES ('1','TECHNOLOGIE', '/technologie')");
    $upd = $mysqli->query($query);



    $query = $mysqli->query("UPDATE `garantie` SET `text`='<h3>GARANTIEBEDINGUNGEN</h3>\n\n<p>Die Herstellergarantie gilt nicht bei Sch&auml;den, die durch eigene Nachl&auml;ssigkeit entstanden sind oder durch Missbrauch der Nutzung elektrischen Ger&auml;ten verursacht worden sind.</p>\n\n<p>Nachfolgenden F&auml;lle die eine Garantie ausschlie&szlig;en sind:</p>\n<ol>\n<li>Defekte und Sch&auml;den, die durch Missbrauch bei Nutzung des Produkts verursacht worden sind.</li>\n\n<li>Jeder Fehler und Schaden, der nach der Anlieferung beim Beladen, Entladen oder beim Transport des Ger&auml;tes entstanden ist.</li>\n\n<li>Defekte und Sch&auml;den, die durch erh&ouml;hte oder verringerte Netzspannung oder durch anschlie&szlig;en des Ger&auml;tes an Netzspannungen und Frequenzen, die den vorgeschriebenen nicht entsprechen, verursacht worden sind.</li>\n\n<li>Falsche Installation oder Deinstallation.</li>\n\n<li>Defekte und Sch&auml;den, die durch Reparatur in nicht spezifizierten Servicezentren entstanden sind.</li>\n\n<li>Bedingt durch die Beschichtungseigenschaften sind geringe Planit&auml;tsabweichungen nicht zu vermeiden. Diese sind insbesondere bei Spiegeln m&ouml;glicherweise sichtbar und stellen keinen Reklamationsgrund dar.</li>\n</ol>\n<p>Achtung! Bei oben genannten F&auml;llen und Sch&auml;den verliert der Garantieanspruch seine G&uuml;ltigkeit. Garantiekarte OHNE H&auml;ndler Stempel, H&auml;ndleranschrift, Unterschrift des Verk&auml;ufers und Verkaufsdatum wird als ung&uuml;ltig betrachtet.</p>\n\n<p>Reparatur oder Austausch wird nur in spezialisierten Service-Centern oder vom autorisiertem Fach-H&auml;ndler \"Infrared24\" durchgef&uuml;hrt.\n</p>' WHERE `id`='1'");
   $upd = $mysqli->query($query);


    $query = $mysqli->query("CREATE TABLE `mitglied` (`id` INT NOT NULL AUTO_INCREMENT, `info` TEXT NULL, PRIMARY KEY (`id`))");
    $upd = $mysqli->query($query);


$query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item_decken.gif' WHERE `id`='2'");
$upd = $mysqli->query($query);
$query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item_decken.gif' WHERE `id`='7'");
$upd = $mysqli->query($query);
$query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item_decken.gif' WHERE `id`='8'");
$upd = $mysqli->query($query);

$query = $mysqli->query("CREATE TABLE `product_energie` (`id` INT NOT NULL AUTO_INCREMENT, `image` TEXT NULL,  PRIMARY KEY (`id`))");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `product_energie` (`id`, `image`) VALUES ('1', 'product-energie/energie_de.png')");
$upd = $mysqli->query($query);



    $query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/zwei.gif' WHERE `id`='1'");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/zwei.gif' WHERE `id`='3'");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/zwei.gif' WHERE `id`='4'");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/zwei.gif' WHERE `id`='6'");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/drei.gif' WHERE `id`='5'");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`) VALUES ('9', 'spiegelheizungen', '0', 'products/spiegelheizungen/spiegel02.jpg', 'SPIEGELHEIZUNGEN', '<p>Da der RED AGE Spiegelheizung mit Infrarot Strahlungswärme heizt, wird weniger die Luft im Raum erwärmt sondern mehr die Gegenstände, die sich im Raum befinden, den menschlichen Körper mit eingeschlossen, dies alles wird ermöglicht durch das Prinzip der Sonnenstrahlung. Die Umgebung, welche die Wärme gespeichert hat gibt diese dann nach und nach wieder an den Raum ab, sprich in die Luft und man bekommt ein angenehmes Wohlfühlklima. Spiegelheizpaneele haben zudem noch die Eigenschaft, dass der Wirkungsgrad der Wärmestrahlung sehr hoch ist und die Wärme, ohne in dem Material gespeichert zu werden, direkt in die Umgebung abgegeben wird. </p>\n\n<p>Der Spiegelheizung ist im ganzen Wohnbereich einsetzbar, er passt sich Ihren Gestaltungswünschen perfekt an. Weiterhin hat die Infrarotheizung ein sehr rahmenloses edles Design und durch die qualitative Verarbeitung von hochwertigen Materialien die höchste Qualität, was sich auch bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Spiegelheizung ist nahezu unbegrenzt (über 120.000 Stunden) und die Heizelemente sind fast verschleiß frei. \n</p>\n\n<p>\nAllergiker werden sich mit der Infrarotspiegelheizung ebenfalls wohler fühlen, denn der Staub wird nicht mehr aufgewirbelt oder verbrannt. \n</p>\n\n<p>\nSie kann nicht nur als Komplett-Heizsystem bzw. Vollheizung eingesetzt werden, sondern auch als Zusatzheizung, Teilheizung oder Übergangsheizung. Durch das Anwenden von Strahlungswärme schonen Sie zudem auch Ihren Geldbeutel, denn Sie können hierdurch bis zu 60 % an Stromkosten im Vergleich zu herkömmlichen Heizsystemen sparen, da die Geräte eine sehr hohe Energieeffizienz haben.\nWenn Sie sich zwischen zwei Heizleistungen nicht entscheiden können, raten wir Ihnen dazu die stärkere Heizleistung zu nehmen. Damit haben Sie nicht zwingend einen höheren Energieverbrauch, da die gewünschte Temperatur schneller erreicht wird und der Thermostat die Heizung früher abschalten kann.\nInfrarot Spiegelheizungen aus ESG Sicherheitsglas besitzen eine leichte Tönung und stellen keinen Reklamationsgrund dar.\n</p>\n\n<p>\n<strong>Spiegelheizungen Vorteile:</strong>\n<ul>\n<li>Modern und effizient</li>\n<li>Wohltuende natürliche Wärme</li>\n<li>\nUnabhängigkeit von Öl und Gas</li>\n<li>\nWartungsfrei und extrem langlebig</li>\n<li>\nGesunde Raumluftt</li>\n<li>\nEinfache Installation</li>\n<li>\nZeitlos modern und schön</li>\n\n</ul>\n</p>\n\n<i>\nSollten Sie mehr Informationen benötigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter\n</i>', 'spiegelheizungen', '1', '<div class=\"rectangle-wrapper\" style=\"height: 317px\">  \n <div id=\"row7\" class=\"rectangle\" style=\"width:83px;height:117px;bottom:200px;left:0;\">\n            500x700\n  </div>\n   <div id=\"row6\" class=\"rectangle\"\n               style=\"width:100px;height:100px;bottom:200px;left:83px;\">\n            600x600\n  </div>\n   <div id=\"row5\" class=\"rectangle\"  style=\"width:67px;height:134px;bottom:167px;left:183px;\">  400x800</div><div id=\"row4\" class=\"rectangle\"         style=\"width:67px;height:167px;bottom:0;left:250px;\">     400x1000\n  </div>\n   <div id=\"row3\" class=\"rectangle\"\n               style=\"width:67px;height:200px;bottom:0;left:100px;\">\n            400x1200\n  </div>\n   <div id=\"row2\" class=\"rectangle\"\n               style=\"width:83px;height:167px;bottom:0;left:167px;\">\n            500x1000\n  </div>\n   <div id=\"row1\" class=\"rectangle\"\n               style=\"width:100px;height:200px;bottom:0;left:0;\">\n            600x1200\n  </div>\n  </div>', '0', '4')");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `products` SET `ord`='5' WHERE `id`='1'");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `products` SET `ord`='6' WHERE `id`='6'");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `products` SET `ord`='7' WHERE `id`='2'");
$upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `images` SET `prod_id`='6' WHERE `id`='123'");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `images` (`id`, `path`, `prod_id`) VALUES ('124', 'products/spiegelheizungen/spiegel01.jpg', '9')");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `images` (`id`, `path`, `prod_id`) VALUES ('125', 'products/spiegelheizungen/spiegel02.jpg', '9')");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `images` (`id`, `path`, `prod_id`) VALUES ('126', 'products/spiegelheizungen/spiegel03.jpg', '9')");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('88', 'Hoher Wirkungsgrad', '85-90% Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme ', '9')");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('89', 'Netzspannung', '230 V / 50-60 Hz', '9')");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('90', 'Oberfl&auml;chentemperatur vorne', '85&deg; +/-5&deg;C Max', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('91', 'Oberfl&auml;chentemperatur hinten', '85&deg; +/-5&deg;C Max', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('92', 'Strahlungsweite', '< 3,50 Meter', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('93', 'Strahlungswinkel', 'ca. 90-100&deg;', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('94', 'W&auml;rmeeffekt', 'schon nach wenigen Minuten', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('95', 'Abstand von der Wand', '40 mm', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('96', 'Vorderseite', '6 mm  ESG Glas', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('97', 'Schutzgrad', 'IP 44', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('98', 'Inklusive Wandbefestigungsmaterial', 'JA', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('99', 'Zertifikate', 'CE, RoHs-Zertifiziert, entsprechen EU- Sicherheitsstandarten', '9')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('100', 'Garantie', '5 Jahre volle Garantie', '4')");
$upd = $mysqli->query($query);


$query = $mysqli->query("INSERT INTO `product_principle` (`id`, `image`, `title`, `description`, `product_id`) VALUES ('9', 'product-thermostat/zwei.gif', 'ZWEI RAUMHEIZPRINZIPIEN:', '- Infrarot W&auml;rmestrahlung <br>- Nat&uuml;rliche Konvektion', '9')");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('23', '9', '3')");
$upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `sizes` (`id`, `modell`, `sizex`, `sizey`, `sizez`, `raumgrose`, `leistung`, `gewicht`, `category_size_id`) VALUES ('25', 'IGH 6012', '600', '1200', '8', '13-16 / bis 41', '800', '14.9', 'spiegelheizungen')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `sizes` (`id`, `modell`, `sizex`, `sizey`, `sizez`, `raumgrose`, `leistung`, `gewicht`, `category_size_id`) VALUES ('26', 'IGH 5010', '500', '1000', '8', ' 9-11 / bis 29', '500', '11.9', 'spiegelheizungen')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `sizes` (`id`, `modell`, `sizex`, `sizey`, `sizez`, `raumgrose`, `leistung`, `gewicht`, `category_size_id`) VALUES ('27', 'IGH 4012', '400', '1200', '8', ' 9-11 / bis 29 ', '500', '9.8', 'spiegelheizungen')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `sizes` (`id`, `modell`, `sizex`, `sizey`, `sizez`, `raumgrose`, `leistung`, `gewicht`, `category_size_id`) VALUES ('28', 'IGH 4010', '400', '1000', '8', '7-9 / bis 25', '420', '7.8', 'spiegelheizungen')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `sizes` (`id`, `modell`, `sizex`, `sizey`, `sizez`, `raumgrose`, `leistung`, `gewicht`, `category_size_id`) VALUES ('29', 'IGH 4080', '400', '800', '8', '6-8 / bis 22', '350', '6.1', 'spiegelheizungen')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `sizes` (`id`, `modell`, `sizex`, `sizey`, `sizez`, `raumgrose`, `leistung`, `gewicht`, `category_size_id`) VALUES ('30', 'IGH 6060', '600', '600', '8', '7-9 / bis 25', '400', '7.5', 'spiegelheizungen')");
$upd = $mysqli->query($query);
$query = $mysqli->query("INSERT INTO `sizes` (`id`, `modell`, `sizex`, `sizey`, `sizez`, `raumgrose`, `leistung`, `gewicht`, `category_size_id`) VALUES ('31', 'IGH 5070', '500', '700', '8', '7-9 / bis 25', '400', '7.5', 'spiegelheizungen')");
$upd = $mysqli->query($query);

    $query = $mysqli->query("CREATE TABLE `mitglied` (`id` INT NOT NULL AUTO_INCREMENT, `info` TEXT NULL, PRIMARY KEY (`id`))");
    $upd = $mysqli->query($query);

$query = $mysqli->query("INSERT INTO `mitglied` (`id`) VALUES ('1')");
$upd = $mysqli->query($query);

    $query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item2.png' WHERE `id`='9'");
$upd = $mysqli->query($query);

    $query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item2.png' WHERE `id`='3'");
$upd = $mysqli->query($query);


    $query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item2.png' WHERE `id`='4'");
$upd = $mysqli->query($query);

    $query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item2.png' WHERE `id`='6'");
$upd = $mysqli->query($query);

    $query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item3.png' WHERE `id`='5'");
$upd = $mysqli->query($query);


*/

////////////////////
////////////////////
////////////////////
////////////////////
////////////////////
////////////////////curr live
/// /*


    /*
            $query = $mysqli->query("UPDATE `products` SET `ord`='50' WHERE `id`='1'");
            $upd = $mysqli->query($query);


            $query = $mysqli->query("UPDATE `products` SET `ord`='80' WHERE `id`='2'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `products` SET `ord`='20' WHERE `id`='3'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("UPDATE `products` SET `ord`='30' WHERE `id`='4'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `products` SET `ord`='90' WHERE `id`='5'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `products` SET `ord`='60' WHERE `id`='6'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `products` SET `ord`='120' WHERE `id`='7'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("UPDATE `products` SET `ord`='110' WHERE `id`='8'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `products` SET `ord`='40' WHERE `id`='9'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `categories` SET `ord`='110' WHERE `id`='7'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("UPDATE `categories` SET `ord`='100' WHERE `id`='8'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `categories` SET `ord`='120' WHERE `id`='9'");
            $upd = $mysqli->query($query);
            $query = $mysqli->query("UPDATE `categories` SET `ord`='70' WHERE `id`='10'");
            $upd = $mysqli->query($query);


            $query = $mysqli->query("UPDATE `product_principle` SET `image`='product-thermostat/item2.gif' WHERE `id`='1'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("ALTER TABLE `categories` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
            $upd = $mysqli->query($query);


            $query = $mysqli->query("UPDATE `thermostat` SET `ord` = '310' WHERE `id` = '1'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("UPDATE `thermostat` SET `ord` = '320' WHERE `id` = '2'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("UPDATE `thermostat` SET `ord` = '330' WHERE `id` = '3'");
            $upd = $mysqli->query($query);

        $query = $mysqli->query("UPDATE `thermostat` SET `ord` = '340' WHERE `id` = '4'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("UPDATE `thermostat` SET `ord` = '350' WHERE `id` = '5'");
            $upd = $mysqli->query($query);

            $query = $mysqli->query("UPDATE `thermostat` SET `ord` = '360' WHERE `id` = '6'");
            $upd = $mysqli->query($query);

        $query = $mysqli->query("UPDATE `thermostat` SET `ord` = '370' WHERE `id` = '7'");
            $upd = $mysqli->query($query);

       $query = $mysqli->query(" DELETE FROM `colours` WHERE `name` = 'Spiegel'");
        $upd = $mysqli->query($query);


        $query = $mysqli->query(" ALTER TABLE `products` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
        $upd = $mysqli->query($query);

        $query = $mysqli->query(" DELETE FROM `product_features` WHERE `id` = '0'");
        $upd = $mysqli->query($query);

        $query = $mysqli->query(" ALTER TABLE `product_features` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("ALTER TABLE `product_principle` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE `products_colours` SET `colour_id` = '6' WHERE `id` = '3'");
        $upd = $mysqli->query($query);

       $query = $mysqli->query("UPDATE `products_colours` SET `colour_id` = '6' WHERE `id` = '10'");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("UPDATE `products_colours` SET `colour_id` = '6' WHERE `id` = '23'");
        $upd = $mysqli->query($query);


        $query = $mysqli->query("ALTER TABLE `products_colours` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `sizes` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
        $upd = $mysqli->query($query);

        $query = $mysqli->query(" ALTER TABLE `products` CHANGE COLUMN `ord` `ord` REAL NULL DEFAULT NULL");
        $upd = $mysqli->query($query);



       $query = $mysqli->query("ALTER TABLE `thermostat` CHANGE COLUMN `ord` `ord` REAL NULL DEFAULT NULL");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("ALTER TABLE `categories` CHANGE COLUMN `ord` `ord` REAL NULL DEFAULT NULL");
        $upd = $mysqli->query($query);


          ////
        //thermo

        ////


        $query = $mysqli->query(" CREATE TABLE `thermostat_feature` (`id` INT NOT NULL AUTO_INCREMENT, `feature` TEXT NULL, `value` TEXT NULL, `product_id` VARCHAR(45) NULL, PRIMARY KEY(`id`))");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('abmessungen', '90 x 113 x 23 mm', '1')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('sensortyp', 'NTC 10&deg;K (enthalten)', '1')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('displaygr&ouml;&szlig;e', '45 x 50 mm', '1')");
        $upd = $mysqli->query($query);


        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('schutzgrad', 'IP20', '1')");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('betriebsspannung', '240/230 V: 50Hz', '1')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('max._geschaltete_last', '16A (Ohmsche Last), 1A (Induktive Last)', '1')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('programmfunktion', '4-Phasen/7-Tage-Programm', '1')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('pr&uuml;fzeichen', 'CE, ASTA BEAB', '1')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('sensortyp', 'NTC 10&deg;K (enthalten)', '2')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('displaygr&ouml;&szlig;e', '2,4&quot;', '2')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('schutzgrad', 'IP20', '2')");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('betriebsspannung', '240/230 V: 50 Hz', '2')");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('max._geschaltete_last', '16A (Ohmsche Last), 1A (Induktive Last)', '2')");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('programmfunktion', '10-Phasen / 7-Tage-Programm', '2')");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('abmessungen', '(H/B/T) 90 x 110 x 18 mm', '3')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('sensortyp', 'Luft und Boden/Umgebungsf&uuml;hler NTC10K ', '3')");
        $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('installationstiefe', 'Zur Installation empfehlen wir Hohlraumdosen', '3')");
        $upd = $mysqli->query($query);


        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('displaygr&ouml;&szlig;e', '3,5\"e;, vollfarbiger Touch - Screen', '3')");
        $upd = $mysqli->query($query);


        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('schutzgrad', 'IP33', '3')");
        $upd = $mysqli->query($query);
            $query = $mysqli->query("INSERT INTO `thermostat_feature` (`feature`, `value`, `product_id`) VALUES('garantie', '3 Jahre', '3')");
        $upd = $mysqli->query($query);
            $query = $mysqli->query("ALTER TABLE `thermostat` DROP COLUMN `isOnHomepage`, DROP COLUMN `pr&uuml;fzeichen`, DROP COLUMN `programmfunktion`, DROP COLUMN `max._geschaltete_last`, DROP COLUMN `betriebsspannung`, DROP COLUMN `garantie`, DROP COLUMN `schutzgrad`, DROP COLUMN `displaygr&ouml;&szlig;e`, DROP COLUMN `installationstiefe`, DROP COLUMN `sensortyp`, DROP COLUMN `abmessungen`, CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
        $upd = $mysqli->query($query);



        $query = $mysqli->query("UPDATE `products` SET `ord` = '90' WHERE `id` = '2'");
        $upd = $mysqli->query($query);
        $query = $mysqli->query("UPDATE `products` SET `ord` = '110' WHERE `id` = '5'");
        $upd = $mysqli->query($query);
        $query = $mysqli->query("UPDATE `categories` SET `ord` = '100' WHERE `id` = '10'");
        $upd = $mysqli->query($query);

        $query = $mysqli->query("UPDATE `categories` SET `ord` = '120' WHERE `id` = '8'");
        $upd = $mysqli->query($query);


        $query = $mysqli->query("CREATE TABLE `header_phones` (`id` INT NOT NULL AUTO_INCREMENT, `text` TEXT NULL, `tel` TEXT NULL, PRIMARY KEY (`id`))");
        $upd = $mysqli->query($query);


    */


////
///
///
///
///


/*


    $query = $mysqli->query("ALTER TABLE `thermostat` CHANGE COLUMN `image` `image` TEXT NULL DEFAULT NULL ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" ALTER TABLE `sizes`ADD COLUMN `bottom` INT(11) NULL AFTER `einbauhohe`, ADD COLUMN `left` INT(11) NULL AFTER `bottom`");
    $upd = $mysqli->query($query);


        $query = $mysqli->query("UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='1' ");
    $upd = $mysqli->query($query);

        $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='600' WHERE `id`='2'");
    $upd = $mysqli->query($query);

        $query = $mysqli->query("UPDATE `sizes` SET `bottom`='0', `left`='1100' WHERE `id`='3' ");
    $upd = $mysqli->query($query);

        $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='620', `left`='0' WHERE `id`='4'");
    $upd = $mysqli->query($query);

        $query = $mysqli->query("UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='5' ");
    $upd = $mysqli->query($query);

        $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='25'");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='1000' WHERE `id`='26' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='600' WHERE `id`='27' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='1500' WHERE `id`='28' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='1000', `left`='1100' WHERE `id`='29' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='1200', `left`='500' WHERE `id`='30' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='1200', `left`='0' WHERE `id`='31' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='6' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='7' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='1000' WHERE `id`='8' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='600' WHERE `id`='9' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='1500' WHERE `id`='10' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='1000', `left`='1100' WHERE `id`='11' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='1200', `left`='500' WHERE `id`='12' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='1200', `left`='0' WHERE `id`='13' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='14' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='560', `left`='0' WHERE `id`='15' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='700' WHERE `id`='16' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='17' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='560', `left`='1130' WHERE `id`='18' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='320', `left`='0' WHERE `id`='22' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='160', `left`='0' WHERE `id`='23' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='24' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='872', `left`='0' WHERE `id`='19' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='436', `left`='0' WHERE `id`='20' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" UPDATE `sizes` SET `bottom`='0', `left`='0' WHERE `id`='21' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" CREATE TABLE `bildmotive_catalog` (`id` INT NOT NULL, `title` TEXT NULL, `image` TEXT NULL, `description` TEXT NULL, `ord` INT NULL, PRIMARY KEY (`id`)) ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" ALTER TABLE `bildmotive_catalog` ADD COLUMN `parent_id` INT NULL AFTER `ord` ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" INSERT INTO `bildmotive_catalog` (`id`, `title`, `image`, `description`, `ord`, `parent_id`) VALUES ('1', 'Bildmotive', '10012.jpg', '<p>Bildmotive catalog description</p>', '400', '0') ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query("  ALTER TABLE `bildmotive_catalog` ADD COLUMN `name` TEXT NULL AFTER `parent_id`, ADD COLUMN `short_description` TEXT NULL AFTER `name` ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" CREATE TABLE `bildmotive` (`id` INT NOT NULL AUTO_INCREMENT, `name` TEXT NULL, `title` TEXT NULL, `image` TEXT NULL, `ord` INT NULL, PRIMARY KEY (`id`)) ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" INSERT INTO `bildmotive` (`id`, `name`, `title`, `image`, `ord`) VALUES ('1', 'abstraktionen', 'ABSTRAKTIONEN', '19004.jpg', '10') ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" INSERT INTO `bildmotive` (`id`, `name`, `title`, `image`, `ord`) VALUES ('2', 'autos', 'AUTOS', '17001.jpg', '20') ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" INSERT INTO `bildmotive` (`id`, `name`, `title`, `image`, `ord`) VALUES ('3', 'blumen', 'BLUMEN', '7041.jpg', '30') ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" CREATE TABLE `bildmotive_images` (`id` INT NOT NULL AUTO_INCREMENT, `name` TEXT NULL, `image` TEXT NULL, PRIMARY KEY (`id`)) ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" INSERT INTO `bildmotive_images` (`id`, `name`, `image`) VALUES ('1', '19001', '19001.jpg') ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" INSERT INTO `bildmotive_images` (`id`, `name`, `image`) VALUES ('2', '19002', '19002.jpg') ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" INSERT INTO `bildmotive_images` (`id`, `name`, `image`) VALUES ('3', '19003', '19003.jpg') ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query(" ALTER TABLE `bildmotive_images` ADD COLUMN `category_id` INT NULL AFTER `image`");
    $upd = $mysqli->query($query);

    $query = $mysqli->query("UPDATE `bildmotive_images` SET `category_id`='1' WHERE `id`='1' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query("UPDATE `bildmotive_images` SET `category_id`='1' WHERE `id`='2' ");
    $upd = $mysqli->query($query);

    $query = $mysqli->query("UPDATE `bildmotive_images` SET `category_id`='1' WHERE `id`='3' ");
    $upd = $mysqli->query($query);
*/
    //////////////////////////////



    $query = $mysqli->query("SELECT * FROM mitglied");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['mitglied'] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM default_info");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['logo'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM footer_links");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['footer_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM header_links");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM footer_service_links");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['footer_service_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM phones");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['phones'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM header_phones");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_phones'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM contacts");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['contacts'][] = $r;
      }
    }


    $query = $mysqli->query("SELECT * FROM modal_menu");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['modal_menu'][] = $r;
      }
    }

    return $res;
  }
}
