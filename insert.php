<?php include('./conn.php'); 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Query-form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    function validateInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = $mobile_number = $email = $subject = $message = "";
    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = validateInput($_POST['name']);
        $mobile_number = validateInput($_POST['mobile_number']);
        $email = validateInput($_POST['email']);
        $subject = validateInput($_POST['subject']);
        $message = validateInput($_POST['message']);
        $user_ip = $_SERVER['REMOTE_ADDR'];


        if (empty($name)) {
            $errors['name'] = 'Name is required';
        }
        
        if (!preg_match("/^[0-9]{10}$/", $mobile_number)) {
            $errors['mobile'] = 'Invalid Mobile Number (should be 10 digits)';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid Email';
        }
        

        if (!empty($errors)) {
            $_SESSION['alert_type'] = 'danger';
            $_SESSION['alert_message'] = 'Please fix the errors in the form.';
            $_SESSION['errors'] = $errors;
            header("Location: index.php"); 
            exit();
        }
            $sql = "INSERT INTO contact_form(`name`,`mobile_number`,`email`,`subject`,`message`,`ip_address`) VALUES ('$name','$mobile_number','$email','$subject','$message','$user_ip')";

            if ($db->query($sql) === TRUE) {

                $to = 'kanishkdixitkd9@gmail.com'; 
                $subject = 'New Form Submission';
                $message = "A new form submission has been received:\n\n";
                $message .= "Name: $name\n";
                $message .= "Mobile Number: $mobile_number\n";
                $message .= "Email: $email\n";
                $message .= "Subject: $subject\n";
                $message .= "Message: $message\n";
                $message .= "IP Address: $user_ip\n";

                $headers = 'From: beautysalon@query.com' . "\r\n";

                $mailSent = mail($to, $subject, $message, $headers);
                if($mailSent){
                    echo"sent";
                }else{
                    echo "error".error_get_last()['$message'];
                }

                $_SESSION['alert_type'] = 'success';
                $_SESSION['alert_message'] = 'Your query is submitted successfully, we will get back to you soon';
            } else {
                $_SESSION['alert_type'] = 'danger';
                $_SESSION['alert_message'] = 'Oops! some error occured.';
                exit();
            }
            header("Location: index.php");
            exit();

    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>


