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
              'link' => '/documents'
            ),
            array(
              'title' => 'Стать дилером',
              'link' => '/registration'
            )
          ),
          'footer_service_links' => array(
            array(
              'title' => 'Datenschutz',
              'link' => '/datenschutz'
            ),
            array(
              'title' => 'AGB',
              'link' => '/agb'
            ),
            array(
              'title' => 'Impressum',
              'link' => '/impressum'
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
              'title' => 'Технология',
              'link' => '/technology'
            ),
            array(
              'title' => 'Галерея',
              'link' => '/products'
            ),
            array(
              'title' => 'О компании',
              'link' => '/about-us'
            ),
            array(
              'title' => 'Стать дилером',
              'link' => '/registration'
            ),
            array(
              'title' => 'Контакты',
              'link' => '/contact'
            ),
          ),
          'site_logo' => 'site_logo.png'
        );
    }
}
