<?php
  function maskPhoneNumber($phone)
  {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone) == 11) {
      $phone = preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $phone);
    }

    return $phone;
  }
  function verifyIfExistis($data)
    {
      if (!isset($data)) {
        $_SESSION['danger_message'] = "Dados não informados.";
          header("Location: ../View/register.php");
          exit;
      }
        $userModel = new User();
        $queryEmail = "SELECT COUNT(*) FROM users where email = :email";

        $stmtEmail = $userModel->conn->prepare($queryEmail);
        $stmtEmail->bindParam(":email", $data["email"]);
        $stmtEmail->execute();

        if ($stmtEmail->fetchAll() > 0) {
          $_SESSION['danger_message'] = "Email já cadastrado";
          header("Location: ../View/register.php");
          exit;
        } 

        $queryPhone = "SELECT COUNT(*) FROM users where telefone = :phone";
        $stmtPhone = $userModel->conn->prepare($queryPhone);
        $stmtPhone->bindParam(":phone", $data["phone"]);
        $stmtPhone->execute();
        if ($stmtPhone->fetchAll() > 0) {
          $_SESSION['danger_message'] = "Telefone já cadastrado";
          header("Location: ../View/register.php");
          exit;
        } 
      }
  function unmaskPhoneNumber($phone)
  {
    return preg_replace('/[^0-9]/', '', $phone);
  }