<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../sweetalert/sweetalert.css">
    <script src="../sweetalert/sweetalert.min.js" ></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <?php
      require 'functions.php';

      $id = $_GET['id'];
    ?>

    <?php if (delete($id)>0): ?>
      <?=
      "<script>
          swal({
            title:'Delete Success',
            text: 'Delete data berhasil',
            icon: 'success',
          }).then(function() {
            window.location = '../index.php';
          });
        </script>
      ";
       ?>
     <?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../jquery/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../dist/edit.js" charset="utf-8"></script>
  </body>
</html>
