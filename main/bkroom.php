<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $room = $pax = $courseName = $date = $time = $details = "";
$email_err = $room_err = $pax_err = $courseName_err = $date_err = $time_err = $details_err = "";

// Generate a unique ID
$ticket_no = generateno();

// MEMBER NO GENERATION
function generateno()
{
    $no = rand(1000000, 9999999);
    $no = "ROOM" . $no;

    return $no;
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Email Address
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email address.";
    } else {
        $email = $input_email;
    }
    // Validate Room Name
    $input_room = trim($_POST["room"]);
    if (empty($input_room)) {
        $room_err = "Choose a room.";
    } else {
        $room = $input_room;
    }
    // Validate Number of Participants
    $input_pax = trim($_POST["pax"]);
    if (empty($input_pax)) {
        $pax_err = "Please enter the number of participants.";
    } else {
        $pax = $input_pax;
    }
    // Validate Course Name
    $input_courseName = trim($_POST["courseName"]);
    if (empty($input_courseName)) {
        $courseName_err = "Please enter the Course Name.";
    } else {
        $courseName = $input_courseName;
    }
    // Validate Date
    $input_date = trim($_POST["date"]);
    if (empty($input_date)) {
        $date_err = "Please enter the course date.";
    } else {
        $date = $input_date;
    }

    // Validate Time
    $input_time = trim($_POST["time"]);
    if (empty($input_time)) {
        $time_err = "Please enter the course time";
    } else {
        $time = $input_time;
    }

    // Validate Booking Details
    $input_details = trim($_POST["details"]);
    if (empty($input_details)) {
        $details_err = "Please enter other course details";
    } else {
        $details = $input_details;
    }

    // Check input errors before inserting in database
    if (empty($email_err) && empty($service_err) && empty($details_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO bookings (ticket_no, pno, email, room, pax, courseName, date, time, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss",  $param_ticketno, $param_pno, $param_email, $param_room, $param_pax, $param_courseName, $param_date, $param_time, $param_details);

            // Set parameters
            $param_ticketno = $ticket_no;
            $param_pno = $pno;
            $param_email = $email;
            $param_room = $room;
            $param_pax = $pax;
            $param_courseName = $courseName;
            $param_date = $date;
            $param_time = $time;
            $param_details = $details;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Room Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="img/logo.png" rel="icon">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h2 class="mt-5">Book Room Request</h2>
                    <p>Please fill this form and submit to create a request to book a room.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="radio" name="room" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Board Room
                            </label>

                        </div>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" value="<?php echo $email; ?>" type="radio" name="room" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Executive Board Room
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Number of Participants</label>
                            <input type="text" name="pax" class="form-control <?php echo (!empty($pax_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pax; ?>">
                            <span class="invalid-feedback"><?php echo $pax_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Course Name/Meeting Title</label>
                            <input type="text" name="courseName" class="form-control <?php echo (!empty($courseName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $courseName; ?>">
                            <span class="invalid-feedback"><?php echo $courseName_err; ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dateName; ?>">
                            <span class="invalid-feedback"><?php echo $date_err; ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="time">Time:</label>
                            <input type="time" id="time" name="time" class="form-control <?php echo (!empty($time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $time; ?>">
                            <span class="invalid-feedback"><?php echo $time_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Other Booking Details</label>
                            <textarea name="details" class="form-control <?php echo (!empty($details_err)) ? 'is-invalid' : ''; ?>"><?php echo $details; ?></textarea>
                            <span class="invalid-feedback"><?php echo $details_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary col-md-5" value="Submit">
                        <a href="index.php" class="btn btn-secondary col-md-5 ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>