<?php

include 'config.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forno d'Ouro Pizzaria</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- arquivo css link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>


<!-- header começa  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo">Forno d'Ouro Pizzaria</a>

      <nav class="navbar">
         <a href="#home">Inicio</a>
         <a href="#menu">Menu</a>
         <a href="#faq">FAQ</a>
         <a href="#sobre">Sobre</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="order-btn" style="display: none;" class="fas fa-box"></div>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <div id="cart-btn" class="fas fa-shopping-cart"><span>(<?= $total_cart_items; ?>)</span></div>
      </div>

   </section>

</header>

<!-- header termina -->

<div class="user-account">

   <section>

      <div id="close-account"><span>fechar</span></div>

      <div class="user">
   <?php
      $select_user = $conn->prepare("SELECT * FROM `user` WHERE id = ?");
      $select_user->execute([$user_id]);
      if($select_user->rowCount() > 0){
         while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){
            echo '<p>bem-vindo! <span>'.$fetch_user['name'].'</span></p>';
            echo '<a href="index.php?logout" class="btn">sair</a>';
         }
      }else{
         echo '<p><span>você não está logado agora!</span></p>';
         
      }
   
   ?>
</div>



<style>

   .botão-container {
      text-align: center;
   }

   .botão3 {
      font-size: 32px; /* Substitua o valor pelo tamanho desejado em pixels ou outra unidade */
      font-weight: bold;
      color: black;
      text-decoration: none; /* Remova o sublinhado padrão dos links */
      margin-bottom: 10px; /* Adiciona espaço abaixo do botão */
   }
</style>

<form action="processar_login.php" method="post" class="botão-container">
   <br>
    <a href="admin_login.php" class="botão3">Faça Login</a>
    <br>
    <br>
    <br>
    <a href="admin_register.php" class="botão3">Registrar-se</a>
</form>

   
</div>

</section>

</div>
<!-- meus pedidos q provavelmente vou apagar -->
<div class="my-orders">

   <section>

      <div id="close-orders" ><span>fechar</span></div>

      
               

   </section>

</div>
<!-- meus pedidos q provavelmente vou apagar -->
<div class="shopping-cart">

   <section>

      <div id="close-cart"><span>fechar</span></div>

      

      <div class="cart-total"> Faça login primeiro. <span></span></div>


   </section>

</div>
<!-- página inicial  começa -->
<div class="home-bg">

   <section class="home" id="home">

      <div class="slide-container">

         <div class="slide active">
            <div class="image">
               <img src="images/home-img-1.png" alt="">
            </div>
            <div class="content">
               <h3>Pizza de pepperoni caseira.</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/home-img-2.png" alt="">
            </div>
            <div class="content">
               <h3>Pizza com Cogumelos</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/home-img-3.png" alt="">
            </div>
            <div class="content">
               <h3>Mascarpone e Cogumelos</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

      </div>

   </section>

</div>

<!-- página inicial  termina -->

<!-- menu começa -->

<section id="menu" class="menu">

   <h1 class="heading">nosso menu</h1>

   <div class="box-container">

   <div class="box" id="pizza-1">
    <div class="price">R$<span>24,90</span></div>
    <img src="images/pizza-1.jpg" alt="">
    <div class="name">Pizza Margherita</div>
    <form action="" method="post">
        <input type="number" min="1" max="100" value="1" class="qty" name="qty">
        <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
    </form>
</div>


         <div class="box" id="pizza-2">
         <div class="price">R$<span>39,90</span></div>
         <img src="images/pizza-2.jpg" alt="">
         <div class="name">Pizza Espinafre & molho alfredo.</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

      <div class="box" id="pizza-3">
         <div class="price">R$<span>29,90</span></div>
         <img src="images/pizza-3.jpg" alt="">
         <div class="name">Pizza Pepperoni duplo</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

      <div class="box" id="pizza-4">
         <div class="price">R$<span>27,90</span></div>
         <img src="images/pizza-4.jpg" alt="">
         <div class="name">Pizza Grega</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

      <div class="box" id="pizza-5">
         <div class="price">R$<span>31,90</span></div>
         <img src="images/pizza-5.jpg" alt="">
         <div class="name">Pizza Libanesa</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

      <div class="box" id="pizza-6">
         <div class="price">R$<span>39,90</span></div>
         <img src="images/pizza-6.jpg" alt="">
         <div class="name">Pizza Milana</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

      <div class="box" id="pizza-7">
         <div class="price">R$<span>22,90</span></div>
         <img src="images/pizza-7.jpg" alt="">
         <div class="name">Pizza Recheada</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

      <div class="box" id="pizza-8">
         <div class="price">R$<span>35,90</span></div>
         <img src="images/pizza-8.jpg" alt="">
         <div class="name">Pizza Mexicana com cogumelos</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

      <div class="box" id="pizza-9">
         <div class="price">R$<span>41,90</span></div>
         <img src="images/pizza-9.jpg" alt="">
         <div class="name">Pizza Chinesa</div>
         <form action="" method="post">
            <input type="number" min="1" max="100" value="1" class="qty" name="qty">
            <input type="submit" value="adicionar ao carrinho" name="adicionar_ao_carrinho" class="btn">
         </form>
      </div>

   </div>

</section>

<!-- menu termina -->




<!-- sobre nós começa -->

<section class="sobre" id="sobre">


   <h1 class="heading">Sobre nós</h1>

   <div class="box-container">

      <div class="box">
         
      <img src="images/sobre-1.svg" alt="" style="width: 200px; height: auto;">
         <h3 style="font-size: 20px;">Feito com paixão</h3>  
         <p style="font-size: 20px;"> Nosso cardápio é cuidadosamente elaborado com amor e paixão pela culinária internacional.</p>
         <a href="#menu" class="btn">nosso cardápio</a>
      </div>

      <div class="box">
         <img src="images/sobre-2.svg" alt="" style="width: 200px; height: auto;">
         <h3 style="font-size: 20px;">Entrega em 30 minutos ou menos.</h3>
         <p style="font-size: 20px;">Entregas ágeis: desfrute de sua pizza em menos de meia hora!</p>
         <a href="#menu" class="btn">nosso cardápio</a>
      </div>

      <div class="box">
         <img src="images/sobre-3.svg" alt=""style="width: 200px; height: auto;">>
         <h3 style="font-size: 20px;">Compartilhe com amigos</h3>
         <p style="font-size: 20px;">Compartilhar é cuidar! Divida a delícia da nossa pizza com amigos!</p>
         <a href="#menu" class="btn">nosso cardápio</a>
      </div>

   </div>

</section>

<!-- sobre nós termina -->




   <div class="box-container">

      
</div>
<?php
   
?>


   </div>

</section>



<!-- Pedidos começa  -->

<section class="order" id="pedir">

   

   <form action="" method="post">

   <div class="display-orders">

   <?php


?>
   </div>
<!-- Termino dos pedidos -->


<!-- FAQ começa  -->
<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="accordion-container">

      <div class="accordion active">
         <div class="accordion-heading">
            <span>Como funcionamos?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            Bem-vindo à Forno d'Ouro Pizzaria! Estamos felizes por você estar aqui e ansiosos para satisfazer seu desejo por deliciosas pizzas. Aqui está uma visão geral de como nosso processo funciona:  Faça seu Pedido,  Confirme seu Pedido,  Informe-nos,  Escolha a Forma de Pagamento,  Receba sua Pizza e Desfrute!
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>Quanto tempo leva para a entrega</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            O tempo de entrega varia de acordo com a localização, mas normalmente entregamos em aproximadamente 15-30 minutos
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>Posso fazer um pedido para festas grandes?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            Sim, claro! Aceitamos pedidos para festas grandes. Para obter mais informações sobre como fazer um pedido para uma festa grande, entre em contato conosco diretamente através do nosso número de telefone ou preencha o formulário de contato em nosso site. 
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>Quanto de proteína ela contém?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
            O teor de proteína em uma pizza pode variar dependendo dos ingredientes utilizados e da espessura da massa. Geralmente, uma fatia de pizza de tamanho padrão (1/8 de uma pizza grande) contém cerca de 2 a 4 gramas de proteína, mas esse valor pode variar.
         </p>
      </div>


      <div class="accordion">
         <div class="accordion-heading">
            <span>A pizza acompanha guaraná?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
          Sim, nossa pizza acompanha guaraná de 1L, podendo variar entre coca-cola ou pepsi.
         </p>
      </div>

   </div>

</section>

<!-- Faq termina -->


<!-- Footer começa  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>telefone</h3>
         <p>(81) 3439-4820</p>
         <p>(81) 982303738</p>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>nosso endereço</h3>
         <p>Av. Conselheiro Aguiar -1934</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>horário de funcionamento</h3>
         <p>das 8h às 23h</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>endereço de e-mail</h3>
         <p>FornodeOuroPizzaria@gmail.com</p>
         <p>FornoCEO@gmail.com</p>
      </div>

   </div>

   <div class="credit">
      &copy; copyright @ 2023 by <span>Forno d'Ouro Pizzaria</span> | Vida se torna melhor com pizza
   </div>

</section>

<!-- footer termina -->










<!-- linkando js  -->
<script src="js/script.js"></script>

</body>
</html>