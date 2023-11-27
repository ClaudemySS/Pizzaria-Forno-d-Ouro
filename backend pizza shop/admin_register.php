
<?php

include 'config.php';

session_start();




if(isset($_POST['register'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ?");
   $select_admin->execute([$name]);


   if ($select_admin->rowCount() > 0) {
       $message[] ='<span style="font-size: 18px;">NOME DE USUARIO JÁ EXISTE!';
   } else {
       if ($pass != $cpass) {
           $message[] = '<span style="font-size: 18px;">SENHA DE CONFIRMAÇÃO INCORRETA!';
       } else {
           $insert_admin = $conn->prepare("INSERT INTO `admin`(name, password) VALUES(?,?)");
           $insert_admin->execute([$name, $cpass]);
           $message[] = '<span style="font-size: 18px;">REGISTRADO COM SUCESSO!</span>';
       }
   }
   
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE-edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro</title>

   <!-- Link para a biblioteca de ícones Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Link para o estilo personalizado do admin -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php include 'admin_header2.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Cadastrar Agora</h3>
      <input type="text" name="name" required placeholder="insira seu nome de usuário" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="insira sua senha" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="confirme sua senha" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="CADASTRAR AGORA" class="btn" name="register">
      <a href="admin_login.php" class="btn">FAÇA LOGIN</a>
   </form>

</section>


<script src="js/admin_script.js"></script>

</body>
</html>