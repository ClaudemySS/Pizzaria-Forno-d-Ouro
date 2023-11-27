<?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
         <div class="mensagem">
            <span>' . $message . '</span>
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
</style>

      <div class="perfil">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
        
      
      </div>
   </section>

</header>
