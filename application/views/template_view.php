<!doctype html>
<html>
<?php
$pageTitle = "Infrared Profi";
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
      <?php
      if (!empty($_REQUEST['_url'])) {
        $pageTitle = mb_convert_case(preg_replace('/[^\w\s]/u', ' ', $_REQUEST['_url']), MB_CASE_TITLE, "UTF-8");
      }
      echo $pageTitle;
      ?>
  </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="../apple-touch-icon.png">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
  <script type="text/javascript"
          src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script>
</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
  your browser</a> to improve your experience.</p>
<![endif]-->

<aside class="right-panel">
  <div class="navbar navbar-default navbar-right-panel" role="navigation">
    <a href="#asideNavMenu" class="menu-link" data-toggle="modal"></a>
  </div>
</aside>

<?php
include 'application/views/'.$content_view;
?>

<div class="contacts container box-same-vmargin">
    <div class="row">
        <?php
          $index = 1;
          foreach ($default['contacts'] as $row) {
            echo '<div class="contact-item-wrapper col-xs-3  text-center">
                    <div class="contact-item contact-item'.$index.'">
                      <img class="content-item-icon" src="'.IMAGEPATH.$row['icon'].'" alt="contact">
                      <a href="'.$row['link'].'" class="contact-item-value">'.$row['value'].'</a>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">›</button>
          <h5 class="modal-title">
            <a class="lang-link">RU</a>
            <a class="lang-link">ENG</a>
            <a class="lang-link">GRM</a>
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
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="../js/vendor.js"></script>
<script src="../js/build.js"></script>
<script src="../js/vendor/google-analytics.js"></script>

</body>
</html>
