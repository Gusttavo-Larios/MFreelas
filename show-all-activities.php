<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFreela</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/index.css">
</head>

<body>
    <main>
        <div class="d-flex align-items-center flex-column pb-5">
            <h1 class="mt-5">MFreelas</h1>

            <section class="mt-5">
                <div class="container-button">
                    <a href="register-activity.php">
                        <button type="submit" class="btn btn-primary button-new-activity">Novo freela <i class="bi bi-plus"></i></button>
                    </a>
                </div>
                <div class="mt-3">
                    <div class="box-activities">
                        <?php
                        require_once "repository/ActivityRepository.php";
                        require_once "services/ActivitySevices.php";

                        $activities = ActivityRepository::getAllActivities();

                        $i = 0;
                        while ($i < count($activities)) {
                            $row = $activities[$i];
                            $date = date_create($row["date_time"]);
                            $formattedDateTime = date_format($date, "d/m/Y H:i:s");
                            $arrayDateTime = explode(" ", $formattedDateTime);
                            $remunaration = ActivitySevices::calculateRemuneration($row["value_hour"], $row["date_time"]);

                            echo '
                            <div class="container-activities">
                            <div class="d-flex flex-column">
                                <span class="title-activity">
                                    ' . $row["title"] . '
                                </span>
                                <span class="date-activity">
                                    Inciado em ' . $arrayDateTime[0] . '
                                </span>
                            </div>
                            <div class="value-activity">R$' . $remunaration . '</div>
                        </div>
                            ';
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>