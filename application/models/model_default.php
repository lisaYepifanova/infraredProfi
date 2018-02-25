<?php

class Model_Default extends Model {
  public function get_data() {

    include 'application/connection.php';

    /*   $query = $mysqli->query("");
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

     $query = $mysqli->query("UPDATE `registration_page` SET `form`=' <form role=\"form\" action=\"\" method=\"post\">\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12 light-text \">\n          Please fill in all the fields:\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"name\">Ihr Name:</label>\n          <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\">\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"telephone\">Ihre Telefonnummer:</label>\n          <input type=\"tel\" class=\"form-control\" id=\"telephone\"\n                 name=\"telephone\">\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"bundesland\">Bundesland:</label>\n          <select class=\"form-control\" id=\"country\" name=\"bundesland\">\n            <option selected disabled></option>\n            <?php\n            foreach ($data[\'bundesland\'] as $row) {\n              echo \'<option>\' . $row[\'name\'] . \'</option>\';\n            }\n            ?>\n\n          </select>\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"email\">Ihre Email:</label>\n          <input type=\"email\" class=\"form-control\" id=\"email\"\n                 name=\"email\">\n        </div>\n      </div>\n\n      <div class=\"row\">\n        <div class=\"form-group col-xs-12\">\n          <label for=\"ihre_nachricht\">Ihre Nachricht:</label>\n          <textarea class=\"form-control\" rows=\"4\" id=\"ihre_nachricht\"\n                    name=\"ihre_nachricht\"></textarea>\n        </div>\n      </div>\n      <div class=\"row text-center\">\n        <button type=\"submit\" class=\"btn\">ANFRAGE SENDEN</button>\n      </div>\n    </form>' WHERE `id`='1'");
         $upd = $mysqli->query($query);

$query = $mysqli->query("UPDATE `registration_page` SET `form`=' <form role=\"form\" action=\"\" method=\"post\">\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12 light-text \">\n          Please fill in all the fields:\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"name\">Ihr Name:</label>\n          <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\">\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"telephone\">Ihre Telefonnummer:</label>\n          <input type=\"tel\" class=\"form-control\" id=\"telephone\"\n                 name=\"telephone\">\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"bundesland\">Bundesland:</label>\n          <select class=\"form-control\" id=\"country\" name=\"bundesland\">\n            <option selected disabled></option>\n            <?php\n            foreach ($data[\'bundesland\'] as $row) {\n              echo \'<option>\' . $row[\'name\'] . \'</option>\';\n            }\n            ?>\n\n          </select>\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"email\">Ihre Email:</label>\n          <input type=\"email\" class=\"form-control\" id=\"email\"\n                 name=\"email\">\n        </div>\n      </div>\n\n      <div class=\"row\">\n        <div class=\"form-group col-xs-12\">\n          <label for=\"ihre_nachricht\">Ihre Nachricht:</label>\n          <textarea class=\"form-control\" rows=\"4\" id=\"ihre_nachricht\"\n                    name=\"ihre_nachricht\"></textarea>\n        </div>\n      </div>\n      <div class=\"row text-center\">\n        <button type=\"submit\" class=\"btn\">ANFRAGE SENDEN</button>\n      </div>\n    </form>' WHERE `id`='2'");
         $upd = $mysqli->query($query);


$query = $mysqli->query("UPDATE `registration_page` SET `form`=' <form role=\"form\" action=\"\" method=\"post\">\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12 light-text \">\n          Please fill in all the fields:\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"name\">Your name:</label>\n          <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\">\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"telephone\">Your phone number:</label>\n          <input type=\"tel\" class=\"form-control\" id=\"telephone\"\n                 name=\"telephone\">\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"bundesland\">Bundesland:</label>\n          <select class=\"form-control\" id=\"country\" name=\"bundesland\">\n            <option selected disabled></option>\n            <?php\n            foreach ($data[\'bundesland\'] as $row) {\n              echo \'<option>\' . $row[\'name\'] . \'</option>\';\n            }\n            ?>\n\n          </select>\n        </div>\n        <div class=\"form-group col-sm-6 col-xs-12\">\n          <label for=\"email\">Your Email:</label>\n          <input type=\"email\" class=\"form-control\" id=\"email\"\n                 name=\"email\">\n        </div>\n      </div>\n\n      <div class=\"row\">\n        <div class=\"form-group col-xs-12\">\n          <label for=\"ihre_nachricht\">Your Message:</label>\n          <textarea class=\"form-control\" rows=\"4\" id=\"ihre_nachricht\"\n                    name=\"ihre_nachricht\"></textarea>\n        </div>\n      </div>\n      <div class=\"row text-center\">\n        <button type=\"submit\" class=\"btn\">SEND</button>\n      </div>\n    </form>' WHERE `id`='2'");
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












     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);


 $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);


 $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

 $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);

     $query = $mysqli->query("");
         $upd = $mysqli->query($query);





 $query = $mysqli->query("");
         $upd = $mysqli->query($query);
     */


$lang = getLanguage();

    $query = $mysqli->query("SELECT * FROM languages");

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['languages'][] = $r;
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

    $query = $mysqli->query("SELECT * FROM footer_links WHERE lid=".$lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['footer_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM header_links WHERE lid=".$lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['header_links'][] = $r;
      }
    }

    $query = $mysqli->query("SELECT * FROM footer_service_links  WHERE lid=".$lang);

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

    $query = $mysqli->query("SELECT * FROM contacts  WHERE lid=".$lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['contacts'][] = $r;
      }
    }


    $query = $mysqli->query("SELECT * FROM modal_menu WHERE lid=".$lang);

    if ($query) {
      while ($r = mysqli_fetch_assoc($query)) {
        $res['modal_menu'][] = $r;
      }
    }

    return $res;
  }
}
