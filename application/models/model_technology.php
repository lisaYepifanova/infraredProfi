<?php

class Model_Technology extends Model
{
    public function get_data()
    {
        return [
          'description_before' => array(
            'Инфракра́сное излуче́ние — электромагнитное излучение, занимающее 
          спектральную область между красным концом видимого света 
          (с длиной волны λ = 0,74 мкм и частотой 430 ТГц) и микроволновым 
          радиоизлучением (λ ~ 1—2 мм, частота 300 ГГц).',
            'Оптические свойства веществ в инфракрасном излучении значительно 
          отличаются от их свойств в видимом излучении. Например, слой воды в 
          несколько сантиметров непрозрачен для инфракрасного излучения с 
          λ = 1 мкм. Инфракрасное излучение составляет большую часть излучения 
          ламп накаливания, газоразрядных ламп, около 50 % излучения Солнца; 
          инфракрасное излучение испускают некоторые лазеры. Для его регистрации 
          пользуются тепловыми и фотоэлектрическими приёмниками, а также специальными
           фотоматериалами.',
            'Весь диапазон инфракрасного излучения условно делят на три области:',
            'ближняя: λ = 0,74—2,5 мкм;',
            'средняя: λ = 2,5—50 мкм;',
            'далёкая: λ = 50—2000 мкм.',
          ),


          'description_image' => array('technology/sonne.png'),
          'description_after' => array(''),
          'comparison_infra' => 'technology/infra.png',
            'infra_title' => 'ИНФРАКРАСНАЯ ПАНЕЛЬ',
          'infra_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
          'comparison_convect' => 'technology/convect.png',
          'convect_title' => 'КОНВЕКЦИОННАЯ БАТАРЕЯ',
          'convect_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                           nisi ut aliquip ex ea commodo consequat.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                           nisi ut aliquip ex ea commodo consequat.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                           nisi ut aliquip ex ea commodo consequat.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                           nisi ut aliquip ex ea commodo consequat.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                           nisi ut aliquip ex ea commodo consequat.mod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                           nisi ut aliquip ex ea commodo consequat.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                           nisi ut aliquip ex ea commodo consequat.',
          'scheme_img' => array('technology/scheme.png'),
          'infra_house_title' => 'Infrared panels',
          'infra_house_image' =>  'technology/infra_house.png',
          'infra_house_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </br>
                                        1)Lorem ipsum dolor sit amet</br>
                                         2) Lorem ipsum dolor sit amet </br>
                                         3)Lorem ipsum dolor sit amet.</br>
                                         4) Lorem ipsum dolor sit amet',

          'convect_house_title' => 'Convection',
          'convect_house_image' =>  'technology/convect_house.png',
          'convect_house_description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </br>
                                        1)Lorem ipsum dolor sit amet.</br>
                                         2) Lorem ipsum dolor sit amet </br>
                                         3)Lorem ipsum dolor sit amet</br>
                                         4) Lorem ipsum dolor sit amet',
        ];
    }
}