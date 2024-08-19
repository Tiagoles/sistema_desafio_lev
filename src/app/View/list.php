<?php
    include "./templates/header.php";
    include "../Controller/UserController.php";
    $userModel = new User();
    $users = $userModel->findAllUsers();
?>

<div id="container_table" class="d-flex justify-content-center my-0 mx-auto">
    <table class="table table-striped table-hover text-center">
        <caption class="text-center">
            Relatório de usuários
        </caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Data de Nascimento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                ?>
                <tr>
                    <th scope="row"><?= ucwords($user['nome'])?></th>
                    <td><?= $user['email']?></td>
                    <td><?= maskPhoneNumber($user['telefone']) ?></td>
                    <td><?= str_replace("-","/",date("d-m-Y", strtotime($user['data_nascimento']))) ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
    include "./templates/footer.php";
?>