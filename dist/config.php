<?php
  require "functions.php";

  $active = mysqli_query($conn,"SELECT * FROM user WHERE status = 0");
  if (isset($_POST['shuffle'])) {
    // GOTO
    a:
    //Get Max Value
    $num_max = query("SELECT max(id) FROM user WHERE status = 0")[0];
    $num_min = query("SELECT min(id) FROM user WHERE status = 0")[0];
    $total_active = mysqli_num_rows($active);
    $randId = mt_rand($num_min["min(id)"],$num_max["max(id)"]);

    $result = mysqli_query($conn,"SELECT * FROM user WHERE id = $randId AND status = 0");
// SHUFFLE LOGIC
    if (mysqli_num_rows($active)<1) {
      echo "
        <script>
          swal({
            title:'Max Shuffle',
            text: 'Shuffle telah habis',
            icon: 'warning',
          }).then(function() {
            window.location = 'index.php';
          });
        </script>
      ";
      exit;
    }
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if (activated($row['id'])>0) {
        echo "<script>
          swal({
            title:'Suffle Success',
            text: 'Data Berhasil Di Shuffle',
            icon: 'success',
          }).then(function() {
            window.location = 'index.php';
          });
        </script>";
      } else {
        goto a;
      }
    }
    else {
      goto a;
    }
  }

// ADD
  if (isset($_POST['return'])) {
    if (returns()>0) {
      echo "
        <script>
          swal({
            title:'Return All Success',
            text: 'Return data berhasil',
            icon: 'success',
          }).then(function() {
            window.location = 'index.php';
          });
        </script>
      ";
    } else {
      echo "
      <script>
        swal({
          title:'Return All Failed',
          text: 'Return Data Gagal',
          icon: 'error',
        }).then(function() {
          window.location = 'index.php';
        });
      </script>
      ";
    }
  }

// EDIT
  if (isset($_POST['edit'])) {
    if (edit($_POST)>0) {
      echo "
        <script>
          swal({
            title:'Edit Success',
            text: 'Berhasil Mengedit User',
            icon: 'success',
          }).then(function() {
            window.location = 'index.php';
          });
        </script>
      ";
    } else {
      echo "
      <script>
        swal({
          title:'Edit Failed',
          text: 'Gagal Mengedit User',
          icon: 'error',
        }).then(function() {
          window.location = 'index.php';
        });
      </script>
      ";
    }
  }

  if (isset($_POST['add'])) {
    if (add($_POST)>0) {
      echo "
        <script>
          swal({
            title:'Add Success',
            text: 'Berhasil Menambahkan User Baru',
            icon: 'success',
          }).then(function() {
            window.location = 'index.php';
          });
        </script>
      ";
    } else {
      echo "
      <script>
        swal({
          title:'Add Failed',
          text: 'Gagal Menambahkan User Baru',
          icon: 'error',
        }).then(function() {
          window.location = 'index.php';
        });
      </script>
      ";
    }
  }


?>
