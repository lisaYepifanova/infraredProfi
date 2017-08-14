<!doctype html>
<html lang="de">
<?php
$pageTitle = "Infrared Profi";
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
      <?php
      if (!empty($_REQUEST['_url'])) {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $last = end($routes);
        $pageTitle = mb_convert_case(preg_replace('/[^\w\s]/u', ' ', $last), MB_CASE_TITLE, "UTF-8");
      }
      echo $pageTitle;
      ?>
  </title>
    <?php
      echo '
      <link rel="apple-touch-icon" href="'.ROOTPATH.'apple-touch-icon.png">
      <link rel="stylesheet" href="'.CSSPATH.'normalize.min.css">
      <link rel="stylesheet" href="'.CSSPATH.'style.min.css">
      ';
    ?>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
  your browser</a> to improve your experience.</p>
<![endif]-->

<div class="site-logo-wrapper">
  <?php
    echo '<a href="/"><img src="'.IMAGEPATH.$default['site_logo'].'" alt="logo"></a>'
  ?>
</div>

<aside class="right-panel">
  <div class="navbar navbar-default navbar-right-panel" role="navigation">
    <div class="menu-link-button">
      <a href="#asideNavMenu" class="menu-link" data-toggle="modal">
        <span class="menu-link-line line1"></span>
        <span class="menu-link-line line2"></span>
        <span class="menu-link-line line3"></span>
      </a>
    </div>
  </div>
</aside>

<?php
include 'application/views/'.$content_view;
?>

<div class="contacts container box-same-vmargin right-padding">
    <div class="row">
        <?php
          $index = 1;
          foreach ($default['contacts'] as $row) {
            echo '<div class="contact-item-wrapper col-xs-3  text-center ">
                    <div class="contact-item contact-item'.$index.'">
                      <img class="content-item-icon" src="'.IMAGEPATH.$row['icon'].'" alt="contact">';
                      if($row['name'] == 'phone') {
                        echo '<div class="phone-wrapper">';
                        foreach ($default['phones'] as $phone_row) {
                          echo '<a href="tel:'.$phone_row['tel'].'" class="contact-item-value phone-value">'.$phone_row['text'].'</a>';
                        }
                        echo '</div>';
                      } else {
                        echo '<a href="'.$row['link'].'" class="contact-item-value">'.$row['value'].'</a>';
                      }
                      echo '
                   </div>
                  </div>';
            $index = $index + 1;
          }
        ?>
    </div>
  </div>

<footer id="footer" class="footer text-center">
  <div class="footer-links-wrapper container">
    <div class="footer-links row">
      <?php
      if(!empty($default['footer_links']))
          foreach ($default['footer_links'] as $row) {
            echo '<a href="'.$row['link'].'" class="footer-link col-xs-3">'.$row['title'].'</a>';
          }
        ?>
    </div>
    <div class="footer-links footer-service-links row">
      <?php
          foreach ($default['footer_service_links'] as $row) {
            echo '<a href="'.$row['link'].'" class="footer-link col-xs-4">'.$row['title'].'</a>';
          }
        ?>
    </div>
  </div>
</footer>

<!-- Modal -->
<div id="asideNavMenu" class="modal fade in aside-nav-menu" style="display: none;">
    <div class="modal-dialog aside-modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">›</button>
          <h5 class="modal-title">
            <a class="lang-link">DE</a>
          </h5>
        </div>
        <div class="modal-body">
          <div class="menu-items-wrapper">
            <?php
              foreach ($default['modal_menu'] as $row) {
                echo '<h4 class="menu-item text-center"><a href="'.$row['link'].'" class="menu-item-link">'.$row['title'].'</a></h4>';
              }
            ?>
          </div>
        </div>
        <div class="modal-footer">
            <?php
              echo '<a href="https://www.facebook.com/" class="social-link"><img src="'.IMAGEPATH.'fb.png" alt="facebook link"></a>
          <a href="https://twitter.com/" class="social-link"><img src="'.IMAGEPATH.'twitter.png" alt="twitter link"></a>';
            ?>


        </div>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<?php
  echo '
  <script src="'.JSPATH.'vendor/modernizr-2.8.3.min.js"></script>
  <script src="'.JSPATH.'vendor/jquery-1.12.0.min.js"></script>
  <script src="'.JSPATH.'vendor.min.js"></script>
  <script src="'.JSPATH.'build.min.js"></script>';
?>


</body>
</html>
