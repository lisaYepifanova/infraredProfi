<main>

  <h1 class="page-header container text-capitalize">Documents</h1>

  <div class="faq-content-wrapper container right-padding">
    <div class="faq-content">

        <?php
        $index = 1;
        echo '<div class="panel-group" id="accordion">';
        foreach ($data as $row) {
            echo '<div class="faq-item panel panel-default">
                    <h4 class="faq-item-title collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#answer-'.$index.'" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down arrow-down"></span>'.$row['question'].'</h4>
                    <p  role="definition" id="answer-'.$index.'" class="faq-item-answer panel-collapse collapse" aria-expanded="false" style="height: 0px;">'.$row['answer'].'</p>
                  </div>';
            $index = $index + 1;
        }
        ?>

    </div>
  </div>
  </div>

</main>
