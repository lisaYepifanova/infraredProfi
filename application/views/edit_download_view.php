<main class="download-page">

  <h1 class="page-header container text-capitalize left-padding">DOWNLOAD</h1>
  <form enctype="multipart/form-data" role="form" action="" method="post">
   <!-- <input type="hidden" name="MAX_FILE_SIZE" value="409600"/> -->
    <div class="faq-content-wrapper container left-padding">
      <a class="admin-page-icons admin-icon-item" href="/site-settings"><img src="../img/user_pages/settings.png" alt="settings"><p class="icon-title">Site settings</p>
    </a>
      <div class="faq-content download-content">

        <?php
        echo '<input type="hidden" name="max_id" id="max_id" value="'.$data['add']['max_id'].'">';
        echo '<div class="panel-group" id="accordion">';
        foreach ($data['add']['categories'] as $row) {
          echo '<div class="faq-item panel panel-default doc-category doc-category-'.$row['id'].'">
                    <h4 class="faq-item-title collapsed" 
                    data-parent="#accordion"
                     data-toggle="collapse" 
                     data-target="#answer-' . $row['id'] . '" 
                     aria-expanded="false">
                     <span class="glyphicon glyphicon-chevron-down arrow-down"></span>
                     <input type="text" class="full-textarea" 
                     name="category[' . $row['id'] . ']" value="' . $row['category_name'] . '"></h4>
                    <div  role="definition" id="answer-' . $row['id'] . '" class="faq-item-answer panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
          foreach ($data['add']['documents'] as $doc) {
            if ($doc['category'] == $row['id']) {
              echo '<div class="doc-item doc-item-'.$doc["id"].' box-mid-margin">';
              echo '<a class="document-link" 
                    type="application/pdf" 
                    href="' . DOCPATH . $doc['path'] . '" download>' . $doc['name'] . '</a>';
              echo '<label for="name_' . $doc["id"] . '">Name:</label>';
              echo '<input type="text" id="name_' . $doc["id"] . '" 
                    name="doc[' . $doc["id"] . '][name]" value="' . $doc['name'] . '" class="full-textarea">';
              echo '<label for="file_' . $doc["id"] . '">File:</label>';

              echo '<input type="file" id="file_' . $doc["id"] . '" 
                    name="doc[' . $doc["id"] . ']" class="full-textarea">';

              echo '<input type="hidden" name="doc[' . $doc["id"] . '][cid]" value="' . $row['id'] . '">';

              echo '<a class="glyphicon glyphicon-trash delete-file-item"
                data-toggle="modal"
                data-target="#myModal_' . $doc["id"] . '">Delete</a>';
              modalWin($doc["id"], $doc['name']);
              echo '</div>';

            }
          }
          echo '<a class="glyphicon glyphicon-plus add-new-document add-new-document-'.$row['id'].'">Add new document</a>';
          echo '</div></div>';
        }
        ?>


        <?php
        function modalWin($j, $name) {
          echo '<div class="modal fade" id="myModal_' . $j . '" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deleting document</h4>
        </div>
        <div class="modal-body">
          <p>Do you want to delete ' . $name . '?</p>
        </div>
        <div class="modal-footer">
          <a href="/download/delete/' . $j . '" class="btn btn-default">Delete</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cansel</button>
          
        </div>
      </div>

    </div>
  </div>';
        }

        ?>

      </div>
    </div>
    </div>

    <div class="btn-wrapper container box-mid-margin left-padding">
      <button class="btn" type="submit">SAVE</button>
    </div>
  </form>
</main>
