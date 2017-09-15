<main>
  <h1 class="page-header container text-capitalize">DELETING USER</h1>

    <div class="container right-padding box-mid-margin">

      <?php
        if ($data['query']=='ok') {
            echo '<div> User '.$data['uname'].' '.$data['surname'].' deleted successfully</div>';
        } else {
          if ($data['query']=='no_user' or $data['query']=='no_query') {
            header( 'Location: /handler-liste' );
          } else {
            echo '<div> User was not deleted: '.$data['query'].'</div>';
          }

        }
      ?>
    </div>
  <div class="container right-padding box-mid-margin">
    <a class="admin-page-icons" href="/handler-liste/">
        <?php echo '<img src="'.$data['list_icon']['path'].'" alt="'.$data['list_icon']['name'].'">'; ?>
      <p class="icon-title">Back to the list</p>
    </a>

  </div>

</main>

