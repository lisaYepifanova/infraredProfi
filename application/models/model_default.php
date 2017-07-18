<?php

class Model_Default extends Model
{
    public function get_data()
    {
        return array(
          'footer_links' => array(
            array(
              'title' => 'О нас',
              'link' => '/about-us'
            ),
            array(
              'title' => 'FAQ',
              'link' => '/faq'
            ),
            array(
              'title' => 'Инструкция',
              'link' => ''
            ),
            array(
              'title' => 'Стать дилером',
              'link' => ''
            ),
            array(
              'title' => 'Page1',
              'link' => ''
            ),
            array(
              'title' => 'Page2',
              'link' => ''
            ),
            array(
              'title' => 'Page3',
              'link' => ''
            ),
          ),
          'contacts' => array(
            array(
              'icon' => '',
              'value' => 'test@gmail.com'
            ),
            array(
              'icon' => '',
              'value' => '+30661234567'
            ),
            array(
              'icon' => '',
              'value' => 'location'
            ),
            array(
              'icon' => '',
              'value' => 'Became a dealer'
            ),
          ),
          'modal_menu' => array(
            array(
              'title' => 'Главная',
              'link' => '/'
            ),
            array(
              'title' => 'Продукты',
              'link' => ''
            ),
            array(
              'title' => 'Галерея',
              'link' => ''
            ),
            array(
              'title' => 'О компании',
              'link' => '/about-us'
            ),
            array(
              'title' => 'Стать дилером',
              'link' => ''
            ),
            array(
              'title' => 'Контакты',
              'link' => '/contact'
            ),
          )
        );
    }
}
