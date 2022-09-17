<?php
require_once "repository/ActivityRepository.php";

session_start();
$id = $_SESSION["id"];
session_destroy();

ActivityRepository::deleteActivity($id);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFreela</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/remove-activity.css">
</head>

<body>
    <main>
        <div class="d-flex align-items-center flex-column">

            <section class="mt-5">

                <div class="container d-flex align-items-center flex-column" method="POST" action="show-all-activities.php">
                    <h1 class="title">
                        Freela Removido
                    </h1>
                    <p class="p">
                        O freela foi removido com sucesso!
                    </p>
                    <a href="show-all-activities.php">
                        <button class="w-100 btn btn-primary mt-5">Página Inicial</button>
                    </a>
                </div>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>