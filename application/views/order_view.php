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
                    <h4 class="prod-item-title collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#prod-'.$index.'" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down arrow-down"></span>'.$category.'</h4>';

echo '<input type="hidden" name="category-'.$index.'" value="'.$category.'">';
             echo '<div  role="definition" id="prod-'.$index.'" class="prod-category-items panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
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
                  echo '<td><div>'.$item['model'].' '.$item['colour'].'</div> <div class=" add-another-button">+ add another</div></td>';
                  echo '<td><input class="has-thermostat" type="checkbox" name="thermostat'.str_replace(" ","-",$item['model'].$item['colour']).'" id="'.str_replace(" ","-",'term'.$item['model'].$item['colour']).'"></td>';
                  echo '<td>'.$item['price_1'].'</td>';
                  echo '<td>'.$item['price_2'].'</td>';
                  echo '<td>
<div class="num-of-items-wrapper">
<div class="num-of-items-min glyphicon glyphicon-chevron-left"></div>
                            <input class="count '.str_replace(" ","-",$item['model'].$item['colour']).'" type="text" name="'.str_replace(" ","-",'numOfItems'.$item['model'].$item['colour']).'" onkeypress="numOfItemsValid(event)" id="'.str_replace(" ","-",'numOfItems'.$item['model'].$item['colour']).'" size="1" class="num-of-items" value="0">
                            <div class="num-of-items-max glyphicon glyphicon-chevron-right"></div></div></td>';
                  echo '</tr>';



            }
            echo '</table>';

            echo '<div class="comment-wrapper box-mid-margin"><label for="comment-'.$index.'">Ihre Nachricht:</label>';

            echo '<textarea class="form-control comment-to-'.$category.'-item" name="comment-'.$category.'"></textarea>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $index = $index + 1;
        }
        ?>

    </div>
    <input type="submit" value="submit">
    </form>
  </div>
</main>
