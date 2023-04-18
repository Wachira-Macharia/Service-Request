<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="KESRA">
    <link href="img/logo.png" rel="icon">
    <title>KESRA SERVICE REQUEST SYSTEM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    .top-bar {
        height: 70px;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
    }

    .top-bar h1 {
        color: white;
        text-align: center;
        line-height: 50px;
        margin: 0;
        padding: 10px;
    }

    .center {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 300px;
    }

    .row {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin: 10px 0;
    }

    .button {
        margin: 0 10px;
    }
</style>

<body id="page-top">

    <!-- Header -->
    <div class="header">
        <h1>KESRA Service Request System</h1>
    </div>
    <div id="wrapper">
        <!-- CONTENT HOLDER -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <div class="top-bar bg-danger">
                    <!-- Container Fluid-->
                    <div class="container-fluid" id="container-wrapper">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <a href=''><img style="width: 70px; height: 70px; padding: 10px" src="img/logo.png"></a>
                            <h1>KESRA SERVICE REQUEST SYSTEM</h1>
                            <div style="float: right;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Topbar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    </div>

                    <!-- CARDS -->
                    <div class="col-lg-12">
                        <div class="card sm mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h2></h2>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 mb-4">
                                        <A href="web.php">
                                            <div class="btn bg-primary text-center text-white">
                                                <div class="card-body">
                                                    WEBSITE SERVICE REQUEST
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <A href="complaint.php">
                                            <div class="btn bg-success text-center text-white">
                                                <div class="card-body">
                                                    SUBMIT COMPLAINT
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <A href="design.php">
                                            <div class="btn bg-danger text-center text-white">
                                                <div class="card-body">
                                                    DESIGN SERVICE REQUEST
                                                </div>
                                            </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 mb-4">
                                            <A href="sms.php">
                                                <div class="btn bg-black text-center text-white">
                                                    <div class="card-body">
                                                        SMS SERVICE REQUEST
                                                        <div class="text-white-100 medium"> </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 mb-4">
                                            <A href="bkroom.php">
                                                <div class="btn bg-secondary text-center text-white">
                                                    <div class="card-body">
                                                        ROOM BOOKING SERVICE REQUEST
                                                        <div class="text-white-100 medium"> </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <!-- Footer -->
                            <?php
                            include('footer.php');
                            ?>
                            <!-- Footer -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>