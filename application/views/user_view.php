<main>
  <h1 class="page-header container text-capitalize">USER INFO</h1>

    <?php
    if (getRole() == 'admin' || getRole() == 'superadmin') {
        echo ' <div class="container right-padding box-mid-margin">
    <a class="admin-page-icons" href="/handler-liste/">';
        echo '<img src="'.$data['list_icon']['path'].'" alt="'.$data['list_icon']['name'].'">';
        echo '<p class="icon-title">Handler liste</p>
    </a>
  </div>';
    }
    ?>

  <div class="container user-info-wrapper box-mid-margin right-padding">
      <?php


      foreach ($data['user_info'] as $row) {
          if ($row['value'] !== '') {
              echo '<div>'.ucfirst($row['key']).': ';
              echo $row['value'].'</div>';
          }

      }


      ?>


    <a href="/logout">Logout</a>
  </div>


</main>
