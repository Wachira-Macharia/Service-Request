<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css" />
    <title>KESRA Training DASHBOARD</title>
</head>

<body class="">
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-danger navbar-dark py-3">
            <div class="container">
                <a href="#" class="navbar-brand">KESRA SERVICE REQUEST</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Resolved</a>
                        </li>
                        <li class="nav-item">
                            <a href="reports.php" class="nav-link">Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="main__container">
                <!-- MAIN TITLE STARTS HERE -->

                <div class="main__title">
                    <img src="assets/hello.svg" alt="" />
                    <div class="main__greeting">
                        <h1>Hello Student</h1>
                        <p>Welcome to your admin dashboard</p>
                    </div>
                </div>

                <!-- MAIN TITLE ENDS HERE -->

                <!-- MAIN CARDS STARTS HERE -->
                <div class="main__cards">
                    <div class="card">
                        <i class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Individuals Trained</p>
                            <span class="font-bold text-title">578</span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Programs Done</p>
                            <span class="font-bold text-title">2467</span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fa fa-book fa-2x text-yellow" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Training Instances</p>
                            <span class="font-bold text-title">340</span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fa fa-money fa-2x text-green" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Revenue Generated</p>
                            <span class="font-bold text-title">645</span>
                        </div>
                    </div>
                </div>
                <!-- MAIN CARDS ENDS HERE -->

                <!-- CHARTS STARTS HERE -->
                <div class="charts">
                    <div class="charts__left">
                        <div class="charts__left__title">
                            <div>
                                <h1>Monthly Reports</h1>
                                <p>Nairobi, Kenya</p>
                            </div>
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        </div>
                        <div id="apex1"></div>
                    </div>

                    <div class="charts__right">
                        <div class="charts__right__title">
                            <div>
                                <h1>Stats Reports</h1>
                                <p>Nairobi, Kenya</p>
                            </div>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        </div>

                        <div class="charts__right__cards">
                            <div class="card1">
                                <h1>Designation</h1>
                                <p>$75,300</p>
                            </div>

                            <div class="card2">
                                <h1>Regions</h1>
                                <p>$124,200</p>
                            </div>

                            <div class="card3">
                                <h1>Departments</h1>
                                <p>3900</p>
                            </div>

                            <div class="card4">
                                <h1>Gender</h1>
                                <p>1881</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CHARTS ENDS HERE -->
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="js/script.js"></script>
    </div>
</body>

</html>