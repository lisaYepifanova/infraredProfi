<main>
  <h1 class="page-header container text-capitalize">LOGIN</h1>

  <div class="container login-form-wrapper box-mid-margin right-padding">

      <?php
      if (!$data['iscorrect']) {
          echo '<div class="error-wrapper row"><div class="alert alert-danger fade in error-form-message col-sm-6">';
          echo 'Incorrect username or password.';
          echo '</div></div>';
      }
      ?>

    <form role="form" action="" method="post">
      <div class="row justify-content-center">
        <div class="form-group  col-sm-6">
          <label for="login">Login:</label>
          <input type="text" class="form-control" id="login" name="login">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="form-group  col-sm-6">
          <label for="email">Pass:</label>
          <input type="password" class="form-control" id="pass"
                 name="pass">
        </div>
      </div>

      <div class="row justify-content-center">
        <button type="submit" class="btn">LOGIN</button>
      </div>
    </form>


  </div>


</main>
