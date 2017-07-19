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
          'comparison_img' => array('technology/comparison.png'),
          'scheme_img' => array('technology/scheme.png'),
        ];
    }
}