<!doctype html>
<html>
<?php
  $pageTitle = "Infrared Profi";
  include_once("../views/head.views");
?>
<body>

<?php
  include("../views/for-ie8.views");
  include("../views/aside-panel.views");
?>

<main>
  <div class="homepage-header">
    <div id="homepageCarousel" class="carousel slide homepage-carousel"
         data-interval="3000" data-ride="carousel">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
        <li data-target="#homepageCarousel" data-slide-to="1"
            class="carousel-round active"></li>
        <li data-target="#homepageCarousel" data-slide-to="2"
            class="carousel-round"></li>
        <li data-target="#homepageCarousel" data-slide-to="3"
            class="carousel-round"></li>
        <li data-target="#homepageCarousel" data-slide-to="4"
            class="carousel-round"></li>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="item active">
          <div class="carousel-image carousel-image-slide1">
          </div>
        </div>

        <div class="item">
          <div class="carousel-image carousel-image-slide2">
          </div>
        </div>

        <div class="item">
          <div class="carousel-image carousel-image-slide3">
          </div>
        </div>

        <div class="item">
          <div class="carousel-image carousel-image-slide4">
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php
    include("../views/philosophy.views");
  ?>

  <div class="homepage-properties">
    <div class="homepage-properties-row">
      <div class="properties-side left-side"></div>
      <div class="properties-side right-side">
        <div class="property-item property-item1">
          <h4 class="property-item-title">Экономичность</h4>
          <p class="property-item-description">
            В стандартных помещениях с высотой потолков менее
            3-х метров, принято использовать 100 Вт
            электричества для обогрева одного м2. Но использование
            ЭКО позволяет снизить расход до 50 Вт с той же
            эффективностью. Это помогает сэкономить до 50 % в
            оплате за тепло.

          </p>
        </div>
        <div class="property-item property-item2">
          <h4 class="property-item-title">Практичность и надежность</h4>
          <p class="property-item-description">
            Панели отопления ЭКО могут использоваться в любых
            непроизводственных помещениях, будь то офис, детская
            комната, ванная или целый дом. Керамическим обогревателям
            не страшны ни пыль, ни влага. А простой монтаж ЭКО займет
            у Вас не больше часа.

          </p>
        </div>
        <div class="property-item property-item3">
          <h4 class="property-item-title">Экологичность</h4>
          <p class="property-item-description">
            Керамические панели отопления не нарушат атмосферу
            Вашего дома, ведь они не сушат воздух и не сжигают
            кислород. А также не выделяют неприятного запаха и
            вредных веществ. Именно поэтому Вы можете использовать
            ЭКО в своем доме без опасений.
          </p>
        </div>
        <div class="property-item property-item4">
          <h4 class="property-item-title">Безопасность</h4>
          <p class="property-item-description">
            Электро-керамические обогреватели изготавливаются
            только из натуральных жаропрочных материалов, которые
            обладают высокой пожаробезопасностью. При производстве
            ЭКО были учтены все требования к прибору для защиты от
            поражения электрическим током.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="homepage-products-wrapper">
    <div class="homepage-products-bg">
      <div class="homepage-products container box-same-vpadding">
        <div class="homepage-products-row row">
          <div class="item-wrapper col-sm-6">
            <div class="homepage-product-item item-1">
              <div class="item-image">
                <a class="link-to-product">Product1
                  <span class="arrow">›</span>
                </a>
              </div>
            </div>
          </div>
          <div class="item-wrapper col-sm-6">
            <div class="homepage-product-item item-2 ">
              <div class="item-image">
                <a class="link-to-product">Product2
                  <span class="arrow">›</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="homepage-products-row row">
          <div class="item-wrapper col-sm-3">
            <div class="homepage-product-item item-3 ">
              <div class="item-image">
                <a class="link-to-product">Product3
                  <span class="arrow">›</span>
                </a>
              </div>
            </div>
          </div>

          <div class="item-wrapper col-sm-3">
            <div class="homepage-product-item item-4 ">
              <div class="item-image">
                <a class="link-to-product">Product4
                  <span class="arrow">›</span>
                </a>
              </div>
            </div>
          </div>
          <div class="item-wrapper col-sm-6">
            <div class="homepage-product-item item-5 ">
              <div class="item-image">
                <a class="link-to-product">Product5
                  <span class="arrow">›</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    include("../views/contact-block.views");
  ?>
</main>

<?php
include("../views/footer.views");
include("../views/modal-menu.views");
include_once("../views/bottom-scripts.html");
?>

</body>
</html>
