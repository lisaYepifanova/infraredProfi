<main>

  <h1 class="page-header container text-capitalize">DOWNLOAD</h1>

  <div class="faq-content-wrapper container right-padding">
    <div class="faq-content download-content">

        <?php
        $index = 1;
        echo '<div class="panel-group" id="accordion">';
        foreach ($data['categories'] as $row) {
            echo '<div class="faq-item panel panel-default">
                    <h4 class="faq-item-title collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#answer-'.$index.'" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down arrow-down"></span>'.$row['category_name'].'</h4>
                    <div  role="definition" id="answer-'.$index.'" class="faq-item-answer panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
            foreach ($data['documents'] as $doc) {
                if ($doc['category'] == $row['id']) {
                    echo '<a class="document-link" type="application/pdf" href="'.DOCPATH.$doc['path'].'" download>'.$doc['name'].'</a>';

                }
            }

            echo '</div></div>';
            $index = $index + 1;
        }
        ?>

    </div>
  </div>
  </div>

</main>
