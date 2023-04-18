<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $service = $details = "";
$email_err = $service_err = $details_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate Email Address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email address.";
    } else{
        $email = $input_email;
    }
    
    // Validate Service
    $input_service = trim($_POST["service"]);
    if(empty($input_service)){
        $service_err = "Please enter a service.";     
    } else{
        $service = $input_service;
    }
    
    // Validate Details
    $input_details = trim($_POST["details"]);
    if(empty($input_details)){
        $details_err = "Please enter details";     
    } else{
        $details = $input_details;
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($service_err) && empty($details_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO services (email, services, details) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_service, $param_details);
            
            // Set parameters
            $param_email = $email;
            $param_service = $service;
            $param_details = $details;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
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
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
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
                    <h2 class="mt-5">Create a Request</h2>
                    <p>Please fill this form and submit to create a request for your service.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Service</label>
                            <input type="text" name="service" class="form-control <?php echo (!empty($service_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $service; ?>">
                            <span class="invalid-feedback"><?php echo $service_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <textarea name="details" class="form-control <?php echo (!empty($details_err)) ? 'is-invalid' : ''; ?>"><?php echo $details; ?></textarea>
                            <span class="invalid-feedback"><?php echo $details_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>