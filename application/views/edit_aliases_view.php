<main>
  <h1 class="page-header container text-capitalize left-padding">EDIT
    ALIASES</h1>
  <div class="container left-padding">
    <a class="admin-page-icons admin-icon-item box-small-margin"
       href="/site-settings"><img
          src="../img/user_pages/settings.png" alt="settings">
      <p class="icon-title">Site settings</p>
    </a>


    <form enctype="multipart/form-data" role="form" action="" method="post"
          class="aliases-container">



      <?php
              echo '<input type="hidden" name="max_id" id="max_id" value="'.$data['add']['max_id'].'">';

      foreach ($data['add']['main'] as $row) {
        echo '<div class="alias-item container box-mid-margin" id="alias-' . $row['id'] . '">';
        echo '<input type="hidden" name="items['.$row['id'].'][id]" value="'.$row['id'].'">';
        echo '<div class="alias-item-field-edit alias-id">Id ' . $row['id'] . '</div>';
        echo '<div class="alias-item-field-edit alias-de"><label for="de-' . $row['id'] . '">DE: </label><input type="text" name="items['.$row['id'].'][de]" id="de-' . $row['id'] . '" value="' . $row['de'] . '"></div>';
        echo '<div class="alias-item-field-edit alias-en"><label for="en-' . $row['id'] . '">EN: </label><input type="text" name="items['.$row['id'].'][en]" id="en-' . $row['id'] . '" value="' . $row['en'] . '"></div>';

        echo '</div>';
      }

      echo '<a class="glyphicon glyphicon-plus add-new-alias">Add new alias</a>';
      ?>

      <div class="btn-wrapper container box-mid-margin left-padding">
        <button class="btn" type="submit">SAVE</button>
      </div>
    </form>
  </div>
</main>
