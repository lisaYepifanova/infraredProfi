<?php

class Model_Default extends Model
{
    public function get_data()
    {
        return [
          'footer_links' => [


          ],
          'footer_service_links' => [
            [
              'title' => 'Datenschutz',
              'link' => '/datenschutz',
            ],
            [
              'title' => 'AGB',
              'link' => '/agb',
            ],
            [
              'title' => 'Impressum',
              'link' => '/impressum',
            ],
          ],
          'phones' => [
            [
              'text' => '+49 (0) 33638 91 11 73',
              'tel' => '+49033638911173',
            ],
            [
              'text' => '+49 (0) 152 235 008 44',
              'tel' => '+49015223500844',
            ],
            [
              'text' => '+49 (0) 151 281 318 23',
              'tel' => '+49015128131823',
            ],
          ],
          'contacts' => [
            [
              'icon' => 'icons/contacts/mail.png',
              'value' => 'info@infraredprofi.de',
              'link' => 'mailto:test@gmail.com',
              'name' => 'email',
            ],
            [
              'icon' => 'icons/contacts/phone.png',
              'name' => 'phone',
            ],
            [
              'icon' => 'icons/contacts/location.png',
              'value' => 'KONTAKT',
              'link' => '/kontakt',
              'name' => 'kontakt',
            ],
            [
              'icon' => 'icons/contacts/chat.png',
              'value' => 'FÜR HÄNDLER',
              'link' => '/fur-handler',
              'name' => 'fur-handler',
            ],
          ],
          'modal_menu' => [
            [
              'title' => 'HOME',
              'link' => '/',
            ],
            [
              'title' => 'TECNOLOGIE',
              'link' => '/tecnologie',
            ],
            [
              'title' => 'UNSERE PRODUKTE',
              'link' => '/unsere-produkte',
            ],
            [
              'title' => 'ÜBER UNS',
              'link' => '/uber-uns',
            ],
            [
              'title' => 'FÜR HÄNDLER',
              'link' => '/fur-handler',
            ],
            [
              'title' => 'KONTAKT',
              'link' => '/kontakt',
            ],
            [
              'title' => 'FAQ',
              'link' => '/faq',
            ],
               [
              'title' => 'DOWNLOAD',
              'link' => '/download',
            ],
          ],
          'site_logo' => 'site_logo.png',
        ];
    }
}
