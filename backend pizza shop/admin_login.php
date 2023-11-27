<?php

include 'config.php';

session_start();

if (isset($_POST['login'])) {

   $nome = $_POST['name'];
   $nome = filter_var($nome, FILTER_SANITIZE_STRING);
   $senha = sha1($_POST['pass']);
   $senha = filter_var($senha, FILTER_SANITIZE_STRING);

   $selecionar_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $selecionar_admin->execute([$nome, $senha]);
   $linha = $selecionar_admin->fetch(PDO::FETCH_ASSOC);

   if ($selecionar_admin->rowCount() > 0) {
      $_SESSION['admin_id'] = $linha['id'];
      header('location:admin_page.php');
   } else {
      $mensagem[] = '<span style="font-size: 18px;">Nome de usuário ou senha incorretos!';
   }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- Link para Fonte Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Link para o arquivo css-->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php
   if (isset($mensagem)) {
      foreach ($mensagem as $mensagem) {
         echo '
         <div class="mensagem">
            <span>' . $mensagem . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }



      
?>
<header class="cabeçalho">

<section class="flex">

<style>
 .logo {
     font-size: 20px; 
 }
</style>
   <a href="index.php" class="logo">Voltar para página inicial</span></a>


   <style>
 #user-btn {
     font-size: 20px; 
 }
</style>
</section>

<section class="form-container">

   <form action="" method="post">
      <h3>FAÇA SEU LOGIN</h3>
      <input type="text" name="name" required placeholder="insira seu nome de usuário" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="insira sua senha" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="FAZER LOGIN" class="btn"  name="login">
      <a href="admin_register.php" class="btn">REGISTRAR-SE</a>
   </form>
</section>







</section>
<style>
  .botão2 {
    font-size: 15px; 
  }
</style>
</body>
</html>
