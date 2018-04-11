<main>
  <h1 class="page-header container text-capitalize left-padding">
    ALIASES
  </h1>
  <div class="container left-padding box-small-margin">
    <?php
    if (isAuth()) {
      echo '<div class="container produkte-del box-small-margin "><a href="' . $_SERVER['REQUEST_URI'] . '/edit"
           class="glyphicon glyphicon-pencil"> Edit aliases</a></div>';
    }
    ?>
  </div>

  <div class="container left-padding box-small-margin aliases-container">
    <?php
echo '<table style="max-width:100%;">';
    foreach ($data as $row) {

      echo '<tr class="" id="alias-' . $row['id'] . '">';
      echo '<td class="alias-item-field alias-id">Id ' . $row['id'] . '</td>';
      echo '<td class="alias-item-field alias-de">DE: ' . $row['de'] . '</td>';
      echo '<td class="alias-item-field alias-en">EN: ' . $row['en'] . '</td>';
      echo '</tr>';
    }
echo '</table>';
    ?>
  </div>
</main>