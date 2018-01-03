<?php

class Model_Product extends Model {
  public function get_data() {
    include 'application/connection.php';

/*
        $query = "UPDATE `products` SET `description`='<p>Glas Infrarotheizung P750G-Visio ist die optimale L&ouml;sung f&uuml;r diejenigen, die Wert auf moderne High-Performance-Technologie, geringen Stromverbrauch und stilvolles Design legen.<br> Das Glasinfrarotpaneel besteht aus sehr festem Sicherheitsglas mit einer St&auml;rke von 8 mm. Dies ist die einzige absolut transparente Infrarotheizung. Verchromte Endkappen und Abdeckleisten verleihen dem Ger&auml;t eine besondere Eleganz, sodass diese Infrarotheizung in jeden Raum passt: ein privates Haus oder eine Wohnung, B&uuml;ro, Shop, Studio, Restaurant, Hotel usw.<br>Die Infrarot Glasheizung P750G-VISIO hat neben dekorativen Eigenschaften auch hervorragende technische Eigenschaften.<br> Auf das Glas wird eine spezielle transparente Beschichtung aufgetragen, w&auml;hrend durch sie elektrischer Strom flie&szlig;t entsteht eine W&auml;rmeenergie, die das Glaspaneel erw&auml;rmt, solange das Glas selbst Infrarotw&auml;rme abstrahlt.<br> Und weil das Glas sich 2 — 3 mal langsamer abk&uuml;hlt als das Metall, wird eine komfortable effiziente Beheizung des Raumes und ein &auml;u&szlig;erst niedriger Stromverbrauch erreicht.<br>Sie kann nicht nur als Komplett-Heizsystem bzw. Vollheizung eingesetzt werden, sondern auch als Zusatzheizung, Teilheizung oder &Uuml;bergangsheizung. Durch das Anwenden von Strahlungsw&auml;rme schonen Sie zudem auch Ihren Geldbeutel, denn Sie k&ouml;nnen hierdurch bis zu 65% an Stromkosten im Vergleich zu herk&ouml;mmlichen Heizsystemen sparen, da die Ger&auml;te eine sehr gute Energieeffizienz haben. <br>\nWir empfehlen die Infrarotheizungen mit einem Thermostat zu betreiben, um die maximale Energieeffizienz zu erreichen.\nUnsere Infrarotheizungen werden komplett anschlussfertig mit einen ca. 1,5 m langem Anschlusskabel mit Stecker und Wandhalterungen ausgeliefert. \n<br><br>\n<strong>Produktmerkmale:</strong><br>— einzigartige patentierte Technologie<br>\n— Frontfl&auml;che aus hochwertigem transparentem Glas<br>\n— AESI Edelstahl<br>\n— spezielles Heizelement mit beidseitiger Abstrahlung<br>\n— rahmenloses Design<br>\n— Wandmontage<br>\n— hoher Wirkungsgrad: 85-90 % Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme<br>\n--- lange Lebensdauer da keine beweglichen Teile<br>\n— elektrischer Anschluss: Das Glas Heizpaneel ist mit einem Stecker ausgestattet<br>\n— Wandabstand 40 mm<br>\n<br><br>\n<strong><i>Montagehinweis:</i>\nDie Paneele sind ausschlie&szlig;lich f&uuml;r die Wandmontage bestimmt.\nEine Montage an der Decke ist nicht m&ouml;glich!</strong><br>\nDer Abstand der Unterkante des Heizger&auml;tes vom Fu&szlig;boden muss 50 bis 150 mm betragen, es werden 100 mm empfohlen. Der Seitenabstand, z.B. von M&ouml;beln muss mindestens 100 mm betragen. In Badezimmern ist die Heizplatte in &Uuml;bereinstimmung mit der Norm VDE 100 / T701 zu installieren. Durch das geringe Gewicht ist die Montage einfach durchzuf&uuml;hren. Die Platte darf nicht direkt unter der Anschlussdose angebracht werden.\nSetzen Sie gestalterische Akzente und erhalten Sie zudem eine h&ouml;chst effiziente und gesunde Heizung. Die Infrarotheizung ist wegen steigenden &Ouml;l und Gaspreisen und der vielf&auml;ltigen Einsatzm&ouml;glichkeiten, die wohl genialste und attraktivste L&ouml;sung f&uuml;r eine warme Umgebung. \n<br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i></p>' WHERE `id`='3'";
        $upd = $mysqli->query($query);

        $query = "UPDATE `products` SET `description`='<p>Hier verbindet sich Sparsamkeit und Glasdesign in einem Ger&auml;t. Die Infrarot Glasheizungen RED AGE der Modellreihe IGH sind einzigartige Heizpaneele, energiesparend, g&uuml;nstig in der Anschaffung und zudem langlebige Infrarot Heizk&ouml;rper. Die modernen Infrarot Glasheizungen sind nicht nur ausgezeichnete W&auml;rmelquellen  sondern auch ein toller Blickfang. Glaspaneele sind vor allem f&uuml;r die Beheizung von modernen Innenr&auml;umen (Wohn-, Kinder-, Schlafzimmer und B&uuml;ros) bestimmt, in denen sie nicht nur die Funktion eines Heizger&auml;ts erf&uuml;llen, sondern sie k&ouml;nnen auch zu einem bedeutenden Designelement werden. Mit der Schutzklasse IP 44 (Spritzwasser gesch&uuml;tzt) k&ouml;nnen die Paneele auch im Badezimmer eingesetzt werden. Die Glas Infrarotheizung RED AGE ist 8 mm d&uuml;nn wie moderne LCD-Fernseher und l&auml;sst sich mit wenigen Handgriffen schnell an der Wand montieren. Auch wenn sie montiert ist, h&auml;ngt die Infrarotheizung nur ungef&auml;hr 4 cm von der Wand entfernt. Die Oberfl&auml;che besteht aus einer besonders robusten Sicherheitsglas und die Oberfl&auml;chentemperatur betr&auml;gt etwa 80-85&deg; C. Das Ber&uuml;hren der Oberfl&auml;che ist ohne weiteres m&ouml;glich. Ein Verbrennen ist ausgeschlossen, da die W&auml;rmeleitf&auml;higkeit von Glas wesentlich geringer ist. So ist das Ger&auml;t selbst f&uuml;r Kleinkinder und Tiere absolut ungef&auml;hrlich.<br>\nDie Infrarotheizung hat ein sehr edles Design, und durch die Verarbeitung von hochwertigen Materialien die h&ouml;chste Qualit&auml;t, was sich bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Glasheizung ist nahezu unbegrenzt und die Heizelemente sind fast verschlei&szlig;frei. Eine besonders hohe Energieeffizienz von 98 % spart Ihnen wertvolle Energiekosten und macht die Infrarotheizung besonders widerstandsf&auml;hig und langlebig.<br>\nDie Glasfront ist in wei&szlig;, schwarz, als Spiegel oder mit einem Motiv rahmenlos und mit einem hochwertigem Rundschliff (C-Schliff) versehen. Die Bilder auf den Ger&auml;ten sind besonders hochaufl&ouml;send und werden durch spezielle UV Druckverfahren auf die Infrarotheizungen bedruckt.<br>\nDurch den sog. &quot;Crumble Effekt&quot; wird die Verletzungsgefahr bei Bruch der Glas verhindert.\nDie Installation und Montage der Infrarotheizungen funktioniert kinderleicht. Einfach Infrarotpaneel an der Wand befestigen, Netzstecker einstecken und losgeht es. \n<br><br>\n\n<strong>Produktmerkmale:</strong><br>\n- Vorderseite aus hochwertigem ESG Sicherheitsglas<br>\n- Rundschliff an den Kanten<br>\n- spezielles Heizelement mit beidseitiger Abstrahlung<br>\n- rahmenloses Design<br>\n- hoher Wirkungsgrad dank zwei Heizprinzipien: 85-90 % Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme <br>\n- lange Lebensdauer &uuml;ber 120.000 Stunden, da keine beweglichen Teile<br>\n- elektrischer Anschluss: Das RED AGE Heizpaneel ist mit einem Stecker ausgestattet<br>\n- vertikale und horizontale Montage m&ouml;glich<br><br>\n\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter </i></p>' WHERE `id`='4'";
        $upd = $mysqli->query($query);

        $query = "UPDATE `products` SET `description`='<p>Mit der Infrarot Glashandtuchtrockner RED AGE <strong>Modellreihe GHT</strong> inklusive Raumheizung Funktion, bekommen Sie nicht nur angenehme W&auml;rme in Ihr Badezimmer, sondern auch ein vorgew&auml;rmtes Badehandtuch. Unsere Infrarot Handtuchtrockner bieten Wellness-W&auml;rme durch den Infrarot-Tiefenw&auml;rmeeffekt, au&szlig;erdem sind sie hervorragende W&auml;rmequellen f&uuml;r ein warmes Bad und warme Handt&uuml;cher nach dem Duschen und Baden oder in der K&uuml;che, wenn eine kleine Heizung f&uuml;r die Geschirrhandt&uuml;cher fehlt Dank Schutzgrad IP44 ist der RED AGE Glashandtuchtrockner f&uuml;r Feuchtr&auml;ume und damit u.a. geeignet f&uuml;r einen Einsatz in Ihrem Badezimmer. Er kann in jedem Badezimmer an der Wand montiert werden.<br>\nDie RED AGE Handtuchhalterungen bestehen aus haldpoliertem Edelstahl, dies verleiht der Heizung eine zeitlose und edle Optik. Alle Infrarot Handtuchtrockner sind mit einem Stecker versehen und somit universell einsetzbar. Bei Ihnen zu Hause angekommen, m&uuml;ssen Sie den Handtuchtrockner nur noch mit den mitgelieferten Halterungen an der Wand befestigen, am Strom anschlie&szlig;en und schon f&auml;ngt der Infrarot Handtuchtrockner an zu heizen. \n<br><br>\n\nDie Infrarot Glasheizung <strong>Modellreihe GHT</strong> ist nur 8 mm flach wie bei modernen LCD-Fernseher und l&auml;sst sich mit wenigen Handgriffen schnell an der Wand montieren. Auch wenn er montiert ist, h&auml;ngt die Infrarotheizung nur ungef&auml;hr 4 cm von der Wand entfernt. Die Oberfl&auml;chentemperatur betr&auml;gt etwa 80-85&deg; C. Das Ber&uuml;hren der Oberfl&auml;che ist ohne weiteres m&ouml;glich. Ein Verbrennen ist ausgeschlossen, da die W&auml;rmeleitf&auml;higkeit von Glaskeramik wesentlich geringer ist. So ist das Ger&auml;t selbst f&uuml;r Kleinkinder und Tiere absolut ungef&auml;hrlich. <br>\nDie Infrarotheizung hat ein sehr edles Design und durch die qualitative Verarbeitung von hochwertigen Materialien hat sie h&ouml;chste Qualit&auml;t, was sich bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Glasheizung ist nahezu unbegrenzt und die Heizelemente sind fast verschlei&szlig;frei. Eine besonders hohe Energieeffizienz von 98 % spart Ihnen wertvolle Energiekosten und macht die Infrarotheizung besonders widerstandsf&auml;hig und langlebig. <br>\nDie Glaskfront ist in wei&szlig;, schwarz, Spiegel oder mit einem Motiv rahmenlos und mit einen hochwertigen Rundschliff (C-Schliff) versehen. Die Bilder auf den Ger&auml;ten sind besonders hochaufl&ouml;send und werden durch spezielle UV Druckverfahren auf die Infrarotheizungen bedruckt.<br>\nDurch den sog. &quot;Crumble Effekt&quot; wird die Verletzungsgefahr bei Bruch der Glas verhindert.\nDie Installation und Montage der Infrarotheizungen funktioniert kinderleicht. Einfach das Infrarotpaneel an der Wand befestigen, Netzstecker einstecken und schon heizt es.<br><br>\n<strong>Produktmerkmale:</strong><br>\n- Frontfl&auml;che aus hochwertigem 6 mm ESG Glas<br>\n- die Handtuchhalterungen aus handpoliertem Edelstahl<br>\n- Rundschliff an den Kanten<br>\n- spezielles Heizelement mit beidseitiger Abstrahlung<br>\n- rahmenloses Design<br>\n- hoher Wirkungsgrad: 85-90% Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme<br> \n- lange Lebensdauer: &uuml;ber 120.000 Stunden, da keine beweglichen Teile<br>\n- elektrischer Anschluss: Das HGlass Heizpaneel ist mit einem Stecker ausgestattet<br>\n- auch mit programmierbaren Thermostat erh&auml;ltlich<br><br>\nDas Einsparpotential bei Anschaffung einer Infrarotheizung gegen&uuml;ber zu &Ouml;l-, Gas-, Holzheizungen ist enorm, der laufende Energieverbrauch um ein Vielfaches geringer. Keine Entstehung von Feinstaub oder CO<sub><small>2</small></sub>, keine Energieverluste, keine Schimmelgefahr, besserer D&auml;mmwert, keine st&ouml;rende Ger&auml;usche- oder Geruchsbel&auml;stigung.<br>\nIn R&auml;umen in denen es zu hoher Luftfeuchtigkeit kommt, wie z. Beispiel ein Badezimmer, dimensionieren Sie die Leistung doppelt. Sie erleben dadurch ein Badevergn&uuml;gen wie am Meer. Sie frieren trotz nasser Haut nicht. Das ist auch der Vorteil einer Infrarotheizung.<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter. </i>' WHERE `id`='1'";
        $upd = $mysqli->query($query);


        $query = "UPDATE `products` SET `description`='<p>RED AGE Infrarot Standard Heizungen der <strong>Modellreihe ISH</strong> sind Energie- und Platz sparende Elektroheizungen. Sie eignen sich besonders gut als preiswerte Alternative zu veralteten Nachtspeicher Heizungen. Die Vorteile: Wartungsfrei, lautlos, sauber, zuverl&auml;ssig, dekorativ, g&uuml;nstig in der Anschaffung und im Stromverbrauch. Die Energieeffizienten infrarot Heizk&ouml;rper sind nicht vergleichbar mit herk&ouml;mmlichen Elektroheizungen, denn diese zukunftsweisenden Infrarotheizungen erzeugen infrarot Strahlungsw&auml;rme nach dem Vorbild unserer Sonne!<br>\nSie empfinden an kalten Wintertagen die warmen Sonnenstrahlen als angenehm?<br>\nDann werden Sie unsere Infrarotheizungen lieben!<br>\nUnsere RED AGE Standard Infrarotheizungen <strong>Modellreihe ISH</strong> bestehen aus einem 0,8 mm starken speziellen Stahl, die Geh&auml;usekanten sind von innen verschwei&szlig;t und von au&szlig;en geschliffen, dadurch entsteht ein sehr stabiles, rundum geschlossenes und optisch ansprechendes pulverbeschichtetes Geh&auml;use. Die Infrarotheizungen verf&uuml;gen &uuml;ber ein sehr langlebiges und flexibles Heizelement mit vollfl&auml;chig eingearbeiteten flachen Heizdr&auml;hten. Die Heizleistung ist &auml;u&szlig;erst effizient.<br>\nRED AGE Infrarotheizungen sind mit vielen Bildmotiven und verschiedenen Gr&ouml;&szlig;en erh&auml;ltlich. Bilder auf den Paneelen sind besonders hochaufl&ouml;send und werden durch speziellen UV Druckverfahren auf die Infrarotheizungen bedruckt.<br><br>\n\n<strong>Weitere Vorteile sind: </strong><br>\n- bis zu 40 % Kostenersparnis gegen&uuml;ber konventionellen Heizmethoden<br>\n- schnelle Erw&auml;rmung der R&auml;ume<br>\n- geringe Anschaffungs- und Instandhaltungskosten<br>\n- es ist kein Umbau notwendig - einfach in die Steckdose einstecken und heizen<br>\n- einfache Installation<br>\nWir empfehlen die Infrarotheizungen mit einem Thermostat zu betreiben, um die maximale Energieeffizienz zu erreichen.<br>\nUnsere Infrarotheizungen werden komplett Anschlussfertig mit einen ca. 1,5 m langem Anschlusskabel mit Stecker und Wandhalterungen ausgeliefert.<br>\nGerne helfen wir Ihnen bei der Berechnung der richtigen Infrarotheizungsgr&ouml;&szlig;e und Heizleistung f&uuml;r Ihren Raum.<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i> <p>' WHERE `id`='6'";
        $upd = $mysqli->query($query);

        $query = "UPDATE `products` SET `description`='<p>\nF&uuml;hlen Sie sich wie bei einem angenehmen Sonnenbad - die Infrarot-Heizung simuliert Sonnenw&auml;rme und heizt gezielt und schnell den Bereich, in dem Sie sich aufhalten. Die kompakte Deckenheizung ist mit 62 x 62 cm genau passend f&uuml;r die Montage in Raster- und Kassettendecken.<br>\nBei der Infrarot-Heizung muss nicht langwierig und ineffizient die gesamte Raumluft erw&auml;rmt werden, es werden nur die bestrahlten Objekte erw&auml;rmt. Ein weiterer Vorteil, besonders f&uuml;r Allergiker, ist die hier entfallende Luftumw&auml;lzung - so wird kein Staub in der umgew&auml;lzten Raumluft transportiert. <br>\nDie Infrarotheizungen sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, mit einer Effizienz von bis zu 99 %.<br> Infrarotheizungen verbrauchen bis zu 25% weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotheizungen sehr viel sicherer als gasbetriebene Systeme.<br> Durch die kleine Bauweise und das geringe Gewicht sind Infrarotpaneele die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden.<br>\nInfrarotheizungen sind im Betrieb absolut emissionsfrei und umweltfreundlich. Und sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie eine Heizung, die im Betrieb absolut kein CO<sub><small>2</small></sub> ausst&ouml;&szlig;t und damit 100% klimaneutral arbeitet.<br>\nDie Heizung erw&auml;rmt durch Infrarotstrahlen in nur wenigen Minuten den ausgerichteten Bereich und ist dabei weder zu riechen, zu h&ouml;ren noch durch Licht zu sehen. Insbesondere der hohe Wirkungsgrad in Verbindung mit einem verh&auml;ltnism&auml;&szlig;ig geringen Stromverbrauch zeichnen unsere Infrarotheizungen aus. <br><br>\n\n<strong>PRODUKTMERKMALE:</strong><br>\n- angenehme, wohlige W&auml;rme<br>\n- hoher Wirkungsgrad (99 % !), kaum W&auml;rmeverlust<br>\n- vielseitig einsetzbar<br>\n- sicherer Aufbau mit D&auml;mmstoff und Reflektor-Lage<br>\n- sehr flache Bauform, passt auch in 62,5 cm Raster- und Kassettendecken mit Standard<br>\n- einfache Installation, sofort betriebsbereit, sehr schnelle W&auml;rmeerzeugung<br>\n- ideal als Voll oder Zonenheizung anwendbar<br>\n- integrierter &Uuml;berhitzungsschutz<br>\n- hohe Kosten- und Energieersparnis gegen&uuml;ber herk&ouml;mmlichen Elektroheizungen<br><br>\nDie Deckenheizungen sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Wohnbereiche<br>\n- B&uuml;rogeb&auml;ude<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br><br>\n\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Deckenheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter. </i>\n</p>' WHERE `id`='2'";
        $upd = $mysqli->query($query);


        $query = "UPDATE `products` SET `description`='<p>Die kleine Infrarotstrahler Serie „B“ zeichnet sich besonders durch ihre kompakte und leichte Bauweise aus. Damit sind die Infrarotstrahler f&uuml;r kleine Wohneinheiten, Kitas, Schulen oder B&uuml;ros und Gesch&auml;ftsr&auml;ume bestens geeignet.<br>\nDie Infrarotstrahler haben sehr viele Vorteile, sie sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, mit einer Effizienz von bis zu 99 %. Infrarot Heizstrahler verbrauchen bis zu 25% weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotstrahler sehr viel sicherer als Gasbetriebene Systeme. Durch die kleine Bauweise und das geringe Gewicht sind Infrarotstrahler die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden.<br>\nInfrarotstrahler sind im Betrieb absolut emissionsfrei und umweltfreundlich. Sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie einen Infrarotstrahler, der im Betrieb absolut kein CO<sub><small>2</small></sub> ausst&ouml;&szlig;t und damit 100% klimaneutral arbeitet.<br>\nAlle Infrarotstrahler aus unserem Programm sind T&Uuml;V gepr&uuml;ft und erf&uuml;llen alle Sicherheitsanspr&uuml;che. Das Hochwertige Metallgeh&auml;use ist wetterfest und der gesamte Heizstrahler ist auch vor Spritzwasser sicher.<br><br>\n\nDer Heizstrahler erw&auml;rmt durch Infrarotstrahlen in nur wenigen Minuten den ausgerichteten Bereich und ist dabei weder zu riechen, zu h&ouml;ren oder durch Licht zu sehen. Insbesondere der hohe Wirkungsgrad in Verbindung mit einem verh&auml;ltnism&auml;&szlig;ig geringen Stromverbrauch zeichnen unsere Infrarotstrahler aus. <br><br>\nDie Infrarotstrahler sollen mit einem Mindestabstand von 2,2 m vom Boden montiert werden. Die angenehmen W&auml;rmestrahlen haben eine Wellenl&auml;nge zwischen 5,7 und 9,8 µm, die von den meisten Objekten sehr gut absorbiert werden. Ihre intensive Strahlenw&auml;rme im gesundheitsf&ouml;rderlichen IR-C Bereich erzeugt in k&uuml;rzester Zeit ein angenehmes W&auml;rmegef&uuml;hl. Die Heizelemente aus Aluminium sind in Alu oder schwarz eloxiert und haben eine sehr hohe Lebensdauer von &uuml;ber 60.000 Stunden.<br>\nDer Infrarot Heizstrahler kann einfach an der Decke durch eine im Lieferumfang enthaltene Halterung in wenigen Minuten angebracht werden.<br>\nEr kann auch mit einer Neigung an der Wand montiert werden, hierzu ben&ouml;tigen Sie die Winkelhalterung aus unserem Zubeh&ouml;r.<br>\nSollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter. <br><br>\n\n<strong>PRODUKTMERKMALE:</strong><br>\n-angenehme, wohlige W&auml;rme<br>\n-erzeugt keine Treibhausgase<br>\n-hoher Wirkungsgrad (99 % !), kaum W&auml;rmeverlust<br>\n-vielseitig einsetzbar<br>\n- Ideale Beheizung in R&auml;umen mit Deckenh&ouml;he ab 2,2 Metern (Turnhallen, Industriehallen, Kirchen, Landwirtschaft, etc...)<br>\n- Leichte Montage und Inbetriebnahme<br>\n- Ideal als Voll oder Zonenheizung anwendbar<br>\n- energiesparend (25 % weniger Stromverbrauch als vergleichbare Ger&auml;te)<br>\n- stabiles, optisch ansprechendes Stahlgeh&auml;use.<br><br>\nDie Heizstrahler sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Wohnbereiche<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br>\n- Garagen<br>\n- effiziente Beheizung von lokal begrenzten Zonen in gro&szlig;en R&auml;umen<br>\n- Werkst&auml;tten<br>\n- Industriehallen<br>\n- Landwirtschaft die Reduzierung von Feuchtigkeit und die Vermeidung von Schimmelbildung<br>\n- Einsatz in der Landwirtschaft f&uuml;r die Tieraufzucht und W&auml;rmehaltung von St&auml;llen<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i></p>' WHERE `id`='8'";
        $upd = $mysqli->query($query);

        $query = "UPDATE `products` SET `description`='<p>Die Infrarotstrahler Serie «P» eignen sich ideal f&uuml;r die Beheizung von Gesch&auml;ftsr&auml;umen, B&uuml;ros, &ouml;ffentliche Einrichtungen, Produktionsst&auml;tten / Hallen, Bauernh&ouml;fen, St&auml;llen und sonstigen industriellen und landwirtschaftlichen Gro&szlig;r&auml;umen, sowie ebenfalls f&uuml;r Turnhallen und Werkst&auml;tten, prinzipiell k&ouml;nnen die Infrarotstrahler &uuml;berall dort eingesetzt werden, wo eine hohe Decke gegeben ist.<br>\nDie gro&szlig;e Infrarotstrahler Serie „P“ sind nicht so leicht und kompakt, wie die Heizstrahler Serie „B“, aber haben eine unschlagbare Heizleistung. Die Infrarotstrahler Serie „P“ mit 2000, 3000 und 4000 Watt Leistung k&ouml;nnen Fl&auml;chen von bis zu 44 m² beheizen und sind damit bestens auch f&uuml;r gro&szlig;fl&auml;chigem Einsatz in Produktionshallen, Lagern und Industriellen Einrichtungen geeignet.<br><br>\n\nDie Infrarotstrahler haben sehr viele Vorteile, sie sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, die eine Effizienz von bis zu 99 % erm&ouml;glicht. Infrarot Heizstrahler verbrauchen bis zu 25 % weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotstrahler sehr viel sicherer als Gasbetriebene Systeme. Durch die kleine Bauweise und das geringe Gewicht sind Infrarotstrahler die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden. Noch nie war es so einfach, g&uuml;nstig und effektiv gro&szlig;e Fl&auml;chen zu beheizen.<br>\nInfrarotstrahler arbeiten absolut emissionsfrei und umweltfreundlich. Und sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie einen Infrarotstrahler, der im Betrieb absolut kein CO<sub><small>2</small></sub> ausst&ouml;&szlig;t und damit 100 % klimaneutral arbeitet.<br>\nAlle Infrarotstrahler aus unserem Programm sind T&Uuml;V gepr&uuml;ft und erf&uuml;llen alle Sicherheitsanspr&uuml;che. Das hochwertige Metallgeh&auml;use ist wetterfest und der gesamte Heizstrahler ist auch vor Spritzwasser gesch&uuml;tzt.<br>\nDie Infrarot Heizstrahler k&ouml;nnen einfach an der Decke durch eine im Lieferumfang enthaltene Halterung in wenigen Minuten angebracht werden.<br>\nSie k&ouml;nnen auch mit einer Neigung an der Wand montiert werden, hierzu ben&ouml;tigen Sie die Winkelhalterung aus unserem Zubeh&ouml;r.<br>\nSollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben, wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter <br><br>\n\n<strong>PRODUKTMERKMALE:</strong><br>\n- angenehme, wohlige W&auml;rme<br>\n- erzeugt keine Treibgase<br>\n- hoher Wirkungsgrad ( 99 % ! ), kaum W&auml;rmeverlust<br>\n- vielseitig einsetzbar<br>\n- Ideale Beheizung in R&auml;umen mit Deckenh&ouml;he ab 3 Metern ( Turnhallen, Industriehallen, Kirchen, Landwirtschaft, etc..)<br>\n- Leichte Montage und Inbetriebnahme<br>\n- Ideal als Voll oder Zonenheizung anwendbar<br>\n- energiesparend (35 % weniger Stromverbrauch als vergleichbare Ger&auml;te )\nstabiles, optisch ansprechendes Stahlgeh&auml;use<br><br>\nDie industrielle Infrarotstrahler sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br>\n- Garagen<br>\n- effiziente Beheizung von lokal begrenzten Zonen in gro&szlig;en R&auml;umen<br>\n- Werkst&auml;tten<br>\n- Industriehallen<br>\n- Landwirtschaft die Reduzierung von Feuchtigkeit und die Vermeidung von Schimmelbildung<br>\n- Einsatz in der Landwirtschaft f&uuml;r die Tieraufzucht und W&auml;rmehaltung von St&auml;llen<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i></p>' WHERE `id`='7'";
        $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='14.9' WHERE `id`='7'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='11.9' WHERE `id`='8'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='9.8' WHERE `id`='9'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='7.8' WHERE `id`='10'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='6.1' WHERE `id`='11'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='7.5' WHERE `id`='12'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='7.5' WHERE `id`='13'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `gewicht`='7.5' WHERE `id`='13'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `modell`='GHT 6012', `gewicht`='17.0' WHERE `id`='1'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `modell`='GHT 5010', `gewicht`='10.5' WHERE `id`='2'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `modell`='GHT 5070', `gewicht`='9' WHERE `id`='3'";
    $upd = $mysqli->query($query);

    $query = "INSERT INTO `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('20', '8', '4')";
    $upd = $mysqli->query($query);

    //infrarotstrahler

    $query = "UPDATE `sizes` SET `einbauhohe`='2.0-2.5' WHERE `id`='22'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `einbauhohe`='2.3-2.8' WHERE `id`='23'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `sizes` SET `einbauhohe`='2.5-3.0' WHERE `id`='24'";
    $upd = $mysqli->query($query);

     $query = "UPDATE `sizes` SET `sizex`='1200', `einbauhohe`='3.0-5.0' WHERE `id`='19'";
    $upd = $mysqli->query($query);

     $query = "UPDATE `sizes` SET `sizex`='1200' WHERE `id`='20'";
    $upd = $mysqli->query($query);

         $query = "UPDATE `sizes` SET `sizex`='1200' WHERE `id`='20'";
    $upd = $mysqli->query($query);

    $query = "UPDATE `products` SET `size_markup`='<div class=\"rectangle-wrapper\" style=\"height: 230px\"> <div id=\"row1\" class=\"rectangle\"               style=\"width:240px;height:54px;bottom:176px;left:0;\">          1200x270\n</div>\n\n<div id=\"row2\" class=\"rectangle\"             style=\"width:240px;height:88px;bottom:88px;left:0;\">        1200x436\n</div>\n\n<div id=\"row3\" class=\"rectangle\"   style=\"width:308px;height:88px;bottom:0;left:0;\">       1540x436\n</div>\n</div>' WHERE `id`='7'";
    $upd = $mysqli->query($query);

$query = "UPDATE  `product_features` SET `value`='85-90 % Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme ' WHERE `id`='17'";
    $upd = $mysqli->query($query);



$query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur vorne', `value`='95&deg; +/-5&deg;C Max' WHERE `id`='19'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur hinten', `value`='95&deg; +/-5&deg;C Max' WHERE `id`='20'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='ca. 90-100&deg;' WHERE `id`='22'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='W&auml;rmeeffekt ', `value`='schon nach wenigen Minuten' WHERE `id`='23'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='8 mm ESG Sicherheitsglas ' WHERE `id`='25'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='Glas durchsichtig, Edelstahl poliert' WHERE `id`='26'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='JA' WHERE `id`='28'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='85-90% Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme ' WHERE `id`='31'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur vorne', `value`='85&deg; +/-5&deg;C Max' WHERE `id`='33'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur hinten', `value`='85&deg; +/-5&deg;C Max' WHERE `id`='34'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='ca. 90-100&deg;' WHERE `id`='36'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='W&auml;rmeeffekt', `value`='schon nach wenigen Minuten' WHERE `id`='37'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='6 mm  ESG Glas' WHERE `id`='39'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='JA' WHERE `id`='41'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='5 Jahre volle Garantie' WHERE `id`='43'";
$upd = $mysqli->query($query);


    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur vorne', `value`='85&deg; +/-5&deg;C Max' WHERE `id`='3'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur hinten', `value`='85&deg; +/-5&deg;C Max' WHERE `id`='4'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='6 mm  ESG Glas' WHERE `id`='9'";
$upd = $mysqli->query($query);

    $query = "DELETE FROM  `product_features` WHERE `id`='10'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='IP 44' WHERE `id`='11'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='5 Jahre volle Garantie' WHERE `id`='86'";
$upd = $mysqli->query($query);



$query = "    UPDATE  `product_features` SET `value`='85-90 % Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme ' WHERE `id`='57'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur vorne', `value`='85&deg; +/-5&deg;C Max' WHERE `id`='59'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur hinten', `value`='85&deg; +/-5&deg;C Max' WHERE `id`='60'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='ca. 90-100&deg;' WHERE `id`='62'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='W&auml;rmeeffekt' WHERE `id`='63'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='JA' WHERE `id`='66'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='5 Jahre volle Garantie' WHERE `id`='68'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur', `value`='120-130&deg;C, +/-5&deg;C' WHERE `id`='15'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='ca. 90-100&deg;' WHERE `id`='16'";
$upd = $mysqli->query($query);

    $query = "INSERT INTO  `product_features` (`id`, `feature`, `value`, `product_id`) VALUES ('87', 'Garantie', '5 Jahre Garantie', '2')";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur', `value`='250-300&deg;C Max' WHERE `id`='79'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='ca. 90-110&deg;' WHERE `id`='80'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='W&auml;rmeeffekt' WHERE `id`='81'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='5 Jahre volle Garantie' WHERE `id`='85'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Netzspannung f&uuml;r P 2000' WHERE `id`='69'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Netzspannung f&uuml;r P 3000, P 4000', `value`='400 V / 50-60 Hz' WHERE `id`='70'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `feature`='Oberfl&auml;chentemperatur' WHERE `id`='71'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='ca. 90-110&deg;' WHERE `id`='72'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='JA' WHERE `id`='75'";
$upd = $mysqli->query($query);

    $query = "UPDATE  `product_features` SET `value`='5 Jahre volle Garantie' WHERE `id`='77'";
$upd = $mysqli->query($query);


$query = "INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('21', '2', '4')";
$upd = $mysqli->query($query);


    $query = "    INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('22', '7', '4')";
$upd = $mysqli->query($query);


    $query = "    INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('22', '7', '4')";
$upd = $mysqli->query($query);


    $query = "UPDATE `product_features` SET `value`='300-350&deg;C Max' WHERE `id`='71'";
$upd = $mysqli->query($query);

    $query = "UPDATE `product_features` SET `feature`='W&auml;rmeeffekt' WHERE `id`='73'";
$upd = $mysqli->query($query);

*/



    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $last = end($routes);

    $res = [];

    $q = "SELECT * FROM products  WHERE name='" . $last . "'";
    $query = $mysqli->query($q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res[] = $r;
      }
    }

    $img_q = "SELECT * FROM images  WHERE prod_id=" . $res[0]['id'];
    $query = $mysqli->query($img_q);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['gallery'][] = $r;
      }
    }


    $coloursq = "SELECT * FROM products_colours  WHERE product_id=" . $res[0]['id'];
    $query = $mysqli->query($coloursq);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $c = "SELECT * FROM colours  WHERE id=" . $r['colour_id'];
        $q = $mysqli->query($c);
        $res['colours'][] = mysqli_fetch_assoc($q);
      }
    }

    $sizes_category = $res[0]['category_size_id'];
    $q = 'SELECT * FROM sizes WHERE category_size_id="' . $sizes_category . '"';

    $query = $mysqli->query($q);
    $sizes = [];
    if ($query) {
      while ($s = mysqli_fetch_assoc($query)) {
        $sizes[] = $s;
      }
    }

    include 'application/menu.php';
    $menu = menu();

    $res['menu'] = $menu;
    $res['sizes'] = $sizes;


    //selecting indexes of documents
    $query = $mysqli->query(
      "SELECT * FROM product_document WHERE product_id=" . $res[0]['id']
    );

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $query_doc = $mysqli->query(
          "SELECT * FROM documents WHERE id=" . $r['id']
        );

        if ($query_doc) {
          while ($rd = mysqli_fetch_assoc($query_doc)) {
            $res['doc'][] = $rd;
          }
        }
      }
    }

    $q = 'SELECT * FROM product_features WHERE product_id="' . $res[0]['id'] . '"';

    $query = $mysqli->query($q);
    if ($query) {
      while ($s = mysqli_fetch_assoc($query)) {
        $res['features'][] = $s;
      }
    }


    $query = $mysqli->query(
      "SELECT * FROM product_thermostat"
    );

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        if ($row['id'] !== '2' or ($row['id'] == '2' and $res[0]['has_thermostat'] == '1')) {
          $res['thermostats_info'][] = $row;
        }
      }
    }

    $query = $mysqli->query(
      "SELECT * FROM product_principle WHERE product_id=" . $res[0]['id']
    );

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $res['principles'][] = $row;

      }
    }

    $query = $mysqli->query(
      "SELECT * FROM garantie"
    );

    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $res['garantie'] = $row;

      }
    }

    return $res;
  }
}
