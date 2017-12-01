<main>
  <h1 class="page-header container text-capitalize left-padding">USER INFO</h1>

    <?php
    if (getRole() == 'admin' || getRole() == 'superadmin') {
        echo ' <div class="container left-padding box-mid-margin">
    <a class="admin-page-icons col-xs-3" href="/handler-liste/">';
        echo '<img src="'.$data['list_icon']['path'].'" alt="'.$data['list_icon']['name'].'">';
        echo '<p class="icon-title">Handler liste</p>
    </a>';
        echo '<a class="admin-page-icons col-xs-3" href="/order/">';
        echo '<img src="'.$data['order_icon']['path'].'" alt="'.$data['order_icon']['name'].'">';
        echo '<p class="icon-title">Order page</p>
    </a>';
        echo ' <a class="admin-page-icons col-xs-3" href="/user/edit">';
        echo '<img src="'.$data['edit_icon']['path'].'" alt="'.$data['edit_icon']['name'].'">';
        echo '<p class="icon-title">Edit info</p>
    </a>';
        echo '<a class="admin-page-icons col-xs-3" href="/logout">';
        echo '<img src="'.$data['logout_icon']['path'].'" alt="'.$data['logout_icon']['name'].'">';
        echo '<p class="icon-title">Logout</p>
    </a>';

        echo '<a class="admin-page-icons col-xs-3" href="/site-settings">';
        echo '<img src="'.$data['settings_icon']['path'].'" alt="'.$data['settings_icon']['name'].'">';
        echo '<p class="icon-title">Site settings</p>
    </a>';
        echo '</div>';
    }
    ?>

  <div class="container user-item box-mid-margin left-padding">
    <div class="image-row">
        <?php
        if ($data['photo']['path'] !== '') {
            echo '<img src="'.$data['photo']['path'].'" alt="'.$data['photo']['name'].'">';
        }
        ?>
    </div>
    <div class="info-row">
        <?php


        foreach ($data['user_info'] as $row) {
            if ($row['value'] !== '') {
                echo '<div>'.ucfirst($row['key']).': ';
                echo $row['value'].'</div>';
            }
        }
        ?>
    </div>
  </div>
    <?php
    echo ' <div class="container left-padding box-mid-margin">
';
    echo '</div>';
    ?>

</main>
