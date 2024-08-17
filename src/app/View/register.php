  <?php
    include('./templates/header.php');
    if (isset($_SESSION['success_message'])): ?>
      <div class="alert alert-success alert-dismissible fade show text-center col-4 my-0 mx-auto mb-5" role="alert">
        <?php
        echo $_SESSION['success_message'];
        unset($_SESSION['success_message']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  <?php

  if (isset($_SESSION['danger_message'])): ?>
    <div class="alert alert-danger alert-dismissible fade show text-center col-4 my-0 mx-auto mb-5" role="alert">
      <?php
      echo $_SESSION['danger_message'];
      unset($_SESSION['danger_message']);
      ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>


  <div id="container_form" class="my-0 mx-auto d-flex justify-content-center">
    <form method="POST" action="../../app/Controller/UserController.php" class="text-center">
      <div class="mb-3 col-12">
        <label for="name" class="form-label">Nome completo</label>
        <input type="text" class="form-control text-center" id="name" name="name" placeholder="Digite o seu nome completo">
      </div>
      <div class="mb-3 col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control text-center" id="email" name="email" placeholder="Digite o seu endereço de email">
      </div>
      <div class="mb-3 col-12">
        <label for="birth" class="form-label">Data de nascimento</label>
        <input type="date" class="form-control text-center" id="birth" name="birth">
      </div>
      <div class="mb-3 col-12">
        <label class="form-label" for="phone">Telefone</label>
        <input type="text" class="form-control text-center" id="phone" name="phone" placeholder="(__) _____-____">
      </div>
      <button type="submit" class="btn btn-success justify-content-center">Cadastrar</button>
    </form>
  </div>

<?php
  include('./templates/footer.php')
?>