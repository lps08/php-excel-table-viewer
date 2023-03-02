
<?php

include_once "constants.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <title>title</title>
    <meta name="viewport" content="width=device-width,initial-scale-1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  </head>
  <body>
    <div class="container">
      <br/>
      <?php
        echo TITLE_PAGE;
      ?>
      <br>
      <div align="center" class="table-responsive">
        <span id="message"></span>
        <form align="center" method="post" id="load_excel_form" enctype="multipart/form-data">
          <table class="table">
            <tr>
              <td width="25%">Selecione a tabela</td>
              <td width="50%">
                <input type="file" name="select_excel"/>
              </td>
              <td width="25%">
                <input type="submit" name="load" class="btn btn-prymary" value="Carregar">
              </td>
            </tr>
          </table>
        </form> 
        <br/>
        <div id="excel_area" class="py-md-3"></div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
<script>
  $(document).ready(function() {
    $('#load_excel_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "upload.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          if (data) {
            $('#excel_area').html(data);
            if (data.length > 100) {
              $('#excel_area').append('<form align="center" method="post" id="save_excel_form" enctype="multipart/form-data"><input type="submit" name="save" value="Salvar" class="btn btn-prymary"></form>');
            }

            $('#save_excel_form').on('submit', function(event){
              event.preventDefault();
              $.ajax({
                url: "save.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                  $('#excel_area').html(data);
                }
              });
            });
          }
        }
      })
    });
  });
</script>


