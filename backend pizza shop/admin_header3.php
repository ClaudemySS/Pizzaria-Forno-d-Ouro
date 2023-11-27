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
      <a href="index.php" class="logo">Seja bem vindo</span></a>


      <style>
    #user-btn {
        font-size: 20px; 
    }
    </style>

    <style>
    .profile-name {
        font-size: 20px; 
    }
    </style>
      <div class="perfil">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="profile-name"><?= $fetch_profile['name']; ?></p>
         <div class="ícones">
         <div id="user-btn" class="fas fa-user"></div>
      </div>
         <a href="admin_profile_update.php" class="btn">ATUALIZAR PERFIL</a>
         <a href="index2.php" class="btn">VOLTAR AO SITE</a>
         <a href="logout.php" class="delete-btn">SAIR</a>
         
      </div>
      
   </section>

</header>
