<main>
  <h1 class="page-header container text-capitalize left-padding">HANDLER LISTE</h1>

  <div class="left-padding box-mid-margin container">
    <a class="admin-page-icons add-handler" href="/handler-liste/add-user/">
        <?php echo '<img src="'.$data['list_page']['add_icon']['path'].'" alt="'.$data['list_page']['add_icon']['name'].'">'; ?>
      <p class="icon-title">Add new user</p>
    </a>
  </div>

  <div class="container handler-liste-wrapper box-mid-margin left-padding">
    <div class="handler-liste">
        <?php
        foreach ($data['user_info'] as $row) {
            echo '<div class="box-mid-margin role-item">';
            echo '<h3>'.$row['role'].'</h3>';
            if ($row['items'] !== '') {
                echo '<div class="user-table">';
                foreach ($row['items'] as $r) {
                    echo '<div class="user-item">';
                    echo '<div class="image-row">';
                    if ($r['photo'] !== '') {
                      echo '<img src="'.IMAGEPATH.'users/'.$r['photo'].'">';
                    }

                    echo '</div>';
                    echo '<div class="info-row">';
                    echo '<div>'.$r['login'].'</div>';
                    echo '<div>'.$r['uname'].'</div>';
                    echo '<div>'.$r['surname'].'</div>';
                    echo '<div><a href="tel:'.$r['phone'].'" class="user-phone">'.$r['phone'].'</a></div>';
                    echo '<div><a href="mailto:'.$r['email'].'" class="user-phone">'.$r['email'].'</a></div>';
                    echo '<div>'.$r['address'].'</div>';
                    echo '<div>'.$r['bundesland'].'</div>';
                    echo '<div>'.$r['bank_account'].'</div>';
                    echo '<div class="delete-item glyphicon glyphicon-trash" data-toggle="modal" data-target="#delItem'.$r['id'].'"></div>';
                    echo '<a class="edit-item glyphicon glyphicon-cog" href="/handler-liste/edit-user/'.$r['login'].'"></a>';
                    echo '</div>';

                    echo '</div>';

                    echo '<div id="delItem'.$r['id'].'" class="delete-item-modal modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">×</button>
          <h4 class="modal-title">Deleting user</h4>
        </div>
        <div class="modal-body">Do you really want to delete ';

                    echo $row['role'].' '.$r['uname'].' '.$r['surname'].'?';
                    ?>
                    <?php
                    echo '</div >
                          <div class="modal-footer" >
                              <form class="del-form" enctype="multipart/form-data" role="form" action="/handler-liste/delete-user" method="post" >
                            <input type="hidden" name="uid" value="'.$r['id'].'">
                            <input type="hidden" name="uname" value="'.$r['uname'].'">
                            <input type="hidden" name="surname" value="'.$r['surname'].'">
                            <button type="submit" class="btn btn-default"> Delete</button>
                          </form>
                          
                          
                            
                            <a class="btn btn-default"  data-dismiss = "modal" >
                                Cancel
                            </a>
                          </div >
                        </div>
                      </div>
                    </div>';
                }
                echo '</div > ';
            } else {
                echo '<p > There is no users in this category.</p > ';
            }
            echo '</div > ';
        }
        ?>

    </div>
  </div>


</main>

