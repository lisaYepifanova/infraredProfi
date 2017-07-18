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
              'icon' => 'icons/contacts/mail.png',
              'value' => 'test@gmail.com',
              'link' => 'mailto:test@gmail.com'
            ),
            array(
              'icon' => 'icons/contacts/phone.png',
              'value' => '+30661234567',
              'link' => 'tel:+30661234567'
            ),
            array(
              'icon' => 'icons/contacts/location.png',
              'value' => 'location',
              'link' => '/contact'
            ),
            array(
              'icon' => 'icons/contacts/chat.png',
              'value' => 'Became a dealer',
              'link' => '/registration'
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
