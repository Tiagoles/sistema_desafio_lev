 <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require "../Model/User.php";
  $userModel = new User();

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
      $userModel = new User();
      $queryEmail = "SELECT COUNT(*) FROM users where email = :email";

      $stmtEmail = $userModel->conn->prepare($queryEmail);
      $stmtEmail->bindParam(":email", $data["email"]);
      $stmtEmail->execute();
      $countsEmail = $stmtEmail->fetchAll();

      $queryPhone = "SELECT COUNT(*) FROM users where telefone = :phone";
      $stmtPhone = $userModel->conn->prepare($queryPhone);
      $stmtPhone->bindParam(":phone", $data["phone"]);
      $stmtPhone->execute();
      $countsPhone = $stmtPhone->fetchAll();

      if ($countsEmail > 0) {
        $_SESSION['danger_message'] = "Email já cadastrado";
        header("Location: ../View/register.php");
        exit;
      } else if ($countsPhone > 0) {
        $_SESSION['danger_message'] = "Telefone já cadastrado";
        header("Location: ../View/register.php");
        exit;
      } else {
        $_SESSION['danger_message'] = "Telefone ou Email já cadastrados";
        header("Location: ../View/register.php");
        exit;
      }
    }
  }

  if ($_SERVER['REQUEST_METHOD']  == "POST") {

    $data = [
      "name" => trim($_POST["name"]),
      "email" => trim($_POST["email"]),
      "phone" => trim($_POST["phone"]),
      "birth" => trim(date("Y-m-d", strtotime($_POST["birth"])))
    ];

    verifyIfExistis($data);

    if (empty($data["name"]) || empty($data["email"]) || empty($data["phone"]) || empty($data["birth"])) {
      $_SESSION['danger_message'] = "Preencha todos os campos!";
      header("Location: ../View/register.php");
      exit;
    } else {
      $confirm = $userModel->store($data);
      $_SESSION['success_message'] = "Registro inserido com sucesso!";
      $confirm ? header("Location: ../View/register.php") :  "";
      exit;
    }
  }
