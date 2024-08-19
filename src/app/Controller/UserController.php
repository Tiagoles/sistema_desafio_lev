 <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require "../Model/User.php";
  require "../Utils/Utils.php";
  $userModel = new User();
  if ($_SERVER['REQUEST_METHOD']  == "POST") {

    $data = [
      "name" => trim($_POST["name"]),
      "email" => trim($_POST["email"]),
      "phone" => unmaskPhoneNumber(trim($_POST["phone"])),
      "birth" => trim(date("Y-m-d", strtotime($_POST["birth"])))
    ];

    verifyIfExistis($data);

    if (empty($data["name"]) || empty($data["email"]) || empty($data["phone"]) || empty($data["birth"])) {
      $_SESSION['danger_message'] = "Preencha todos os campos!";
      header("Location: ../View/index.php");
      exit;
    } else {
      $confirm = $userModel->store($data);
      $_SESSION['success_message'] = "Registro inserido com sucesso!";
      $confirm ? header("Location: ../View/index.php") :  "";
      exit;
    }
  }
