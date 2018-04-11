<?php

class Model_Default extends Model {
  public function get_data() {

    include 'application/connection.php';

/*


$query = $mysqli->query(" DROP TABLE IF EXISTS `languages`");
             $upd = $mysqli->query($query);

            $query = $mysqli->query("CREATE TABLE `languages` (`id` INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(45) NULL, `name` VARCHAR(45) NULL, `icon` TEXT NULL, PRIMARY KEY (`id`))");
             $upd = $mysqli->query($query);

            $query = $mysqli->query("INSERT INTO `languages` (`id`, `title`, `name`, `icon`) VALUES ('1', 'DE', 'deutsch', 'DE.png')");
             $upd = $mysqli->query($query);

            $query = $mysqli->query("INSERT INTO `languages` (`id`, `title`, `name`, `icon`) VALUES ('2', 'EN', 'english', 'EN.png')");
             $upd = $mysqli->query($query);


              $query = $mysqli->query("ALTER TABLE `agb` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `info`");
             $upd = $mysqli->query($query);


    $query = $mysqli->query("ALTER TABLE `bildmotive` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `ord`");
             $upd = $mysqli->query($query);

    $query = $mysqli->query("ALTER TABLE `bildmotive_catalog` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `short_description`");
             $upd = $mysqli->query($query);

    $query = $mysqli->query("ALTER TABLE `bildmotive_images` ADD COLUMN `eng_category_id` INT NULL AFTER `category_id`");
             $upd = $mysqli->query($query);

        $query = $mysqli->query("ALTER TABLE `categories` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `isOnHomepage`");
             $upd = $mysqli->query($query);

    $query = $mysqli->query("ALTER TABLE `colours` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `image`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `contact_page` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `info`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `contacts` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `name`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `datenschutz` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `info`");
             $upd = $mysqli->query($query);

        $query = $mysqli->query("ALTER TABLE `document_categories` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `category_name`");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("ALTER TABLE `documents` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `category`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `faq` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `answer`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `footer_links` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `link`");
             $upd = $mysqli->query($query);

        $query = $mysqli->query("ALTER TABLE `footer_service_links` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `link`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `garantie` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `text`");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("ALTER TABLE `header_links` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `link`");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("ALTER TABLE `header_properties` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `description`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `homepage_info` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `sign_image`");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("ALTER TABLE `images` ADD COLUMN `eng_prod_id` INT NULL DEFAULT 1 AFTER `prod_id`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `impressum` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `info`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `mitglied` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `info`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `modal_menu` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `link`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `philosophy` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `text`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `product_features` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `product_id`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `product_principle` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `product_id`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `products` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `isOnHomepage`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `product_thermostat` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `description`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `registration_angebot` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `icon`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `registration_page` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `form_title`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `registration_services` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `icon`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `site_settings` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `link_path`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `technologie` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `convect_house_description`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `thermostat` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `ord`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `uber_uns` ADD COLUMN `lid` INT NULL DEFAULT 1 AFTER `about_us_description`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `agb` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `agb` (`lid`) VALUES ('2')");
             $upd = $mysqli->query($query);



     $query = $mysqli->query("ALTER TABLE `bildmotive_images` CHANGE COLUMN `category_id` `category_id_1` INT(11) NULL DEFAULT NULL , CHANGE COLUMN `eng_category_id` `category_id_2` INT(11) NULL DEFAULT NULL");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `datenschutz` ADD COLUMN `name` TEXT NULL AFTER `id`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("UPDATE `datenschutz` SET `name`='DATENSCHUTZ' WHERE `id`='1'");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `datenschutz` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT ");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `datenschutz` (`lid`) VALUES ('2')");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("ALTER TABLE `impressum` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT , ADD COLUMN `name` TEXT NULL AFTER `id`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `impressum` (`lid`) VALUES ('2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("UPDATE `impressum` SET `name`='IMPRESSUM' WHERE `id`='1'");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `mitglied` ADD COLUMN `name` TEXT NULL AFTER `id`");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("INSERT INTO `mitglied` (`lid`) VALUES ('2')");
             $upd = $mysqli->query($query);



     $query = $mysqli->query("INSERT INTO `registration_page` (`id`, `top_block`, `description`, `service_title`, `angebot_bg`, `service_bg`, `angebot_title`, `form_title`, `lid`) VALUES ('2', 'Top english block', 'engl description', 'english service title', 'registration/angebot_bg.jpeg', 'registration/services_bg.jpeg', 'OUR ANGEBOT', 'english form title', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `registration_services` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT , CHANGE COLUMN `lid` `eng_description` TEXT NULL DEFAULT NULL");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `registration_angebot` CHANGE COLUMN `lid` `eng_description` TEXT NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `registration_angebot` ADD COLUMN `eng_title` TEXT NULL AFTER `eng_description`");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `registration_page` ADD COLUMN `title` VARCHAR(45) NULL AFTER `id`");
             $upd = $mysqli->query($query);



     $query = $mysqli->query("UPDATE `registration_page` SET `title`='F&Uuml;R H&Auml;NDLER' WHERE `id`='1'");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("UPDATE `registration_page` SET `title`='FOR DEALERS' WHERE `id`='2'");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("ALTER TABLE `registration_page` ADD COLUMN `form` TEXT NULL AFTER `lid`");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("UPDATE `registration_page` SET `form`= '' WHERE `id`='1'");
             $upd = $mysqli->query($query);


    $query = $mysqli->query("UPDATE `registration_page` SET `form`= '' WHERE `id`='2'");
             $upd = $mysqli->query($query);


    $query = $mysqli->query("UPDATE `registration_page` SET `form`=' <form role=\"form\" action=\"\" method=\"post\">\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12 light-text \">\n          Please fill in all the fields:\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"name\">Ihr Name:</label>\n          <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\">\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"telephone\">Ihre Telefonnummer:</label>\n          <input type=\"tel\" class=\"form-control\" id=\"telephone\"\n                 name=\"telephone\">\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"bundesland\">Bundesland:</label>\n          <select class=\"form-control\" id=\"country\" name=\"bundesland\">\n            <option selected=\"\" disabled=\"\"></option>\n            <option>Berlin</option>\n<option>Brandenburg</option>\n<option>Mecklenburg-Vorpommern</option>\n<option>Sachsen</option>\n<option>Schleswig-Holstein</option>\n<option>Hamburg</option>\n<option>Bremen</option>\n<option>Niedersachsen</option>\n<option>Sachen-Anhalt</option>\n<option>Hessen</option>\n<option>Nordrhein-Westfalen</option>\n<option>Rheinland-Pfalz</option>\n<option>Saarland</option>\n<option>Baden-W&uuml;rttemberg</option>\n<option>Bayern</option>\n<option>Th&uuml;ringen</option>\n          </select>\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"email\">Ihre Email:</label>\n          <input type=\"email\" class=\"form-control\" id=\"email\"\n                 name=\"email\">\n        </div>\n      </div>\n\n      <div class=\"row\">\n        <div class=\"form-group col-xs-12\">\n          <label for=\"ihre_nachricht\">Ihre Nachricht:</label>\n          <textarea class=\"form-control\" rows=\"4\" id=\"ihre_nachricht\"\n                    name=\"ihre_nachricht\"></textarea>\n        </div>\n      </div>\n      <div class=\"row text-center\">\n        <button type=\"submit\" class=\"btn\">ANFRAGE SENDEN</button>\n      </div>\n    </form>' WHERE `id`='1'");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("UPDATE `registration_page` SET `form`=' <form role=\"form\" action=\"\" method=\"post\">\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12 light-text \">\n          Please fill in all the fields:\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"name\">Your name:</label>\n          <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\">\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"telephone\">Your phone number:</label>\n          <input type=\"tel\" class=\"form-control\" id=\"telephone\"\n                 name=\"telephone\">\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"bundesland\">Bundesland:</label>\n          <select class=\"form-control\" id=\"country\" name=\"bundesland\">\n            <option selected=\"\" disabled=\"\"></option>\n            <option>Berlin</option><option>Brandenburg</option><option>Mecklenburg-Vorpommern</option><option>Sachsen</option><option>Schleswig-Holstein</option><option>Hamburg</option><option>Bremen</option><option>Niedersachsen</option><option>Sachen-Anhalt</option><option>Hessen</option><option>Nordrhein-Westfalen</option><option>Rheinland-Pfalz</option><option>Saarland</option>\n<option>Baden-W&uuml;rttemberg</option>\n<option>Bayern</option>\n<option>Th&uuml;ringen</option>\n          </select>\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"email\">Your Email:</label>\n          <input type=\"email\" class=\"form-control\" id=\"email\"\n                 name=\"email\">\n        </div>\n      </div>\n\n      <div class=\"row\">\n        <div class=\"form-group col-xs-12\">\n          <label for=\"ihre_nachricht\">Your Message:</label>\n          <textarea class=\"form-control\" rows=\"4\" id=\"ihre_nachricht\"\n                    name=\"ihre_nachricht\"></textarea>\n        </div>\n      </div>\n      <div class=\"row text-center\">\n        <button type=\"submit\" class=\"btn\">SEND</button>\n      </div>\n    </form>' WHERE `id`='2'");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("INSERT INTO `contact_page` (`id`, `map`, `info`, `lid`) VALUES ('2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.9944864180425!2d14.05899131580191!3d52.37051997978627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a827fad5f7b51d%3A0xa124959d77e756ec!2zRXJuc3QtVGjDpGxtYW5uLVN0cmHDn2UgNTQsIDE1NTE3IEbDvHJzdGVud2FsZGUvU3ByZWUsINCd0ZbQvNC10YfRh9C40L3QsA!5e0!3m2!1suk!2sua!4v1502032103701            ', 'English contacts', '2')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("ALTER TABLE `contact_page` ADD COLUMN `name` VARCHAR(45) NULL AFTER `id`");
             $upd = $mysqli->query($query);



         $query = $mysqli->query("INSERT INTO `header_properties` (`id`, `icon`, `title`, `description`, `lid`) VALUES ('5', 'icons/properties/coins.png', 'ENGLISH ITEM', 'english description', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `homepage_info` (`id`, `header_title`, `property_title`, `property_image`, `sign_image`, `lid`) VALUES ('2', 'english title', 'English property', 'infrarothezung_und_erneubare_energie-min.jpg', '', '2')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("ALTER TABLE `homepage_info` ADD COLUMN `gallery_name` VARCHAR(45) NULL AFTER `lid`");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO `philosophy` (`id`, `text`, `lid`) VALUES ('2', 'english philosophy', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `uber_uns` ADD COLUMN `name` VARCHAR(45) NULL AFTER `lid`");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("UPDATE `uber_uns` SET `name`='&Uuml;BER UNS' WHERE `id`='1'");
             $upd = $mysqli->query($query);



         $query = $mysqli->query("INSERT INTO `uber_uns` (`id`, `mission_text`, `vision_text`, `mission_img`, `vision_img`, `about_us_description`, `lid`, `name`) VALUES ('2', 'english mission', 'vision english', 'about-us/mission.jpg', 'about-us/vision.jpg', 'english description', '2', 'ABOUT US')");
             $upd = $mysqli->query($query);



         $query = $mysqli->query("ALTER TABLE `technologie` ADD COLUMN `name` VARCHAR(45) NULL AFTER `lid`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `footer_links` (`id`, `title`, `link`, `lid`) VALUES ('33', 'eng_link', '/faq', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `modal_menu` (`id`, `title`, `link`, `lid`) VALUES ('9', 'English modal link', '/faq', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `header_links` (`id`, `title`, `link`, `lid`) VALUES ('8', 'Header-link', '/faq', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("UPDATE `header_links` SET `id`='3' WHERE `id`='12'");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("UPDATE `header_links` SET `id`='4' WHERE `id`='112'");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("UPDATE `header_links` SET `id`='5' WHERE `id`='113'");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("UPDATE `header_links` SET `id`='6' WHERE `id`='1122'");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("UPDATE `header_links` SET `id`='7' WHERE `id`='11212'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `contacts` (`id`, `icon`, `value`, `link`, `name`, `lid`) VALUES ('5', 'icons/contacts/mail.png', 'info@infrared24.com', 'mailto:info@infrared24.com', 'email', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `contacts` (`id`, `icon`, `name`, `lid`) VALUES ('6', 'icons/contacts/phone.png', 'phone', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `contacts` (`id`, `icon`, `value`, `link`, `name`, `lid`) VALUES ('7', 'icons/contacts/location.png', 'CONTACTS', '/kontakt', 'kontakt', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `contacts` (`id`, `icon`, `value`, `link`, `name`, `lid`) VALUES ('8', 'icons/contacts/chat.png', 'FOR DEALERS', '/fur-handler', 'fur-handler', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `footer_service_links` (`id`, `title`, `link`, `lid`) VALUES ('4', 'AGB eng', '/agb', '2')");
             $upd = $mysqli->query($query);




         $query = $mysqli->query("INSERT INTO `footer_service_links` (`id`, `title`, `link`, `lid`) VALUES ('5', 'Datenschutz eng', '/datenschutz', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `footer_service_links` (`id`, `title`, `link`, `lid`) VALUES ('6', 'Impressum eng', '/impressum', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('12', 'HOME', 'main/edit/', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('13', 'TECHNOLOGIE', 'technologie/edit/', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('14', 'ÃœBER UNS', 'uber-uns/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('15', 'FÃœR HÃ„NDLER', 'fur-handler/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('16', 'KONTAKT', 'kontakt/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('17', 'FAQ', 'faq/edit', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('18', 'DOWNLOAD', 'download/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('19', 'AGB', 'agb/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('20', 'IMPRESSUM', 'impressum/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('21', 'DATENSCHUTZ', 'datenschutz/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`id`, `link_name`, `link_path`, `lid`) VALUES ('22', 'MITGLIED', 'mitglied/edit', '2')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("ALTER TABLE `bildmotive` CHANGE COLUMN `lid` `eng_title` TEXT NULL DEFAULT NULL");
             $upd = $mysqli->query($query);


$query = $mysqli->query(" DROP TABLE IF EXISTS `page_alias`");
             $upd = $mysqli->query($query);
         $query = $mysqli->query("CREATE TABLE `page_alias` (`id` INT NOT NULL AUTO_INCREMENT, `de` TEXT NULL, `en` TEXT NULL, PRIMARY KEY (`id`))");
             $upd = $mysqli->query($query);




         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('uber-uns', 'about-us')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('technologie', 'technology')");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('produkte', 'products')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('fur-handler', 'for-dealers')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('kontakt', 'contact')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('impressum', 'imprint')");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('datenschutz', 'data-protection')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('agb', 'conditions')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('mitglied', 'member')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('faq', 'faq')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('download', 'download')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('bildmotive', 'image-motives')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('transparente-glasheizungen', 'transparent-glass-heaters')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('glasheizungen', 'glass-heaters')");
             $upd = $mysqli->query($query);



     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('spiegelheizungen', 'mirror-heating')");
             $upd = $mysqli->query($query);


     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('badheizungen', 'bathroom-heating')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('standart-heizungen', 'standard-heaters')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('deckenheizungen', 'cover-heating')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('infrarotstrahler', 'infrared-radiators')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('infrarotstrahler-fur-gewerbe', 'infrared-radiator-for-commerce')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('infrarotstrahler-fur-industrie', 'infrared-radiator-for-industry')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('premium-hybrid-system', 'premium-hybrid-system')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('regeltechnik', 'regeltechnik')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('sonstige-produkte', 'other-products')");
             $upd = $mysqli->query($query);

     $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('zubehor', 'equipment')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('tempo-digital-thermostat', 'tempo-digital-thermostat')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('3ie-design-thermostat', '3ie-design-thermostat')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('4ie-smart-thermostat', '4ie-smart-thermostat')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('untertischheizungen', 'under-table-heaters')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('heizplate-fur-buro', 'heating-plate-for-office')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('heizplate-fur-arbeitsplatz', 'heating-plate-for-workplace')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('wandhalterung', 'wall-holder')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('abstraktionen', 'abstractions')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('autos', 'cars')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('blumen', 'flowers')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('essen', 'food')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('feuer', 'fire')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('kindheit', 'childhood')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('kino', 'movies')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('kunst', 'art')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('meer', 'sea')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('musik', 'music')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('natur', 'nature')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('sport', 'sport')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('stadte', 'city')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('strand', 'beach')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('teetime', 'teatime')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('tiere', 'animals')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('universum', 'universe')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('vogel', 'birds')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('login', 'login')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('main', 'main')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `bildmotive_catalog` (`id`, `title`, `image`, `description`, `ord`, `parent_id`, `name`, `lid`) VALUES ('2', 'IMAGE MOTIVES', 'bildmotive/10009.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '131', '0', 'image motives', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `title`, `ord`, `isOnHomepage`, `lid`) VALUES ('11', 'equipment', '0', 'products/zubehor/main.jpg', 'EQUIPMENT', '130', '0', '2')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('product', 'product')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('edit', 'edit')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('add', 'add')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('delete', 'delete')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('related-products', 'related-products')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `categories` CHANGE COLUMN `image` `image` TEXT NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `title`, `ord`, `isOnHomepage`, `lid`) VALUES ('11', 'regeltechnik', '0', 'thermostats/main.jpg', 'REGELTECHNIK', '130', '0', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `title`, `ord`, `isOnHomepage`, `lid`) VALUES ('12', 'other-products', '0', 'products/sonstige/main.jpg', 'OTHER PRODUCTS', '150', '0', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `title`, `ord`, `isOnHomepage`, `lid`) VALUES ('13', 'equipment', '0', 'products/zubehor/main.jpg', 'EQUIPMENT', '160', '0', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `title`, `ord`, `isOnHomepage`, `lid`) VALUES ('14', 'infrared-radiators', '0', 'products/infrarotstrahler/main.jpg', 'INFRARED RADIATORS', '110', '1', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `short_description`, `image`, `parent_id`, `description`, `ord`, `lid`) VALUES ('8', 'tempo-digital-thermostat', 'TEMPO&trade; DIGITAL THERMOSTAT', '1', '1', 'Das Tempo&trade; Digital-Thermostat l&auml;sst sich durch seine intuitive Bedienung &uuml;ber Drehknopf und Schieberegler\nschnell und in nur wenigen Schritten einstellen.', 'thermostats/tempo/1.jpeg', '11', 'Das Tempo&trade; Digital-Thermostat l&auml;sst sich durch seine intuitive Bedienung &uuml;ber Drehknopf und Schieberegler schnell und in nur wenigen Schritten einstellen. Zus&auml;tzlich zum Wochenprogramm ist der Funktionswechsel zu Frostschutz oder manueller Bedienung sehr einfach. Durch die pr&auml;zise Schaltung der Heizzeiten arbeitet das\nWarmup&reg; Tempo&trade; besonders zuverl&auml;ssig - so sparen Sie mehr Energie ein.\n\nEinfache Einstellung durch Schieberegler und Drehknopf Gro&szlig;es, klares, gut lesbares Display Programmmodus, Frostschutz oder manuelle Bedienung Erh&auml;ltlich in den Farben Wei&szlig;, Schwarz und Creme', '310', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `short_description`, `image`, `parent_id`, `description`, `ord`, `lid`) VALUES ('9', '3ie-design-thermostat', '3IE DESIGN <br>THERMOSTAT', '1', '1', 'F&uuml;r das 3iE Design-Thermostat wurde eine ganz besondere Touchscreen-Oberfl&auml;che entwickelt - eingefasst in einen edlen Chromrand f&uuml;gt es sich nahtlos in die moderne Wohnumgebung ein. ', 'thermostats/3ie/1.jpg', '11', 'F&uuml;r das 3iE Design-Thermostat wurde eine ganz besondere Touchscreen-Oberfl&auml;che entwickelt - eingefasst in einen edlen Chromrand f&uuml;gt es sich nahtlos in die moderne Wohnumgebung ein. So sieht das 3iE nicht nur gut aus, es &uuml;berzeugt auch durch optimierte Leistung. Das Thermostat ist sehr einfach zu installieren.\n\nEs kann sowohl als Teil eines neuen Warmup&reg; Fu&szlig;boden-Heizsystems verwendet werden, als auch an ein bereits vorhandenes System angeschlossen werden. Das 3iE Design-Thermostat ist verschiedenen Farben erh&auml;ltlich und darf nur von einer zertifizierten Elektrofachkraft an das Stromnetz angeschlossen werden. Innovativ, interaktiv und intelligent - ein Energie-Profi f&uuml;r ihr Zuhause! </br></br> Das erste Thermostat mit einem 2,4\' Farbdisplay und integrierter Touchscreen-Technologie.</br> Besondere Selbstlerneigenschaften erm&ouml;glichen eine automatische Anpassung, vom &Ouml;ffnen eines Fensters bis hin zum Jahreszeitenwechsel. Das weltweit erste Thermostat mit dem einmaligen Active Energy Management&trade; so sparen Sie bis zu 10% auf ihrer Energiekosten-Abrechnung.', '320', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `short_description`, `image`, `parent_id`, `description`, `ord`, `lid`) VALUES ('10', '4ie-smart-thermostat', '4IE SMART <br>THERMOSTAT', '1', '1', 'Von einem Smartphone, Tablet oder Computer gesteuert, lernt das 4iE Smart Thermostat auf einzigartige Art und Weise auf Ihre Gewohnheiten zu reagieren. ', 'thermostats/4ie/1.jpg', '11', 'Von einem Smartphone, Tablet oder Computer gesteuert, lernt das 4iE Smart Thermostat auf einzigartige Art und Weise auf Ihre Gewohnheiten zu reagieren. Es bietet automatisch M&ouml;glichkeiten, Energie zu sparen, indem es Ihnen vorschl&auml;gt, welche Temperatur Sie zu welcher Zeit w&auml;hlen sollten oder wann sich das Heizsystem vorzeitig ausschalten sollte, z. B. bevor Sie t&auml;glich zu selben Zeit das Haus verlassen.</br></br>Mit der Funktion SmartGeo&trade; ist es angenehm warm, wenn Sie nach Hause kommen und es wird automatisch Energie eingespart, wenn Sie es nicht sind. Dabei werden die selben Ortungsdienste verwendet, die bereits in ihrem Smartphone integriert sind um so ihre Privatsph&auml;re optimal zu sch&uuml;tzen.</br></br>Smarter</br></br>Es kann nicht nur von ÃƒÂ¼berall bedient werden, es lernt auch ihre Heizung zu bedienen und ihre Einstellungen zu optimieren.</br></br>Besser</br></br>Steuert schnell und einfach ihre Heizung, bietet einen EnergieMonitor, komplett mit grafischen Anzeigen zu Energieverbrauch, Temperaturen und Kosten, ist lernf&auml;hig und individuell zu personalisieren.</br></br>Effizienter</br></br>Verbessern Sie ihre Energiebilanz mit einer optimalen Kostenkontrolle und niedrigem Verbrauch.', '330', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `image`, `parent_id`, `description`, `ord`, `lid`) VALUES ('11', 'wall-holder', 'WALL HOLDER', '0', '0', 'products/zubehor/1.jpg', '13', 'Diese Wandhalterung mit einstellbarem Winkel kann sowohl f&uuml;r Wand, als auch f&uuml;r eine Deckenmontage verwendet werden. So k&ouml;nnen Sie Ihr Heizger&uuml;t an beliebigen Orten anbringen und dabei den Neigungswinkel einstellen.', '340', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `image`, `parent_id`, `ord`, `lid`) VALUES ('12', 'under-table-heaters', 'UNDER TABLE HEATERS', '0', '1', 'products/sonstige/table/1.JPG', '12', '20', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `image`, `parent_id`, `ord`, `lid`) VALUES ('13', 'heating-plate-for-office', 'HEATING PLATE FOR OFFICES', '0', '1', 'products/sonstige/floor/1.jpg', '12', '30', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat` (`id`, `name`, `title`, `has_qualities`, `has_similar_products`, `image`, `parent_id`, `ord`, `lid`) VALUES ('14', 'heating-plate-for-workplace', 'HEATING PLATE FOR WORKPLACE', '0', '1', 'products/sonstige/metal/1.jpg', '12', '40', '2')");
             $upd = $mysqli->query($query);

    $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('21', 'abmessungen', '90 x 113 x 23 mm', '8')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('22', 'sensortyp', 'NTC 10&deg;K (enthalten)', '8')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('23', 'displaygr&ouml;&szlig;e', '45 x 50 mm', '8')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('24', 'schutzgrad', 'IP20', '8')");
             $upd = $mysqli->query($query);

        $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('25', 'betriebsspannung', '240/230 V: 50Hz', '8')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('26', 'max._geschaltete_last', '16A (Ohmsche Last), 1A (Induktive Last)', '8')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('27', 'programmfunktion', '4-Phasen/7-Tage-Programm', '8')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('28', 'pr&uuml;fzeichen', 'CE, ASTA BEAB', '8')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('29', 'sensortyp', 'NTC 10&deg;K (enthalten)', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('30', 'displaygr&ouml;&szlig;e', '2,4&quot;', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('31', 'schutzgrad', 'IP20', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('32', 'betriebsspannung', '240/230 V: 50 Hz', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('33', 'max._geschaltete_last', '16A (Ohmsche Last), 1A (Induktive Last)', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('34', 'programmfunktion', '10-Phasen / 7-Tage-Programm', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('35', 'abmessungen', '(H/B/T) 90 x 110 x 18 mm', '10')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('36', 'sensortyp', 'Luft und Boden/Umgebungsf&uuml;hler NTC10K ', '10')");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('37', 'installationstiefe', 'Zur Installation empfehlen wir Hohlraumdosen', '10')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('38', 'displaygr&ouml;&szlig;e', '3,5\"e;, vollfarbiger Touch-Screen', '10')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('39', 'schutzgrad', 'IP33', '10')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `thermostat_feature` (`id`, `feature`, `value`, `product_id`) VALUES ('40', 'garantie', '3 Jahre', '10')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `thermostats_images` ADD COLUMN `prod_en_id` VARCHAR(45) NULL AFTER `prod_id`");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='8' WHERE `id`='1'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='8' WHERE `id`='2'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='8' WHERE `id`='3'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='9' WHERE `id`='4'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='9' WHERE `id`='5'");
             $upd = $mysqli->query($query);


             $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='9' WHERE `id`='6'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='10' WHERE `id`='7'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='10' WHERE `id`='8'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='10' WHERE `id`='9'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='10' WHERE `id`='10'");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='11' WHERE `id`='11'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='11' WHERE `id`='12'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='13' WHERE `id`='13'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='13' WHERE `id`='14'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='13' WHERE `id`='15'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='13' WHERE `id`='16'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='14' WHERE `id`='17'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `thermostats_images` SET `prod_en_id`='14' WHERE `id`='18'");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("UPDATE `thermostats_images` SET `prod_en_id`='14' WHERE `id`='19'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE `thermostats_images` SET `prod_en_id`='12' WHERE `id`='20'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE `thermostats_images` SET `prod_en_id`='12' WHERE `id`='21'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE `thermostats_images` SET `prod_en_id`='12' WHERE `id`='22'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE `thermostats_images` SET `prod_en_id`='12' WHERE `id`='23'");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("DELETE FROM  `thermostats_images` WHERE `id`='40'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("DELETE FROM  `thermostats_images` WHERE `id`='39'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `product_thermostat` (`id`, `image`, `title`, `description`, `lid`) VALUES ('2', 'product-thermostat/item_thermostat.png', 'OPTIONAL:', 'Auch mit eingebautem programmierbarem Thermostat erh&auml;ltlich.<br>Damit  k&ouml;nnen Sie die W&auml;rme individuell regulieren und zeitlich programmieren.', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `short_description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('10', 'bathroom-heating', '0', 'products/bad/main.jpg', 'BATHROOM HEATING', '<p>Mit der Infrarot Glashandtuchtrockner RED AGE <strong>Modellreihe GHT</strong> inklusive Raumheizung Funktion, bekommen Sie nicht nur angenehme W&auml;rme in Ihr Badezimmer, sondern auch ein vorgew&auml;rmtes Badehandtuch. Unsere Infrarot Handtuchtrockner bieten Wellness-W&auml;rme durch den Infrarot-Tiefenw&auml;rmeeffekt, au&szlig;erdem sind sie hervorragende W&auml;rmequellen f&uuml;r ein warmes Bad und warme Handt&uuml;cher nach dem Duschen und Baden oder in der K&uuml;che, wenn eine kleine Heizung f&uuml;r die Geschirrhandt&uuml;cher fehlt Dank Schutzgrad IP44 ist der RED AGE Glashandtuchtrockner f&uuml;r Feuchtr&auml;ume und damit u.a. geeignet f&uuml;r einen Einsatz in Ihrem Badezimmer. Er kann in jedem Badezimmer an der Wand montiert werden.<br>\nDie RED AGE Handtuchhalterungen bestehen aus haldpoliertem Edelstahl, dies verleiht der Heizung eine zeitlose und edle Optik. Alle Infrarot Handtuchtrockner sind mit einem Stecker versehen und somit universell einsetzbar. Bei Ihnen zu Hause angekommen, m&uuml;ssen Sie den Handtuchtrockner nur noch mit den mitgelieferten Halterungen an der Wand befestigen, am Strom anschlie&szlig;en und schon f&auml;ngt der Infrarot Handtuchtrockner an zu heizen. \n<br><br>\n\nDie Infrarot Glasheizung <strong>Modellreihe GHT</strong> ist nur 8 mm flach wie bei modernen LCD-Fernseher und l&auml;sst sich mit wenigen Handgriffen schnell an der Wand montieren. Auch wenn er montiert ist, h&auml;ngt die Infrarotheizung nur ungef&auml;hr 4 cm von der Wand entfernt. Die Oberfl&auml;chentemperatur betr&auml;gt etwa 80-85&deg; C. Das Ber&uuml;hren der Oberfl&auml;che ist ohne weiteres m&ouml;glich. Ein Verbrennen ist ausgeschlossen, da die W&auml;rmeleitf&auml;higkeit von Glaskeramik wesentlich geringer ist. So ist das Ger&auml;t selbst f&uuml;r Kleinkinder und Tiere absolut ungef&auml;hrlich. <br>\nDie Infrarotheizung hat ein sehr edles Design und durch die qualitative Verarbeitung von hochwertigen Materialien hat sie h&ouml;chste Qualit&auml;t, was sich bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Glasheizung ist nahezu unbegrenzt und die Heizelemente sind fast verschlei&szlig;frei. Eine besonders hohe Energieeffizienz von 98 % spart Ihnen wertvolle Energiekosten und macht die Infrarotheizung besonders widerstandsf&auml;hig und langlebig. <br>\nDie Glaskfront ist in wei&szlig;, schwarz, Spiegel oder mit einem Motiv rahmenlos und mit einen hochwertigen Rundschliff (C-Schliff) versehen. Die Bilder auf den Ger&auml;ten sind besonders hochaufl&ouml;send und werden durch spezielle UV Druckverfahren auf die Infrarotheizungen bedruckt.<br>\nDurch den sog. &quot;Crumble Effekt&quot; wird die Verletzungsgefahr bei Bruch der Glas verhindert.\nDie Installation und Montage der Infrarotheizungen funktioniert kinderleicht. Einfach das Infrarotpaneel an der Wand befestigen, Netzstecker einstecken und schon heizt es.<br><br>\n<strong>Produktmerkmale:</strong><br>\n- Frontfl&auml;che aus hochwertigem 6 mm ESG Glas<br>\n- die Handtuchhalterungen aus handpoliertem Edelstahl<br>\n- Rundschliff an den Kanten<br>\n- spezielles Heizelement mit beidseitiger Abstrahlung<br>\n- rahmenloses Design<br>\n- hoher Wirkungsgrad: 85-90% Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme<br> \n- lange Lebensdauer: &uuml;ber 120.000 Stunden, da keine beweglichen Teile<br>\n- elektrischer Anschluss: Das HGlass Heizpaneel ist mit einem Stecker ausgestattet<br>\n- auch mit programmierbaren Thermostat erh&auml;ltlich<br><br>\nDas Einsparpotential bei Anschaffung einer Infrarotheizung gegen&uuml;ber zu &Ouml;l-, Gas-, Holzheizungen ist enorm, der laufende Energieverbrauch um ein Vielfaches geringer. Keine Entstehung von Feinstaub oder CO<sub><small>2</small></sub>, keine Energieverluste, keine Schimmelgefahr, besserer D&auml;mmwert, keine st&ouml;rende Ger&auml;usche- oder Geruchsbel&auml;stigung.<br>\nIn R&auml;umen in denen es zu hoher Luftfeuchtigkeit kommt, wie z. Beispiel ein Badezimmer, dimensionieren Sie die Leistung doppelt. Sie erleben dadurch ein Badevergn&uuml;gen wie am Meer. Sie frieren trotz nasser Haut nicht. Das ist auch der Vorteil einer Infrarotheizung.<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter. </i>', '', 'bathroom-heating', '1', '<div class=\"rectangle-wrapper\" style=\"height: 240px\">    \n <div id=\"row1\" class=\"rectangle\"\n               style=\"width:120px;height:240px;bottom:0;left:0;\">\n            600x1200\n          </div>\n\n          <div id=\"row2\" class=\"rectangle\"\n               style=\"width:100px;height:200px;bottom:0;left:120px;\">\n               500x1000\n          </div>\n\n          <div id=\"row3\" class=\"rectangle\"\n               style=\"width:100px;height:140px;bottom:0;left:220px;\">\n            500x700\n          </div>\n</div>', '0', '80', '1', '1', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `short_description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('11', 'cover-heating', '0', 'products/deckenheizungen/main.jpg', 'COVER HEATING', '<p>\nF&uuml;hlen Sie sich wie bei einem angenehmen Sonnenbad - die Infrarot-Heizung simuliert Sonnenw&auml;rme und heizt gezielt und schnell den Bereich, in dem Sie sich aufhalten. Die kompakte Deckenheizung ist mit 62 x 62 cm genau passend f&uuml;r die Montage in Raster- und Kassettendecken.<br>\nBei der Infrarot-Heizung muss nicht langwierig und ineffizient die gesamte Raumluft erw&auml;rmt werden, es werden nur die bestrahlten Objekte erw&auml;rmt. Ein weiterer Vorteil, besonders f&uuml;r Allergiker, ist die hier entfallende Luftumw&auml;lzung - so wird kein Staub in der umgew&auml;lzten Raumluft transportiert. <br>\nDie Infrarotheizungen sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, mit einer Effizienz von bis zu 99 %.<br> Infrarotheizungen verbrauchen bis zu 25% weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotheizungen sehr viel sicherer als gasbetriebene Systeme.<br> Durch die kleine Bauweise und das geringe Gewicht sind Infrarotpaneele die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden.<br>\nInfrarotheizungen sind im Betrieb absolut emissionsfrei und umweltfreundlich. Und sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie eine Heizung, die im Betrieb absolut kein CO<sub><small>2</small></sub> ausst&ouml;&szlig;t und damit 100% klimaneutral arbeitet.<br>\nDie Heizung erw&auml;rmt durch Infrarotstrahlen in nur wenigen Minuten den ausgerichteten Bereich und ist dabei weder zu riechen, zu h&ouml;ren noch durch Licht zu sehen. Insbesondere der hohe Wirkungsgrad in Verbindung mit einem verh&auml;ltnism&auml;&szlig;ig geringen Stromverbrauch zeichnen unsere Infrarotheizungen aus. <br><br>\n\n<strong>PRODUKTMERKMALE:</strong><br>\n- angenehme, wohlige W&auml;rme<br>\n- hoher Wirkungsgrad (99 % !), kaum W&auml;rmeverlust<br>\n- vielseitig einsetzbar<br>\n- sicherer Aufbau mit D&auml;mmstoff und Reflektor-Lage<br>\n- sehr flache Bauform, passt auch in 62,5 cm Raster- und Kassettendecken mit Standard<br>\n- einfache Installation, sofort betriebsbereit, sehr schnelle W&auml;rmeerzeugung<br>\n- ideal als Voll oder Zonenheizung anwendbar<br>\n- integrierter &Uuml;berhitzungsschutz<br>\n- hohe Kosten- und Energieersparnis gegen&uuml;ber herk&ouml;mmlichen Elektroheizungen<br><br>\nDie Deckenheizungen sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Wohnbereiche<br>\n- B&uuml;rogeb&auml;ude<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br><br>\n\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Deckenheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter. </i>\n</p>', '', 'cover-heating', '0', '<div class=\"rectangle-wrapper\" style=\"height: 248px\">     \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:124px;height:124px;bottom:124px;left:0;\">\n            620x620\n          </div>\n\n          <div id=\"row2\" class=\"rectangle\"\n               style=\"width:248px;height:124px;bottom:0;left:0;\">\n               1240x620\n          </div>\n</div>', '0', '100', '1', '1', '2')");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `short_description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('12', 'transparent-glass-heaters', '0', 'products/glass/main.jpg', 'TRANSPARENT GLASS HEATERS', '<p>Glas Infrarotheizung P750G-Visio ist die optimale L&ouml;sung f&uuml;r diejenigen, die Wert auf moderne High-Performance-Technologie, geringen Stromverbrauch und stilvolles Design legen.<br> Das Glasinfrarotpaneel besteht aus sehr festem Sicherheitsglas mit einer St&auml;rke von 8 mm. Dies ist die einzige absolut transparente Infrarotheizung. Verchromte Endkappen und Abdeckleisten verleihen dem Ger&auml;t eine besondere Eleganz, sodass diese Infrarotheizung in jeden Raum passt: ein privates Haus oder eine Wohnung, B&uuml;ro, Shop, Studio, Restaurant, Hotel usw.<br>Die Infrarot Glasheizung P750G-VISIO hat neben dekorativen Eigenschaften auch hervorragende technische Eigenschaften.<br> Auf das Glas wird eine spezielle transparente Beschichtung aufgetragen, w&auml;hrend durch sie elektrischer Strom flie&szlig;t entsteht eine W&auml;rmeenergie, die das Glaspaneel erw&auml;rmt, solange das Glas selbst Infrarotw&auml;rme abstrahlt.<br> Und weil das Glas sich 2 — 3 mal langsamer abk&uuml;hlt als das Metall, wird eine komfortable effiziente Beheizung des Raumes und ein &auml;u&szlig;erst niedriger Stromverbrauch erreicht.<br>Sie kann nicht nur als Komplett-Heizsystem bzw. Vollheizung eingesetzt werden, sondern auch als Zusatzheizung, Teilheizung oder &Uuml;bergangsheizung. Durch das Anwenden von Strahlungsw&auml;rme schonen Sie zudem auch Ihren Geldbeutel, denn Sie k&ouml;nnen hierdurch bis zu 65% an Stromkosten im Vergleich zu herk&ouml;mmlichen Heizsystemen sparen, da die Ger&auml;te eine sehr gute Energieeffizienz haben. <br>\nWir empfehlen die Infrarotheizungen mit einem Thermostat zu betreiben, um die maximale Energieeffizienz zu erreichen.\nUnsere Infrarotheizungen werden komplett anschlussfertig mit einen ca. 1,5 m langem Anschlusskabel mit Stecker und Wandhalterungen ausgeliefert. \n<br><br>\n<strong>Produktmerkmale:</strong><br>— einzigartige patentierte Technologie<br>\n— Frontfl&auml;che aus hochwertigem transparentem Glas<br>\n— AESI Edelstahl<br>\n— spezielles Heizelement mit beidseitiger Abstrahlung<br>\n— rahmenloses Design<br>\n— Wandmontage<br>\n— hoher Wirkungsgrad: 85-90 % Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme<br>\n--- lange Lebensdauer da keine beweglichen Teile<br>\n— elektrischer Anschluss: Das Glas Heizpaneel ist mit einem Stecker ausgestattet<br>\n— Wandabstand 40 mm<br>\n<br><br>\n<strong><i>Montagehinweis:</i>\nDie Paneele sind ausschlie&szlig;lich f&uuml;r die Wandmontage bestimmt.\nEine Montage an der Decke ist nicht m&ouml;glich!</strong><br>\nDer Abstand der Unterkante des Heizger&auml;tes vom Fu&szlig;boden muss 50 bis 150 mm betragen, es werden 100 mm empfohlen. Der Seitenabstand, z.B. von M&ouml;beln muss mindestens 100 mm betragen. In Badezimmern ist die Heizplatte in &Uuml;bereinstimmung mit der Norm VDE 100 / T701 zu installieren. Durch das geringe Gewicht ist die Montage einfach durchzuf&uuml;hren. Die Platte darf nicht direkt unter der Anschlussdose angebracht werden.\nSetzen Sie gestalterische Akzente und erhalten Sie zudem eine h&ouml;chst effiziente und gesunde Heizung. Die Infrarotheizung ist wegen steigenden &Ouml;l und Gaspreisen und der vielf&auml;ltigen Einsatzm&ouml;glichkeiten, die wohl genialste und attraktivste L&ouml;sung f&uuml;r eine warme Umgebung. \n<br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i></p>', '', 'transparent-glass-heaters', '0', '<div class=\"rectangle-wrapper\" style=\"height: 120px\">     \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:180px;height:120px;bottom:0;left:0;\">\n            900x600\n          </div>\n</div>', '0', '40', '1', '1', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `short_description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('13', 'glass-heaters', '0', 'products/glasskeramik/main.jpg', 'GLASS HEATERS', '<p>Hier verbindet sich Sparsamkeit und Glasdesign in einem Ger&auml;t. Die Infrarot Glasheizungen RED AGE der Modellreihe IGH sind einzigartige Heizpaneele, energiesparend, g&uuml;nstig in der Anschaffung und zudem langlebige Infrarot Heizk&ouml;rper. Die modernen Infrarot Glasheizungen sind nicht nur ausgezeichnete W&auml;rmelquellen  sondern auch ein toller Blickfang. Glaspaneele sind vor allem f&uuml;r die Beheizung von modernen Innenr&auml;umen (Wohn-, Kinder-, Schlafzimmer und B&uuml;ros) bestimmt, in denen sie nicht nur die Funktion eines Heizger&auml;ts erf&uuml;llen, sondern sie k&ouml;nnen auch zu einem bedeutenden Designelement werden. Mit der Schutzklasse IP 44 (Spritzwasser gesch&uuml;tzt) k&ouml;nnen die Paneele auch im Badezimmer eingesetzt werden. Die Glas Infrarotheizung RED AGE ist 8 mm d&uuml;nn wie moderne LCD-Fernseher und l&auml;sst sich mit wenigen Handgriffen schnell an der Wand montieren. Auch wenn sie montiert ist, h&auml;ngt die Infrarotheizung nur ungef&auml;hr 4 cm von der Wand entfernt. Die Oberfl&auml;che besteht aus einer besonders robusten Sicherheitsglas und die Oberfl&auml;chentemperatur betr&auml;gt etwa 80-85&deg; C. Das Ber&uuml;hren der Oberfl&auml;che ist ohne weiteres m&ouml;glich. Ein Verbrennen ist ausgeschlossen, da die W&auml;rmeleitf&auml;higkeit von Glas wesentlich geringer ist. So ist das Ger&auml;t selbst f&uuml;r Kleinkinder und Tiere absolut ungef&auml;hrlich.<br>\nDie Infrarotheizung hat ein sehr edles Design, und durch die Verarbeitung von hochwertigen Materialien die h&ouml;chste Qualit&auml;t, was sich bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Glasheizung ist nahezu unbegrenzt und die Heizelemente sind fast verschlei&szlig;frei. Eine besonders hohe Energieeffizienz von 98 % spart Ihnen wertvolle Energiekosten und macht die Infrarotheizung besonders widerstandsf&auml;hig und langlebig.<br>\nDie Glasfront ist in wei&szlig;, schwarz, als Spiegel oder mit einem Motiv rahmenlos und mit einem hochwertigem Rundschliff (C-Schliff) versehen. Die Bilder auf den Ger&auml;ten sind besonders hochaufl&ouml;send und werden durch spezielle UV Druckverfahren auf die Infrarotheizungen bedruckt.<br>\nDurch den sog. &quot;Crumble Effekt&quot; wird die Verletzungsgefahr bei Bruch der Glas verhindert.\nDie Installation und Montage der Infrarotheizungen funktioniert kinderleicht. Einfach Infrarotpaneel an der Wand befestigen, Netzstecker einstecken und losgeht es. \n<br><br>\n\n<strong>Produktmerkmale:</strong><br>\n- Vorderseite aus hochwertigem ESG Sicherheitsglas<br>\n- Rundschliff an den Kanten<br>\n- spezielles Heizelement mit beidseitiger Abstrahlung<br>\n- rahmenloses Design<br>\n- hoher Wirkungsgrad dank zwei Heizprinzipien: 85-90 % Infrarotstrahlung, 10-15 % Konvektionsw&auml;rme <br>\n- lange Lebensdauer &uuml;ber 120.000 Stunden, da keine beweglichen Teile<br>\n- elektrischer Anschluss: Das RED AGE Heizpaneel ist mit einem Stecker ausgestattet<br>\n- vertikale und horizontale Montage m&ouml;glich<br><br>\n\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter </i></p>', '', 'glass-heaters', '1', '<div class=\"rectangle-wrapper\" style=\"height: 317px\">  \n <div id=\"row7\" class=\"rectangle\"\n               style=\"width:83px;height:117px;bottom:200px;left:0;\">\n            500x700\n  </div>\n   <div id=\"row6\" class=\"rectangle\"\n               style=\"width:100px;height:100px;bottom:200px;left:83px;\">\n            600x600\n  </div>\n   <div id=\"row5\" class=\"rectangle\"\n               style=\"width:67px;height:134px;bottom:167px;left:183px;\">\n            400x800\n  </div>\n   <div id=\"row4\" class=\"rectangle\"\n               style=\"width:67px;height:167px;bottom:0;left:250px;\">\n            400x1000\n  </div>\n   <div id=\"row3\" class=\"rectangle\"\n               style=\"width:67px;height:200px;bottom:0;left:100px;\">\n            400x1200\n  </div>\n   <div id=\"row2\" class=\"rectangle\"\n               style=\"width:83px;height:167px;bottom:0;left:167px;\">\n            500x1000\n  </div>\n   <div id=\"row1\" class=\"rectangle\"\n               style=\"width:100px;height:200px;bottom:0;left:0;\">\n            600x1200\n  </div>\n  </div>', '0', '50', '1', '1', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('14', 'premium-hybrid-system', '0', 'products/premium/main.jpg', 'PREMIUM HYBRID SYSTEM', '<h4><i>Der Kauf einer Infrarotheizung von der Stange ist ein Kompromiss. Mal stimmt die Gr&ouml;&szlig;e, mal das Material, mal die Leistung. SO GUT WIE NIE STIMMT ALLES.</i></h4>\n<p>\nInfrarot Heizungssysteme gelten heute als wahre Alternative zu konventionellen, Wasserbasierten Heizsystemen.<br>\nDas neue <b>Premium Hybrid System</b> von INFRARED PROFI - eine echte Hybridheizung f&uuml;r ein Maximum an Energieeffizienz. Infrared Profi hat mit der neuen Hybridheizung ein ganz neues Produkt auf den Markt gebracht, welches es bislang weder als Infrarotheizung noch als Konvektionsheizung gab.<br>\nDie Infrarot-Hybridheizung von Infrared Profi ist der erste Mix aus mehreren Heizprinzipien: ( eine Kombination der besten Eigenschaften und Vorteilen einer Infrarotheizung, gepaart mit den besten Eigenschaften einer Konvektionsheizung und W&auml;rmespeicher aus Glaskeramik ): Den wirtschaftlichen Betrieb einer Infrarotheizung, die h&ouml;here Dynamik gegen&uuml;ber &Ouml;l-, Gas-, Holzheizungen, sowie die F&auml;higkeit die W&auml;rme zu speichern. <br>\nDas Einsparpotential bei der Anschaffung ist, im Gegensatz zu herk&ouml;mmlichen Heizsystemen, enorm und der laufende Energieverbrauch um ein Vielfaches geringer. <br>\nDenn nur moderne Hybrid Infrarotheizungen gelten, aufgrund ihres technischen Aufbaus und dem Einsatz von 15 mm Glaskeramik W&auml;rmespeicher, als vollwertige Raumheizung in Wohn- und Arbeitsr&auml;umen.<br>\nVorteile gegen konventionellen Heizsystemen und reine Elektroheizung: h&ouml;here Wirkungsgrad, Effizienz, wohlige W&auml;rme und das alles durch W&auml;rmespeicher Einsatz aus Glaskeramik.<br>\nPremium Hybrid Infrarotheizung &uuml;berzeugt durch einen vergleichsweise hohen Wirkungsgrad, geringen Platzbedarf und niedrige Anschaffungskosten. Eine Premium Hybrid Infrarotheizung erzeugt die W&auml;rme dort, wo Sie sie brauchen â€“ also ohne Brennkessel im Keller und ohne Wasserleitungen in der Wand. Dazu kommt: F&uuml;r Allergiker und Asthmatiker sind Infrarotheizungen ideale W&auml;rmequellen. Es entsteht kein Feinstaub oder COÂ², keine Energieverluste, keine Schimmelgefahr, besserer D&auml;mmwert, keine st&ouml;rende Ger&auml;usche- oder Geruchsbel&auml;stigung. Die Luftfeuchtigkeit bleibt konstant erhalten. <br>\nAuch gro&szlig;e Unterschiede sind in der W&auml;rmeverteilung und in der Energieeffizienz. Infrarot Premium Hybrid Heizungssystem erzeugt eine gleichm&auml;&szlig;ige W&auml;rmeverteilung im Raum und die Oberfl&auml;che der Premium Hybrid Heizung bleibt angenehm warm, wird aber niemals w&auml;rmer als 85&deg; Grad, so dass bei einer Ber&uuml;hrung keiner Verletzungs- und Verbrennungsgefahr entsteht. Sie sind f&uuml;r alle Wohn- und Arbeitsr&auml;ume geeignet.<br>\nDass neue Premium Hybrid System von Infrared Profi hat lediglich eine Bautiefe von nur 4,5 cm und dies trotz der idealen Konvektionseigenschaften mit Kamineffekt. Das Gesamtgeh&auml;use der Infrarot-Hybridheizung ist hochwertig aus wei&szlig; oder schwarz pulverbeschichtetem Metall gefertigt. Die &Ouml;ffnungen an der Ober- und Unterseite, die an eine normale Heizung erinnern, sorgen hierbei f&uuml;r ideale Str&ouml;mungsbedingungen der Luft innerhalb der Hybridheizung, damit sich die Raumluft ideal erw&auml;rmen kann - trotzdem wird die Raumluft nicht trocken, wie bei einer normalen Konvektionsheizung.<br>\nHingegen einer normalen Infrarot-Fl&auml;chenheizung strahlt die im Inneren verbaute Infrarotheizung gegen die vordere Glaskeramik der Hybridheizung. Diese erw&auml;rmt sich und es kommt hierdurch zur Erw&auml;rmung der Luft im Str&ouml;mungskanal, was zu einer Konvektion f&uuml;hrt und deutlich den W&auml;rmegewinn im Raum erh&ouml;ht. Die vorhandene Raumluft erw&auml;rmt sich um ein Vielfaches schneller.<br>\nZudem erw&auml;rmt sich durch die zus&auml;tzlich entstehende Konvektionsw&auml;rme auch die Luft. Dies erlaubt sogar eine geringere Temperatursenkung im Raum, um Elektroenergie zu sparen.<br>\nDer wohl wichtigste Unterschied ist der Energieverbrauch: Elektroheizungen ziehen im eingeschalteten Zustand permanent Strom vom Netz, deshalb ist ihr Stromverbrauch sehr hoch. Unser Hybrid Premium System mit integriertem Glaskeramik Speicher verbraucht nur wenige Minuten Strom, um ihren Speicher aufzuheizen â€“ und dann strahlt l&auml;ngere Zeit die W&auml;rme ab, ohne weiteren Stromverbrauch. So sparen Sie die Energie.<br>\nAuf lange Sicht sind moderne Hybrid Infrarotheizungen nicht nur eine wirtschaftlichere L&ouml;sung â€“ sondern auch deutlich vielf&auml;ltiger einzusetzen.<br>\nPremium Hybrid Infrarotheizungen kommen in s&auml;mtlichen Arbeits- und Wohnbereichen zum Einsatz. Ob in Kitas, Schulen, Arztpraxen, Werkst&auml;tten oder Lagerhallen, in kleinen Einzelb&uuml;ros, gro&szlig;en Foyers oder kompletten B&uuml;rogeb&auml;uden â€“ oder im privaten Zuhause. Sie sind eine wirtschaftliche Alternative zu konventionellen Heizsystemen wie &Ouml;l- oder Gasheizungen und k&ouml;nnen als Zusatzheizung in Hobbyr&auml;umen, Winterg&auml;rten oder Nebengeb&auml;uden genutzt werden.<br>\nHoher Wirkungsgrad dank mehreren Heizprinzipien: 65-70 % Infrarotstrahlung, 30-35 % Konvektionsw&auml;rme<br>\n<b>Die Vorteile</b> des neuen Premium Hybrid Systems von Infrared Profi:<br>\n- die neueste Hybridtechnologie = Infrarot + Konvektion + W&auml;rmespeicher<br>\n- W&auml;rmespeicher an der Vorderseite aus hochwertigem 15mm Glaskeramik<br>\n- lange Lebensdauer da keine beweglichen Teile<br>\n- eine sehr flache Bauweise - von nur 4,5 cm<br>\n- der Gesamtgeh&auml;use ist aus Metall<br>\n- eine hohe Energieeffizienz durch zus&auml;tzliche Konvektionstechnik und Akkumulation</p>\n\n<p><i>Erleben Sie mit der Infrarot-Hybridheizung von Infrared Profi eine echte Innovation im Heizungsbereich.</i></p>\n\n<p><i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glaskeramikheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter</i>\n</p>', 'premium-hybrid-system', '0', '   \n<div class=\"rectangle-wrapper\" style=\"height: 200px\">  \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:200px;height:200px;bottom:0;left:0;\">\n            600x600\n          </div>\n</div>', '0', '120', '1', '0', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('15', 'standard-heaters', '0', 'products/steal/main.jpg', 'STANDARD HEATERS', '<p>RED AGE Infrarot Standard Heizungen der <strong>Modellreihe ISH</strong> sind Energie- und Platz sparende Elektroheizungen. Sie eignen sich besonders gut als preiswerte Alternative zu veralteten Nachtspeicher Heizungen. Die Vorteile: Wartungsfrei, lautlos, sauber, zuverl&auml;ssig, dekorativ, g&uuml;nstig in der Anschaffung und im Stromverbrauch. Die Energieeffizienten infrarot Heizk&ouml;rper sind nicht vergleichbar mit herk&ouml;mmlichen Elektroheizungen, denn diese zukunftsweisenden Infrarotheizungen erzeugen infrarot Strahlungsw&auml;rme nach dem Vorbild unserer Sonne!<br>\nSie empfinden an kalten Wintertagen die warmen Sonnenstrahlen als angenehm?<br>\nDann werden Sie unsere Infrarotheizungen lieben!<br>\nUnsere RED AGE Standard Infrarotheizungen <strong>Modellreihe ISH</strong> bestehen aus einem 0,8 mm starken speziellen Stahl, die Geh&auml;usekanten sind von innen verschwei&szlig;t und von au&szlig;en geschliffen, dadurch entsteht ein sehr stabiles, rundum geschlossenes und optisch ansprechendes pulverbeschichtetes Geh&auml;use. Die Infrarotheizungen verf&uuml;gen &uuml;ber ein sehr langlebiges und flexibles Heizelement mit vollfl&auml;chig eingearbeiteten flachen Heizdr&auml;hten. Die Heizleistung ist &auml;u&szlig;erst effizient.<br>\nRED AGE Infrarotheizungen sind mit vielen Bildmotiven und verschiedenen Gr&ouml;&szlig;en erh&auml;ltlich. Bilder auf den Paneelen sind besonders hochaufl&ouml;send und werden durch speziellen UV Druckverfahren auf die Infrarotheizungen bedruckt.<br><br>\n\n<strong>Weitere Vorteile sind: </strong><br>\n- bis zu 40 % Kostenersparnis gegen&uuml;ber konventionellen Heizmethoden<br>\n- schnelle Erw&auml;rmung der R&auml;ume<br>\n- geringe Anschaffungs- und Instandhaltungskosten<br>\n- es ist kein Umbau notwendig - einfach in die Steckdose einstecken und heizen<br>\n- einfache Installation<br>\nWir empfehlen die Infrarotheizungen mit einem Thermostat zu betreiben, um die maximale Energieeffizienz zu erreichen.<br>\nUnsere Infrarotheizungen werden komplett Anschlussfertig mit einen ca. 1,5 m langem Anschlusskabel mit Stecker und Wandhalterungen ausgeliefert.<br>\nGerne helfen wir Ihnen bei der Berechnung der richtigen Infrarotheizungsgr&ouml;&szlig;e und Heizleistung f&uuml;r Ihren Raum.<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i> <p>', 'standard-heaters', '1', '<div class=\"rectangle-wrapper\" style=\"height: 224px\">   \n  <div id=\"row1\" class=\"rectangle\"\n               style=\"width:226px;height:112px;bottom:112px;left:0;\">\n           1130x560\n          </div>\n   <div id=\"row2\" class=\"rectangle\"\n               style=\"width:190px;height:112px;bottom:0;left:140px;\">\n           950x560\n          </div>\n   <div id=\"row3\" class=\"rectangle\"\n               style=\"width:140px;height:112px;bottom:0;left:0;\">\n           700x560\n          </div>\n   <div id=\"row4\" class=\"rectangle\"\n               style=\"width:80px;height:112px;bottom:112px;left:226px;\">\n           400x560\n          </div>\n</div>', '0', '90', '1', '1', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('16', 'infrared-radiator-for-industry', '14', 'products/industrie/main.jpg', 'INFRARED RADIATORS FOR INDUSTRY', '<p>Die Infrarotstrahler Serie «P» eignen sich ideal f&uuml;r die Beheizung von Gesch&auml;ftsr&auml;umen, B&uuml;ros, &ouml;ffentliche Einrichtungen, Produktionsst&auml;tten / Hallen, Bauernh&ouml;fen, St&auml;llen und sonstigen industriellen und landwirtschaftlichen Gro&szlig;r&auml;umen, sowie ebenfalls f&uuml;r Turnhallen und Werkst&auml;tten, prinzipiell k&ouml;nnen die Infrarotstrahler &uuml;berall dort eingesetzt werden, wo eine hohe Decke gegeben ist.<br>\nDie gro&szlig;e Infrarotstrahler Serie „P“ sind nicht so leicht und kompakt, wie die Heizstrahler Serie „B“, aber haben eine unschlagbare Heizleistung. Die Infrarotstrahler Serie „P“ mit 2000, 3000 und 4000 Watt Leistung k&ouml;nnen Fl&auml;chen von bis zu 44 m² beheizen und sind damit bestens auch f&uuml;r gro&szlig;fl&auml;chigem Einsatz in Produktionshallen, Lagern und Industriellen Einrichtungen geeignet.<br><br>\n\nDie Infrarotstrahler haben sehr viele Vorteile, sie sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, die eine Effizienz von bis zu 99 % erm&ouml;glicht. Infrarot Heizstrahler verbrauchen bis zu 25 % weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotstrahler sehr viel sicherer als Gasbetriebene Systeme. Durch die kleine Bauweise und das geringe Gewicht sind Infrarotstrahler die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden. Noch nie war es so einfach, g&uuml;nstig und effektiv gro&szlig;e Fl&auml;chen zu beheizen.<br>\nInfrarotstrahler arbeiten absolut emissionsfrei und umweltfreundlich. Und sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie einen Infrarotstrahler, der im Betrieb absolut kein CO<sub><small>2</small></sub> ausst&ouml;&szlig;t und damit 100 % klimaneutral arbeitet.<br>\nAlle Infrarotstrahler aus unserem Programm sind T&Uuml;V gepr&uuml;ft und erf&uuml;llen alle Sicherheitsanspr&uuml;che. Das hochwertige Metallgeh&auml;use ist wetterfest und der gesamte Heizstrahler ist auch vor Spritzwasser gesch&uuml;tzt.<br>\nDie Infrarot Heizstrahler k&ouml;nnen einfach an der Decke durch eine im Lieferumfang enthaltene Halterung in wenigen Minuten angebracht werden.<br>\nSie k&ouml;nnen auch mit einer Neigung an der Wand montiert werden, hierzu ben&ouml;tigen Sie die Winkelhalterung aus unserem Zubeh&ouml;r.<br>\nSollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben, wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter <br><br>\n\n<strong>PRODUKTMERKMALE:</strong><br>\n- angenehme, wohlige W&auml;rme<br>\n- erzeugt keine Treibgase<br>\n- hoher Wirkungsgrad ( 99 % ! ), kaum W&auml;rmeverlust<br>\n- vielseitig einsetzbar<br>\n- Ideale Beheizung in R&auml;umen mit Deckenh&ouml;he ab 3 Metern ( Turnhallen, Industriehallen, Kirchen, Landwirtschaft, etc..)<br>\n- Leichte Montage und Inbetriebnahme<br>\n- Ideal als Voll oder Zonenheizung anwendbar<br>\n- energiesparend (35 % weniger Stromverbrauch als vergleichbare Ger&auml;te )\nstabiles, optisch ansprechendes Stahlgeh&auml;use<br><br>\nDie industrielle Infrarotstrahler sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br>\n- Garagen<br>\n- effiziente Beheizung von lokal begrenzten Zonen in gro&szlig;en R&auml;umen<br>\n- Werkst&auml;tten<br>\n- Industriehallen<br>\n- Landwirtschaft die Reduzierung von Feuchtigkeit und die Vermeidung von Schimmelbildung<br>\n- Einsatz in der Landwirtschaft f&uuml;r die Tieraufzucht und W&auml;rmehaltung von St&auml;llen<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i></p>', 'infrared-radiator-for-industry', '0', '<div class=\"rectangle-wrapper\" style=\"height: 230px\"> <div id=\"row1\" class=\"rectangle\"               style=\"width:240px;height:54px;bottom:176px;left:0;\">          1200x270\n</div>\n\n<div id=\"row2\" class=\"rectangle\"             style=\"width:240px;height:88px;bottom:88px;left:0;\">        1200x436\n</div>\n\n<div id=\"row3\" class=\"rectangle\"   style=\"width:308px;height:88px;bottom:0;left:0;\">       1540x436\n</div>\n</div>', '1', '20', '1', '0', '2')");
             $upd = $mysqli->query($query);



         $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('17', 'infrared-radiator-for-commerce', '14', 'products/haus/main.jpg', 'INFRARED RADIATORS FOR COMMERCE', '<p>Die kleine Infrarotstrahler Serie „B“ zeichnet sich besonders durch ihre kompakte und leichte Bauweise aus. Damit sind die Infrarotstrahler f&uuml;r kleine Wohneinheiten, Kitas, Schulen oder B&uuml;ros und Gesch&auml;ftsr&auml;ume bestens geeignet.<br>\nDie Infrarotstrahler haben sehr viele Vorteile, sie sind sehr sparsam, effizient, umweltschonend, g&uuml;nstig, sicher und damit die perfekte Alternative zu herk&ouml;mmlichen Heizsystemen. M&ouml;glich macht das alles die Infrarot Zukunftstechnologie, mit einer Effizienz von bis zu 99 %. Infrarot Heizstrahler verbrauchen bis zu 25% weniger Energie als vergleichbare Heizsysteme und das macht sich im Energieverbrauch sehr positiv bemerkbar. F&uuml;r den Betrieb eines Infrarotstrahlers wird lediglich eine normale Stromleitung ben&ouml;tigt. Dies macht elektrisch betriebene Infrarotstrahler sehr viel sicherer als Gasbetriebene Systeme. Durch die kleine Bauweise und das geringe Gewicht sind Infrarotstrahler die erste Wahl, wenn moderne effiziente Heizger&auml;te ben&ouml;tigt werden.<br>\nInfrarotstrahler sind im Betrieb absolut emissionsfrei und umweltfreundlich. Sofern nur Strom aus erneuerbaren Energien verwendet wird, haben Sie einen Infrarotstrahler, der im Betrieb absolut kein CO<sub><small>2</small></sub> ausst&ouml;&szlig;t und damit 100% klimaneutral arbeitet.<br>\nAlle Infrarotstrahler aus unserem Programm sind T&Uuml;V gepr&uuml;ft und erf&uuml;llen alle Sicherheitsanspr&uuml;che. Das Hochwertige Metallgeh&auml;use ist wetterfest und der gesamte Heizstrahler ist auch vor Spritzwasser sicher.<br><br>\n\nDer Heizstrahler erw&auml;rmt durch Infrarotstrahlen in nur wenigen Minuten den ausgerichteten Bereich und ist dabei weder zu riechen, zu h&ouml;ren oder durch Licht zu sehen. Insbesondere der hohe Wirkungsgrad in Verbindung mit einem verh&auml;ltnism&auml;&szlig;ig geringen Stromverbrauch zeichnen unsere Infrarotstrahler aus. <br><br>\nDie Infrarotstrahler sollen mit einem Mindestabstand von 2,2 m vom Boden montiert werden. Die angenehmen W&auml;rmestrahlen haben eine Wellenl&auml;nge zwischen 5,7 und 9,8 µm, die von den meisten Objekten sehr gut absorbiert werden. Ihre intensive Strahlenw&auml;rme im gesundheitsf&ouml;rderlichen IR-C Bereich erzeugt in k&uuml;rzester Zeit ein angenehmes W&auml;rmegef&uuml;hl. Die Heizelemente aus Aluminium sind in Alu oder schwarz eloxiert und haben eine sehr hohe Lebensdauer von &uuml;ber 60.000 Stunden.<br>\nDer Infrarot Heizstrahler kann einfach an der Decke durch eine im Lieferumfang enthaltene Halterung in wenigen Minuten angebracht werden.<br>\nEr kann auch mit einer Neigung an der Wand montiert werden, hierzu ben&ouml;tigen Sie die Winkelhalterung aus unserem Zubeh&ouml;r.<br>\nSollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter. <br><br>\n\n<strong>PRODUKTMERKMALE:</strong><br>\n-angenehme, wohlige W&auml;rme<br>\n-erzeugt keine Treibhausgase<br>\n-hoher Wirkungsgrad (99 % !), kaum W&auml;rmeverlust<br>\n-vielseitig einsetzbar<br>\n- Ideale Beheizung in R&auml;umen mit Deckenh&ouml;he ab 2,2 Metern (Turnhallen, Industriehallen, Kirchen, Landwirtschaft, etc...)<br>\n- Leichte Montage und Inbetriebnahme<br>\n- Ideal als Voll oder Zonenheizung anwendbar<br>\n- energiesparend (25 % weniger Stromverbrauch als vergleichbare Ger&auml;te)<br>\n- stabiles, optisch ansprechendes Stahlgeh&auml;use.<br><br>\nDie Heizstrahler sind bestens geeignet f&uuml;r:<br>\n- eine schnelle und gezielte Beheizung von Innenr&auml;umen aller Art<br>\n- Wohnbereiche<br>\n- Gesch&auml;ftslokale<br>\n- Restaurants<br>\n- Hobby- und Kellerr&auml;ume<br>\n- Garagen<br>\n- effiziente Beheizung von lokal begrenzten Zonen in gro&szlig;en R&auml;umen<br>\n- Werkst&auml;tten<br>\n- Industriehallen<br>\n- Landwirtschaft die Reduzierung von Feuchtigkeit und die Vermeidung von Schimmelbildung<br>\n- Einsatz in der Landwirtschaft f&uuml;r die Tieraufzucht und W&auml;rmehaltung von St&auml;llen<br><br>\n<i>Sollten Sie mehr Informationen ben&ouml;tigen oder weitere Fragen zu den technischen Details der Infrarotstrahler haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter.</i></p>', 'infrared-radiator-for-commerce', '0', '<div class=\"rectangle-wrapper\" style=\"height: 96px\">  \n<div id=\"row1\" class=\"rectangle\"\n               style=\"width:200px;height:32px;bottom:64px;left:0;\">\n           1000x160\n</div>\n\n<div id=\"row2\" class=\"rectangle\"\n               style=\"width:300px;height:32px;bottom:32px;left:0;\">\n            1500x160\n</div>\n\n<div id=\"row3\" class=\"rectangle\"\n               style=\"width:300px;height:32px;bottom:0;left:0;\">\n            1500x160\n</div>\n</div>', '1', '10', '1', '0', '2')");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("INSERT INTO  `products` (`id`, `name`, `parent_id`, `image`, `title`, `description`, `category_size_id`, `has_thermostat`, `size_markup`, `has_height`, `ord`, `isInPriceList`, `isOnHomepage`, `lid`) VALUES ('18', 'mirror-heating', '0', 'products/spiegelheizungen/spiegel02.jpg', 'MIRROR HEATING', '<p>Da der RED AGE Spiegelheizung mit Infrarot StrahlungswÃ¤rme heizt, wird weniger die Luft im Raum erwÃ¤rmt sondern mehr die GegenstÃ¤nde, die sich im Raum befinden, den menschlichen KÃ¶rper mit eingeschlossen, dies alles wird ermÃ¶glicht durch das Prinzip der Sonnenstrahlung. Die Umgebung, welche die WÃ¤rme gespeichert hat gibt diese dann nach und nach wieder an den Raum ab, sprich in die Luft und man bekommt ein angenehmes WohlfÃ¼hlklima. Spiegelheizpaneele haben zudem noch die Eigenschaft, dass der Wirkungsgrad der WÃ¤rmestrahlung sehr hoch ist und die WÃ¤rme, ohne in dem Material gespeichert zu werden, direkt in die Umgebung abgegeben wird. </p>\n\n<p>Der Spiegelheizung ist im ganzen Wohnbereich einsetzbar, er passt sich Ihren GestaltungswÃ¼nschen perfekt an. Weiterhin hat die Infrarotheizung ein sehr rahmenloses edles Design und durch die qualitative Verarbeitung von hochwertigen Materialien die hÃ¶chste QualitÃ¤t, was sich auch bei der Technik besonders bemerkbar macht. Die Lebensdauer einer Spiegelheizung ist nahezu unbegrenzt (Ã¼ber 120.000 Stunden) und die Heizelemente sind fast verschleiÃŸ frei. \n</p>\n\n<p>\nAllergiker werden sich mit der Infrarotspiegelheizung ebenfalls wohler fÃ¼hlen, denn der Staub wird nicht mehr aufgewirbelt oder verbrannt. \n</p>\n\n<p>\nSie kann nicht nur als Komplett-Heizsystem bzw. Vollheizung eingesetzt werden, sondern auch als Zusatzheizung, Teilheizung oder Ãœbergangsheizung. Durch das Anwenden von StrahlungswÃ¤rme schonen Sie zudem auch Ihren Geldbeutel, denn Sie kÃ¶nnen hierdurch bis zu 60 % an Stromkosten im Vergleich zu herkÃ¶mmlichen Heizsystemen sparen, da die GerÃ¤te eine sehr hohe Energieeffizienz haben.\nWenn Sie sich zwischen zwei Heizleistungen nicht entscheiden kÃ¶nnen, raten wir Ihnen dazu die stÃ¤rkere Heizleistung zu nehmen. Damit haben Sie nicht zwingend einen hÃ¶heren Energieverbrauch, da die gewÃ¼nschte Temperatur schneller erreichtÂ wird und der Thermostat die Heizung frÃ¼her abschalten kann.\nInfrarot Spiegelheizungen aus ESG Sicherheitsglas besitzen eine leichte TÃ¶nung und stellen keinen Reklamationsgrund dar.\n</p>\n\n<p>\n<strong>Spiegelheizungen Vorteile:</strong>\n<ul>\n<li>Modern und effizient</li>\n<li>Wohltuende natÃ¼rliche WÃ¤rme</li>\n<li>\nUnabhÃ¤ngigkeit von Ã–l und Gas</li>\n<li>\nWartungsfrei und extrem langlebig</li>\n<li>\nGesunde Raumluftt</li>\n<li>\nEinfache Installation</li>\n<li>\nZeitlos modern und schÃ¶n</li>\n\n</ul>\n</p>\n\n<i>\nSollten Sie mehr Informationen benÃ¶tigen oder weitere Fragen zu den technischen Details die Glasheizungen haben wenden Sie sich einfach an uns. Wir helfen Ihnen gerne weiter\n</i>', 'mirror-heating', '1', '<div class=\"rectangle-wrapper\" style=\"height: 317px\">  \n <div id=\"row7\" class=\"rectangle\" style=\"width:83px;height:117px;bottom:200px;left:0;\">\n            500x700\n  </div>\n   <div id=\"row6\" class=\"rectangle\"\n               style=\"width:100px;height:100px;bottom:200px;left:83px;\">\n            600x600\n  </div>\n   <div id=\"row5\" class=\"rectangle\"  style=\"width:67px;height:134px;bottom:167px;left:183px;\">  400x800</div><div id=\"row4\" class=\"rectangle\"         style=\"width:67px;height:167px;bottom:0;left:250px;\">     400x1000\n  </div>\n   <div id=\"row3\" class=\"rectangle\"\n               style=\"width:67px;height:200px;bottom:0;left:100px;\">\n            400x1200\n  </div>\n   <div id=\"row2\" class=\"rectangle\"\n               style=\"width:83px;height:167px;bottom:0;left:167px;\">\n            500x1000\n  </div>\n   <div id=\"row1\" class=\"rectangle\"\n               style=\"width:100px;height:200px;bottom:0;left:0;\">\n            600x1200\n  </div>\n  </div>', '0', '60', '1', '0', '2')");
             $upd = $mysqli->query($query);


$query = $mysqli->query(" DROP TABLE IF EXISTS `principles`");
             $upd = $mysqli->query($query);
         $query = $mysqli->query("CREATE TABLE  `principles` (  `id` INT NOT NULL AUTO_INCREMENT,  `image` TEXT NULL,  `title` TEXT NULL, `description` TEXT NULL, `lid` VARCHAR(45) NULL DEFAULT '1',  PRIMARY KEY (`id`))");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `principles` (`image`, `title`, `description`, `lid`) VALUES ('product-thermostat/item2.gif', 'ZWEI RAUMHEIZPRINZIPIEN:', '- Infrarot W&auml;rmestrahlung <br>- Nat&uuml;rliche Konvektion\n', '1')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `principles` (`image`, `title`, `description`, `lid`) VALUES ('product-thermostat/item3.gif', 'DREI RAUMHEIZPRINZIPIEN:', '<p>- Infrarot W&auml;rmestrahlung<br><br>- Nat&uuml;rliche Konvektion<br><br>- W&auml;rmespeicher<br><br></p>', '1')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `principles` (`image`, `title`, `description`, `lid`) VALUES ('product-thermostat/item_decken.gif', 'RAUMHEIZPRINZIPIEN:', 'Infrarot W&auml;rmestrahlung', '1')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `principles` (`image`, `title`, `description`, `lid`) VALUES ('product-thermostat/item2.gif', 'TWO RAUMHEIZPRINZIPIEN:', '- Infrarot W&auml;rmestrahlung <br>- Nat&uuml;rliche Konvektion\n', '2')");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("INSERT INTO  `principles` (`image`, `title`, `description`, `lid`) VALUES ('product-thermostat/item3.gif', 'THREE RAUMHEIZPRINZIPIEN:', '<p>- Infrarot W&auml;rmestrahlung<br><br>- Nat&uuml;rliche Konvektion<br><br>- W&auml;rmespeicher<br><br></p>', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `principles` (`image`, `title`, `description`, `lid`) VALUES ('product-thermostat/item_decken.gif', 'EN RAUMHEIZPRINZIPIEN:', 'Infrarot W&auml;rmestrahlung', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE  `products` ADD COLUMN `principle` VARCHAR(45) NULL AFTER `lid`, ADD COLUMN `en_principle` VARCHAR(45) NULL AFTER `principle`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE  `products` DROP COLUMN `en_principle`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='1' WHERE `id`='1'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='3' WHERE `id`='2'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='1' WHERE `id`='3'");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("UPDATE  `products` SET `principle`='1' WHERE `id`='4'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='2' WHERE `id`='5'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='1' WHERE `id`='6'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='3' WHERE `id`='7'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='3' WHERE `id`='8'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='1' WHERE `id`='9'");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("UPDATE  `products` SET `principle`='4' WHERE `id`='17'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='6' WHERE `id`='16'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='4' WHERE `id`='15'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='4' WHERE `id`='14'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='5' WHERE `id`='10'");
             $upd = $mysqli->query($query);


             $query = $mysqli->query("UPDATE  `products` SET `principle`='4' WHERE `id`='13'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='6' WHERE `id`='11'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='6' WHERE `id`='12'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `products` SET `principle`='4' WHERE `id`='18'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `colours` (`id`, `name`, `image`, `lid`) VALUES ('7', 'White', 'colours/white.png', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `colours` (`id`, `name`, `image`, `lid`) VALUES ('8', 'Black', 'colours/black.png', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `colours` (`id`, `name`, `image`, `lid`) VALUES ('9', 'RAL', 'colours/ral.png', '2')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `colours` (`id`, `name`, `image`, `lid`) VALUES ('10', 'Images', 'colours/flowers.png', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `colours` (`id`, `name`, `image`, `lid`) VALUES ('11', 'Glass', 'colours/glass.png', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('24', '10', '7')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('25', '10', '8')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('26', '10', '11')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('27', '10', '9')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('28', '10', '10')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('29', '11', '7')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('30', '12', '11')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('31', '13', '7')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('32', '13', '8')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('33', '13', '11')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('34', '13', '9')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('35', '13', '10')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('36', '14', '7')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('37', '14', '8')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('38', '15', '7')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('39', '15', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('40', '15', '10')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('41', '16', '7')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('42', '17', '7')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('43', '17', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('44', '11', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('45', '16', '9')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `products_colours` (`id`, `product_id`, `colour_id`) VALUES ('46', '18', '11')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='1'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='2'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='3'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='4'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='5'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='6'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='7'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='8'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='9'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='10'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='11'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='12'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='10' WHERE `id`='13'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='17'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='18'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='19'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='20'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='21'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='22'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='23'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='24'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='25'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='26'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='27'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='28'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='30'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='31'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='32'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='33'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='34'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='35'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='36'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='37'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='38'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='39'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='40'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='41'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='42'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='49'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='55'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='56'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='57'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='58'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='59'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='60'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='61'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='62'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='63'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='64'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='65'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='66'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='67'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='68'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='14' WHERE `id`='69'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='70'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='71'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='72'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='73'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='74'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='75'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='76'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='77'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='78'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='79'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='80'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='81'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='82'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='83'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='84'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='85'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='86'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='87'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='88'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='89'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='90'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='91'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='16' WHERE `id`='92'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='97'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='98'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='99'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='100'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='101'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='102'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='103'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='104'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='105'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='106'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='108'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='109'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='110'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='111'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='11' WHERE `id`='112'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='12' WHERE `id`='113'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='114'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='115'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='116'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='117'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='118'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='119'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='120'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='13' WHERE `id`='121'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='122'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='15' WHERE `id`='123'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='18' WHERE `id`='124'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='18' WHERE `id`='125'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='18' WHERE `id`='126'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='138'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='139'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='140'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `images` SET `eng_prod_id`='17' WHERE `id`='141'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `product_thermostat` SET `description`='ENG Auch mit eingebautem programmierbarem Thermostat erh&auml;ltlich.<br>Damit  k&ouml;nnen Sie die W&auml;rme individuell regulieren und zeitlich programmieren.' WHERE `id`='2'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `id`='1', `eng_title`='abstractions' WHERE `id`='26'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `id`='2', `name`='autos', `ord`='30', `eng_title`='cars' WHERE `id`='48'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`id`, `name`, `title`, `ord`, `eng_title`) VALUES ('3', 'blumen', 'BLUMEN', '40', 'flowers')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`id`, `name`, `title`, `ord`, `eng_title`) VALUES ('4', 'essen', 'ESSEN', '50', 'food')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('feuer', 'FEUER', '60', 'fire')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('kindheit', 'KINDHEIT', '70', 'childhood')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('kino', 'KINO', '80', 'movies')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('kunst', 'KUNST', '90', 'art')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('meer', 'MEER', '100', 'sea')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('musik', 'MUSIK', '110', 'music')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('natur', 'NATUR', '120', 'nature')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('sport', 'SPORT', '130', 'sport')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('stadte', 'ST&Auml;DTE', '140', 'city')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('strand', 'STRAND', '150', 'beach')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('teetime', 'TEETIME', '160', 'teatime')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('tiere', 'TIERE', '170', 'animals')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('universum', 'UNIVERSUM', '180', 'universe')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `bildmotive` (`name`, `title`, `ord`, `eng_title`) VALUES ('vogel', 'V&Ouml;GEL', '190', 'birds')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE  `bildmotive` CHANGE COLUMN `eng_title` `eng_name` TEXT NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE  `bildmotive` ADD COLUMN `eng_title` VARCHAR(45) NULL AFTER `eng_name`");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='ABSTRACTIONS' WHERE `id`='1'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='CARS' WHERE `id`='2'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='FLOWERS' WHERE `id`='3'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='FOOD' WHERE `id`='4'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='FIRE' WHERE `id`='49'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='CHILDHOOD' WHERE `id`='50'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='MOVIES' WHERE `id`='51'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='ART' WHERE `id`='52'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='SEA' WHERE `id`='53'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='MUSIC' WHERE `id`='54'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='NATURE' WHERE `id`='55'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='SPORT' WHERE `id`='56'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='CITY' WHERE `id`='57'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='BEACH' WHERE `id`='58'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='TEATIME' WHERE `id`='59'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='ANIMALS' WHERE `id`='60'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='UNIVERSE' WHERE `id`='61'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE  `bildmotive` SET `eng_title`='BIRDS' WHERE `id`='62'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO  `page_alias` (`de`, `en`) VALUES ('user', 'user')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('site-settings', 'site-settings')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`link_name`, `link_path`, `lid`) VALUES ('ALIASES FOR MULTILINGUAL', 'aliases/edit', '1')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `site_settings` (`link_name`, `link_path`, `lid`) VALUES ('ALIASES FOR MULTILINGUAL', 'aliases/edit', '2')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('aliases', 'aliases')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("UPDATE `page_alias` SET `de`='handler-liste', `en`='handler-liste' WHERE `id`='63'");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('add-user', 'add-user')");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('logout', 'logout') ");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('order', 'order')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('edit-default-info', 'edit-default-info')");
             $upd = $mysqli->query($query);


         $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('edit-default-info', 'edit-default-info')");
             $upd = $mysqli->query($query);




$query = $mysqli->query(" DROP TABLE IF EXISTS `social`");
             $upd = $mysqli->query($query);
         $query = $mysqli->query("CREATE TABLE `social` ( `id` INT NOT NULL AUTO_INCREMENT, `alt` TEXT NULL, `link` TEXT NULL, `img` TEXT NULL, PRIMARY KEY (`id`))");
             $upd = $mysqli->query($query);


              $query = $mysqli->query(" INSERT INTO `social` (`alt`, `link`, `img`) VALUES ('facebook link', 'https://www.facebook.com/infrared24', 'fb.png')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `social` (`alt`, `link`, `img`) VALUES ('twitter link', 'https://twitter.com/@InfraRed24', 'twitter.png')");
             $upd = $mysqli->query($query);

             $query = $mysqli->query("INSERT INTO `social` (`alt`, `link`, `img`) VALUES ('instagram link', 'https://www.instagram.com/infrared24gmbh/', 'inst.png')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `social` (`alt`, `link`, `img`) VALUES ('pinterest link', 'https://www.pinterest.de/infrared24/', 'pinterest.png')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("INSERT INTO `technologie` (`id`, `description_before`, `description_image`, `description_after`, `comparison_infra`, `infra_title`, `infra_text`, `comparison_convect`, `convect_title`, `convect_text`, `scheme_img`, `scheme_title`, `infra_house_title`, `infra_house_image`, `infra_house_description`, `convect_house_title`, `convect_house_image`, `convect_house_description`, `lid`, `name`) VALUES ('2', '<p>engqqqqq</p>\r\n\r\n<h3>WAS IST EIGENTLICH INFRAROT-STRAHLUNGSW&Auml;RME?</h3>\r\n\r\n<p>(Auszug Vortrag Dr. Aron Flickstein)<br />\r\nInfrarote Strahlungsw&auml;rme ist eine Welle des elektromagnetischen Spektrums, welche Energie aller Wellenl&auml;ngen umfasst. Sie ist eine Energieform, die durch einen Umsetzungsprozess Gegenst&auml;nde direkt erw&auml;rmt, ohne dabei die umgebende Luft zu erw&auml;rmen.. Strahlungsw&auml;rme wird auch infrarote Energie genannt (IR). Der infrarote Anteil des elektromagnetischen Spektrums ist unterteilt in drei verschiedene Wellenl&auml;ngen, gemessen in Mikrometern (&micro;m):<br />\r\n0,07 &ndash; 1,50 = geringe IR-A Wellen&nbsp;<br />\r\n1,50 &ndash; 5,60 = mittlere IR-B Wellen&nbsp;<br />\r\n5,60 &ndash; 100,00 = weite oder lange IR-C Welle&nbsp;<br />\r\nIm t&auml;glichen Leben ist beispielsweise die Sonne eine Quelle der Strahlungsenergie.<br />\r\nWas passiert wenn die Sonne hinter einer Wolke verschwindet?<br />\r\nObwohl die Umgebungstemperatur gar nicht so schnell sinken kann, empfindet man schnell eine k&uuml;hlere Temperatur. Da die Wolken die Sonne mit Ihren Infrarotstrahlen abschirmt sp&uuml;rt man sofort, dass hier die W&auml;rmestrahlung / Infrarotstrahlung fehlt. Bei klarem Himmel bewegt sich die Wellenl&auml;nge der IR-Strahlung zwischen 7 &ndash; 14 &micro;m IR, hierbei erreicht die IR-Strahlung die Erdoberfl&auml;che. Aber auch die Erde selbst strahlt Infrarot-Energie aus, die aber maximal 10 &micro;m erreicht.<br />\r\nDie Haut nimmt zu Ihrer Stimulans IR-Strahlung selektiv auf.<br />\r\nDie infrarote Strahlungsw&auml;rme in W&auml;rmesystemen ist meist die gleiche, die der menschliche K&ouml;rper produziert und ausstrahlt. Sie entspricht auch der der Sonne jedoch ohne die anteilige UV-Strahlung.<br />\r\nDie Entdeckung bzw. der Nachweis der Infrarotstrahlung gelang erstmalig im Jahre 1800 dem deutschen Astronomen William Herschel durch Erw&auml;rmung einer geschw&auml;rzten Fl&auml;che, die mit dem IR-Anteil der spektral zerlegten Sonnenstrahlung beschienen wurde. Die F&auml;higkeit zur Erw&auml;rmung von Stoffen dient auch heute noch zum Nachweis der Infrarotstrahlung.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'technology/sonne2.gif', '<p>qqqq</p>\r\n', 'technology/infra.gif', 'INFRARED TECHNOLOGYqq', '<p>engqqq</p>\r\n\r\n<p>Moderne Infrarot-Heizungen funktionieren nach dem nat&uuml;rlichen Prinzip der Sonne. Elektroenergie wird zu fast 100% mittels Heizelement direkt in Infrarot-W&auml;rmestrahlung umgewandelt. Sie erw&auml;rmt nicht die Luft direkt, sondern die Objekte, auf die sie auftrifft.<br />\r\nSie kennen das, wenn Sie an einem kalten, sonnigen Tag nach drau&szlig;en gehen: in der Sonne ist es angenehm warm, im Schatten wird Ihnen kalt &mdash; obwohl die Lufttemperatur im Schatten und in der Sonne gleich ist.<br />\r\nDas bedeutet, Sie k&ouml;nnen die Temperatur in Ihren R&auml;umen 2 &mdash; 3 Grad niedriger lassen, um das gleiche W&auml;rmeempfinden zu haben wie bei einer herk&ouml;mmlichen Heizung. Damit sparen Sie eine Menge Energie!<br />\r\nBei Infrarot-Heizungen haben Sie im Prinzip zwei W&auml;rmequellen: Die indirekte Raumw&auml;rme, die von W&auml;nden und M&ouml;bel zur&uuml;ck gegeben wird und die direkte Strahlungsw&auml;rme der Infrarotheizung, die bis zu 3 &mdash; 4 m sp&uuml;rbar ist. Da die Infrarot W&auml;rmestrahlung auch auf die W&auml;nde trifft und von diesen aufgenommen wird, trocknen die W&auml;nde, isolieren dadurch besser und Schimmelpilze k&ouml;nnen nicht entstehen.<br />\r\nEnergieeffizienz zu erreichen und somit Heizkosten zu sparen ist unser Bestreben.</p>\r\n', 'technology/convect.gif', 'KONVEKTION TECHNOLOGYqqq', '<p>engqqq</p>\r\n\r\n<p>Die herk&ouml;mmlichen Heizungen funktionieren durch Erhitzung von Wasser mittels Brennstoff (&Ouml;l, Gas, Pellet). Das hei&szlig;e Wasser wird durch die Rohre geleitet, wo ein Teil der W&auml;rme gleich wieder verloren geht. Im Heizk&ouml;rper angelangt erhitzt das Wasser den Heizk&ouml;rper, der seinerseits die ihn umgebende Luft erw&auml;rmt.<br />\r\nDie erw&auml;rmte Luft steigt nach oben, wodurch Luft auf der anderen Seite des Raums nach unten gedr&uuml;ckt wird &uuml;ber den Boden kriecht, bis sie durch den Heizk&ouml;rper ebenfalls erw&auml;rmt wird und aufsteigt. Die Luft im Raum beginnt also zu zirkulieren.<br />\r\nZum einen entsteht dadurch die unerw&uuml;nschte W&auml;rmeschichtung (oben warm, unten kalt), zum Anderen wird dadurch der Staub, der sich auf dem Boden befindet, aufgewirbelt und macht Allergikern das Leben schwer.<br />\r\nDiese Technologie ist also sehr ineffektiv, egal wie effizient der Heizkessel ist, wie gut die Heizungsrohre isoliert sind. Sie haben immer einen W&auml;rmeverlust auf dem Weg zum Heizk&ouml;rper und Sie haben immer die W&auml;rmeschichtung.</p>\r\n', 'technology/scheme.png', 'engVERGLEICH ZWEI VERSCHIEDENE HEIZUNGSSYSTEMEqqq', 'engqqqqINFRAROTHEIZUNG INNERHALB EINES GESAMT-ENERGIEKONZEPTES', 'technology/infra_house.gif', '<p>qqqeng</p>\r\n\r\n<p>Das moderne zukunftsweisende unabh&auml;ngige Infrarotheizungssystem besteht aus:<br />\r\n- Solarzellen<br />\r\n- Wechselrichter<br />\r\n- Batteriespeicher<br />\r\n- Stromz&auml;hler f&uuml;r Bezug und Einspeisung<br />\r\n- Infrarotheizk&ouml;rpern<br />\r\n- elektronische Thermostate<br />\r\n- Warmwasseraufbereitung ( Durchlauferhitzer bzw. Boiler)<br />\r\n- Stromleitungen</p>\r\n', ' eng      qqq   WASSERBASIERTES HEIZUNGSSYSTEM', 'technology/convect_house.gif', '<p>engqqq</p>\r\n\r\n<p>Das konventionelle, wasserbasierende Heizungssystem besteht aus:<br />\r\n- Heiz-, Brennkessel oder W&auml;rmepumpe<br />\r\n- Steuerung f&uuml;r Kessel bzw. W&auml;rmepumpe<br />\r\n- Schornstein<br />\r\n- Brauchwasserspeicher<br />\r\n- Pumpenstation<br />\r\n- Membran-Ausdehnungsgef&auml;&szlig;<br />\r\n- Manometer<br />\r\n- unz&auml;hlige Ventile<br />\r\n- unendliche Rohrleitungen<br />\r\n- Heizk&ouml;rper<br />\r\n- extra Raum f&uuml;r Technik<br />\r\n- drehbare Thermostate<br />\r\n- Pumpe<br />\r\n- Sicherheitsventile<br />\r\n- Thermosyfon<br />\r\n- Spengler<br />\r\n- unendliche F&uuml;hler<br />\r\n- sehr teure Planung f&uuml;r das Heizungssystem<br />\r\n- dazu kommt gleich eine riesige Luftungsanlage, weil an einer Seite durch reine Konvektion Sauerstoff verbrannt wird und beim l&uuml;ften die W&auml;rmeenergie verloren geht</p>\r\n', '2', 'TECHNOLOGY')");
             $upd = $mysqli->query($query);

         $query = $mysqli->query("ALTER TABLE `agb` ADD `name` TEXT NOT NULL AFTER `info`");
             $upd = $mysqli->query($query);

                  $query = $mysqli->query("ALTER TABLE `header_slider` CHANGE COLUMN `img` `img` TEXT NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);

                  $query = $mysqli->query("INSERT INTO `page_alias` (`de`, `en`) VALUES ('delete-slider-img', 'delete-slider-img')");
             $upd = $mysqli->query($query);

                  $query = $mysqli->query("ALTER TABLE `gallery_bg` CHANGE COLUMN `path` `path` TEXT NULL DEFAULT NULL");
             $upd = $mysqli->query($query);

                  $query = $mysqli->query("ALTER TABLE `gallery_images` CHANGE COLUMN `path` `path` TEXT NULL DEFAULT NULL");
             $upd = $mysqli->query($query);


      $query = $mysqli->query(" UPDATE `registration_page` SET `form_title`='uuu', `form`='\n  <div class=\"row\">\n  <div class=\"form-group col-sm-6 col-xs-12 light-text \">\n          Please fill in all the fields:\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"name\">Ihr Name:</label>\n          <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\">\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"telephone\">Ihre Telefonnummer:</label>\n          <input type=\"tel\" class=\"form-control\" id=\"telephone\"\n                 name=\"telephone\">\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"bundesland\">Bundesland:</label>\n          <select class=\"form-control\" id=\"country\" name=\"bundesland\">\n            <option selected=\"\" disabled=\"\"></option>\n            <option>Berlin</option>\n<option>Brandenburg</option>\n<option>Mecklenburg-Vorpommern</option>\n<option>Sachsen</option>\n<option>Schleswig-Holstein</option>\n<option>Hamburg</option>\n<option>Bremen</option>\n<option>Niedersachsen</option>\n<option>Sachen-Anhalt</option>\n<option>Hessen</option>\n<option>Nordrhein-Westfalen</option>\n<option>Rheinland-Pfalz</option>\n<option>Saarland</option>\n<option>Baden-W&uuml;rttemberg</option>\n<option>Bayern</option>\n<option>Th&uuml;ringen</option>\n          </select>\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"email\">Ihre Email:</label>\n          <input type=\"email\" class=\"form-control\" id=\"email\"\n                 name=\"email\">\n        </div>\n      </div>\n\n      <div class=\"row\">\n        <div class=\"form-group col-xs-12\">\n          <label for=\"ihre_nachricht\">Ihre Nachricht:</label>\n          <textarea class=\"form-control\" rows=\"4\" id=\"ihre_nachricht\"\n                    name=\"ihre_nachricht\"></textarea>\n        </div>\n      </div>\n      <div class=\"row text-center\">\n        <button type=\"submit\" class=\"btn\">ANFRAGE SENDEN</button>\n      </div>\n  ' WHERE `id`='1'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("UPDATE `registration_page` SET `form`='\n  <div class=\"row\">\n <div class=\"form-group col-sm-6 col-xs-12 light-text \">\n   Please fill in all the fields:\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"name\">Your name:</label>\n          <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\">\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"telephone\">Your phone number:</label>\n          <input type=\"tel\" class=\"form-control\" id=\"telephone\"\n                 name=\"telephone\">\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"bundesland\">Bundesland:</label>\n          <select class=\"form-control\" id=\"country\" name=\"bundesland\">\n            <option selected=\"\" disabled=\"\"></option>\n            <option>Berlin</option><option>Brandenburg</option><option>Mecklenburg-Vorpommern</option><option>Sachsen</option><option>Schleswig-Holstein</option><option>Hamburg</option><option>Bremen</option><option>Niedersachsen</option><option>Sachen-Anhalt</option><option>Hessen</option><option>Nordrhein-Westfalen</option><option>Rheinland-Pfalz</option><option>Saarland</option>\n<option>Baden-W&uuml;rttemberg</option>\n<option>Bayern</option>\n<option>Th&uuml;ringen</option>\n          </select>\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"email\">Your Email:</label>\n          <input type=\"email\" class=\"form-control\" id=\"email\"\n                 name=\"email\">\n        </div>\n      </div>\n\n      <div class=\"row\">\n        <div class=\"form-group col-xs-12\">\n          <label for=\"ihre_nachricht\">Your Message:</label>\n          <textarea class=\"form-control\" rows=\"4\" id=\"ihre_nachricht\"\n                    name=\"ihre_nachricht\"></textarea>\n        </div>\n      </div>\n      <div class=\"row text-center\">\n        <button type=\"submit\" class=\"btn\">SEND</button>\n      </div>\n' WHERE `id`='2'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query(" ALTER TABLE `registration_page` CHANGE COLUMN `service_bg` `service_bg` TEXT NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("ALTER TABLE `registration_page` CHANGE COLUMN `angebot_bg` `angebot_bg` TEXT NULL DEFAULT NULL , CHANGE COLUMN `angebot_title` `angebot_title` TEXT NULL DEFAULT NULL");
             $upd = $mysqli->query($query);


          $query = $mysqli->query("ALTER TABLE `registration_angebot` CHANGE COLUMN `icon` `icon` TEXT NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);


          $query = $mysqli->query("ALTER TABLE `registration_services` CHANGE COLUMN `icon` `icon` TEXT NULL DEFAULT NULL");
             $upd = $mysqli->query($query);


          $query = $mysqli->query("ALTER TABLE `bildmotive_images` DROP COLUMN `category_id_2`, CHANGE COLUMN `category_id_1` `category_id` INT(11) NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);


          $query = $mysqli->query("ALTER TABLE `thermostats_images` CHANGE COLUMN `path` `path` TEXT NULL DEFAULT NULL ");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("INSERT INTO `garantie` (`id`, `title`, `text`, `lid`) VALUES ('2', 'Warranty Terms', '<h3> WARRANTY CONDITIONS</h3><p> The manufacturer's warranty does not apply to damage caused by personal negligence or caused by misuse of electrical equipment. </p><p> The following cases exclude a warranty: </p><ol><li> Defects and damage caused by misuse while using the product. </li><li> Any defects and damage incurred after delivery during loading, unloading or transport of the appliance. </li><li> Defects and damage caused by increased or decreased mains voltage or by the subsequent connection of the appliance to mains voltages and frequencies which do not comply with the prescribed requirements. </li><li> Incorrect installation or uninstallation. </li><li> Defects and damage caused by repair in unspecified service centers. </li><li> Due to the coating properties, slight deviations in the planets can not be avoided. These are in particular visible in the case of mirrors and do not constitute a reason for complaint. </li></ol><p> Attention! In the case of the above mentioned causes and claims, the warranty claim loses its validity. Warranty Card WITHOUT HOLDER Stamp, address, sender&#39;s signature and date of sale will be considered invalid. </p><p> Repair or replacement is only carried out in specialized service centers or by the authorized specialist dealer \"Infrared24\".</p>', '2')");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("ALTER TABLE `colours` ADD COLUMN `en_name` VARCHAR(45) NULL AFTER `lid`");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("ALTER TABLE `colours` DROP COLUMN `lid`");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("UPDATE `colours` SET `en_name`='White' WHERE `id`='1'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("UPDATE `colours` SET `en_name`='Black' WHERE `id`='2'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("UPDATE `colours` SET `en_name`='RAL' WHERE `id`='4'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("UPDATE `colours` SET `en_name`='Images' WHERE `id`='5'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("UPDATE `colours` SET `en_name`='Glass' WHERE `id`='6'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("DELETE FROM `colours` WHERE `id`='7'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("DELETE FROM `colours` WHERE `id`='8'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("DELETE FROM `colours` WHERE `id`='9'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("DELETE FROM `colours` WHERE `id`='10'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("DELETE FROM `colours` WHERE `id`='11'");
             $upd = $mysqli->query($query);

          $query = $mysqli->query("ALTER TABLE `sizes` ADD COLUMN `lid` VARCHAR(45) NULL DEFAULT '1' AFTER `left`");
             $upd = $mysqli->query($query);


    $query = $mysqli->query("INSERT INTO `users` (`id`, `login`, `pass`, `roleid`, `bundeslandid`) VALUES ('10', 'test-user', '$2y$10$3JiQezyu4LiimhO/74qwauo5eqglW6TqA4K/xIG1giC/ZAJ8KtusK', '2', '1')");
      $upd = $mysqli->query($query);

*/
    /*
     *
     *




    $query = $mysqli->query("");
      $upd = $mysqli->query($query);

      $query = $mysqli->query("");
      $upd = $mysqli->query($query);
     */

    $routes = explode('/', $_SERVER['REQUEST_URI']);

    foreach ($routes as $row) {
      if ($row !== '') {
        $qt_de = "SELECT * FROM page_alias  WHERE de='" . $row . "'";
        $qt_en = "SELECT * FROM page_alias  WHERE en='" . $row . "'";
        $query_de = $mysqli->query($qt_de);
        $query_en = $mysqli->query($qt_en);

        if ($query_de->num_rows !== 0) {
          while ($r = mysqli_fetch_assoc($query_de)) {
            $res['route'][] = $r;
          }
        }
        else {
          if ($query_en->num_rows !== 0) {
            while ($r = mysqli_fetch_assoc($query_en)) {
              $res['route'][] = $r;
            }
          }
        }
      }
    }

    $lang = getLanguage();

    $query = $mysqli->query("SELECT * FROM languages");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['languages'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM social");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['social'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM mitglied WHERE lid='" . $lang . "'");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['mitglied'] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM default_info");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['logo'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM footer_links WHERE lid=" . $lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['footer_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM header_links WHERE lid=" . $lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM footer_service_links  WHERE lid=" . $lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['footer_service_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM phones");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['phones'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM header_phones");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_phones'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM contacts  WHERE lid=" . $lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['contacts'][] = $r;
      }
    }


    $query = $mysqli->query("SELECT * FROM modal_menu WHERE lid=" . $lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['modal_menu'][] = $r;
      }
    }

    return $res;
  }
}
