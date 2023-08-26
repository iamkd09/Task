<?php include('./conn.php'); 
session_start();

if (isset($_SESSION['alert_message'])) {
    $alert_type = $_SESSION['alert_type'];
    $alert_message = $_SESSION['alert_message'];
    echo '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert"> ' . $alert_message . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    
    unset($_SESSION['alert_message']);
    unset($_SESSION['alert_type']);
}



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
    if (isset($_SESSION['alert_message'])) { $alert_type = $_SESSION['alert_type']; $alert_message = $_SESSION['alert_message']; echo '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert"> ' . $alert_message . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>'; 
    }
    ?>
    <div class="content">

        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-8">
                    <div class="form h-100">
                        <h3>Send us your query</h3>
                        <form class="mb-5" method="post" id="contactForm" action="./insert.php">
                            <div class="row">

                                <div class="col md-6 form-group mb-5">
                                    <label class="col-form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Your name" required>
                                    <?php
                                    if(isset($_SESSION['errors']['name'])){
                                        echo '<span class="text-danger">'.$_SESSION['errors']['name'].'</span>';
                                        unset($_SESSION['errors']['name']);
                                    }
                                    ?>
                                </div>
                                <div class="col md-6 form-group mb-5">
                                    <label class="col-form-label">Mobile Number</label>
                                    <input type="number" class="form-control" name="mobile_number" placeholder="Your mobile number" required>
                                    <?php
                                    if(isset($_SESSION['errors']['mobile'])){
                                        echo '<span class="text-danger">'.$_SESSION['errors']['mobile'].'</span>';
                                        unset($_SESSION['errors']['mobile']);
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-6 form-group mb-5">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Your email" required>
                                    <?php
                                    if(isset($_SESSION['errors']['email'])){
                                        echo '<span class="text-danger">'.$_SESSION['errors']['email'].'</span>';
                                        unset($_SESSION['errors']['email']);
                                    }
                                    ?>
                                </div>
                                <div class="col md-6 form-group mb-3">
                                    <label class="col-form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Your subject">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-12 form-group mb-3">
                                    <label class="form-label">Message</label>
                                    <input type="text" class="form-control" name="message" placeholder="Your message" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn btn-primary rounded-0 py-2 px-4">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-info h-100">
                        <h1>Beauty Salon</h1>
                        <p class="mb-5"></p>
                        <ul class="list-unstyled">
                            <li class="d-flex">
                                <span class="wrap-icon icon-room mr-3"></span>
                                <span class="text"></span>
                            </li>
                            <li class="d-flex">
                                <span class="wrap-icon icon-phone mr-3"></span>
                                <span class="text"></span>
                            </li>
                            <li class="d-flex">
                                <span class="wrap-icon icon-envelope mr-3"></span>
                                <span class="text"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>