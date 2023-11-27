<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href = "css/main.css" />
        <link rel = "stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <title> Register </title>

        <style>

            body{
                background-image: url("images/bg3.jpg");
            }

        </style>



    </head>

    <body>

        <?php
        if (isset($_POST['submitted'])) {

            $okay = TRUE;
            
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $bloodtype = $_POST['bloodtype'];

            if (empty($_POST['fname'])) {
                print '<p style = "color:white;" class = "error">Please enter your first name.</p>';
                $okay = FALSE;
            } elseif (strlen($fname) < 3){
                print '<p style = "color:white;" class = "error">First name too short.</p>';
                $okay = FALSE;
            } elseif (strlen($fname) > 21){
                print '<p style = "color:white;" class = "error">First name too long.</p>';
                $okay = FALSE;
            } elseif (empty($_POST['lname'])) {
                print '<p style = "color:white;" class = "error">Please enter your last name.</p>';
                $okay = FALSE;
            } elseif (strlen($lname) < 3){
                print '<p style = "color:white;" class = "error">Last name too short.</p>';
                $okay = FALSE;
            } elseif (strlen($lname) > 21){
                print '<p style = "color:white;" class = "error">Last name too long.</p>';
                $okay = FALSE;
            } elseif (empty($_POST['uname'])) {
                print '<p style = "color:white;" class = "error">Please enter your user name.</p>';
                $okay = FALSE;
            } elseif (empty($_POST['email'])) {
                print '<p style = "color:white;" class = "error">Please enter your email.</p>';
                $okay = FALSE;
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                print '<p style = "color:white;" class = "error">Invalid email address.</p>';
                $okay = FALSE;
            }elseif (empty($_POST['address'])) {
                print '<p style = "color:white;" class = "error">Please enter your address.</p>';
                $okay = FALSE;
            }elseif (!preg_match('/^[0-9]{10}+$/',$phone)){
                print '<p style = "color:white;" class = "error">Invalid phone number.</p>';
                $okay = FALSE;
            }elseif (empty($_POST['phone'])) {
                print '<p style = "color:white;" class = "error">Please enter your phone number.</p>';
                $okay = FALSE;
            } elseif (empty($_POST['password'])) {
                print '<p style = "color:white;" class = "error">Please enter your password.</p>';
                $okay = FALSE;
            } elseif (strlen($password) < 8) {
                print '<p style = "color:white;" class = "error">Password too short.</p>';
                $okay = FALSE;
            } elseif (strlen($password) > 21) {
                print '<p style = "color:white;" class = "error">Password too long.</p>';
                $okay = FALSE;
            } elseif ($okay == TRUE) {

                if ($okay) {

                    include_once 'db_connection.php';

                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $uname = $_POST['uname'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $bloodtype = $_POST['bloodtype'];

                    $sql = "INSERT INTO user (fname, lname, uname, email, address, phone, password, bloodtype) VALUES ('$fname', '$lname', '$uname', '$email', '$address', '$phone', '$password', '$bloodtype');";
                    $result = mysqli_query($conn, $sql);

                    header("location: sign_in.php?registered=success");
                }
            }
        } else {

            print '<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fs-4" href="homepage.html">Blood Donation</a>
                <!-- Toggle Button -->
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- SideBar -->    
                <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <!-- SideBar Header -->    
                    <div class="offcanvas-header text-white border-bottom">

                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Blood Donation</h5>
                        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                    </div>
                    <!-- SideBar Body -->    
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item mx-2">
                                <a class="nav-link" aria-current="page" href="homepage.html">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="account.php">Account</a></li>
                                    <li><a class="dropdown-item" href="register.php">Register</a></li>
                                    <li><a class="dropdown-item" href="sign_in.php">Sign In</a></li>
                                </ul>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="user_view_notifications.php">Notifications</a>
                            </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="appointment.php">Appointment</a>
                    </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-4">

            <div style="background: rgba(255, 255, 255, 0.25); box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2); border: 2px solid rgba(255, 255, 255, 0.5)" class="card mb-3">

                <div class="row">

                    <div class="col-12">
                        <h1 style="font-family: fantasy" class="text-center mt-2 text-white"><u>Register</u></h1>
                    </div>
                    <form action = "register.php" method = "post">
                    <div class="col-6 col-lg-6 offset-3">
                        
                        <div class="mt-3 ms-3 me-3">
                            <input type="text" pattern="[A-Za-z]{1,12}" name="fname" placeholder="First Name" class="form-control"/>
                        </div>
                        <div class="mt-3 ms-3 me-3">
                            <input type="text" name="lname" placeholder="Last Name" class="form-control"/>
                        </div>
                        <div class="mt-3 ms-3 me-3">
                            <input type="text" name="uname" placeholder="User Name" class="form-control"/>
                        </div>
                        <div class="mt-3 ms-3 me-3">
                            <input type="text" name="email" placeholder="Email" class="form-control"/>
                        </div>

                        <div class="mt-3 ms-3 me-3">
                            <input type="text" name="address" placeholder="Address" class="form-control"/>
                        </div>
                        <div class="mt-3 ms-3 me-3">
                            <input type="text" name="phone" placeholder="Phone Number" class="form-control"/>
                        </div>
                        <div class="mt-3 ms-3 me-3 mb-3">
                            <input type="text" name="password" placeholder="Password" class="form-control"/>
                        </div>
                    </div>

                    <div class="bloodTypeRadio offset-3">
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "A" id="blood_A" checked>
                            <label class="form-check-label text-white" for="blood_A">A</label>
                        </div>
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "B" id="blood_B">
                            <label class="form-check-label text-white" for="blood_B">B</label>
                        </div>
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "AB" id="blood_AB">
                            <label class="form-check-label text-white" for="blood_AB">AB</label>
                        </div>
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "O" id="blood_O">
                            <label class="form-check-label text-white" for="blood_O">O</label>
                        </div>
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "A-" id="blood_A-">
                            <label class="form-check-label text-white" for="blood_A-">A-</label>
                        </div>
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "B-" id="blood_B-">
                            <label class="form-check-label text-white" for="blood_B-">B-</label>
                        </div>
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "AB-" id="blood_AB-">
                            <label class="form-check-label text-white" for="blood_AB-">AB-</label>
                        </div>
                        <div class="form-check form-check-inline ms-3 mb-3">
                            <input class="form-check-input" type="radio" name="bloodtype" value = "O-" id="blood_O-">
                            <label class="form-check-label text-white" for="blood_O-">O-</label>
                        </div>
                    </div>
                    <p><input type = "submit" name = "submit" value = "Register" class="btn col-4 col-lg-4 offset-4 text-white" style="background: #FF0066" /></p>
                    <input type = "hidden" name = "submitted" value = "true" />
                    </form>
                    <p style="font-size: 13px;" class="col-2 col-lg-2 offset-5 text-center pt-3 text-white">OR</p>

                    <div class="btnLogin">
                        <button style="background: #FF0066" type="button" class="btn col-4 col-lg-4 offset-4 mb-3 text-white">Sign In</button>
                    </div>
                    
                </div>



            </div>

        </div>
        
        <footer class="bg-dark text-white pt-5 pb-4">
            
            <div class="container text-center text-md-left">
                
                <div class="row text-center text-md-left">
                    
                    <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Blood Donation</h5>
                        <p>Thank you for visiting our website!</p>
                    </div>
                    
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Links</h5>
                        <p><a href="homepage.html" class="text-white" style="text-decoration: none;">Home</a></p>
                        <p><a href="account.php" class="text-white" style="text-decoration: none;">Account</a></p>
                        <p><a href="user_view_notifications.php" class="text-white" style="text-decoration: none;">Notifications</a></p>
                        <p><a href="appointment.php" class="text-white" style="text-decoration: none;">Appointment</a></p>
                        <p><a href="contact.php" class="text-white" style="text-decoration: none;">Contact</a></p>
                        <p><a href="about.html" class="text-white" style="text-decoration: none;">About</a></p>
                    </div>
                    
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contacts</h5>
                        <p><i class="fas fa-home mr-3"></i> 11900, Bayan Lepas, Penang</p>
                        <p><i class="fas fa-envelope mr-3"></i> pantaihosp@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> 04-6433888</p>
                    </div>
                    
                </div>
                
                <hr class="mb-4">
                
                <div class="row align-items-center">
                    
                    <div class="col-12 col-md-6">
                        <p>Copyright All rights reserved by <span class="text-warning"> VISHVAA</span>.</p>
                    </div>
                    
                </div>
                
            </div>
            
        </footer>';
        }
        ?>

    </body>
</html>