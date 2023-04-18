<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="img/logo.png" rel="icon">
    <title>Reports</title>
    <style>
        .wrapper {
            width: 800px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-danger navbar-dark py-3">
        <div class="container">
            <a href="index.php" class="navbar-brand">KESRA SERVICE REQUEST</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="resolved.php" class="nav-link">Resolved</a>
                    </li>
                    <li class="nav-item">
                        <a href="reports.php" class="nav-link">Reports</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container bg-white">
        <div class="main__container">
            <!-- MAIN TITLE STARTS HERE -->

            <div class="main__title">
                <img src="img/hello.svg" alt="" />
                <div class="mt-5 mb-3 clearfix main__greeting">
                    <h2 class="pull-left">Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b> &#128075;</h2>
                    <a href="logout.php" class="btn btn-danger pull-right ml-4"><i class="fa fa-sign-out"></i> Signout</a>
                </div>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
            <div class="card">
                <i class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">All Requests</p>
                    <span class="font-bold text-title">50</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Closed Requests</p>
                    <span class="font-bold text-title">30</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-book fa-2x text-yellow" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Open Requests</p>
                    <span class="font-bold text-title">20</span>
                </div>
            </div>
            <div class="card">
                <i class="fa fa-book fa-2x text-yellow" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Reports Score</p>
                    <span class="font-bold text-title">80%</span>
                </div>
            </div>
        </div>
        <!-- MAIN CARDS ENDS HERE -->
        <?php
        // Include config file
        require_once "config.php";

        // Attempt select query execution
        $sql = "SELECT * FROM website";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-bordered table-striped">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>Ticket No.</th>";
                echo "<th>Email Address</th>";
                echo "<th>Subject</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ticket_no'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['subject'] . "</td>";
                    echo "<td>";
                    echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else {
                echo '<div class="alert alert-danger"><em>No Services were found.</em></div>';
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close connection
        mysqli_close($link);
        ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>