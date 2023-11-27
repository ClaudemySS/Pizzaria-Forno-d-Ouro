<?php

include 'config.php';

session_start();

if(isset($_POST['login'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "pizza_db";

   // Cria uma conexão
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Verifica a conexão
   if ($conn->connect_error) {
      die("Conexão falhou: " . $conn->connect_error);
   }

   $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
   $stmt->bind_param("ss", $email, $pass);
   $stmt->execute();
   $result = $stmt->get_result();

   if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      header('location:index.php');
   }

   $stmt->close();
   $conn->close();

}

?>
