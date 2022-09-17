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
    <link rel="stylesheet" href="./public/css/activity.css">
</head>

<body>
    <main>
        <div class="d-flex align-items-center flex-column">
            <h1 class="mt-5">MFreelas</h1>

            <section class="mt-5">
                <?php
                require_once "repository/ActivityRepository.php";
                require_once "services/ActivityServices.php";

                session_start();
                $_SESSION["id"] = $_GET["id"];
                // session_destroy();

                $activity = ActivityRepository::getActivity($_GET["id"]);

                for ($i = 0; $i < count($activity); $i++) {
                    $row = $activity[$i];

                    $date = date_create($row["date_time"]);
                    $date_time_formatted = date_format($date, "d/m/Y H:i:s");
                    $date_formatted = explode(" ", $date_time_formatted)[0];

                    $remuneration = ActivitySevices::calculateRemuneration($row["value_hour"], $row["date_time"]);
                    echo '
                <form class="container-details" method="POST" action="remove-activity.php">
                    <span class="title-activity">
                    ' . $row["title"] . '
                    </span>
                    <span class="date-show-activity mt-4">
                        Inciado em ' . $date_formatted . '
                    </span>

                    <span class="label-show-activity mt-3">
                        Total a receber
                    </span>
                    <div class="value-show-activity mt-1">R$ ' . $remuneration . '</div>
                    <button class="btn btn-primary mt-5" type="submit" name="button-remove">Finalizar freela</button>
                </form>
                ';
                }

                ?>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>