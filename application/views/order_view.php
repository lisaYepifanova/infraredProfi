<main class="order-page">
  <h1 class="page-header container text-capitalize">ORDER PRODUCTS</h1>
  <div class="container right-padding">
    <form role="form" action="" method="post">
      <div class="price-list-content">

        <?php
        $index = 1;
        echo '<div class="panel-group" id="accordion">';
        foreach ($data as $category => $row) {

          echo '<div class="prod-item panel panel-default">
                    <h4 class="prod-item-title collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#prod-' . $index . '" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down arrow-down"></span>' . $category . '</h4>';


          echo '<div  role="definition" id="prod-' . $index . '" class="prod-category-items panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
          echo '<table>';
          echo '<tr>
    <th>Model</th>
    <th>Thermostat</th>
    <th>Price1</th>
    <th>Price2</th>
    <th>Count</th>
  </tr>';
          foreach ($row as $item) {
            echo '<tr>';
            echo '<td><div>' . $item['model'] . ' ' . $item['colour'] . '</div> <div class=" add-another-button">+ add another</div></td>';
            $term = 'term';
            $cat = str_replace(" ", "_", $category);
            $prod = 'products';
            echo '<td><input class="has-thermostat" type="checkbox" 
name="'.$cat.'['.$prod.'][' . str_replace(" ", "-", $item['model'] . $item['colour']) . ']['.$term.'][0]" 
id="'.$cat.'['.$prod.'][' . str_replace(" ", "-", $item['model'] . $item['colour']) . ']['.$term.'][0]"></td>';
            echo '<td>' . $item['price_1'] . '</td>';
            echo '<td>' . $item['price_2'] . '</td>';
            $count = 'count';
            $n = 'model-name';
            echo '<td>
                  <div class="num-of-items-wrapper">';
            //echo '<div class="num-of-items-min glyphicon glyphicon-chevron-left"></div>';
            echo '<input class="count ' . str_replace(" ", "-", $item['model'] . $item['colour']) . '  ' . str_replace(" ", "-", $item['model'] . $item['colour']) . '[0]" 
                  type="text" 
                  name="'.$cat.'['.$prod.'][' . str_replace(" ", "-", $item['model'] . $item['colour']) . ']['.$count.'][0]"  
                  onkeypress="numOfItemsValid(event)" id="'.$cat.'['.$prod.'][' . str_replace(" ", "-", $item['model'] . $item['colour']) . ']['.$count.'][0]" 
                  size="1" 
                  value="0">';
            //echo '<div class="num-of-items-max glyphicon glyphicon-chevron-right "></div>';
            echo '<input type="hidden" 
                  name="'.$cat.'['.$prod.'][' . str_replace(" ", "-", $item['model'] . $item['colour']) . ']['.$n.'][0]"
                  value="'.$item['model'] . $item['colour'].'"
                  >
                  
</div></td>';
            echo '</tr>';


          }
          echo '</table>';

          echo '<div class="comment-wrapper box-mid-margin"><label for="comment-' . $index . '">Ihre Nachricht:</label>';
$comm = 'comment';
          echo '<textarea class="form-control comment-to-' . $category . '-item" name="' . $cat . '['.$comm.']"></textarea>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          $index = $index + 1;
        }
        ?>

      </div>
      <button type="submit"  class="btn">ORDER</button>
    </form>
  </div>
</main>
