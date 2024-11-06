<?php
require_once './model/exRepository.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $height = $_POST['height'] / 100;
    $weight = $_POST['weight'];
    $experienceLvl = $_POST['experience'];

    switch ($experienceLvl) {
        case 'low':
            $experienceLvl = 1;
            break;
        case 'medium':
            $experienceLvl = 2;
            break;
        case 'high':
            $experienceLvl = 2;
            break;
    }


    $bmi = number_format($weight / ($height * $height), 2);
    $goal = "";


    if ($bmi < 18.5) {
        $goal = "gain";
    } else if ($bmi >= 18.5 && $bmi <= 24.9) {
        $goal = "gain";
    } else if ($bmi >= 25 && $bmi <= 29.9) {

        $goal = "loss";
    } else if ($bmi > 30) {

        $goal = "loss";
    }
    $exRepo = new ExerciseRepository();
    $warmup = $exRepo->getWarmupExercisesByGoalAndDifficulty($goal, $experienceLvl);
    $main = $exRepo->getMainExercisesByGoalAndDifficulty($goal, $experienceLvl);
    $cooldown = $exRepo->getCoolDownExercisesByGoalAndDifficulty($goal, $experienceLvl);
    /*echo json_encode([
        'warmup' => $warmup,
        'main' => $main,
        'cooldown' => $cooldown
    ]);*/
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Results</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/icon.png" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100 bg-light">
    <script src="js/ResultsScript.js"> </script>
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">FitCheck</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Results</span></h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <!-- Experience Section-->
                    <section>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h2 class="text-primary fw-bolder mb-0" id="bmiValueElement">Your BMI </h2>
                            <!-- Download resume button-->
                            <!-- Note: Set the link href target to a PDF file within your project-->

                        </div>
                        <!-- Experience Card 1-->
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <div class="row align-items-center gx-5">
                                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                        <div class="bg-light p-4 rounded-4">
                                            <div class="text-primary fw-bolder mb-2">What it Means ?</div>
                                            <div class="small fw-bolder" id="bmiStatusElement">Your Are </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div id="bmiStatusMessage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-primary fw-bolder mb-0" id="bmiValueElement">Nutritional Facts </h2>

                        <!-- Experience Card 2-->
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <div class="row align-items-center gx-5">
                                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                        <div class="bg-light p-4 rounded-4">
                                            <div class="text-primary fw-bolder mb-2"></div>
                                            <div class="small fw-bolder" id="calorieInformation"></div>

                                        </div>
                                    </div>
                                    <div class="col-lg-8" id="nutritionDescription">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="text-primary fw-bolder mb-0">What to eat ? </h2>

                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <div class="row align-items-center gx-5">
                                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                        <div class="bg-light p-4 rounded-4">
                                            <div class="text-primary fw-bolder mb-2"></div>
                                            <div class="small fw-bolder" id="theGoalForWhatToEat"> </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-8" id="whatToEat">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Workout section-->
                    <section>
                        <h2 class="text-secondary fw-bolder mb-4">Your Home Workout </h2>
                        <p class="bg-light fw-normal "> This full-body workout, complete with warm-up and cool-down
                            routines, is specifically designed to match your fitness experience level. It ensures that
                            each exercise is challenging yet achievable. </p>
                        <!-- Education Card 1-->
                        <section> <!-- WARMUP SECTION-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <details style="color:black;">
                                                <summary class="text-secondary fw-bolder mb-2">WARMUP</summary>
                                                <div class=" align-items-center   ">
                                                    <section id="WarmupEX1" class="mb-3 d-flex">
                                                        <br>
                                                        <img src=<?= htmlspecialchars($warmup[0]['ex_gif_url']) ?>
                                                            alt=<?= htmlspecialchars($warmup[0]['ex_name']) ?> class="img-fluid rounded-4">
                                                        <div class="ms-4">
                                                            <h2 class="fw-bolder"> <?= $warmup[0]['ex_name'] ?> </h2>
                                                            <p class="desc"> <?= $warmup[0]['ex_desc'] ?> </p>
                                                        </div>
                                                    </section>

                                                    <section id="WarmupEX2" class="mb-3 d-flex">
                                                        <br>
                                                        <img src=<?= htmlspecialchars($warmup[1]['ex_gif_url']) ?>
                                                            alt=<?= htmlspecialchars($warmup[1]['ex_name']) ?> class="img-fluid rounded-4">
                                                        <div class="ms-4">
                                                            <h2 class="fw-bolder"><?= htmlspecialchars($warmup[1]['ex_name']) ?> </h2>
                                                            <p class="desc"> <?= htmlspecialchars($warmup[1]['ex_desc']) ?> </p>
                                                        </div>
                                                    </section>

                                                </div>
                                            </details>
                                        </div>
                                        <div class="col-lg-8">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section> <!-- MAIN EXERCISES SECTION-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <details style="color:black;">
                                                <summary class=" text-secondary fw-bolder mb-2">MAIN</summary>

                                                <section id="MainEx1" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($main[0]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($main[0]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($main[0]['ex_name']) ?></h2>
                                                        <p class="desc"><?= htmlspecialchars($main[0]['ex_desc']) ?></p>
                                                    </div>
                                                </section>

                                                <section id="MainEx2" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($main[1]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($main[1]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($main[1]['ex_name']) ?></h2>
                                                        <p class="desc" ><?= htmlspecialchars($main[1]['ex_desc']) ?></p>
                                                    </div>
                                                </section>

                                                <section id="MainEx3" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($main[2]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($main[2]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($main[2]['ex_name']) ?></h2>
                                                        <p class="desc" ><?= htmlspecialchars($main[2]['ex_desc']) ?></p>
                                                    </div>
                                                </section>

                                                <section id="MainEx4" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($main[3]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($main[3]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($main[3]['ex_name']) ?></h2>
                                                        <p class="desc" ><?= htmlspecialchars($main[3]['ex_desc']) ?></p>
                                                    </div>
                                                </section>

                                                <section id="MainEx5" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($main[4]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($main[4]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($main[4]['ex_name']) ?></h2>
                                                        <p class="desc" ><?= htmlspecialchars($main[4]['ex_desc']) ?></p>
                                                    </div>
                                                </section>


                                            </details>
                                        </div>
                                        <div class="col-lg-8">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </section>
                        <section> <!--COOL DOWN SECTION-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <details style="color:black;">
                                                <summary class=" text-secondary fw-bolder mb-2">COOLDOWN</summary>

                                                <section id="CoolDownEx1" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($cooldown[0]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($cooldown[0]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($cooldown[0]['ex_name']) ?></h2>
                                                        <p class="desc" ><?= htmlspecialchars($cooldown[0]['ex_desc']) ?></p>
                                                    </div>
                                                </section>

                                                <section id="CoolDownEx2" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($cooldown[1]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($cooldown[1]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($cooldown[1]['ex_name']) ?></h2>
                                                        <p class="desc" ><?= htmlspecialchars($cooldown[1]['ex_desc']) ?></p>
                                                    </div>
                                                </section>

                                                <section id="CoolDownEx3" class="mb-3 d-flex">
                                                    <img src="<?= htmlspecialchars($cooldown[2]['ex_gif_url']) ?>" alt="<?= htmlspecialchars($cooldown[2]['ex_name']) ?>" class="img-fluid rounded-4">
                                                    <div class="ms-4">
                                                        <h2 class="fw-bolder"><?= htmlspecialchars($cooldown[2]['ex_name']) ?></h2>
                                                        <p class="desc" ><?= htmlspecialchars($cooldown[2]['ex_desc']) ?></p>
                                                    </div>
                                                </section>




                                            </details>
                                        </div>
                                        <div class="col-lg-8">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>


                            </div>




                        </section>

                        <!-- Divider-->
                        <div class="pb-5"></div>
                        <!-- Skills Section-->
                        <section>
                            <!-- Skillset Card-->

                        </section>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; Aziz Chouaibi - 2024</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="https://github.com/azizchouaibi" target="_blank">Github</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="https://www.linkedin.com/in/aziz-chouaibi-44953331a/"
                        target="_blank">Linkedin</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="https://www.facebook.com/profile.php?id=100066944661032"
                        target="_blank">Facebook</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/ResultsScript.js " defer></script>


</body>

</html>