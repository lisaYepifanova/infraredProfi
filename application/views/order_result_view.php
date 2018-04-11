<main class="order-page">
  <h1 class="page-header container text-capitalize left-padding">ORDER RESULT</h1>

  <div class="order-result-wrapper container left-padding">
    <form role="form" action="/order-sending" method="post">
  <?php
    if(isset($data)) {
      foreach ($data as $name=>$row) {
        echo '<div class="category-items-wrapper box-small-bm">';
        echo '<h4 class="category-title">'.str_replace("_", " ", $name).'</h4>';


        echo '<div class="category-items">';

        foreach($row['products'] as $itemName=>$item) {
          echo '<div class=""';
           echo '<p class="category-title">';
           echo str_replace("-", " ", $itemName).'</br>';

           foreach($item['count'] as $ind=>$count) {
             echo '<input type="hidden" name="data['.$name.'][products]['.$itemName.'][count]['.$ind.']" value="'.$count.'">';

             if(!isset($item['term'][$ind])) {

               echo 'Without termostat: ';
               echo '<input type="hidden" name="data['.$name.'][products]['.$itemName.'][term]['.$ind.']" value="off">';

             } else {
               echo 'With termostat: ';
               echo '<input type="hidden" name="data['.$itemName.'][products]['.$itemName.'][term]['.$ind.']" value="on">';
             }
             echo $count." items.</br>";

           }
           echo '</p>';
           echo '</div>';
        }

        echo '</div>';
        echo '<div class="category-comment">'.$row["comment"].'</div>';
        $c = 'comment';
        echo '<input type="hidden" name="data['.$name.']['.$itemName.']['.$c.']" value="'.$row["comment"].'">';
        echo '</div>';
      }
    }


              echo '<div class="comment-wrapper box-mid-margin"><label >Ihre Nachricht:</label>';

          echo '<textarea class="form-control final-comment" name="final-comment"></textarea>';

          //echo '<input type="hidden" name="order[]" value="'.$data.'">';
  ?>
      <button type="submit"  class="btn send-order-btn">Send</button>
    </form>
  </div>
</main>