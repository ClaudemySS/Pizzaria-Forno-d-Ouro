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
      <a href="admin_page.php" class="logo">Central</span></a>


      <div class="ícones">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="perfil">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="admin_profile_update.php" class="btn">atualizar perfil</a>
         <a href="logout.php" class="delete-btn">sair</a>
         <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">login</a>
            <a href="admin_register.php" class="option-btn">registrar</a>
         </div>
      </div>
   </section>

</header>
