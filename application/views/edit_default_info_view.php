<main>
  <h1 class="page-header container text-capitalize left-padding">EDIT DEFAULT
    INFO</h1>

  <div class="container left-padding">
    <a class="admin-page-icons admin-icon-item" href="/site-settings"><img
          src="../img/user_pages/settings.png" alt="settings">
      <p class="icon-title">Site settings</p>
    </a>

    <h3>Default site info</h3>
    <form enctype="multipart/form-data" role="form" action="" method="post">

      <?php echo '<input type="hidden" name="max_id" id="max_id" value="' . $data['add']['max_id'] . '">'; ?>
      <?php echo '<input type="hidden" name="max_link_id" id="max_link_id" value="' . $data['add']['max_link_id'] . '">'; ?>
      <?php echo '<input type="hidden" name="max_id_phone" id="max_id_phone" value="' . $data['add']['max_id_phone'] . '">'; ?>
      <?php echo '<input type="hidden" name="max_id_header_phone" id="max_id_header_phone" value="' . $data['add']['max_id_header_phone'] . '">'; ?>
      <?php echo '<input type="hidden" name="max_id_menu" id="max_id_menu" value="' . $data['add']['max_id_menu'] . '">'; ?>
      <?php echo '<input type="hidden" name="max_header_link_id" id="max_header_link_id" value="' . $data['add']['max_header_link_id'] . '">'; ?>
      <?php echo '<input type="hidden" name="max_id_social" id="max_id_social" value="' . $data['add']['max_id_social'] . '">'; ?>
      <div class="edit-logo box-mid-margin">
        <!-- site logo -->
        <label for="logo_image">Logo image:</label>
        <div>
          <img id="imagelogo_image"
               src="<?php echo IMAGEPATH . '' . $default['logo'][0]['site_logo']; ?>"
               alt="logo"/>
          <a class="close-logo_image">
            <button type="button">Reset</button>
          </a>
        </div>

        <input type="file" class="form-control" id="logo_image"
               name="logo_image">
        <span class="help-block"> Max filesize is 400Kb</span>


      </div>

      <div class="edit-header-links box-mid-margin">
        <h4>Header links:</h4>
        <?php foreach ($default['header_links'] as $id => $item) { ?>
          <div class="header-link-item box-mid-margin">
            <label for="header-link-title-'.$id.'">Link title:</label>
            <?php echo '<input type="text" id="header-link-title-' . $id . '" class="" name="header_links[' . $id . '][title]" value="' . $item['title'] . '">'; ?>

            <label for="header-link-path-'.$id.'">Link path:</label>
            <?php echo '<input type="text" id="header-link-path-' . $id . '"  name="header_links[' . $id . '][link]" value="' . $item['link'] . '">'; ?>

            <?php echo '<input type="hidden" name="header_links[' . $id . '][id]"  value="' . $item['id'] . '">'; ?>
          </div>
        <?php } ?>

        <a class="glyphicon glyphicon-plus add-new-header-link">Add new header
          link</a>
      </div>


      <div class="edit-footer-service-links box-mid-margin">
        <h4>Footer links:</h4>
        <?php foreach ($default['footer_links'] as $id => $item) { ?>
          <div class="service-link-item box-mid-margin">
            <label for="link-title-'.$id.'">Link title:</label>
            <?php echo '<input type="text" id="link-title-' . $id . '" class="" name="footer_links[' . $id . '][title]" value="' . $item['title'] . '">'; ?>

            <label for="link-path-'.$id.'">Link path:</label>
            <?php echo '<input type="text" id="link-path-' . $id . '"  name="footer_links[' . $id . '][link]" value="' . $item['link'] . '">'; ?>

            <?php echo '<input type="hidden" name="footer_links[' . $id . '][id]"  value="' . $item['id'] . '">'; ?>
          </div>
        <?php } ?>

        <a class="glyphicon glyphicon-plus add-new-link">Add new service
          link</a>
      </div>

      <div class="edit-footer-service-links box-mid-margin">
        <h4>Footer service links:</h4>
        <?php foreach ($default['footer_service_links'] as $id => $item) { ?>
          <div class="service-link-item box-mid-margin">
            <label for="link-title-'.$id.'">Link title:</label>
            <?php echo '<input type="text" id="slink-title-' . $id . '" class="" name="footer_service_links[' . $id . '][title]" value="' . $item['title'] . '">'; ?>

            <label for="link-path-'.$id.'">Link path:</label>
            <?php echo '<input type="text" id="slink-path-' . $id . '"  name="footer_service_links[' . $id . '][link]" value="' . $item['link'] . '">'; ?>

            <?php echo '<input type="hidden" name="footer_service_links[' . $id . '][id]"  value="' . $item['id'] . '">'; ?>
          </div>
        <?php } ?>

        <a class="glyphicon glyphicon-plus add-new-service-link">Add new service
          link</a>
      </div>


      <div class="edit-header-phones box-mid-margin">
        <h4>Header phones:</h4>
        <?php
        if (isset($default['header_phones'])) {
          foreach ($default['header_phones'] as $id => $item) { ?>
            <div class="header-phone-item box-mid-margin">
              <label for="header-phone-title-'.$id.'">Text:</label>
              <?php echo '<input type="text" id="header-phone-title-' . $item['id'] . '" name="header_phones[' . $item['id'] . '][text]" value="' . $item['text'] . '">'; ?>

              <label for="header-phone-num-'.$id.'">Phone:</label>
              <?php echo '<input type="text" id="header-phone-num-' . $item['id'] . '"  name="header_phones[' . $item['id'] . '][tel]" value="' . $item['tel'] . '">'; ?>

              <?php echo '<input type="hidden" name="header_phones[' . $item['id'] . '][id]"  value="' . $item['id'] . '">'; ?>
            </div>
          <?php }
        } ?>

        <a class="glyphicon glyphicon-plus add-new-header-phone">Add new phone
          to the header</a>
      </div>

      <div class="edit-phones box-mid-margin">
        <h4>Phones:</h4>
        <?php foreach ($default['phones'] as $id => $item) { ?>
          <div class="phone-item box-mid-margin">
            <label for="phone-title-'.$id.'">Text:</label>
            <?php echo '<input type="text" id="phone-title-' . $item['id'] . '" name="phones[' . $item['id'] . '][text]" value="' . $item['text'] . '">'; ?>

            <label for="phone-num-'.$id.'">Phone:</label>
            <?php echo '<input type="text" id="phone-num-' . $item['id'] . '"  name="phones[' . $item['id'] . '][tel]" value="' . $item['tel'] . '">'; ?>

            <?php echo '<input type="hidden" name="phones[' . $item['id'] . '][id]"  value="' . $item['id'] . '">'; ?>
          </div>
        <?php } ?>

        <a class="glyphicon glyphicon-plus add-new-phone">Add new phone</a>
      </div>


      <div class="email-edit box-mid-margin">
        <h4>Email:</h4>
        <input type="email" name="mail"
               value="<?php echo $default['contacts'][0]['value']; ?>">
      </div>

      <!-- main modal menu -->
      <div class="edit-modal-menu box-mid-margin">
        <h4>Links in main menu</h4>

        <?php foreach ($default['modal_menu'] as $id => $item) { ?>
          <div class="modal-menu-item box-mid-margin">
            <label for="menu-item-title-'.$id.'">Link title:</label>
            <?php echo '<input type="text" id="menu-item-title-' . $id . '" class="" name="modal_menu[' . $id . '][title]" value="' . $item['title'] . '">'; ?>

            <label for="menu-item-path-'.$id.'">Link path:</label>
            <?php echo '<input type="text" id="menu-item-path-' . $id . '"  name="modal_menu[' . $id . '][link]" value="' . $item['link'] . '">'; ?>

            <?php echo '<input type="hidden" name="modal_menu[' . $id . '][id]"  value="' . $item['id'] . '">'; ?>
          </div>
        <?php } ?>

        <a class="glyphicon glyphicon-plus add-new-menu-item">Add new menu
          item</a>
      </div>


      <!-- social links -->
      <div class="edit-modal-menu box-mid-margin">
        <h4>Social links</h4>

        <?php
        if (isset($default['social'])) {
          foreach ($default['social'] as $id => $item) { ?>
            <div class="social-item box-mid-margin">
 <?php
              echo '<div class="social-alt">
                <label for="social-item-alt-'.$item['id'].'">Link alt:</label>';
                echo '<input type="text" id="social-item-alt-' . $item['id'] . '" class="" name="social[' . $item['id'] . '][alt]" value="' . $item['alt'] . '">';
             echo ' </div>
              <div class="social-path">
                <label for="social-item-path-'.$item['id'].'">Link path:</label>';
                 echo '<input type="text" id="social-item-path-' . $item['id'] . '"  name="social[' . $item['id'] . '][link]" value="' . $item['link'] . '">'; ?>
              </div>

              <div
                  class="box-small-margin social-item-image-edit social-image-item-<?php echo $item['id']; ?>">

                <div>
                  <img id="social_image-<?php echo $item['id']; ?>"
                       src="<?php echo IMAGEPATH . $item['img']; ?>"
                       alt=""/>
                  <a class="close-social-image close-social_image-<?php echo $item['id']; ?>">
                    <button type="button">Reset</button>
                  </a>
                </div>
                <input type="file" class="form-control social-img"
                       id="social_image_field-<?php echo $item['id']; ?>"
                       name="social_image[<?php echo $item['id']; ?>]">
                <input type="hidden"
                       name="social_image[<?php echo $item['id']; ?>][id]"
                       value="<?php echo $item['id']; ?>">
              </div>


              <?php echo '<input type="hidden" name="social[' . $item['id'] . '][id]"  value="' . $item['id'] . '">'; ?>
            </div>
          <?php }
        } ?>

        <!--
        Create js scripts for loading image and adding new social items fields
        -->
        <a class="glyphicon glyphicon-plus add-new-social-item">Add new social
          item</a>
      </div>


      <button class="btn" type="submit">SAVE</button>
    </form>
  </div>
</main>