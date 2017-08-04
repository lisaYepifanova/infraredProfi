<?php

class Model_Default extends Model
{
    public function get_data()
    {
        return array(
          'footer_links' => array(
            array(
              'title' => 'ÜBER UNS',
              'link' => '/uber-uns'
            ),
            array(
              'title' => 'FAQ',
              'link' => '/faq'
            ),
            array(
              'title' => 'DOWNLOAD',
              'link' => '/download'
            ),
            array(
              'title' => 'FÜR HÄNDLER',
              'link' => '/fur-handler'
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
              'value' => 'KONTAKT',
              'link' => '/kontakt'
            ),
            array(
              'icon' => 'icons/contacts/chat.png',
              'value' => 'FÜR HÄNDLER',
              'link' => '/fur-handler'
            ),
          ),
          'modal_menu' => array(
            array(
              'title' => 'HOME',
              'link' => '/'
            ),
            array(
              'title' => 'TECNOLOGIE',
              'link' => '/tecnologie'
            ),
            array(
              'title' => 'UNSERE PRODUKTE',
              'link' => '/unsere-produkte'
            ),
            array(
              'title' => 'ÜBER UNS',
              'link' => '/uber-uns'
            ),
            array(
              'title' => 'FÜR HÄNDLER',
              'link' => '/fur-handler'
            ),
            array(
              'title' => 'KONTAKT',
              'link' => '/kontakt'
            ),
          ),
          'site_logo' => 'site_logo.png'
        );
    }
}
