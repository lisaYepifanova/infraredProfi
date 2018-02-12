<main>

  <h1 class="page-header container text-capitalize left-padding"><?php echo strtoupper(
      $pageTitle
    ); ?></h1>
        <?php
      //include 'application/auth.php';

      if (isAuth() && $last!=="produkte") {
        echo '<div class="container produkte-del box-small-margin "><a href="#delConfirm"
         data-toggle="modal" class="glyphicon glyphicon-trash"> Delete this category</a></div>';

         echo '<div class="container produkte-del box-small-margin "><a href="'.$_SERVER['REQUEST_URI'].'/edit"
           class="glyphicon glyphicon-pencil"> Edit this category</a></div>';
      }
      ?>



  <?php if ($pageTitle !== 'Produkte') { ?>
    <div class="product-menu-wrapper col-sm-3 left-padding">
      <div class="product-menu floating">
        <ul>
          <?php

          $data;
          $debug = TRUE;
          $routes = explode('/', $_SERVER['REQUEST_URI']);
          $last = end($routes);

          echo '<h4><a class="product-menu-item" href="/produkte">PRODUKTE</a></h4>';


          foreach ($data['menu']['root'] as $row) {
            echo '<li>';
            if ($routes[2] == $row['name']) {
              echo '<span class="glyphicon glyphicon-chevron-right"></span>';
            }

            echo '<a class="product-menu-item ';
            if ($routes[2] == $row['name']) {
              echo 'bold-item';
            }

            echo '" href="/produkte/' . $row['name'] . '">' . $row['title'] . '</a>';

            echo '</li>';
          }
          ?>

        </ul>
      </div>
    </div>
  <?php } ?>

  <div class="gallery-product-page container box-m-mg-top">
    <div class="add-new-product-links box-small-mb">
      <?php
      //include 'application/auth.php';

      if (isAuth()) {
        echo '<div class="produkte-add-links box-small-mb"><a href="/produkte/add" class="glyphicon glyphicon-plus"> Add new category</a></div>';
        echo '<div class="produkte-add-links box-small-mb"><a href="/product/add" class="glyphicon glyphicon-plus"> Add new product</a></div>';
        echo '<div class="produkte-add-links box-small-mb"><a href="/related-products/add" class="glyphicon glyphicon-plus"> Add new thermostat, etc.</a></div>';
      }
      ?>

    </div>
    <div class='row'>
      <?php
      if (!empty($data['items_show'])) {
        foreach ($data['items_show'] as $row) {
          if ($_SERVER['REQUEST_URI'] == "/produkte/") {
            $link = $_SERVER['REQUEST_URI'] . $row['name'];
          }
          else {
            $link = $_SERVER['REQUEST_URI'] . '/' . $row['name'];
          }

          echo '<a href="' . $link . '" class="col-xs-6 col-sm-4 col-md-4 product-item">';
          echo '<div class="product-img" style="background-image:url(' . IMAGEPATH . $row['image'] . ')"></div>';
          echo '<h4 class="product-name">' . $row['title'] . '</h4>';
          echo '</a>';
        }
      }
      else {
        echo 'No results';
      }


      ?>
    </div>
  </div>

</main>


<div id="delConfirm" class="modal fade in"
     style="display: none;">
  <div class="modal-dialog aside-modal-dialog">
    <div class="modal-bg"></div>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">x
        </button>
        <h5 class="modal-title">
Confirm the deletion
        </h5>

      </div>
      <div class="modal-body">
        Do you want to delete <?php echo strtoupper($pageTitle); ?> ?
      </div>
      <div class="modal-footer">
        <button type="button btn-danger"> <a href="<?php echo $_SERVER['REQUEST_URI'];?>/delete">Delete </a>
       </button>
        <button type="button"  data-dismiss="modal"
                aria-hidden="true"> Cancel
        </button>
      </div>
    </div>
  </div>
</div>

