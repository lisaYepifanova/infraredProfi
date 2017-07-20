<?php
class Model_Product extends Model
{
    public function get_data()
    {
        return array(
          'name' => 'Product Name',
          'description' => "At vero eos et accusamus et iusto odio dignissimos
            ducimus qui blanditiis praesentium voluptatum deleniti atque corrupi 
            quos dolores et quas molestias excepturi sint occaecati cupiditate 
            non provident, similique sunt in culpa qui officia deserunt mollitia
            animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis
            est et expedita distinctio.",
          'gallery' => array(
            'products/item1/item1.jpg',
            'products/item1/item2.jpg',
            'products/item1/item3.jpg',
            'products/item1/item4.jpg',
            'products/item1/item5.jpg'
          ),
          'colours' => array (
            array(
              'colour_name' => 'red',
              'colour_code' => 'red'
            ),
            array(
              'colour_name' => 'green',
              'colour_code' => 'green'
            ),
            array(
              'colour_name' => 'blue',
              'colour_code' => 'blue'
            ),
          ),
          'technische_daten' => array (
            'farbe' => array (
              'name' => 'Farbe',
              'value' => 'Ivory'
            ),
            'leistung' => array(
              'name' => 'Leistung',
              'value' => '375 Watt'
            ),
            'netzspannung' => array(
              'name' => 'Netzspannung',
              'value' => '230V / 50-60 Hz'
            ),
            'beheizte_raumgrose' => array(
              'name' => 'Beheizte Raumgröße',
              'value' => '7-10 m2, oder bis 26 m3'
            ),
            'vorne' => array(
              'name' => 'Betriebstemperatur Oberlache vorne',
              'value' => '+70°C Max'
            ),
            'hinten' => array(
              'name' => 'Betriebstemperatur Oberlache hinten',
              'value' => '+85°C Max'
            ),
            'abmessungen' => array(
              'name' => 'Abmessungen',
              'value' => '600 x 600 x 12 mm'
            ),
            'gewicht' => array(
              'name' => 'Gewicht',
              'value' => '10kg (leicht, platzsparend)'
            ),
            'warmeeffekt' => array (
              'name' => 'Warmeeffekt',
              'value' => 'schon nach wenigen Minuten'
            ),
            'schutzgrad' => array (
              'name' => 'Schutzgrad',
              'value' => 'IP44'
            ),
            'zertifikate' => array (
              'name' => 'Zertifikate',
              'value' => 'CE-, RoHs- Zertifiziert'
            ),
            'garantie' => array (
              'name' => 'Garantie',
              'value' => '5 Jahre'
            ),
            'gewahrleistung' => array (
              'name' => 'Gewahrleistung',
              'value' => '30 Jahre'
            )
          )
        );
    }
}