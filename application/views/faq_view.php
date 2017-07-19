<main>

  <h1 class="page-header container">FAQ</h1>

  <div class="faq-content-wrapper container">
    <div class="faq-content">

        <?php
        $index = 1;
        foreach ($data as $row) {
            echo '<div class="faq-item">
                    <h4 class="faq-item-title" class="collapsed" data-toggle="collapse" data-target="#answer-'.$index.'" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down arrow-down"></span>'.$row['question'].'</h4>
                    <p id="answer-'.$index.'" class="faq-item-answer collapse" aria-expanded="false" style="height: 0px;">'.$row['answer'].'</p>
                  </div>';
            $index = $index + 1;
        }
        ?>

    </div>
  </div>

</main>
