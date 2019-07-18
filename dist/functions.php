<?php
  //SERVER NAME
  $DB_HOST = "localhost";
  //USERNAME
  $DB_USER = "root";
  //PASSWORD
  $DB_PASS = "";
  //DATABASE_NAME
  $DB_NAME = "php_rand";

  $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  if ($conn->connect_errno) {
      echo die("Failed to connect to MySQL: " . $conn->connect_error);
  }

  function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];

    while ( $row = mysqli_fetch_assoc($result)) {
      $rows[] =$row;
    }

    return $rows;
  }
// ACTIVATED USER
  function activated($id){
    global $conn;
    $query = "UPDATE `user` SET `status` = '1' WHERE `user`.`id` = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }
// RETURN TO START
  function returns(){
    global $conn;
    $query = "UPDATE `user` SET `status` = '0'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }
// ADD
  function add($data){
    global $conn;
    $nama = $data["nama"];
    $kelas = $data["kelas"];

    $query = "INSERT INTO `user` (`id`, `name`, `status`, `kelas`) VALUES (NULL, '$nama', '0', '$kelas')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

  }
// DELETE
  function delete($id) {
    global $conn;

    $query = "DELETE FROM `user` WHERE `user`.`id` = $id";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }
//EDIT
  function edit($data) {
    global $conn;

    $id = $data['id'];
    $nama = $data["nama"];
    $kelas = $data["kelas"];

    $query = "UPDATE `user` SET `name` = '$nama', `kelas` = '$kelas' WHERE `user`.`id` = $id ";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }
