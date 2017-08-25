<main>
  <h1 class="page-header container text-capitalize">HANDLER LISTE</h1>

  <div class="container handler-liste-wrapper box-mid-margin right-padding">
    <div class="handler-liste">
      <?php
      foreach($data as $row) {
        echo '<div class="box-mid-margin">';
        echo '<h3>'.$row['role'].'</h3>';
        if ($row['items'] !== ''){
          echo '<table>';
          foreach ($row['items'] as $r) {
              echo '<tr>';
              echo '<td><img src="'.IMAGEPATH.'users/'.$r['photo'].'"></td>';
              echo '<td>'.$r['login'].'</td>';
              echo '<td>'.$r['name'].'</td>';
              echo '<td>'.$r['surname'].'</td>';
              echo '<td>'.$r['phone'].'</td>';
              echo '<td>'.$r['email'].'</td>';
              echo '<td>'.$r['address'].'</td>';
              echo '<td>'.$r['bundesland'].'</td>';
              echo '<td>'.$r['bank_account'].'</td>';
              echo '</tr>';
          }
          echo '</table>';
        }
        else {
          echo '<p>There is no users in this category.</p>';
        }
        echo '</div>';
      }
      ?>

  </div>
  </div>


</main>
