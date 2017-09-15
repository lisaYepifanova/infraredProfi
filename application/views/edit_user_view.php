<main class="add-handler-page">
  <h1 class="page-header container text-capitalize">EDIT USER</h1>

  <div class="container right-padding box-mid-margin">
    <a class="admin-page-icons" href="/handler-liste/">
        <?php echo '<img src="'.$data['add']['list_page']['list_icon']['path'].'" alt="'.$data['add']['list_page']['list_icon']['name'].'">'; ?>
      <p class="icon-title">Back to the list</p>
    </a>
  </div>

  <div class="handler-editing-form container right-padding box-mid-margin">

      <?php
      if ($data['save']) {
          if (!$data['save']['res']) { ?>

            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                <?php
                foreach ($data['save']['info'] as $row) {
                    echo '<p>'.$row.'</p>';
                }
                ?>
            </div>

          <?php }
      } ?>
      <?php
      $main_info = $data['add']['main_info'];
      ?>
    <form enctype="multipart/form-data" role="form" action="" method="post">
      <span class="help-block"><sup
            class="req-star glyphicon glyphicon-asterisk"></sup> - required field</span>
      <input type="hidden" name="MAX_FILE_SIZE" value="409600"/>
      <input type="hidden" name="id" value="<?php echo $main_info['id']; ?>"/>

      <div class="row">
        <div class="form-group col-sm-6  col-xs-12 col-sm-offset-3">
          <label for="login">Login<sup
                class="req-star glyphicon glyphicon-asterisk"></sup>:</label>
          <input type="text" class="form-control" id="login" name="login" value=
            <?php echo $main_info['login']; ?>>
          <span
              class="login-help help-block error-block">Login can't be blank</span>
        </div>
      </div>

      <div class="row ">
        <div class=" col-sm-6  col-xs-12 col-sm-offset-3">
          <label for="pass_n">Set new password:</label>
          <div class="pass-wrapper">
            <input type="text" class="form-control" id="pass" name="pass">
            <div class="green-tick-icon"><img
                  src="<?php echo IMAGEPATH.'icons/green-tick.png'; ?>"></div>
          </div>
          <span class="pass-help help-block">
            Password must contain at least 8 characters</span>
          <span
              class="pass-help help-block error-block">Password can't be blank</span>
        </div>
      </div>

      <div class="row ">
        <div class="col-sm-6  col-xs-12 col-sm-offset-3">
          <label for="pass_r">Repeat new password:</label>
          <div class="pass-wrapper"><input type="text" class="form-control"
                                           id="pass_r"
                                           name="pass_r">
            <div class="green-tick-icon"><img
                  src="<?php echo IMAGEPATH.'icons/green-tick.png'; ?>"></div>
          </div>
          <span
              class="pass-help help-block error-block">Password can't be blank</span>
        </div>

      </div>

      <div class="row">
        <div class="form-group col-sm-6 col-sm-offset-3 col-xs-12">

          <label for="photo">Photo:</label>
          <div>
            <img id="image"
                 src="<?php echo IMAGEPATH.'users/'.$main_info['photo']; ?>"
                 alt=""/>
            <a href="#" class="close-img">
              <button type="button">Reset</button>
            </a>
          </div>
          <input type="file" class="form-control" id="photo" name="photo"
                 value=<?php echo $main_info['photo']; ?>>
          <span class="help-block"> Max filesize is 400Kb</span>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6  col-xs-12">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name"
                 value=<?php echo $main_info['uname']; ?>>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
          <label for="surname">Surname:</label>
          <input type="text" class="form-control" id="surname" name="surname"
                 value=<?php echo $main_info['surname']; ?>>
        </div>

      </div>
      <div class="row">
        <div class="form-group col-sm-6  col-xs-12">
          <label for="telephone">Ihre Telefonnummer:</label>
          <input type="tel" class="form-control" id="telephone"
                 name="telephone" value=<?php echo $main_info['phone']; ?>>
        </div>

        <div class="form-group col-sm-6  col-xs-12">
          <label for="email">Ihre Email:</label>
          <input type="email" class="form-control" id="email"
                 name="email" value=<?php echo $main_info['email']; ?>>
        </div>

      </div>

      <div class="row ">
        <div class="form-group col-sm-6 col-xs-12">
          <label for="bundesland">Bundesland:</label>
          <select class="form-control" id="country" name="bundesland">
              <?php
              foreach ($data['add']['bundesland'] as $row) {
                  echo '<option value="'.$row['id'].'"';

                  if ($row['id'] == $main_info['bundeslandid']) {
                      echo ' selected ';
                  }
                  echo '>'.$row['name'].'</option>';
              }
              ?>

          </select>
        </div>

        <div class="form-group col-sm-6 col-xs-12">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" name="address"
                 value=<?php echo $main_info['address']; ?>>
        </div>
      </div>

      <div class="row">

        <div class="form-group col-sm-6  col-xs-12">
          <label for="bank_account">Bank account:</label>
          <input type="text" class="form-control" id="bank_account"
                 name="bank_account"
                 value=<?php echo $main_info['bank_account']; ?>>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
          <label for="role">Handler role:</label>
          <select class="form-control" id="role" name="role">
              <?php
              foreach ($data['add']['roles'] as $row) {
                  echo '<option value="'.$row['id'].'"';
                  if ($row['id'] == $main_info['roleid']) {
                      echo ' selected ';
                  }
                  echo '>'.$row['role'].'</option>';
              }
              ?>

          </select>
        </div>

      </div>
      <div class="row text-center">
        <button type="submit" class="btn" id="submit">SAVE USER</button>
      </div>
    </form>
  </div>

</main>