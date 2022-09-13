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
    <link rel="stylesheet" href="./public/css/register.css">
</head>

<body>
    <main>
        <div class="d-flex align-items-center flex-column">
            <h1 class="mt-5">MFreelas</h1>

            <section class="mt-5">
                <form class="container-register" method="POST" action="register-activity.php">
                    <label class="form-label" for="title">Titúlo</label>
                    <input class="form-input" type="text" name="title" id="title">
                    <label class="form-label mt-4" for="value-hour">Valor hora</label>
                    <input class="form-input" type="number" name="valueHour" id="value-hour" min="1">
                    <button class="btn btn-primary mt-5" type="submit">Finalizar cadastro</button>
                </form>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>

<?php
require_once "repository/ActivityRepository.php";
if (isset($_POST["title"]) && isset($_POST["valueHour"])) {
    ActivityRepository::insertActivity($_POST["title"], $_POST["valueHour"]);
    header('Location: show-all-activities.php');
}

?>