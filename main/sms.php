<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$contact = $phone = $pno = $email = $obj = $audience = $date = $message = "";
$contact_err = $phone_err = $email_err = $obj_err = $audience_err = $date_err = $message_err = "";

// Generate a unique ID
$ticket_no = generateno();

// MEMBER NO GENERATION
function generateno()
{
    $no = rand(1000000, 9999999);
    $no = "SMS" . $no;

    return $no;
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Contact Person
    $input_contact = trim($_POST["contact"]);
    if (empty($input_contact)) {
        $contact_err = "Please enter a contact person.";
    } else {
        $contact = $input_contact;
    }
    // Validate Contact Phone Number
    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Please enter contact's phone number";
    } else {
        $phone = $input_phone;
    }
    // Validate Personal Number
    $input_pno = trim($_POST["pno"]);
    if (empty($input_pno)) {
        $pno_err = "Please enter your personal number";
    } else {
        $pno = $input_pno;
    }
    // Validate Email Address
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email address.";
    } else {
        $email = $input_email;
    }
    // Validate Objective
    $input_obj = trim($_POST["objective"]);
    if (empty($input_obj)) {
        $obj_err = "Please enter an Objective.";
    } else {
        $obj = $input_obj;
    }
    // Validate Target Audience
    $input_audience = trim($_POST["audience"]);
    if (empty($input_audience)) {
        $audience_err = "Please enter your target audience.";
    } else {
        $audience = $input_audience;
    }
    // Validate Date
    $input_date = trim($_POST["date"]);
    if (empty($input_date)) {
        $date_err = "Please enter a deadline date.";
    } else {
        $date = $input_date;
    }

    // Validate Message
    $input_message = trim($_POST["message"]);
    if (empty($input_message)) {
        $message_err = "Please enter the key message";
    } else {
        $message = $input_message;
    }

    // Check input errors before inserting in database
    if (empty($email_err) && empty($service_err) && empty($details_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO sms (ticket_no, contact, phone, pno, email, objective, audience, deadline_Date, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_ticketno, $param_contact, $param_phone, $param_pno, $param_email, $param_obj, $param_audience, $param_date, $param_message);

            // Set parameters
            $param_ticketno = $ticket_no;
            $param_contact = $contact;
            $param_phone = $phone;
            $param_pno = $pno;
            $param_email = $email;
            $param_obj = $obj;
            $param_audience = $audience;
            $param_date = $date;
            $param_message = $message;

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
    <title>SMS Request</title>
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
                    <h2 class="mt-5">SMS Request</h2>
                    <div class="mt-3 mb-4">
                        <h5 class="text-danger">Disclaimer</h5>
                        <ul>
                            <li>The Message should be typed and approved</li>
                            <li>The Message should be accompanied by a soft copy of the contact list in excel format, single sheet, three columns (Name, Number, Email). All number must start with '7' (712345678)</li>
                            <li>The request should be submitted within two working days before deadline</li>
                        </ul>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input type="text" name="contact" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact; ?>">
                            <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contant Phone Number</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                        </div>
                        <div class="col-md-6">
                            <label>Personal Number</label>
                            <input type="text" name="pno" class="form-control <?php echo (!empty($pno_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pno; ?>">
                            <span class="invalid-feedback"><?php echo $pno_err; ?></span>
                        </div>
                        <div class="col-md-6">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Objective</label>
                            <input type="text" name="objective" class="form-control <?php echo (!empty($obj_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $obj; ?>">
                            <span class="invalid-feedback"><?php echo $obj_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Target Audience</label>
                            <input type="text" name="audience" class="form-control <?php echo (!empty($audience_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $audience; ?>">
                            <span class="invalid-feedback"><?php echo $audience_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="date">Deadline Date:</label>
                            <input type="date" id="date" name="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date; ?>">
                            <span class="invalid-feedback"><?php echo $date_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Key Message to Communiate</label>
                            <textarea name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                            <span class="invalid-feedback"><?php echo $message_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="attachment">Upload Contact Lists (Include your Phone Number in the list)</label>
                            <input type="file" class="form-control" id="inputGroupFile02">
                        </div>
                        <input type="submit" class="btn btn-primary col-md-5" value="Submit">
                        <a href="index.php" class="btn btn-secondary col-md-5 ml-2">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>