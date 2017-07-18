<main>

  <h1 class="page-header container">FAQ</h1>

  <div class="faq-content-wrapper container">
    <div class="faq-content">

        <?php
        foreach ($data as $row) {
            echo '<div class="faq-item">
        <h4 class="faq-item-title">'.$row['question'].'</h4>
        <p class="faq-item-answer">'.$row['answer'].'</p>
      </div>';
        }
        ?>

    </div>
  </div>

</main>
