<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $pageTitle;
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage == 'register.php') {
        $pageTitle = "Cadastro";
    } elseif ($currentPage == 'list.php') {
        $pageTitle = "Visualizar";
    }

    $baseUrl = "/home/tiagoles/Documents/sistema_desafio_lev/"
?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$pageTitle?></title>
        <link rel="stylesheet" href="../../../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <script src="../../../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/Public/css/Register.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script ></script>
    </head>

    <body class="bg-secondary-subtle">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25 fw-semibold" href="index.php">Cadastrar</a>
                    <a class="nav-link icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25 fw-semibold" href="list.php">Visualizar</a>
                </div>
            </div>
        </nav>
        <main>
            <h1 class="text-center py-5"><?= $pageTitle ?></h1>
            <div class="container mt-5">

     
    