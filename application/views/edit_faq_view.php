<main class="faq-page">

  <h1 class="page-header container text-capitalize left-padding">FAQ</h1>
  <form enctype="multipart/form-data" role="form" action="" method="post">
    <div class="faq-content-wrapper container left-padding">
      <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
      <div class="faq-content">

        <?php
        $index = 1;
        echo '<input type="hidden" name="max_id" id="max_id" value="'.$data['add']['max_id'].'">';

        echo '<div class="panel-group" id="accordion">';
        foreach ($data['add']['main'] as $row) {
          echo '<div class="faq-item panel panel-default">
                    <h4 class="faq-item-title collapsed title-'.$row['id'].'" 
                    data-parent="#accordion" 
                    data-toggle="collapse" 
                    data-target="#answer-' . $row['id'] . '" 
                    aria-expanded="false">
                    <span class="glyphicon glyphicon-chevron-down arrow-down">
                    
                    </span> <input type="text" 
                              name="item[' . $row['id'] . '][question]" 
                              class="accordion-title-textarea "
                              value="' . $row['question'] . '">
                    </h4>
                    <div  role="definition" id="answer-' . $row['id'] . '" 
                    class="faq-item-answer panel-collapse collapse" 
                    aria-expanded="false" 
                    style="height: 0px;"><textarea 
                        class="editor-area full-textarea answer-'.$row['id'].'"
                        name="item[' . $row['id'] . '][answer]">' . $row['answer'] . '</textarea>
                       
                        </div>
                        <a class="glyphicon glyphicon-trash delete-faq-item delete-faq-item-'.$row['id'].'">Delete</a>
                  </div>';
          echo '<input type="hidden" name="item[' . $row['id'] . '][id]"  value="' . $row['id'] . '">';

          echo '';
          $index = $index + 1;
        }
        echo '<a class="glyphicon glyphicon-plus add-new-question-button">Add new question</a>';
        ?>

      </div>
    </div>
    </div>
    <div class="btn-wrapper container box-mid-margin left-padding">
      <button class="btn" type="submit">SAVE</button>
    </div>
  </form>

</main>
