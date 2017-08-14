<?php

class Model_Tecnologie extends Model
{
    public function get_data()
    {
        return [
          'description_before' => array(
            '<h3>WAS IST EIGENTLICH INFRAROT-STRAHLUNGSWÄRME?</h3> <p>
(Auszug Vortrag Dr. Aron Flickstein)<br>
Infrarote Strahlungswärme ist eine Welle des elektromagnetischen Spektrums, welche Energie aller Wellenlängen umfasst. Sie ist eine Energieform, die durch einen Umsetzungsprozess Gegenstände direkt erwärmt, ohne dabei die umgebende Luft zu erwärmen.. Strahlungswärme wird auch infrarote Energie genannt (IR). Der infrarote Anteil des elektromagnetischen Spektrums ist unterteilt in drei verschiedene Wellenlängen, gemessen in Mikrometern (µm):<br>
0,07 – 1,50 = geringe IR-A Wellen <br>
1,50 – 5,60 = mittlere IR-B Wellen <br>
5,60 – 100,00 = weite oder lange IR-C Welle <br>
Im täglichen Leben ist beispielsweise die Sonne eine Quelle der Strahlungsenergie.<br>
Was passiert wenn die Sonne hinter einer Wolke verschwindet?<br>
Obwohl die Umgebungstemperatur gar nicht so schnell sinken kann, empfindet man schnell eine kühlere Temperatur. Da die Wolken die Sonne mit Ihren Infrarotstrahlen abschirmt spürt man sofort, dass hier die Wärmestrahlung / Infrarotstrahlung fehlt. Bei klarem Himmel bewegt sich die Wellenlänge der IR-Strahlung zwischen 7 – 14 µm IR, hierbei erreicht die IR-Strahlung die Erdoberfläche. Aber auch die Erde selbst strahlt Infrarot-Energie aus, die aber maximal 10 µm erreicht.<br>
Die Haut nimmt zu Ihrer Stimulans IR-Strahlung selektiv auf.<br>
Die infrarote Strahlungswärme in Wärmesystemen ist meist die gleiche, die der menschliche Körper produziert und ausstrahlt. Sie entspricht auch der der Sonne jedoch ohne die anteilige UV-Strahlung.<br>
Die Entdeckung bzw. der Nachweis der Infrarotstrahlung gelang erstmalig im Jahre 1800 dem deutschen Astronomen William Herschel durch Erwärmung einer geschwärzten Fläche, die mit dem IR-Anteil der spektral zerlegten Sonnenstrahlung beschienen wurde. Die Fähigkeit zur Erwärmung von Stoffen dient auch heute noch zum Nachweis der Infrarotstrahlung.</p>',
          ),


          'description_image' => array('technology/sonne.png'),
          'description_after' => '',
          'comparison_infra' => 'technology/infra.png',
            'infra_title' => 'INFRAROT TECHNOLOGIE',
          'infra_text' => '<p>
Moderne Infrarot-Heizungen funktionieren nach dem natürlichen Prinzip der Sonne. Elektroenergie wird zu fast 100% mittels Heizelement direkt in Infrarot-Wärmestrahlung umgewandelt. Sie erwärmt nicht die Luft direkt, sondern die Objekte, auf die sie auftrifft.<br>
Sie kennen das, wenn Sie an einem kalten, sonnigen Tag nach draußen gehen: in der Sonne ist es angenehm warm, im Schatten wird Ihnen kalt — obwohl die Lufttemperatur im Schatten und in der Sonne gleich ist.<br>
Das bedeutet, Sie können die Temperatur in Ihren Räumen 2 — 3 Grad niedriger lassen, um das gleiche Wärmeempfinden zu haben wie bei einer herkömmlichen Heizung. Damit sparen Sie eine Menge Energie!<br>
Bei Infrarot-Heizungen haben Sie im Prinzip zwei Wärmequellen: Die indirekte Raumwärme, die von Wänden und Möbel zurück gegeben wird und die direkte Strahlungswärme der Infrarotheizung, die bis zu 3 — 4 m spürbar ist. Da die Infrarot Wärmestrahlung auch auf die Wände trifft und von diesen aufgenommen wird, trocknen die Wände, isolieren dadurch besser und Schimmelpilze können nicht entstehen.<br>
Energieeffizienz zu erreichen und somit Heizkosten zu sparen ist unser Bestreben.<br>
</p>',
          'comparison_convect' => 'technology/convect.png',
          'convect_title' => 'KONVEKTION TECHNOLOGIE',
          'convect_text' => '<p>
Die herkömmlichen Heizungen funktionieren durch Erhitzung von Wasser mittels Brennstoff (Öl, Gas, Pellet). Das heiße Wasser wird durch die Rohre geleitet, wo ein Teil der Wärme gleich wieder verloren geht. Im Heizkörper angelangt erhitzt das Wasser den Heizkörper, der seinerseits die ihn umgebende Luft erwärmt.<br>
Die erwärmte Luft steigt nach oben, wodurch Luft auf der anderen Seite des Raums nach unten gedrückt wird über den Boden kriecht, bis sie durch den Heizkörper ebenfalls erwärmt wird und aufsteigt. Die Luft im Raum beginnt also zu zirkulieren.<br>
Zum einen entsteht dadurch die unerwünschte Wärmeschichtung (oben warm, unten kalt), zum Anderen wird dadurch der Staub, der sich auf dem Boden befindet, aufgewirbelt und macht Allergikern das Leben schwer. <br>
Diese Technologie ist also sehr ineffektiv, egal wie effizient der Heizkessel ist, wie gut die Heizungsrohre isoliert sind. Sie haben immer einen Wärmeverlust auf dem Weg zum Heizkörper und Sie haben immer die Wärmeschichtung.<br>
</p>',
          'scheme_img' => array('technology/scheme.png'),
            'scheme_title' => 'VERGLEICH ZWEI VERSCHEIDENE HEIZUNGSSYSTEMEN',
          'infra_house_title' => 'INFRAROTHEIZUNGSSYSTEM',
          'infra_house_image' =>  'technology/infra_house.png',
          'infra_house_description' => 'Das moderne zukunftsweisende unabhängige Infrarotheizungssystem besteht aus:<br>
- Solarzellen<br>
- Wechselrichter<br>
- Batteriespeicher<br>
- Stromzähler für Bezug und Einspeisung<br>
- Infrarotheizkörpern<br>
- elektronische Thermostate<br>
- Warmwasseraufbereitung ( Durchlauferhitzer bzw. Boiler)<br>
- Stromleitungen<br>
',

          'convect_house_title' => 'WASSERBASIERTES HEIZUNGSSYSTEM',
          'convect_house_image' =>  'technology/convect_house.png',
          'convect_house_description' => 'Das konventionelle, wasserbasierende Heizungssystem besteht aus:<br>
- Heiz-, Brennkessel oder Wärmepumpe<br>
- Steuerung für Kessel bzw. Wärmepumpe<br>
- Schornstein<br>
- Brauchwasserspeicher<br>
- Pumpenstation<br>
- Membran-Ausdehnungsgefäß<br>
- Manometer<br>
- unzählige Ventile<br>
- unendliche Rohrleitungen <br>
- Heizkörper<br>
- extra Raum für Technik<br>
- drehbare Thermostate<br>
- Pumpe<br>
- Sicherheitsventile<br>
- Thermosyfon <br>
- Spengler<br>
- unendliche Fühler <br>
- sehr teuer Planung für das Heizungssystem<br>
- dazu kommt gleich eine riesige Luftungsanlage, weil an eine Seite durch reine Konvektion wird Sauerstoff verbrannt und beim lüften geht Wärmeenergie verloren <br>
',
        ];
    }
}