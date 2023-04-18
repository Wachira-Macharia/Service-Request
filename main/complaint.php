<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$phone = $email = $subject = $details = "";
$phone_err = $email_err = $subject_err = $details_err = "";

// Generate a unique ID
$ticket_no = generateno();

// MEMBER NO GENERATION
function generateno()
{
    $no = rand(1000000, 9999999);
    $no = "COMPLAINT" . $no;

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

    // Validate Email Address
    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Please enter phone number.";
    } else {
        $phone = $input_phone;
    }

    // Validate Subject
    $input_subject = trim($_POST["subject"]);
    if (empty($input_subject)) {
        $subject_err = "Please enter a subject.";
    } else {
        $subject = $input_subject;
    }

    // Validate Details
    $input_details = trim($_POST["details"]);
    if (empty($input_details)) {
        $details_err = "Please enter details";
    } else {
        $details = $input_details;
    }

    // Check input errors before inserting in database
    if (empty($phone_err) && empty($email_err) && empty($subject_err) && empty($details_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO complaints (ticket_no, phone, email, subject, details) VALUES (?, ? , ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_ticketno, $param_phone, $param_email, $param_service, $param_details);

            // Set parameters
            $param_ticketno = $ticket_no;
            $param_phone = $phone;
            $param_email = $email;
            $param_service = $service;
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
    <title>Complaint</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="col-md-12">
                    <h2 class="mt-5">Complaint</h2>
                    <p>Please fill this form and submit to create a request for your complaint.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                        </div>
                        <div class="col-md-6">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="col-12">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control <?php echo (!empty($subject_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject; ?>">
                            <span class="invalid-feedback"><?php echo $subject_err; ?></span>
                        </div>
                        <div class="col-12">
                            <label>Complaint Details</label>
                            <textarea name="details" class="form-control <?php echo (!empty($details_err)) ? 'is-invalid' : ''; ?>"><?php echo $details; ?></textarea>
                            <span class="invalid-feedback"><?php echo $details_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="attachment">Attachments</label>
                            <input type="file" class="form-control  " id="inputGroupFile02">
                        </div>
                        <input type="submit" class="btn btn-primary col-5" value="Submit">
                        <a href="index.php" class="btn btn-secondary col-5 ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>